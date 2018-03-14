<?php

class Model_LibraryAcl extends Zend_Acl {

    function __construct() {

        // >>>>>>>>>>>> Adding Roles <<<<<<<<<<<<<<<

        $this->addRole(new Zend_Acl_Role('guests'));
        $this->addRole(new Zend_Acl_Role('admins'), 'guests');

        // >>>>>>>>>>>> Adding Resources <<<<<<<<<<<<<<<
        
        // **** Resources for module Default *****

        $this->add(new Zend_Acl_Resource('default'));
        $this->add(new Zend_Acl_Resource('default:index'), 'default');
     

        // **** Resources for module Admin *****

        $this->add(new Zend_Acl_Resource('admin'));
        $this->add(new Zend_Acl_Resource('admin:index'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:devis'), 'admin');

        // >>>>>>>>>>>> Affecting Resources <<<<<<<<<<<<<<<
       
        // -------  >> module Default  << -------
        $this->allow('guests', 'default:index');
        
        
         // -------  >> module Admin  << -------
        $this->allow('guests', 'admin:index');
        $this->allow('guests', 'admin:devis');
        
        
    }

}

