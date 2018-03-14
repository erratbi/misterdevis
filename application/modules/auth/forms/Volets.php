<?php


/**
 * Class Auth_Form_Volets
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Volets extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  private $_type_volets = [
    ''              => 'Veuillez préciser',
    'Volet Roulant' => 'Volet Roulant',
    'Volet Battant' => 'Volet Battant',
  ];
  
  private $_nbre_volets = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  private $_dispose_volets = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_fermeture = [
    ''               => 'Veuillez préciser',
    'Manuelle'       => 'Manuelle',
    'Électrique'     => 'Électrique',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  private $_volets_motorises = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_materiaux_volets = [
    ''               => 'Veuillez préciser',
    'PVC'            => 'PVC',
    'Aluminium'      => 'Aluminium',
    'Bois'           => 'Bois',
    'Métal'          => 'Métal',
    'Je ne sais pas' => 'Je ne sais pas',
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
    
    // type_volets
    $type_volets = new Zend_Form_Element_Select( 'type_volets' );
    $type_volets->setLabel( 'Type de Volets' )
                ->setBelongsTo( 'Volets' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_type_volets );
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Volets' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // nbre_volets
    $nbre_volets = new Zend_Form_Element_Select( 'nbre_volets' );
    $nbre_volets->setLabel( 'Nombre de volets' )
                ->setBelongsTo( 'Volets' )
                ->addFilters( $select_filters )
                ->setAttrib( 'slugify', true )
                ->addMultiOptions( $this->_nbre_volets );
    
    // materiaux_volets
    $materiaux_volets = new Zend_Form_Element_Select( 'materiaux_volets' );
    $materiaux_volets->setLabel( 'Matériau des Volets' )
                     ->setBelongsTo( 'Volets' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_materiaux_volets );
    
    
    // volets_motorises
    $volets_motorises = new Zend_Form_Element_Select( 'volets_motorises' );
    $volets_motorises->setLabel( 'Souhaitez-vous que vos Volets soient motorisés ?' )
                     ->setBelongsTo( 'Volets' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_volets_motorises );
    
    // dispose_volets
    $dispose_volets = new Zend_Form_Element_Select( 'dispose_volets' );
    $dispose_volets->setLabel( 'Dépose de Volets existantes ?' )
                   ->setBelongsTo( 'Volets' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_dispose_volets );
    
    // fermeture
    $fermeture = new Zend_Form_Element_Select( 'fermeture' );
    $fermeture->setLabel( 'Fermeture' )
              ->setBelongsTo( 'Volets' )
              ->addFilters( $select_filters )
              ->addMultiOptions( $this->_fermeture );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_travaux,
      $type_volets,
      $nbre_volets,
      $materiaux_volets,
      $dispose_volets,
      $volets_motorises,
      $fermeture,
      $materiaux_volets,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
