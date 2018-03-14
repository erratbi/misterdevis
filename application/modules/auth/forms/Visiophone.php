<?php


/**
 * Class Auth_Form_Visiophone
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Visiophone extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $default_filters = [
      'StringToLower',
      'StringTrim',
      'StripTags',
    ];
    
    $select_filters = [ 'StripTags' ];
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
