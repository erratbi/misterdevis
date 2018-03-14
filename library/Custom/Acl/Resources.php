<?php
class Custom_Acl_Resources implements Zend_Acl_Resource_Interface
{
	
	public $name_resource;

	public function __construct($name)
	{
		$this->name_resource = $name;
	}
	
	public function getResourceId() {
		return $this->name_resource;
	}
	
	static public function getActionByIdCategory($idCategory)
	{
		$_registry = Zend_Registry::getInstance();
		$_em     = $_registry->doctrine->_em;
		$actions = $_em->getRepository('Auth_Model_Categorypermissionhasaction')->findByIdcategorypermission($idCategory);
		
		$result = array();
		if ($actions && is_array($actions)) {
			foreach ($actions as $action){
				$result[] = strtolower($action->Action->nameaction); 
			}
		} else {
			$result = false;
		}
		return $result;
	}
	
	static public function getAllCategoryPermissions()
	{
		$_registry = Zend_Registry::getInstance();
		$_em     = $_registry->doctrine->_em;
		
		return  $_em->getRepository('Auth_Model_Categorypermission')->findAll($idCategory);
	}
	
}
?>