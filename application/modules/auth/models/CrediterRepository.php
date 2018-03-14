<?php
/**
 * Crediter Repository
 */


use Doctrine\ORM\EntityRepository;


class Auth_Model_CrediterRepository extends EntityRepository {
  
  public function countBy($id_artisan){

  	$queryBuilder = $this->_em->createQueryBuilder();
    $queryBuilder->from( $this->_entityName, 'c' )
    			 ->join('c.pack','p')
                 ->select( 'sum(p.nbre_credit) as sumCredit' )
                 ->where('c.reglee = :reglee')
                 ->andwhere('c.id_artisan = :artisan' )
                 ->setParameter( 'reglee', true )
        		 ->setParameter( 'artisan', $id_artisan );
    
    $query = $queryBuilder->getQuery();
    
    return $query->getResult();

  }

  public function countPacks( $criteria ) {
    
    $q = $this->_em->createQueryBuilder();
    $q->from( $this->_entityName, 'cr' );
    $q->select('count(cr.id_pack)');
    
    if ( isset( $criteria['sold'] ) ) {
        $q->Where( 'cr.reglee = :sold' )
        ->setParameter( 'sold', $criteria['sold'] );
    }
    
    if ( isset( $criteria['payement'] ) ) {
        $q->andWhere( 'cr.mode_paiement = :mode' )
        ->setParameter( 'mode', ( $criteria['payement']) );
      
    }
    
    try {
      return $q->getQuery()->getSingleScalarResult();
    } catch ( Exception $e ) {
      die( $e->getMessage() );
      
      return 0;
    }
  }
  
}
