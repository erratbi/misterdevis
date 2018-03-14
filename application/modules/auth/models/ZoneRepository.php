<?php


use Doctrine\ORM\EntityRepository;


/**
 * Class Auth_Model_ZoneRepository
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    25/12/17
 */
class Auth_Model_ZoneRepository extends EntityRepository {
  
  public function getArray() {
    
    $qb   = $this->_em->createQueryBuilder();
    $data = $qb->from( $this->_entityName, 'z' )
               ->select( 'z.id_zone, z.ville' )
               ->getQuery()
               ->getResult( \Doctrine\ORM\Query::HYDRATE_ARRAY );
    
    $results = [];
    
    foreach ( $data as $item ) {
      $results[ $item['id_zone'] ] = $item['ville'];
    }
    
    return $results;
  }
  
  
  public function getSuggessions( $q ) {
    
    $qb = $this->_em->createQueryBuilder();
    
    return $qb->from( $this->getEntityName(), 'z' )
              ->select( 'DISTINCT z.id_zone, z.ville, z.code,z.lat,z.lng' )
              ->where( 'z.code LIKE :code' )
              ->orWhere( 'z.ville LIKE :code' )
              ->setParameter( 'code', "{$q}%" )
              ->setMaxResults( 20 )
              ->getQuery()
              ->getResult( 2 );
    
  }
  
  public function getZipsByRadius( $radius, $lat, $lng ) {
    
    $x_distance = "(6378000 * (3.14159265359/2 - ASIN( SIN(RADIANS(" . $lat . ")) * SIN(RADIANS(z.lat)) + COS(RADIANS(" . $lng . ") - RADIANS(z.lng)) * COS(RADIANS(" . $lat . ")) * COS(RADIANS(z.lat)))))";
    
    $sql  = "Select z.id_zone, z.code," . $x_distance . " As distance From zone as z where" . $x_distance . "<=" . $radius;
    $stmt = $this->_em->getConnection()->prepare( $sql );
    $stmt->execute();
    
    return $stmt->fetchAll();
    
  }
  
  public function insertGeo( $sql ) {
    
    if ( ! $sql ) {
      return;
    }
    $stmt = $this->_em->getConnection()->prepare( $sql );
    $stmt->execute();
    
    return $stmt;
  }

  public function findByNameOrCode( $query ) {
    
    $q = $this->createQueryBuilder( 'z' );
    
    
    return $q->select( 'z.id_zone, z.code,z.ville' )
             ->where( 'z.code LIKE :query' )
             ->orWhere( 'z.ville LIKE :query' )
             ->setParameter( 'query', "{$query}%" )
             ->getQuery()
             ->getResult( 2 );
    
  }
}

