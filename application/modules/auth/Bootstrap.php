<?php
/**
 * Auth Bootstrap
 *
 * @author          Lamari Alaa
 * @package       Auth Module
 *
 */
class Auth_Bootstrap extends Zend_Application_Module_Bootstrap
{

    /**
     * Auto load default module classes
     *
     * @author          Lamari Alaa
     * @param           void
     * @return           object $moduleLoader
     *
     */
    protected function _initEncode()
    {
    	
		//ini_set('mbstring.language', 'UTF-8');
		//ini_set('mbstring.internal_encoding', 'UTF-8');
		//ini_set('mbstring.http_input', 'UTF-8');
		//ini_set('mbstring.http_output', 'UTF-8');
		//ini_set('mbstring.detect_order', 'auto');
    }

    /**
     * Auto load default module classes
     *
     * @author          Lamari Alaa
     * @param           void
     * @return           object $moduleLoader
     *
     */
    protected function _initAutoload()
    {
        $moduleLoader = new Zend_Application_Module_Autoloader([
                    'namespace' => 'Auth_',
                    'basePath' => APPLICATION_PATH . '/modules/auth'
        ]);

        $moduleLoader->addResourceType(
            'controllerhelper',
            'controllers/helpers',
            'Controller_Helper'
        );

        $moduleLoader->addResourceType(
            'pdfhelper',
            '../../../library/tcpdf',
            'Pdf_Helper'
        );

        return $moduleLoader;
    }

    protected function _initTcpdf() {



        require_once (APPLICATION_PATH .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'library' .
            DIRECTORY_SEPARATOR . 'tcpdf' .
            DIRECTORY_SEPARATOR . 'TCPDF.php'
        );


    }
	
	protected function _initSmsenvoi() {



        require_once (APPLICATION_PATH .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'library' .
            DIRECTORY_SEPARATOR . 'smsenvoi' .
            DIRECTORY_SEPARATOR . 'smsenvoi.php'
        );


    }


    /**
     * Configuration
     *
     * @author          Lamari Alaa
     * @param           void
     * @return          void
     *
     */
    protected function _initConfig()
    {
        # get config
        $config = new Zend_Config_Ini( dirname(__FILE__) .
                DIRECTORY_SEPARATOR . 'configs' .
                DIRECTORY_SEPARATOR . 'auth.ini', APPLICATION_ENV);

        # get registery
        $this->_registry = Zend_Registry::getInstance();

        # save config to registry
        $this->_registry->config->auth = $config;
    }

    protected function _initActionHelpers()
    {

        // path for module-specific controller helpers
        Zend_Controller_Action_HelperBroker::addPath( APPLICATION_PATH . '/modules/auth/controllers/helpers', 'Auth_Controller_Helper_');

        // initialize the event helper with entity manager
        $this->bootstrap('autoload');
        $application = $this->getApplication();
        $application->bootstrap('doctrine');
        if (isset($application->_registry->doctrine->_em)){
            Auth_Controller_Helper_Event::$defaultEntityManager = $application->_registry->doctrine->_em;
        }
    }
    
    
}