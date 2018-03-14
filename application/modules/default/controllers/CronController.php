<?php
/**
 * Default Controller
 *
 * @author          Eddie Jaoude
 * @package       Default Module
 *
 */
class CronController extends Zend_Controller_Action
{

    /**
     * Initialisation method
     *
     * @author           Lamari Alaa
     * @param           void
     * @return           void
     *
     */
    public function init()
    {
        parent::init();
    }
	
    /**
     * default method
     *
     * @author           Lamari Alaa
     * @param           void
     * @return           void
     *
     */
    public function indexAction()
    {
		$estimates = $this->getRequest()->_em->getRepository('Auth_Model_Estimate')->findAsolde();
		foreach($estimates as $estimate){
			$newEstimate =  $this->getRequest()->_em->getRepository('Auth_Model_Estimate')->find($estimate['idestimate']);
			$newEstimate -> typeestimate = 'asolde';			
			$this->getRequest()->_em->persist($newEstimate);
		}
		$this->getRequest()->_em->flush();
				
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
    
    public function testconnexionAction()
    {
    	$users = $this->getRequest()->_em->getRepository('Auth_Model_Connections')->findOldConnexion();
    	
    	foreach($users as $user){
			$newuser =  $this->getRequest()->_em->getRepository('Auth_Model_Connections')->find($user['idconnection']);
			$this->getRequest()->_em->remove($newuser);
		}
		$this->getRequest()->_em->flush();
		
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    public function sendmailAction(){

        //Find List Artisan
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender( true );
        $activite = $this->getRequest()->_em->getRepository('Auth_Model_Activite')->findOneBy([ 'ref' => 'PSC']);

        var_dump($activite);
    }
}

