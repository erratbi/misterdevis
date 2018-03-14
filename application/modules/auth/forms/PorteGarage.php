<?php


/**
 * Class Auth_Form_PorteGarage
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_PorteGarage extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  private $_nbre_porte = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    'Plus de 3' => 'Plus de 3',
  ];
  
  
  private $_depose_porte_existant = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];

  private $_installation_motorisee = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_materiau_volet = [
    ''                => 'Veuillez préciser',
    'PVC'             => 'PVC',
    'Aluminium'       => 'Aluminium',
    'Bois'            => 'Bois',
    'Métal'           => 'Métal',
    'Je ne sais pas'  => 'Je ne sais pas',

  ];
  
  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
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
    
    // nbre_porte
    $nbre_porte = new Zend_Form_Element_Select( 'nbre_porte' );
    $nbre_porte->setLabel( 'Nombre de Portes à installer' )
               ->setBelongsTo( 'PorteGarage' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_porte );
    
    // depose_porte_existant
    $depose_porte_existant = new Zend_Form_Element_Select( 'depose_porte_existant' );
    $depose_porte_existant->setLabel( 'Dépose des Portes existants ?' )
                          ->setBelongsTo( 'PorteGarage' )
                          ->addFilters( $select_filters )
                          ->addMultiOptions( $this->_depose_porte_existant );
    
    
    // installation_motorisee
    $installation_motorisee = new Zend_Form_Element_Select( 'installation_motorisee' );
    $installation_motorisee->setLabel( 'Souhaitez-vous une instllation motorisée ?' )
               ->setBelongsTo( 'PorteGarage' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_installation_motorisee );
    
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'PorteGarage' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );

    // materiau_volet
    $materiau_volet = new Zend_Form_Element_Select( 'materiau_volet' );
    $materiau_volet->setLabel( 'Matériau des Volets' )
                 ->setBelongsTo( 'PorteGarage' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_materiau_volet );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $nbre_porte,
      $depose_porte_existant,
      $installation_motorisee,
      $type_travaux,
      $materiau_volet,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
