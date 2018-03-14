<?php

class Custom_Error {

	
	public static function pageNotFound($request,$e)
	{
		return $request->setControllerName('error')
						->setActionName('error')
						->setModuleName('default')
						->setParam('error_type','pageNotFound')
						->setParam('error_handler',$e);
	}
	
	public static function notAuthorized(Zend_Controller_Request_Abstract $request)
	{
		return $request->setControllerName('error')
						->setActionName('error')
						->setModuleName('default')
						->setParam('error_type','notAuthorized')
						->setParam('error_handler','');
	}	
	
	public static function applicationError(Zend_Controller_Request_Abstract $request,$e=NULL)
	{
		
		return $request->setControllerName('error')
						->setActionName('error')
						->setModuleName('default')
						->setParam('error_type','applicationError')
						->setParam('error_handler',$e);
	}
	
}

?>