<?php
/**
 * Class Auth_LogoutController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  -  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    23/12/17
 
 * Ce controlleur est responsable sur la partie gestion des utilisateurs
 * Il contient une action indexAction qui permet de lister les utilisateurs de l'application.
 * Une action addAction qui permet d'ajouter un nouveau utilisateurs
 * Une action editAction qui permet de modifier un utilisateur donné
 * Et une action profileAction qui permet d'afficher et modifier le profile de l'utilisateur connecté.
*/
class Auth_UserController extends Zend_Controller_Action
{

	/**
     * default method
     *
     * @param           void
     * @return           void
     *
     */
    public function indexAction()
    {
		
		$this->_helper->layout->setLayout ( 'layout_fo_ehcg' );
		
		$listeuser = $this->getRequest()->_em->getRepository('Auth_Model_User')->findAll();
		
		$this->view->listeuser = $listeuser;


    }
    
	/**
     * default method
     *
     * @param           void
     * @return           void
     *
     */
    
  	
   
    
	public function addAction()
    {
        $this->_helper->layout->setLayout ( 'layout_fo_ehcg' );
        
        
    	if($this->getRequest()->isPost())
    	{
            $data = $this->_request->getPost();
			     	
			# check for existing email
			$accountExist = $this->getRequest()->_em->getRepository('Auth_Model_User')->findBy(array('email_user' => (string)$data['EMAIL_USER']));
			if(count($accountExist) == 0)
			{
				var_dump($data);
				
				$entity = new Auth_Model_User;
				$entity->email_user = $data['EMAIL_USER'];
				$entity->firstname_user = $data['FIRSTNAME_USER'];
				$entity->lastname_user = $data['LASTNAME_USER'];
				$entity->login_user = $data['LOGIN_USER'];
				$entity->rank_user = 0;
				$entity->isActive_user = $data['ISACTIVE_USER'];
				$entity->dateregister_user=date("Y-m-d h:i:s");	   
				$entity->setPassword($data['PASSWORD_USER'], $this->getRequest()->_registry->config->auth->hash);
				$this->getRequest()->_em->persist($entity);
				$this->getRequest()->_em->flush();
				$this->getRequest()->_cache->remove('User');
				
				$this->_helper->redirector('index', 'user', 'auth');
				
			 }
			 else {
				 $response = 'Enregistrement impossible : Cet email existe déjà';
			 }
            
    		
        }
        
    }
    
	public function editAction(){
		
		$this->_helper->layout->setLayout ( 'layout_fo_ehcg' );
		
		$id = $this->getRequest()->getParam('id');
        $entity = $this->getRequest()->_em->find('Auth_Model_User', $id);
		$this->view->user=$entity;
		if($this->getRequest()->isPost())
        {
        	# get params
        	$data = $this->getRequest()->getPost();
			
			$accountExist = $this->getRequest()->_em->getRepository('Auth_Model_User')->findBy(array('email_user' => (string)$data['EMAIL_USER']));
			if(count($accountExist) == 0 || count($accountExist) == 1 && $accountExist[0]->getId_user() == $entity->id_user)
        	    {
					$entity->firstname_user=$data['FIRSTNAME_USER'];
					$entity->lastname_user=$data['LASTNAME_USER'];
					$entity->email_user=$data['EMAIL_USER'];
					$entity->login_user=$data['LOGIN_USER'];
					$entity->isActive_user=$data['ISACTIVE_USER'];
					
					if(!empty($data['PASSWORD_USER'])){
						$entity->setPassword($data['PASSWORD_USER'], $this->getRequest()->_registry->config->auth->hash);
					}
					
					$this->getRequest()->_em->persist($entity);
		        	$this->getRequest()->_em->flush();
		        	$this->getRequest()->_cache->remove('User');
					
					$this->_helper->redirector('index', 'user', 'auth');
				}
		}
	}
	
	public function profileAction(){
		$this->_helper->layout->setLayout ( 'layout_fo_ehcg' );
		
		$id = unserialize(Zend_Auth::getInstance()->getIdentity())->id_user;
        $entity = $this->getRequest()->_em->find('Auth_Model_User', $id);
		$this->view->user=$entity;
		if($this->getRequest()->isPost())
        {
        	# get params
        	$data = $this->getRequest()->getPost();
			
			$accountExist = $this->getRequest()->_em->getRepository('Auth_Model_User')->findBy(array('email_user' => (string)$data['EMAIL_USER']));
			if(count($accountExist) == 0 || count($accountExist) == 1 && $accountExist[0]->getId_user() == $entity->id_user)
        	    {
					$entity->firstname_user=$data['FIRSTNAME_USER'];
					$entity->lastname_user=$data['LASTNAME_USER'];
					$entity->email_user=$data['EMAIL_USER'];
					$entity->login_user=$data['LOGIN_USER'];
					
					if(!empty($data['PASSWORD_USER'])){
						$entity->setPassword($data['PASSWORD_USER'], $this->getRequest()->_registry->config->auth->hash);
					}
					
					$this->getRequest()->_em->persist($entity);
		        	$this->getRequest()->_em->flush();
		        	$this->getRequest()->_cache->remove('User');
					
					$this->_helper->redirector('index', 'user', 'auth');
				}
		}
	}
}

