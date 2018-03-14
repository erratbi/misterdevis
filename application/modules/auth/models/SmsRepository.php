<?php


use Doctrine\ORM\EntityRepository;


/**
 * Class Auth_Model_SmsRepository
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    23/12/17
 */
class Auth_Model_SmsRepository extends EntityRepository {
  
  
  public function findListPhone( $ref, $departement ) {
    
    return $this->createQueryBuilder( 's' )
                ->innerJoin( 's.code_departement', 'dep' )
                ->where( 'dep.code_departement = :dep' )
                ->andWhere( 's.ref = :ref' )
                ->setParameters( [
                  'dep'      => $departement,
                  'ref' => $ref,
                ] )
                ->getQuery()
                ->getResult( 2 );
  }
  
 
  
  
 
  
}
