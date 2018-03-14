<?php


/**
 * Class Auth_Form_Chauffage
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Chauffage extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_type_chauffage = [
    ''                     => 'Veuillez préciser',
    'Chauffage à bois'     => 'Chauffage à bois',
    'Chauffage electrique' => 'Chauffage electrique',
    'Chauffage Fiol'       => 'Chauffage Fiol',
    'Chauffage à gaz'      => 'Chauffage à gaz',
    /*'Chauffage eau solaire'         => 'Chauffage eau solaire',
    'Chauffage eau thermodynamique' => 'Chauffage eau thermodynamique',*/
    'Pompe à chaleur'      => 'Pompe à chaleur',
  ];
  
  private $_type_installation = [
    ''                     => 'Veuillez préciser',
    'Chauffage à Bois'     => 'Chauffage à Bois',
    'Poêle à Granules'     => 'Poêle à Granules',
    'Chaudière à Granules' => 'Chaudière à Granules',
  ];
  
  private $_conduite_fumee = [
    ''                => 'Veuillez préciser',
    'Déjà posé'       => 'Déjà posé',
    'Pas encore posé' => 'Pas encore posé',
    'A remplacer'     => 'A remplacer',
    'A réparer'       => 'A réparer',
    'A nettoyer'      => 'A nettoyer',
  ];
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
  ];
  
  private $_type_radiateur         = [
    ''                              => 'Veuillez préciser',
    'Radiateur'                     => 'Radiateur',
    'Plancher chauffant électrique' => 'Plancher chauffant électrique',
    'Je ne sais pas'                => 'Je ne sais pas',
  ];
  private $_type_diffusion_chaleur = [
    ''                  => 'Veuillez préciser',
    'Aérohermie (Air)'  => 'Aérohermie (Air)',
    'Aquathermie (Eau)' => 'Aquathermie (Eau)',
    'Mixte (Air/Eau)'   => 'Mixte (Air/Eau)',
    'Je ne sais pas'    => 'Je ne sais pas',
  
  ];
  
  private $_type_pompe_chaleur = [
    ''                  => 'Veuillez préciser',
    'Aérohermie (Air)'  => 'Aérohermie (Air)',
    'Aquathermie (Eau)' => 'Aquathermie (Eau)',
    'Mixte (Air/Eau)'   => 'Mixte (Air/Eau)',
    'Je ne sais pas'    => 'Je ne sais pas',
  
  ];
  
  private $_type_energie   = [
    ''                       => 'Veuillez préciser',
    'Électricité'            => 'Électricité',
    'Gaz'                    => 'Gaz',
    'Fioul'                  => 'Fioul',
    'Géothermie/Aérothermie' => 'Géothermie/Aérothermie',
    'Autre'                  => 'Autre',
    'Je ne sais pas'         => 'Je ne sais pas',
  ];
  private $_dispose_jardin = [
    ''  => 'Veuillez préciser',
    '1' => 'Oui',
    '0' => 'Non',
  ];
  private $_type_travaux   = [
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
                 ->setBelongsTo( 'Chauffage' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // type_chauffage
    $type_chauffage = new Zend_Form_Element_Select( 'type_chauffage' );
    $type_chauffage->setLabel( 'Type de Chauffage' )
                   ->setBelongsTo( 'Chauffage' )
                   ->addFilters( $select_filters )
                   ->setAttrib( 'slugify', true )
                   ->addMultiOptions( $this->_type_chauffage );
    
    // type_radiateur
    $type_radiateur = new Zend_Form_Element_Select( 'type_radiateur' );
    $type_radiateur->setLabel( 'Type de Radiateur' )
                   ->setBelongsTo( 'Chauffage' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_type_radiateur );
    
    // type_installation
    $type_installation = new Zend_Form_Element_Select( 'type_installation' );
    $type_installation->setLabel( 'Type d\'installation' )
                      ->setBelongsTo( 'Chauffage' )
                      ->addFilters( $select_filters )
                      ->addMultiOptions( $this->_type_installation );
    
    // conduite_fumee
    $conduite_fumee = new Zend_Form_Element_Select( 'conduite_fumee' );
    $conduite_fumee->setLabel( 'Conduite Fumée' )
                   ->setBelongsTo( 'Chauffage' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_conduite_fumee );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à Chauffer' )
               ->setBelongsTo( 'Chauffage' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // type_diffusion_chaleur
    $type_diffusion_chaleur = new Zend_Form_Element_Select( 'type_diffusion_chaleur' );
    $type_diffusion_chaleur->setLabel( 'Type de Diffusion de Chaleur' )
                           ->setBelongsTo( 'Chauffage' )
                           ->addFilters( $select_filters )
                           ->addMultiOptions( $this->_type_diffusion_chaleur );
    
    // type_pompe_chaleur
    $type_pompe_chaleur = new Zend_Form_Element_Select( 'type_pompe_chaleur' );
    $type_pompe_chaleur->setLabel( 'Type de Pompe à Chaleur' )
                       ->setBelongsTo( 'Chauffage' )
                       ->addFilters( $select_filters )
                       ->addMultiOptions( $this->_type_pompe_chaleur );
    
    // type_energie
    $type_energie = new Zend_Form_Element_Select( 'type_energie' );
    $type_energie->setLabel( 'Type d\'Energie' )
                 ->setBelongsTo( 'Chauffage' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_energie );
    
    // dispose_jardin
    $dispose_jardin = new Zend_Form_Element_Select( 'dispose_jardin' );
    $dispose_jardin->setLabel( 'Dispose d\'un Jardin' )
                   ->setBelongsTo( 'Chauffage' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_dispose_jardin );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface Totale à Chauffer' )
                   ->setBelongsTo( 'Chauffage' )
                   ->addFilters( $default_filters );
    
    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text( 'hauteur_sous_plafond' );
    $hauteur_sous_plafond->setLabel( 'Hauteur sous plafond' )
                         ->setBelongsTo( 'Chauffage' )
                         ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_travaux,
      $type_chauffage,
      $type_radiateur,
      $type_installation,
      $conduite_fumee,
      $nbre_etage,
      $type_diffusion_chaleur,
      $type_pompe_chaleur,
      $type_energie,
      $dispose_jardin,
      $surface_totale,
      $hauteur_sous_plafond,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
