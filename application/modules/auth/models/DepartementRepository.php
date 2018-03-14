<?php
/**
 * Account Repository
 */


use Doctrine\ORM\EntityRepository;


class Auth_Model_DepartementRepository extends EntityRepository {
  
  public function findByNameOrCode( $query ) {
    
    $q = $this->createQueryBuilder( 'd' );
    
    
    return $q->select( 'd.code_departement, d.nom_departement' )
             ->where( 'd.code_departement LIKE :query' )
             ->orWhere( 'd.nom_departement LIKE :query' )
             ->setParameter( 'query', "{$query}%" )
             ->getQuery()
             ->getResult( 2 );
    
  }
  
  public function getMultiOptions() {
    
    $data = $this->createQueryBuilder( 'd' )
                 ->select( 'd.nom_departement, d.code_departement' )
                 ->getQuery()
                 ->getResult( 2 );
    
    $results = [ '' => 'Veuillez préciser' ];
    
    foreach ( $data as $item ) {
      $results[ $item['code_departement'] ] = $item['nom_departement'];
    }
    
    return $results;
    
  }
}
