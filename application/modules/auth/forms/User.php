<?php

/**
 * Auth password update form
 *
 * @author Lamari Alaa
 *
 */
class Auth_Form_User extends Zend_Form
{
	private $_action;
	private $_entity;
	
	
	public function __construct($params=null)
	{
	    $this->_entity = (isset($params['entity'])) ? $params['entity'] : $this->_entity;
	    $this->_action = (empty($this->_entity)) ? 'add' : 'update';
	    
	    
		parent::__construct();
	}

    public function init()
    {
        # Load the custom validator
        $this->addElementPrefixPath(
            'Custom_Auth_Validate',
            'Custom/Auth/Validate/',
            'validate'
        );

        $this->setMethod('post')
            ->setAction($this->getView()->url(array(
                    'module' => 'auth',
                    'controller' => 'user',
                    'action' => $this->_action)))
            ->setAttrib('id', 'formUser');

        #rankuser		
		$rankuser = new Zend_Form_Element_Select('rankuser');
		$rankuser->setLabel('Rank')
			->addMultiOptions(array(
					'1' => 'Admin',
					'0' => 'User'
			))
			->addDecorator('Label', array('class' => 'button blue-active tiny'))
			->setRequired(TRUE);
        
        
	
		# Email
		$emailuser = new Zend_Form_Element_Text('emailuser');
		$emailuser->setLabel('Email')
			->setRequired(TRUE)
			->setAttrib('class', 'tolowercase with-tooltip input-unstyled validate[required,custom[email]]')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;');
		 
		
		# Mot de passe
		$pwduser = new Zend_Form_Element_Password('pwduser');
		$pwduser->setLabel('Mot de passe')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;');
		if( $this->_action=="add"){
			$pwduser->setRequired(TRUE)
					->setAttrib('class', 'with-tooltip input-unstyled validate[required]') ;	
		}else {
			$pwduser->setRequired(TRUE)
					->setAttrib('class', 'with-tooltip input-unstyled') ;
		
		}
		$pwduser2 = new Zend_Form_Element_Password('pwduser2');
		$pwduser2->setLabel('Confirmez le mot de passe')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;');
		
    	if( $this->_action=="add"){
			$pwduser2->setRequired(TRUE)
					 ->setAttrib('class', 'with-tooltip input-unstyled validate[required,equals[pwduser]]');
		}else {
			$pwduser2->setAttrib('class', 'with-tooltip input-unstyled') ;
		
		}
		# Prénom
		$firstnameuser = new Zend_Form_Element_Text('firstnameuser');
		$firstnameuser->setLabel('Prénom')
			->setRequired(TRUE)
			->setAttrib('class', 'capitalize with-tooltip input-unstyled validate[required]')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;');
		
		# Nom
		$lastnameuser = new Zend_Form_Element_Text('lastnameuser');
		$lastnameuser->setLabel('Nom')
			->setRequired(TRUE)
			->setAttrib('class', 'touppercase with-tooltip input-unstyled validate[required]')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;text-transform:uppercase;');
		
		# Login
		$loginuser = new Zend_Form_Element_Text('loginuser');
		$loginuser->setLabel('Login')
			->setAttrib('class', 'with-tooltip input-unstyled')
			->setAttrib('autocomplete', 'off')
			->setAttrib('style', 'width:90%;');
			
		
		
		#statususer		
		$statususer = new Zend_Form_Element_Select('statususer');
		$statususer->setLabel('Statut')
			->addMultiOptions(array(
					'1' => 'Actif',
					'0' => 'Inactif'
			))
			->addDecorator('Label', array('class' => 'button blue-active tiny'))
			->setRequired(TRUE);
		
		if($this->_action == 'add'){
			$statususer->setValue(1);
		}
		
		
        # Submit
        $submit = new Zend_Form_Element_Submit('submitUser', 'Valider');
        $submit->setAttrib('class', 'button huge blue-gradient full-width');
        $submit->setAttrib('rel', $this->_action);
        
          	
          	
          
          if($this->_action=="add"){
          	$emailuser->addValidator('UserNotAlreadyExist');
          }
          	
          	
        $elements = array(
        	$rankuser,
        	$emailuser,
        	$pwduser,
        	$pwduser2,
        	$firstnameuser,
        	$lastnameuser,
        	$loginuser,
        	$statususer,
        	$submit
        );
        
        if(!empty($this->_entity))
        {
        	$iduser = new Zend_Form_Element_Hidden('iduser');
        	$iduser->setRequired(TRUE);
        	$pwduser->setRequired(FALSE);
        	$elements[] = $iduser;
        	$this->populate($this->_entity->toArray());
        }

        # Create
        $this->addElements($elements);
    }
}
