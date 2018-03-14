<?php


/**
 * Class Auth_Form_Plombrie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Plombrie extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_travaux = [
    ''           => 'Veuillez préciser',
    'Neuf'       => 'Neuf',
    'Rénovation' => 'Rénovation',
    'Extension'  => 'Extension',
    'Autre'      => 'Autre',
  ];
  
  
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
            ->setBelongsTo( 'Plombrie' )
            ->addFilters( $default_filters );
    
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Plombrie' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $surface,
      $type_travaux,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
