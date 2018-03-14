<?php

class Custom_LibraryAcl extends Zend_Acl {

    function __construct() {
		
        // >>>>>>>>>>>> Adding Roles <<<<<<<<<<<<<<<
        $this->addRole(new Zend_Acl_Role('guests'));
        $this->addRole(new Zend_Acl_Role('auth'), 'guests');
		
        // >>>>>>>>>>>> Adding Resources <<<<<<<<<<<<<<<
        
        // **** Resources for module Default *****
        $this->add(new Zend_Acl_Resource('default'));
        $this->add(new Zend_Acl_Resource('default:index'), 'default');
        $this->add(new Zend_Acl_Resource('default:error'), 'default');
        $this->add(new Zend_Acl_Resource('default:cron'), 'default');
		
        // **** Resources for module Admin *****
        $this->add(new Zend_Acl_Resource('admin'));
        $this->add(new Zend_Acl_Resource('admin:index'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:devis'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:create'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:category'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:product'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:formula'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:contact'), 'admin');
        $this->add(new Zend_Acl_Resource('admin:company'), 'admin');  
        $this->add(new Zend_Acl_Resource('admin:estimate'), 'admin');
        
        // **** Resources for module Auth *****
        $this->add(new Zend_Acl_Resource('auth'));
        $this->add(new Zend_Acl_Resource('auth:index'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:account'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:login'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:logout'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:password'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:register'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:estimate'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:estimatecategory'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:formula'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:product'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:category'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:categoryproduct'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:categorypermission'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:configuration'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:action'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:user'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:usergroup'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:contact'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:company'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:group'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:acl'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:calendar'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:permission'), 'auth');
        $this->add(new Zend_Acl_Resource('auth:stats'), 'auth');
        
        // >>>>>>>>>>>> Affecting Resources <<<<<<<<<<<<<<<
       	
        // -------  >> module Default  << -------
        $this->allow('auth', 'default:index');
        $this->allow('auth', 'default:error');
        $this->allow('guests', 'default:cron');
        
        // -------  >> module Auth  << -------
        $this->allow('auth', 'auth:index');
        $this->allow('auth', 'auth:account');
        $this->allow('guests', 'auth:login');
        $this->allow('auth', 'auth:logout');
        $this->allow('auth', 'auth:password');
        $this->allow('guests', 'auth:register');
        $this->allow('auth', 'auth:estimate');
        $this->allow('auth', 'auth:estimatecategory');
        $this->allow('auth', 'auth:formula');
        $this->allow('auth', 'auth:product');
        $this->allow('auth', 'auth:category');
        $this->allow('auth', 'auth:categoryproduct');
        $this->allow('auth', 'auth:categorypermission');
        $this->allow('auth', 'auth:configuration');
        $this->allow('auth', 'auth:action');
        $this->allow('auth', 'auth:user');
        $this->allow('auth', 'auth:usergroup');
        $this->allow('auth', 'auth:contact');
        $this->allow('auth', 'auth:company');
        $this->allow('auth', 'auth:group');
        $this->allow('auth', 'auth:acl');
        $this->allow('auth', 'auth:calendar');
        $this->allow('auth', 'auth:permission');
        $this->allow('auth', 'auth:stats');
        
        // -------  >> module Admin  << -------
        $this->allow('auth', 'admin:index');
        $this->allow('auth', 'admin:devis');
        $this->allow('auth', 'admin:create');
        $this->allow('auth', 'admin:category');
        $this->allow('auth', 'admin:product');
        $this->allow('auth', 'admin:formula');
        $this->allow('auth', 'admin:contact');
       	$this->allow('auth', 'admin:company');
       	$this->allow('auth', 'admin:estimate');
       	
       	// -------  >> For Custom Permissions  << -------
		$this->addResource('pdf');
		$this->addResource('pdf facture');
		$this->addResource('pdf devis');
		$this->addResource('pdf bon de livraison');
		$this->addResource('gestion des devis');
		$this->addResource('solder');
		$this->addResource('voir tous les devis');
		$this->addResource('archives');
		$this->addResource('devis');
		$this->addResource('agenda');
		$this->addResource('actions');
		$this->addResource('formules');
		$this->addResource('contacts');
		$this->addResource('articles');
		$this->addResource('catalogue');
		$this->addResource('groupe');
		$this->addResource('clientele');
		$this->addResource('categories');
		$this->addResource('permissions');
		$this->addResource('entreprises');
		$this->addResource('utilisateurs');
		$this->addResource('catpermissions');
		$this->addResource('configuration');
		$this->addResource('fiche de production');
		$this->addResource('remise de chèques');
		$this->addResource('statistics');
    }
    
    public function setDynamiquePermissions()
    {
    	
    	$Categories = Custom_Acl_Resources::getAllCategoryPermissions();
    	
    	foreach ($Categories as $category) {
    		
    		if($this->has(strtolower($category->namecategorypermission))){
    			$this->allow('guests',strtolower($category->namecategorypermission),Custom_Acl_Resources::getActionByIdCategory($category->idcategorypermission),new Custom_Acl_Assert());
    		} 
    	}
    }
   
}