<?php
/**
 * Account Repository
 */


use Doctrine\ORM\EntityRepository;


class Auth_Model_UserRepository extends EntityRepository {
  
  /**
   * Authenticate user
   *
   * @param           void
   *
   * @return           void
   *
   */
  public function authenticate( $hash, $data ) {
    
    # filter data
    if ( empty( $hash ) ) {
      throw new Exception( 'Hash required to Authenticate' );
    }
    if ( empty( $data['login'] ) || empty( $data['password'] ) ) {
      throw new Exception( 'Login & Password required. You only supplied ' . $data );
    }
    
    # get data
    $result = $this->findOneBy( [
      'login_user'    => (string) $data['login'],
      'password_user' => (string) hash( 'SHA256', $hash . $data['password'] ),
      'isActive_user' => true,
    ] );
    
    
    return $result;
  }
  
  /**
   * One place to generate a new password
   * The length of the password is pass from the configuration of the module.
   *
   * @author Lamari Alaa
   *
   * @param int $length The length of the new password
   *
   * @return string $password
   */
  
  public function generatePassword( $length ) {
    
    return substr( md5( rand() . rand() ), 0, $length );
  }
  
  public function event($events){

    foreach (array_slice($events->toArray(), 0, count($events) - 1) as $key => $value) {
                $event=$key . " => " . $value;
                var_export('<input type="hidden" value="'.$event.'">');
          
        }

    return $events;

  }
  
  public function findUserLike( $nameUser ) {
    
    $nameUser     = '%' . $nameUser . '%';
    $queryBuilder = $this->_em->createQueryBuilder();
    $queryBuilder->select( "f.iduser,f.email_user,f.roleuser" )
                 ->from( $this->_entityName, 'f' )
                 ->setMaxResults( 10 );
    
    
    $query     = $queryBuilder->getQuery();
    $resultats = $query->getResult();
    
    
    return $resultats;
  }
  
  public function getOperatorsEmails() {
    
    $qb = $this->_em->createQueryBuilder();
    
    return $qb->select( 'u.email_user, u.firstname_user, u.lastname_user' )
              ->from( $this->getEntityName(), 'u' )
              ->getQuery()
              ->getResult( 2 );
    
    
  }
  
}
