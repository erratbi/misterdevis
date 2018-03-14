<?php


/**
 * Class Auth_Form_ChauffeEau
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_ChauffeEau extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_chauffe_eau = [
    ''                              => 'Veuillez préciser',
    'Chauffage eau solaire'         => 'Chauffage eau solaire',
    'Chauffage eau thermodynamique' => 'Chauffage eau thermodynamique',
  ];
  
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
  ];
  
  
  private $_type_energie = [
    ''                       => 'Veuillez préciser',
    'Électricité'            => 'Électricité',
    'Gaz'                    => 'Gaz',
    'Fioul'                  => 'Fioul',
    'Géothermie/Aérothermie' => 'Géothermie/Aérothermie',
    'Autre'                  => 'Autre',
    'Je ne sais pas'         => 'Je ne sais pas',
  ];
  
  
  private $_dispose_chauffe_eau = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_type_diffusion_chaleur = [
    ''                  => 'Veuillez préciser',
    'Aérohermie (Air)'  => 'Aérohermie (Air)',
    'Aquathermie (Eau)' => 'Aquathermie (Eau)',
    'Mixte (Air/Eau)'   => 'Mixte (Air/Eau)',
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
                 ->setBelongsTo( 'ChauffeEau' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // type_chauffe_eau
    $type_chauffe_eau = new Zend_Form_Element_Select( 'type_chauffe_eau' );
    $type_chauffe_eau->setLabel( 'Type de chauffe-eau' )
                     ->setBelongsTo( 'ChauffeEau' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_type_chauffe_eau );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à Chauffer' )
               ->setBelongsTo( 'ChauffeEau' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // type_energie
    $type_energie = new Zend_Form_Element_Select( 'type_energie' );
    $type_energie->setLabel( 'Type d\'Energie' )
                 ->setBelongsTo( 'ChauffeEau' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_energie );
    
    // dispose_chauffe_eau
    $dispose_chauffe_eau = new Zend_Form_Element_Select( 'dispose_chauffe_eau' );
    $dispose_chauffe_eau->setLabel( 'Y a-t-il un chauffe-eau à désinstaller ?' )
                        ->setBelongsTo( 'ChauffeEau' )
                        ->addFilters( $select_filters )
                        ->addMultiOptions( $this->_dispose_chauffe_eau );
    
    // type_diffusion_chaleur
    $type_diffusion_chaleur = new Zend_Form_Element_Select( 'type_diffusion_chaleur' );
    $type_diffusion_chaleur->setLabel( 'Type de Diffusion de Chaleur' )
                           ->setBelongsTo( 'ChauffeEau' )
                           ->addFilters( $select_filters )
                           ->setAttrib( 'slugify', true )
                           ->addMultiOptions( $this->_type_diffusion_chaleur );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface Totale à Chauffer' )
                   ->setBelongsTo( 'ChauffeEau' )
                   ->addFilters( $default_filters );
    
    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text( 'hauteur_sous_plafond' );
    $hauteur_sous_plafond->setLabel( 'Hauteur sous plafond' )
                         ->setBelongsTo( 'ChauffeEau' );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_travaux,
      $type_chauffe_eau,
      $nbre_etage,
      $type_energie,
      $dispose_chauffe_eau,
      $type_diffusion_chaleur,
      $surface_totale,
      $hauteur_sous_plafond,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
