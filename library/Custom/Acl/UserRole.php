<?php
class Custom_Acl_UserRole implements Zend_Acl_Role_Interface
{
	public $role;
	public $iduser;
	
	public function __construct() {
		$this->role = 'guests' ; 
		$this->iduser = unserialize(Zend_Auth::getInstance()->getIdentity())->idgroup;
	}
	
	/* (non-PHPdoc)
	 * @see Zend_Acl_Role_Interface::getRoleId()
	 */
	public function getRoleId() {
		return $this->role;
	}
}
?>