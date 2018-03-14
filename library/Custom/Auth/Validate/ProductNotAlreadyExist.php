<?php
/**
 *
 * @author Lamari Alaa
 * @version 
 */

class Custom_Auth_Validate_ProductNotAlreadyExist extends Zend_Validate_Abstract
{
	
	const UNIQUE = 'areEqual';
	
	protected $_messageTemplates = array(
	    self::UNIQUE => "Existe déjà dans la base de données"
	);
	
    public function isValid($value)
    {
         $this->_setValue($value);

	    $_registry = Zend_Registry::getInstance();
		$_em     = $_registry->doctrine->_em;
		$company = $_em->getRepository('Auth_Model_Product')->findByNameproduct($value);
	    $isValid = true;
	
	    if($company) {
	        $this->_error(self::UNIQUE);
	        $isValid = false;
	    }
		
	    return $isValid;
    }
}
