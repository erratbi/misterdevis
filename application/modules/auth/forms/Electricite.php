<?php


/**
 * Class Auth_Form_Electricite
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Electricite extends Auth_Form_Base {
  
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
    
    // surface
    $surface = new Zend_Form_Element_Text( 'surface' );
    $surface->setLabel( 'Surface' )
            ->setBelongsTo( 'Electricite' )
            ->addFilters( $default_filters );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $surface,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
