<?php
/**
 * Default Error Controller
 *
 * @author          Eddie Jaoude
 * @package       Default Module
 *
 */
class ErrorController extends Zend_Controller_Action
{

    /**
     * Error method
     *
     * @author          Lamari Alaa
     * @param           void
     * @return           void
     *
     */
    public function errorAction()
    {
    	$this->_helper->layout()->disableLayout();
        $errors = $this->_getParam('error_handler');
        $msg = $this->_getParam('error_handler');

        if (!$errors) {
            $this->view->message = 'You have reached the error page';
            return;
        }
        
    
        if( method_exists($errors,'getMessage')){
			// application error
	        $this->getResponse()->setHttpResponseCode(500);
	        $this->view->message = $errors->getMessage();
	        
	        // Log exception, if logger available
	        if ($log = $this->getRequest()->_logger) {
	            $log->crit($this->view->message . ': ' . $errors, $errors);
	        }
	
	        // conditionally display exceptions
	        //if ($this->getInvokeArg('displayExceptions') == TRUE) {
	            $this->view->exception = $errors;
	        //}
	
	        $this->view->request = $errors;
	        Custom_Debug_ChromePhp::error($this->view->message . ': ' . $errors);
        } else {

			// application error
	        $this->getResponse()->setHttpResponseCode(500);
	        $this->view->message = 'Application Error';
	        
	        // Log exception, if logger available
	        if ($log = $this->getRequest()->_logger) {
	            $log->crit($this->view->message . ': ' . $errors->exception, $errors->exception);
	        }
	
	        // conditionally display exceptions
	        if ($this->getInvokeArg('displayExceptions') == TRUE) {
	            $this->view->exception = $errors->exception;
	        }
	 		Custom_Debug_ChromePhp::error($this->view->message . ': ' . $errors->exception);
	        $this->view->request = $errors->request;
        }
    }

    /**
     * getLog method
     *
     * @author          ZF
     * @param           void
     * @return           object $log
     *
     */
    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasResource('Log')) {
            return FALSE;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }


}

