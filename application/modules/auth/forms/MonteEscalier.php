<?php


/**
 * Class Auth_Form_MonteEscalier
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_MonteEscalier extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
  ];
  
  private $_type_escalier = [
    ''                => 'Veuillez préciser',
    'Droit'           => 'Droit',
    'Tournant/Courbé' => 'Tournant/Courbé',
    'En colimaçon'    => 'En colimaçon',
    'Autre'           => 'Autre',
  ];
  
  private $_nbre_etage = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  private $_perference_esthetique = [
    ''          => 'Veuillez préciser',
    'Classique' => 'Classique',
    'Moderne'   => 'Moderne',
  ];
  
  
  private $_largeur_escalier = [
    ''                          => 'Veuillez préciser',
    'Etroit (60 cm à 70 cm)'    => 'Etroit (60 cm à 70 cm)',
    'Standard (70 cm à 100 cm)' => 'Standard (70 cm à 100 cm)',
    'Large (100 cm à 150 cm)'   => 'Large (100 cm à 150 cm)',
    'Très Large (+ de 150 cm)'  => 'Très Large (+ de 150 cm)',
  ];
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $select_filters = [ 'StripTags' ];
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'MonteEscalier' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // type_escalier
    $type_escalier = new Zend_Form_Element_Select( 'type_escalier' );
    $type_escalier->setLabel( 'Type d\'escalier' )
                  ->setBelongsTo( 'MonteEscalier' )
                  ->addFilters( $select_filters )
                  ->setAttrib( 'slugify', true )
                  ->addMultiOptions( $this->_type_escalier );
    
    // perference_esthetique
    $perference_esthetique = new Zend_Form_Element_Select( 'perference_esthetique' );
    $perference_esthetique->setLabel( 'Votre Préférence Esthétique est' )
                          ->setBelongsTo( 'MonteEscalier' )
                          ->addFilters( $select_filters )
                          ->setAttrib( 'slugify', true )
                          ->addMultiOptions( $this->_perference_esthetique );
    
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage' )
               ->setBelongsTo( 'MonteEscalier' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    
    // largeur_escalier
    $largeur_escalier = new Zend_Form_Element_Select( 'largeur_escalier' );
    $largeur_escalier->setLabel( 'Quelle est la largeur de votre Escalier ?' )
                     ->setBelongsTo( 'MonteEscalier' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_largeur_escalier );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $type_travaux,
      $type_escalier,
      $nbre_etage,
      $perference_esthetique,
      $largeur_escalier,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
