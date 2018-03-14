<?php
class Custom_Acl_Assert implements Zend_Acl_Assert_Interface
{
	
	
	public function assert(Zend_Acl $acl, Zend_Acl_Role_Interface $role = null, Zend_Acl_Resource_Interface $resource = null, $privilege = null) 
	{
		$request = Zend_Controller_Front::getInstance()->getRequest();
		
		$action = $request->_em->getRepository('Auth_Model_Action')->findOneBynameaction($privilege);
		$categoryPermission = $request->_em->getRepository('Auth_Model_Categorypermission')->findOneBynamecategorypermission(strtoupper($resource->name_resource));
		$permission = $request->_em->getRepository('Auth_Model_Usergrouphascategorypermission')->checkForPermission($role->iduser, $categoryPermission->idcategorypermission, $action->idactions) ;
		
		
		if(count($permission) > 0)
        {
        	return true;
        } else{
        	return false;
        }
		
	}

	
	
}
?>