<?php

class Auth_Form_ValidateNumber extends Zend_Validate_Abstract
{
    const INVALID_SYNTAX	= 'InvalidSyntax';
	
	protected $_messageTemplates = array(
        self::INVALID_SYNTAX => "Doit être un nombre"
    );
	
	/**
	* Check if value is a valid number
	*
	* @param string $value (Like '1234,56')
	* @return boolean
	*
	*/
	
	public function isValid($value)
	{		
     	$value = str_replace(',', '.', $value);
     	
	    if(is_numeric($value) && !empty($value)) {
            return true;
	    }
		
	    echo "value numerique" . $value;exit;
	    
	    $this->_error( self::INVALID_SYNTAX );
		return false;
	}    
    
}