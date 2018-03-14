<?php
/**
 * Class Auth_LogoutController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    23/12/17
 
 * Ce controlleur est responsable sur la partie déconnexion de l'application
 * Il contient une action indexAction qui permet de se déconneter de l'application.
*/
class Auth_LogoutController extends Zend_Controller_Action
{

    /**
     * Initialisation method
     *
     * @param           void
     * @return           void
     *
     */
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
        # if the user is not logged in, they can not log out
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            # redirect login page
            $this->_helper->redirector('login', 'index', 'auth');
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

    /**
     * default method
     *
     * @param           void
     * @return           void
     *
     */
    public function indexAction()
    {
        # record event

        # clears users identity
        Zend_Auth::getInstance()->clearIdentity();
		
		$this->_helper->redirector('login','index', 'auth');

        # display to user

        # redirect
       echo ('vous avez été déconnecté');
    }

}

