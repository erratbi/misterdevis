<?php
/**
 * Account Repository
 */


use Doctrine\ORM\EntityRepository;


class Auth_Model_ArtisanRepository extends EntityRepository {
  
  public function findListEmail( $activite, $departement ) {
    
    return $this->createQueryBuilder( 'a' )
                ->innerJoin( 'a.activites', 'ac' )
                ->innerJoin( 'a.departements', 'dep' )
                ->where( 'dep.code_departement = :dep' )
                ->andWhere( 'ac.id_activite = :activite' )
                ->setParameters( [
                  'dep'      => $departement,
                  'activite' => $activite,
                ] )
                ->getQuery()
                ->getResult( 2 );
  }

  public function findListEmailByGeo( $activite, $zone ) {

    return $this->createQueryBuilder( 'a' )
                ->innerJoin( 'a.activites', 'ac' )
                ->innerJoin( 'a.zones', 'z' )
                ->where( 'z.id_zone = :zone' )
                ->andWhere( 'ac.id_activite = :activite' )
                ->setParameters( [
                  'zone'      => $zone,
                  'activite' => $activite,
                ] )
                ->getQuery()
                ->getResult( 2 );
  }
  
  
  public function getSpecialities( $id ) {
    
    $qb = $this->_em->createQueryBuilder();
    
    return $qb
      ->from( 'Auth_Model_Specialiste', 's' )
      ->select( 'ac.libelle as type' )
      ->innerJoin( 's.artisan', 'a' )
      ->innerJoin( 's.activite', 'ac' )
      ->where( 'a.id_artisan = :id' )
      ->setParameter( 'id', $id )
      ->getQuery()
      ->getResult();
    
  }
  
  
  public function save( $id = null, $data, $hash = 'secret' ) {
    
    // Grabing the demande or creating new one
    $artisan = $this->_em->getRepository( 'Auth_Model_Artisan' )->find( $id );
    if ( ! $artisan ) {
      $artisan = new Auth_Model_Artisan;
    }
    
    if ( strlen( $data['Artisan']['pass'] ) ) {
      $artisan->setPass( (string) hash( 'SHA256', $hash . $data['Artisan']['pass'] ) );
    }
    unset( $data['Artisan']['pass'] );
    
    

    // Populating artisan object
    foreach ( $data['Artisan'] as $key => $val ) {
      $prop = 'set' . ucfirst( $key );
      if ( method_exists( $artisan, 'set' . ucfirst( $key ) ) ) {
        $artisan->$prop( $val );
      }
    }



    $artisan->setGeolocalisation($data['geolocalisation']);
    
    


    $this->deleteActivites( $id );
    
    $activites = array_unique( $data['Artisan']['select_activites'] );
    
    foreach ( $activites as $item ) {
      $activite = $this->_em->getRepository( 'Auth_Model_Activite' )->find( $item );
      if ( $activite ) {
        $artisan->addActivite( $activite );

      }
    }
    
    

    $this->_em->persist( $artisan );
    $this->_em->flush();




    $this->deleteDepartements( $id );

    $this->deleteGeolocalisation($id);

    $this->deleteCodes($id);



    if($data['geolocalisation']=="departement"){
    
      $departements = $data['departements'];
      
      foreach ( $departements as $item ) {
        $departement = $this->_em->getRepository( 'Auth_Model_Departement' )->find( $item );
        if ( $departement ) {
          $artisan->addDepartement( $departement );

          
        }
      }

      $this->_em->persist( $artisan );
      $this->_em->flush();

    }else if ($data['geolocalisation']=="geographique"){
      //Ajouter les zones

      $lat1 = (float) $artisan->lat;
      $lng1 = (float) $artisan->lng;
      $radius= (float) $artisan->rayon;

      $zones = $this->_em->getRepository( 'Auth_Model_Zone' )->getZipsByRadius($radius,$lat1,$lng1);

      //die(var_dump(count($zones)));

      $sql="Insert into geolocaliser (ID_ARTISAN,ID_ZONE,DISTANCE) Values";

      foreach ($zones as $zone) {

        $sql=$sql . "(".$artisan->id_artisan.",".$zone['id_zone'].",'".$zone['distance']."'),";

      }

      $sql=substr($sql, 0, -1);

      $stmt=$this->_em->getRepository( 'Auth_Model_Zone' )->insertGeo($sql);

    }else if($data['geolocalisation']=="code_postal"){

      $codes = $data['codes'];


      
      foreach ( $codes as $item ) {
        $code = $this->_em->getRepository( 'Auth_Model_Zone' )->find( $item );
        if ( $code ) {
          $artisan->addCode( $code );
        }
      }

      $this->_em->persist( $artisan );
      $this->_em->flush();

  }
    
    
    
    
    
    return $artisan;
  }
  
  public function deleteActivites( $id ) {
    
    $this->_em->createQueryBuilder()
              ->delete( 'Auth_Model_Specialiste', 's' )
              ->where( 's.id_artisan = :id_artisan' )
              ->setParameter( 'id_artisan', $id )
              ->getQuery()
              ->getResult();
    
    
  }
  
  public function deleteDepartements( $id ) {
    
    $this->_em->createQueryBuilder()
              ->delete( 'Auth_Model_Intervenir', 'i' )
              ->where( 'i.id_artisan = :id_artisan' )
              ->setParameter( 'id_artisan', $id )
              ->getQuery()
              ->getResult();
    
    
  }

  public function deleteCodes( $id ) {
    
    $this->_em->createQueryBuilder()
              ->delete( 'Auth_Model_Code', 'c' )
              ->where( 'c.id_artisan = :id_artisan' )
              ->setParameter( 'id_artisan', $id )
              ->getQuery()
              ->getResult();
    
    
  }

  public function deleteGeolocalisation($id) {

    $this->_em->createQueryBuilder()
              ->delete( 'Auth_Model_Geolocaliser', 'g' )
              ->where( 'g.id_artisan = :id_artisan' )
              ->setParameter( 'id_artisan', $id )
              ->getQuery()
              ->getResult();
  }

  public function calculDistance($lat_a,$lat_b,$lon_a,$lon_b){

    $R = 6378000; //Rayon de la terre en mètre
     
    $d = $R * (M_PI_2 - asin( sin(deg2rad($lat_b)) * sin(deg2rad($lat_a)) + cos(deg2rad($lon_b) - deg2rad($lon_a)) * cos(deg2rad($lat_b)) * cos(deg2rad($lat_a))));
    return $d;
  }

  public function getMultiOptions() {
    
    $data = $this->createQueryBuilder( 'a' )
                 ->select( 'a.nom_artisan,a.prenom_artisan, a.id_artisan' )
                 ->getQuery()
                 ->getResult( 2 );
    
    $results = [ '' => 'Veuillez préciser' ];
    
    foreach ( $data as $item ) {
      $results[ $item['id_artisan'] ] = $item['prenom_artisan'] . ' ' . $item['nom_artisan'];
    }
    
    return $results;
    
  }
}

