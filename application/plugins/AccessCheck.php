<?php

class Application_Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract
{
	private $_acl = null;
	
	function __construct(zend_acl $acl )
	{
		$this->_acl = $acl;
	}
	
	public function  preDispatch(Zend_Controller_Request_Abstract $request)
	{
	
		$module 	= $request->getModuleName();
		$action 	= $request->getActionName();
		$resource 	= $request->getControllerName();
	  	
		if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Registry::set('role', 'auth');
        } else {
        	Zend_Registry::set('role', 'guests');
        }
        
		try {
			
			if (!$this->_acl->isAllowed(Zend_Registry::get('role'), $module . ':' . $resource, $action)){
				 $redirect = new Zend_Controller_Action_Helper_Redirector();
       			 $redirect->gotoSimple("index","login","auth");
			}
			
		} catch (Zend_Acl_Exception $e) {
				Custom_Error::pageNotFound($request,$e);
		}
		
		//$this->_acl->setDynamiquePermissions();
	}
}