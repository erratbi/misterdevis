<?php


/**
 * Class Auth_Form_Nettoyage
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Nettoyage extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_nettoyage = [
    ''                          => 'Veuillez préciser',
    'Nettoyage Appartement'     => 'Nettoyage Appartement',
    'Nettoyage Maison & Villa'  => 'Nettoyage Maison & Villa',
    'Nettoyage Locaux & Bureau' => 'Nettoyage Locaux & Bureau',
    'Evacuation de gravats'     => 'Evacuation de gravats',
    'Autre'                     => 'Autre',
  ];
  
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $select_filters = [ 'StripTags' ];
    
    // type_nettoyage
    $type_nettoyage = new Zend_Form_Element_Select( 'type_nettoyage' );
    $type_nettoyage->setLabel( 'Type de Nettoyage' )
                   ->setBelongsTo( 'Nettoyage' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_type_nettoyage );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_nettoyage,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
