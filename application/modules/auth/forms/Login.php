<?php

/**
 * Auth login form
 *
 * @author 			Lamari Alaa
 * @category   		Real Browser
 * @package 		Auth Module
 * @version 		SVN: $Id:$
 *
 */
class Auth_Form_Login extends Zend_Form
{

    public function init()
    {
        /*
         * Some people consider this to be "interface" stuff,
         * to be done in the view. Personally, I think 'action' and 'method'
         * can be done here, though the fact that we need the view object
         * in order to ender the url for the action suggests that it, too, should
         * be in the view. But 'name' and 'attribs' really are kind of view-ish.
         *
         * Still, I like the idea that the view-script is so simple, just render the form.
         *
         * @todo To be discussed.
         */
        $this->setMethod('post')
            ->setAction($this->getView()->url(array(
                    'module' => 'auth',
                    'controller' => 'login',
                    'action' => 'index')))
            ->setAttrib('class', 'box')
            ->setName('Login');

        # Email
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Login')
            ->setRequired(TRUE)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addFilter('StringToLower')
			->setOptions(array('class' => 'input input-block-level','id' => 'login'))
            ->addValidator('NotEmpty');

        # Password
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Mot de passe')
            ->setRequired(TRUE)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
			->setOptions(array('class' => 'input input-block-level'))
            ->addValidator('NotEmpty');
        
        $hash = new Zend_Form_Element_Hash('csrf', array('salt' => 'unique'));
        $hash->setTimeout(300)
                ->addErrorMessage('Form timed out. Please reload the page & try again');

        # Submit
        $submit = new Zend_Form_Element_Submit('connexion');
		$submit->setOptions(array('class' => 'btn btn-ehcg-entrer pull-right'));

        # Create
        $this->addElements(array($login, $password, $submit));
    }
}

