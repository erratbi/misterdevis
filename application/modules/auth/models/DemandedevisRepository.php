<?php
/**
 * Account Repository
 */


use Doctrine\ORM\EntityRepository;


class Auth_Model_DemandedevisRepository extends EntityRepository {
  
  public function findlist() {
    
    $queryBuilder = $this->_em->createQueryBuilder();
    $queryBuilder->from( $this->_entityName, 'd' )
                 ->join( 'd.id_user', 'u' )
                 ->select( 'd.id_demande,p.nom_particulier,p.prenom_particulier,d.titre_demande,d.date_publication,d.date_creation,u.firstname_user,u.lastname_user,d.publier_en_ligne,d.prix_mise_en_ligne,
						a.libelle,z.ville,z.code' )
                 ->leftjoin( 'd.id_particulier', 'p' )
                 ->leftjoin( 'd.id_activite', 'a' )
                 ->leftjoin( 'd.id_chantier', 'c' )
                 ->leftjoin( 'c.zone', 'z' )
                 ->orderBy( 'd.date_creation', 'desc' );
    
    $query = $queryBuilder->getQuery();
    
    return $query->getResult();
  }
  
  public function findOpenJobs( $email_artisan ) {
    
    $artisan = $this->_em->getRepository( 'Auth_Model_Artisan' )->findOneBy( [ 'email_artisan' => $email_artisan ] );
    
    if ( ! $artisan ) {
      return [];
    }
    
    $specialities = $artisan->getSpecialities();
    $departements = $artisan->getDepartements();
    
    $q  = $this->createQueryBuilder( 'd' );
    $q2 = $this->_em->createQueryBuilder();
    $q3 = $this->_em->createQueryBuilder();
    $q4 = $this->_em->createQueryBuilder();
    
    return $q->where(
      $q->expr()->notIn(
        'd.id_demande',
        $q2->select( 'ach.id_demande' )
           ->from( 'Auth_Model_Acheter', 'ach' )
           ->where( "ach.id_artisan = '{$artisan->id_artisan}'" )
           ->getDQL()
      )
    )
             ->andWhere(
               $q->expr()->notIn(
                 'd.id_demande',
                 $q3->select( 'ach2.id_demande' )
                    ->from( 'Auth_Model_Acheter', 'ach2' )
                    ->groupBy( 'ach2.id_demande' )
                    ->having( 'COUNT(ach2.id_demande) >= 5' )
                    ->getDQL()
               )
             )
             ->andWhere(
               $q->expr()->in(
                 'd.id_chantier',
                 $q4->select( 'ch.id_chantier' )
                    ->from( 'Auth_Model_Chantier', 'ch' )
                    ->innerJoin( 'ch.zone', 'z' )
                    ->where( "z.code_departement IN (:departements)" )
                    ->getDQL()
      
               )
             )
             ->andWhere( 'd.publier_en_ligne = 1' )
             ->andWhere( 'd.id_activite IN (:type)' )
             ->setParameters( [ 'departements' => $departements, 'type' => $specialities ] )
             ->getQuery()
             ->getResult();
  }
  
  public function findAllBy( $criteria ) {
    
    $q = $this->createQueryBuilder( 'd' )
              ->innerJoin( 'd.id_activite', 'a' );
    
    if ( $criteria['zone'] ) {
      
      $q->innerJoin( 'd.id_chantier', 'ch' )
        ->andWhere( 'ch.id_zone = :zone' )
        ->setParameter( 'zone', $criteria['zone'] );
    }
    
    if ( $criteria['artisan'] ) {
      $q->leftJoin( 'd.acheteurs', 'ach' )
        ->andWhere( '(ach.id_artisan <> :id_artisan or ach.id_artisan IS NULL)' )
        ->setParameter( 'id_artisan', $criteria['artisan'] );
    }
    
    if ( $criteria['type'] ) {
      $types = array_map( function ( $type ) {
        
        return $type['type'];
      }, $criteria['type'] );
      
      $q->andWhere( "a.libelle IN  (:types)" )->setParameter( 'types', $types );
    }
    
    if ( $criteria['online'] ) {
      $q->andWhere( 'd.publier_en_ligne = 1' );
    }
    
    if ( $criteria['limit'] ) {
      $q->setMaxResults( $criteria['limit'] );
    }
    
    return $q->getQuery()->getResult();
  }
  
  
  public function countBy( $criteria ) {
    
    $type = isset( $criteria['type'] ) ? $criteria['type'] : null;
    $q    = null;
    
    if ( $type ) {
      try {
        $q = $this->_em->createQueryBuilder()->from( 'Auth_Model_' . $type, 'd' );
        $q->select( 'COUNT(d)' );
      } catch ( Exception $e ) {
        die( $e->getMessage() );
        
        return 0;
      }
    } else {
      $q = $this->_em->createQueryBuilder()->from( 'Auth_Model_Demandedevis', 'd' );
      $q->select( 'COUNT(d)' );
    }
    
    if ( isset( $criteria['qualification'] ) ) {
      $q->where( 'd.qualification = :qualif' )
        ->setParameter( 'qualif', $criteria['qualification'] );
    }
    
    
    if ( isset( $criteria['sold'] ) ) {
      $q->from( 'Auth_Model_Acheter', 'ach' )
        ->where( 'd.id_demande = ach.id_demande' )
        ->andWhere( 'ach.reglee = :sold' )
        ->setParameter( 'sold', $criteria['sold'] );
    }
    
    if ( isset( $criteria['payement'] ) ) {
      if ( ! isset( $criteria['sold'] ) ) {
        $q->from( 'Auth_Model_Acheter', 'ach' );
      }
      
      $q->andWhere( 'd.id_demande = ach.id_demande' )
        ->andWhere( 'ach.mode_paiement = :mode' )
        ->setParameter( 'mode', $criteria['payement'] );
    }
    
    try {
      
      return (int) $q->getQuery()
                     ->getSingleScalarResult();
    } catch ( Exception $e ) {
      die( $e->getMessage() );
      
      return 0;
    }
  }
  
  public function getListUsers() {
    
    $q = $this->_em->createQueryBuilder();
    $q->from( $this->_entityName, 'd' )
      ->join( 'd.id_user', 'u' )
      ->select( 'u.firstname_user,u.lastname_user,count(d.id_demande) as countuser' )
      ->groupBy( 'd.id_user' );
    
    
    $query = $q->getQuery();
    
    return $query->getResult();
    
  }
}
