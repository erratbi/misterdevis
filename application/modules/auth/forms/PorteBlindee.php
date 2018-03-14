<?php


/**
 * Class Auth_Form_PorteBlindee
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_PorteBlindee extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  
  private $_garder_porte_actuelle = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];

  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Autre'                 => 'Autre',
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
    $surface->setLabel( 'Surface en m<sup>2</sup>' )
               ->setBelongsTo( 'PorteBlindee' )
               ->addFilters( $select_filters );
    
    // garder_porte_actuelle
    $garder_porte_actuelle = new Zend_Form_Element_Select( 'garder_porte_actuelle' );
    $garder_porte_actuelle->setLabel( 'Souhaitez-vous garder votre Porte actuelle ?' )
                          ->setBelongsTo( 'PorteBlindee' )
                          ->addFilters( $select_filters )
                          ->addMultiOptions( $this->_garder_porte_actuelle );
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'PorteBlindee' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $surface,
      $garder_porte_actuelle,
      $type_travaux,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
