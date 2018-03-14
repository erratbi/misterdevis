<?php


/**
 * Class Auth_Form_Domotique
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Domotique extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_installation = [
    ''                                  => 'Veuillez préciser',
    'Prises Électriques connectées'     => 'Prises Électriques connectées',
    'Motorisation de Volets Roulants'   => 'Motorisation de Volets Roulants',
    'Motorisation de Volets Battants'   => 'Motorisation de Volets Battants',
    'Motorisation de Portail'           => 'Motorisation de Portail',
    'Motorisation de Porte de Garage'   => 'Motorisation de Porte de Garage',
    'Motorisation de Store de Terrasse' => 'Motorisation de Store de Terrasse',
    'Thermostat'                        => 'Thermostat',
    'Détecteur Crépusculaire'           => 'Détecteur Crépusculaire',
    'Capteur de Température'            => 'Capteur de Température',
    'Autre'                             => 'Autre',
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
    
    
    // type_installation
    $type_installation = new Zend_Form_Element_Select( 'type_installation' );
    $type_installation->setLabel( 'Quelle Installation ?' )
                      ->setBelongsTo( 'Domotique' )
                      ->addFilters( $select_filters )
                      ->addMultiOptions( $this->_type_installation );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_installation,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
