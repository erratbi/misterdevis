<?php
/**
 * Event action helper
 *
 *
 * @author          Lamari Alaa
 * @package       Auth Module
 *
 */
class Auth_Controller_Helper_Event extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * The default entity manager to use when one is not set
     *
     * @var \Doctrine\ORM\EntityManager
     */
    public static $defaultEntityManager;

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em;

    /**
     * Record event
     *
     * @author          Lamari Alaa
     * @param           string $event name of the event to record
     * @param           int $user_id id of the user generating the event
     * @param           \Doctrine\ORM\EntityManager $_em (optional) entity manager.
     * @return           void
     *
     */
    // public function record($event, $user_id, $em = NULL)
    // {
    	
     	// if (NULL === $em){
            // $em = $this->getEntityManager();
        // }
        
        // $user = $em->getRepository('Auth_Model_User')->find($user_id);
        // $group = $em->getRepository('Auth_Model_Usergroup')->find($user->idgroup);
        // $user->idgroup = $group  ;
        // $account_event = new Auth_Model_Connections;
        // $account_event->iduser = $user;
        // $account_event->browserconnection = $event;
        // $date = new Zend_Date;
        // $account_event->dateconnection = $date->toString('YYYY-MM-dd HH:mm:ss');
        // $account_event->ipconnection = $_SERVER['REMOTE_ADDR'];
       
     // //   $em->persist($account_event->iduser);
        // $em->persist($account_event);
        // $em->flush();
    // }
    
    /**
     * Record event
     *
     * @author          Lamari Alaa
     * @param           string $event name of the event to record
     * @param           int $user_id id of the user generating the event
     * @param           \Doctrine\ORM\EntityManager $_em (optional) entity manager.
     * @return           void
     *
     */
    // public function removeoldconnexion()
    // {
    	
     // if (NULL === $this->_em){
            // if (Zend_Registry::isRegistered('EntityManager')){
                // $this->_em = Zend_Registry::get('EntityManager');
            // } else {
                // if (NULL !== self::$defaultEntityManager){
                    // $this->_em = self::$defaultEntityManager;
                // } else {
                    // throw new Exception('Entity manager not found');
                // }
            // }
        // }
        
        // $users = $this->_em->getRepository('Auth_Model_Connections')->findOldConnexion();
    	
    	// foreach($users as $user){
			// $newuser =  $this->_em->getRepository('Auth_Model_Connections')->find($user['idconnection']);
			// $this->_em->remove($newuser);
		// }
		// $this->_em->flush();
		
    // }

    /**
     * Get the entity manager in use
     *
     * @throws Exception
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        if (NULL === $this->_em){
            if (Zend_Registry::isRegistered('EntityManager')){
                $this->_em = Zend_Registry::get('EntityManager');
            } else {
                if (NULL !== self::$defaultEntityManager){
                    $this->_em = self::$defaultEntityManager;
                } else {
                    throw new Exception('Entity manager not found');
                }
            }
        }
        return $this->_em;

    }

    /**
     * Set the entity manager to use
     *
     * @param <type> $em
     * @return \Auth_Controller_Helper_Event
     */
    public function setEntityManager($em)
    {
        $this->_em = $em;
        return $this;

    }
}