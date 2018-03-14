<?php


use Doctrine\ORM\EntityRepository;


/**
 * Class Auth_Model_EmailRepository
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    23/12/17
 */
class Auth_Model_EmailRepository extends EntityRepository {
  
  
  public function findListEmail( $ref, $departement ) {
    
    return $this->createQueryBuilder( 'e' )
                ->innerJoin( 'e.code_departement', 'dep' )
                ->where( 'dep.code_departement = :dep' )
                ->andWhere( 'e.ref = :ref' )
                ->setParameters( [
                  'dep'      => $departement,
                  'ref' => $ref,
                ] )
                ->getQuery()
                ->getResult( 2 );
  }
  
 
  
  
 
  
}
