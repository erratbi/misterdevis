<?php


use Doctrine\ORM\EntityRepository;


/**
 * Class Auth_Model_ChauffeEauRepository
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Model_ChauffeEauRepository extends EntityRepository {
  
  public function getList() {
    
    $qb = $this->_em->createQueryBuilder();
    
    return $qb->from( $this->_entityName, 'ch' )
              ->select( 'd.id_demande, d.titre_demande, d.publier_en_ligne, p.nom_particulier, p.prenom_particulier,' .
                        'd.date_creation, d.date_publication, z.ville, c.adresse, z.code, u.firstname_user, u.lastname_user,' .
                        'a.libelle as categorie, d.prix_mise_en_ligne,d.qualification' )
              ->leftJoin( 'ch.id_demande', 'd' )
              ->leftJoin( 'd.id_particulier', 'p' )
              ->leftJoin( 'd.id_chantier', 'c' )
              ->leftJoin( 'c.zone', 'z' )
              ->leftJoin( 'd.id_user', 'u' )
              ->leftJoin( 'd.id_activite', 'a' )
              ->where( 'd.titre_demande IS NOT NULL and d.titre_demande != \'\'' )
              ->orderBy( 'd.date_creation', 'DESC' )
              ->getQuery()
              ->getResult();
  }
  
  
  public function getNotifications( $justCount = false ) {
    
    $select = $justCount
      ? 'count(d.id_demande)'
      : 'd.id_demande,p.nom_particulier,p.prenom_particulier,d.date_creation';
    
    $query = $this->_em->createQueryBuilder()
                       ->from( 'Auth_Model_Demandedevis', 'd' )
                       ->select( $select )
                       ->leftJoin( 'd.id_particulier', 'p' )
                       ->leftJoin( 'd.id_activite', 'a' )
                       ->where( 'a.ref = :activite' )
                       ->andWhere( '(d.titre_demande IS NULL or d.titre_demande = \'\')' )
                       ->setParameter( 'activite', 'CHE' )
                       ->orderBy( 'd.date_creation', 'DESC' )
                       ->getQuery();
    
    return $justCount ? $query->getSingleScalarResult() : $query->getResult();
    
  }
  
  
  public function save( $id_demande = null, $data ) {
    
    // Grabing the demande or creating new one
    $demande = $this->_em->getRepository( 'Auth_Model_Demandedevis' )->find( $id_demande );
    if ( ! $demande ) {
      $demande  = new Auth_Model_Demandedevis;
      $activite = $this->_em->getRepository( 'Auth_Model_Activite' )->findOneBy( [ 'ref' => 'CHE' ] );
      $demande->setId_activite( $activite );
      $demande->setDate_creation( date( 'Y-m-d H:i:s' ) );
    }
    
    // Populating the demande user
    $user = $this->_em->getRepository( 'Auth_Model_User' )->find( $data['id_user'] );
    $demande->setId_user( $user );
    
    // Creating a fresh qualification if there isn't any
    $qualification = $this->_em->getRepository( $this->_entityName )->findOneBy( [ 'id_demande' => $id_demande ] );
    if ( ! $qualification ) {
      $qualification = new Auth_Model_ChauffeEau();
    }
    
    
    // Populating qualificaiton object
    foreach ( $data['ChauffeEau'] as $key => $val ) {
      $prop = 'set' . ucfirst( $key );
      if ( method_exists( $qualification, 'set' . ucfirst( $key ) ) ) {
        $qualification->$prop( $val );
      }
    }
    
    
    // Populating demande object
    
    foreach ( $data['Demande'] as $key => $val ) {
      $prop = 'set' . ucfirst( $key );
      if ( method_exists( $demande, 'set' . ucfirst( $key ) ) ) {
        $demande->$prop( $val );
      }
    }
    
    $demande->setDate_publication( date( 'Y-m-d H:i:s' ) );
    
    
    // Populating particulier object
    
    $particulier = $demande->getId_particulier();
    if ( ! $particulier ) {
      $particulier = new Auth_Model_Particulier;
    }
    
    
    foreach ( $data['Particulier'] as $key => $val ) {
      $prop = 'set' . ucfirst( $key );
      if ( method_exists( $particulier, 'set' . ucfirst( $key ) ) ) {
        $particulier->$prop( $val );
      }
    }
    
    $this->_em->persist( $particulier );
    $this->_em->flush();
    
    $demande->setId_particulier( $particulier );
    
    
    // Populating chantier object
    
    $chantier = $demande->getId_Chantier();
    if ( ! $chantier ) {
      $chantier = new Auth_Model_Chantier();
    }
    
    $chantier->zone = $this->_em->getRepository( 'Auth_Model_Zone' )->find( $data['Chantier']['id_zone'] );
    
    foreach ( $data['Chantier'] as $key => $val ) {
      if ( $key === 'id_zone' ) {
        continue;
      }
      $prop = 'set' . ucfirst( $key );
      if ( method_exists( $chantier, 'set' . ucfirst( $key ) ) ) {
        $chantier->$prop( $val );
      }
    }
    
    $this->_em->persist( $chantier );
    $this->_em->flush();
    
    $demande->setId_chantier( $chantier );
    
    $this->_em->persist( $demande );
    $this->_em->flush();
		
		if ( is_file( APPLICATION_PATH . $data['Demande']['audio'] ) ) {
			$demande->saveAudio( $data['Demande']['audio'] );
			
			$this->_em->persist( $demande );
			$this->_em->flush();
		}
    
    
    // Attaching the qualification to the demande
    $qualification->setId_demande( $demande );
    
    
    $this->_em->persist( $qualification );
    $this->_em->flush();
    
    return $qualification;
  }
  
}
