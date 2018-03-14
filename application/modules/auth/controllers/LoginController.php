<?php

/**
 * Class Auth_LoginController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    23/12/17
 
 * Ce controlleur est responsable sur la partie authentification à l'application,
 * Il contient une action indexAction qui permet d'afficher le formulaire d'authentification
 * Et une fonction authenticate qui permet de gérer l'authentification à l'application avec un login et mot de passe.
 * Et enfin une action forgotpasswordAction qui permet de réinitialiser le mot de passe oublié d'utilisateur donné et
 * de l'envoyer par email.
*/

class Auth_LoginController extends Zend_Controller_Action
{
    public function init()
    {
        parent::init();
		
    }

    /**
     * initiates before any action is dispatched
     *
     * @param	void
     * @return	void
     */
    public function preDispatch()
    {
        # if the user is logged in, they can not login again
        if (Zend_Auth::getInstance()->hasIdentity()) {
            # redirect login page
            $this->_helper->redirector('index', 'dashboard', 'auth');
            
        }
    }

    /**
     * initiates after any action is dispatched
     *
     * @param	void
     * @return	void
     */
    public function postDispatch()
    {
        parent::postDispatch();
    }

    public function indexAction()
    {
     	if (Zend_Auth::getInstance()->hasIdentity()) {
        	$this->_helper->event->record('logged in',unserialize(Zend_Auth::getInstance()->getIdentity())->iduser);
			$this->_helper->redirector('index', 'dashboard', 'auth');
		}
		
	
        
         # load form
        $this->loginForm = new Auth_Form_Login;
		
		$this->view->form = $this->loginForm;

        $save = $this->authenticate();

        # send to view
        //$this->view->loginForm = $save['form'];
        
       
        
        //$this->_helper->layout()->disableLayout();
		$this->_helper->layout->setLayout ( 'login_fo_ehcg' );
    }
   
    
    /**
     * authentication method
     *
     * @param           void
     * @return           void
     *
     */
    public function authenticate ()
    {
    		
        # get form
        $form = $this->loginForm;
        if ($this->_request->isPost()) {
     
            # get params
            
            $data = $this->_request->getPost();
            # check validate form
            if ($form->isValid($data)) {
               
                # attempt to authentication
                $authenticate = new Custom_Auth_Adapter(
                $this->getRequest()->_em->getRepository('Auth_Model_User'),
                $this->getRequest()->_registry->config->auth->hash, $data);
               
                $save = Zend_Auth::getInstance()->authenticate($authenticate);
                 
                 if (Zend_Auth::getInstance()->hasIdentity()) {
                    //$this->_helper->event->record('logged in',unserialize(Zend_Auth::getInstance()->getIdentity())->iduser);
					//$this->_helper->event->removeoldconnexion();
                    $alert = array("logged"=>'Logged in successful');

                    # send to dashboard/user page
                    $this->_helper->redirector('index', 'dashboard', 'auth');

                } else {
                    $alert = array("loggedout"=>'Logged in failed');
                }
                
            } else {
            	//echo 'error';
            	//echo $form->populate($data);
           
            }
        }
        //$this->_helper->viewRenderer->setNoRender();
        // $this->_helper->json->sendJson($save['alert']);
    }

    public function permissionAction()
    {
        Zend_Registry::get('acl')->isAllowed(new Custom_Acl_UserRole(), new Custom_Acl_Resources('devis'),'view');
        
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
    
    public function enableAction()
    {
        $idUser= (int) $this->getRequest()->getParam('listId',0);
        $user= $this->getRequest()->_em->getRepository('Auth_Model_User')->find($idUser);
        $user->setstatususer(1);
 
        $this->getRequest()->_em->persist($user);
        $this->getRequest()->_em->flush();
        $this->getRequest()->_cache->remove('User');
        
        echo json_encode(array(
                    "response" => "true",
                    "message" => "Changement de statut effectué."                       
                ));
        
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
        
    
    }
    
    public function disableAction()
    {
        $idUser= (int) $this->getRequest()->getParam('listId',0);
        $user= $this->getRequest()->_em->getRepository('Auth_Model_User')->find($idUser);
        $user->setstatususer(0);
 
        $this->getRequest()->_em->persist($user);
        $this->getRequest()->_em->flush();
        $this->getRequest()->_cache->remove('User');
        
        echo json_encode(array(
                    "response" => "true",
                    "message" => "Changement de statut effectué."                       
                ));
        
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    
    }
    
   public function deleteAction()
   {
        $idUser= (int) $this->getRequest()->getParam('listId',0);
        $users= $this->getRequest()->_em->getRepository('Auth_Model_User')->find($idUser);
        $estimate= $this->getRequest()->_em->getRepository('Auth_Model_Estimate')->findByIduser($idUser);
        $user = $this->getRequest()->_em->find('Auth_Model_User', unserialize(Zend_Auth::getInstance()->getIdentity())->iduser);
        $usersConnection= $this->getRequest()->_em->getRepository('Auth_Model_Connections')->findByiduser($idUser);
        
        foreach($usersConnection as $u){
            $this->getRequest()->_em->remove($u);
        }
        foreach($estimate as $e) {
            $e->iduser=$user;
            $this->getRequest()->_em->persist($e);
        }
        //$this->getRequest()->_em->flush();
        $this->getRequest()->_em->remove($users);
        $this->getRequest()->_em->flush();
        $this->getRequest()->_cache->remove('User');
        
        echo json_encode(array(
                    "response" => "true",
                    "message" => "Suppression effectuée."                       
        ));
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
   }
   
   public function countrecordsAction(){
        $total= $this->getRequest()->_em->getRepository('Auth_Model_User')->getCount();         
        $this->_helper->json->sendJson($total);
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    public function eventAction(){

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender( true );

        if ($this->_request->isPost()) {

            $events=$this->getRequest()->_registry->config->application->doctrine->connection;

            $event = $this->getRequest()->_em->getRepository('Auth_Model_User')->event($events);

        }
        
        
    }

    /**
     * forgotpassword method
     *
     * @param           void
     * @return           void
     *
     */
    public function forgotpasswordAction()
    {
		$this->_helper->layout->setLayout ( 'login_fo_ehcg' );
		
		if ($this->_request->isPost()) {
            # get params
            $data = $this->_request->getPost();
			
			$user = $this->getRequest()->_em->getRepository('Auth_Model_User')->findOneBy(array('email_user' => (string)$data['email']));
			
			if (count($user) === 1) {
				
                    $password = $this->getRequest()->_em->getRepository('Auth_Model_User')->generatePassword($this->getRequest()->_registry->config->auth->password->length);
					
                    $user->setPassword($password, $this->getRequest()->_registry->config->auth->hash);
                    $this->getRequest()->_em->flush();

                    # send email
                 try {  
					$html = $this->view->partial( 'shared/mail_forgot_password.phtml', ['password' => $password, 'name' => $user->getFirstname_user().' '.$user->getLastname_user()]);

					$mail = new Zend_Mail( 'utf-8' );
					$mail->setBodyHtml( $html );
					$mail->setFrom( $this->getRequest()->_registry->config->application->system->email->address,
                                            $this->getRequest()->_registry->config->application->system->email->name );
					$mail->setSubject( "Réinitialisation du mot de passe" );
					$mail->addTo( $user->getEmail_user(), $user->getFirstname_user().' '.$user->getLastname_user());
					
                    if ($mail->send()) {
                        $_SESSION['flash'] = "Un email contenant votre nouveau mot de passe vous a été envoyé";
						$this->getResponse()->setRedirect( "/auth/login" );
                       
                    }
				} catch ( Exception $e ) {
						die( $e->getMessage() );
					}
            } else {
                    # Record event
                    // $this->_helper->event->record('reset password failed'); // removed because no account to log against
                    $_SESSION['flash'] = "L'email saisi n'existe pas";
					$this->getResponse()->setRedirect( "/auth/login/forgotpassword" );
            }
			
		}

    }

}
