<?php


/**
 * Class Auth_Form_Geothermie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Geothermie extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
  ];
  
  
  private $_dispose_jardin = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_type_diffusion_chaleur = [
    ''                  => 'Veuillez préciser',
    'Radiateur à eau'  => 'Radiateur à eau',
    'Plancher Chaufant' => 'Plancher Chaufant',
    'Je ne sais pas'    => 'Je ne sais pas',
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
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Geothermie' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // dispose_jardin
    $dispose_jardin = new Zend_Form_Element_Select( 'dispose_jardin' );
    $dispose_jardin->setLabel( 'Avez-vous un jardin ?' )
                     ->setBelongsTo( 'Geothermie' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_dispose_jardin );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à Chauffer' )
               ->setBelongsTo( 'Geothermie' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale à Chauffer' )
                 ->setBelongsTo( 'Geothermie' )
                 ->addFilters( $select_filters );

    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text( 'hauteur_sous_plafond' );
    $hauteur_sous_plafond->setLabel( 'Hauteur sous plafond' )
                 ->setBelongsTo( 'Geothermie' )
                 ->addFilters( $select_filters );
    
    // type_diffusion_chaleur
    $type_diffusion_chaleur = new Zend_Form_Element_Select( 'type_diffusion_chaleur' );
    $type_diffusion_chaleur->setLabel( 'Type de Diffusion de Chaleur' )
                           ->setBelongsTo( 'Geothermie' )
                           ->addFilters( $select_filters )
                           ->setAttrib( 'slugify', true )
                           ->addMultiOptions( $this->_type_diffusion_chaleur );
    
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_travaux,
      $nbre_etage,
      $dispose_jardin,
      $type_diffusion_chaleur,
      $surface_totale,
      $hauteur_sous_plafond,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
