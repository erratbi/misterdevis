<?php

/**
 * Registry plugin
 *
 * @author        Lamari Alaa
 * @package       Application Module
 *
 */
class Application_Plugin_Registry extends Zend_Controller_Plugin_Abstract {

    /**
     * Pre dispatch
     *
     * @author          Lamari Alaa
     * @param           Zend_Controller_Request_Abstract $request
     * @return           void
     *
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        # get application objects
        $_registry = Zend_Registry::getInstance();

        # clone objects for ease of use
        $_em     = $_registry->doctrine->_em;
        $_logger = $_registry->logger;
        $cache = $_registry->cache;
        # helper
        $_flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        
        # send to actions
        $request->setParam('_cache', $cache);
        $request->setParam('_registry', $_registry);
        $request->setParam('_em', $_em);
        $request->setParam('_logger', $_logger);
        $request->setParam('_flashMessenger', $_flashMessenger);
    }

    /**
     * Post dispatch
     *
     * @author          Lamari Alaa
     * @param           Zend_Controller_Request_Abstract $request
     * @return           void
     *
     */
    public function postDispatch(Zend_Controller_Request_Abstract $request) {
        
    }

}