<?php


/**
 * Class Auth_Form_Renovation
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Renovation extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_nbre_piece = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  private $_etat_general = [
    ''                  => 'Veuillez préciser',
    'Bon état'          => 'Bon état',
    'Mauvais état'      => 'Mauvais état',
    'Très mauvais état' => 'Très mauvais état',
  ];
  
  private $_piece_renover = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  
  private $_etat_murs = [
    ''                         => 'Veuillez préciser',
    'Oui'                      => 'Oui',
    'Non'                      => 'Non',
    'Si Oui, précisez le type' => 'Si Oui, précisez le type',
  ];
  
  
  private $_etat_sol = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  
  private $_etat_plafond = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  
  private $_electrique = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_plombrie = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_menuiserie = [
    ''         => 'Veuillez préciser',
    'Oui'      => 'Oui',
    'Précisez' => 'Précisez',
    'Non'      => 'Non',
  ];
  
  private $_architecte = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  private $_permis_construction = [
    ''                           => 'Veuillez préciser',
    'Oui, je l\'ai obtenu'       => 'Oui, je l\'ai obtenu',
    'Oui, j\'attends la réponse' => 'Oui, j\'attends la réponse',
    'Non'                        => 'Non',
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
    
    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select( 'nbre_piece' );
    $nbre_piece->setLabel( 'Nombre de pièces' )
               ->setBelongsTo( 'Renovation' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    // etat_general
    $etat_general = new Zend_Form_Element_Select( 'etat_general' );
    $etat_general->setLabel( 'État général du bien concerné' )
                 ->setBelongsTo( 'Renovation' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_etat_general );
    
    // piece_renover
    $piece_renover = new Zend_Form_Element_Select( 'piece_renover' );
    $piece_renover->setLabel( 'Les pièces à rénover sont-elles meublées ?' )
                  ->setBelongsTo( 'Renovation' )
                  ->addFilters( $select_filters )
                  ->addMultiOptions( $this->_piece_renover );
    
    // etat_murs
    $etat_murs = new Zend_Form_Element_Select( 'etat_murs' );
    $etat_murs->setLabel( 'Les murs sont-ils à rénover ?' )
              ->setBelongsTo( 'Renovation' )
              ->addFilters( $select_filters )
              ->addMultiOptions( $this->_etat_murs );
    
    // etat_sol
    $etat_sol = new Zend_Form_Element_Select( 'etat_sol' );
    $etat_sol->setLabel( 'Les sols sont-ils à rénover ?' )
             ->setBelongsTo( 'Renovation' )
             ->addFilters( $select_filters )
             ->addMultiOptions( $this->_etat_sol );
    
    // etat_plafond
    $etat_plafond = new Zend_Form_Element_Select( 'etat_plafond' );
    $etat_plafond->setLabel( 'Les plafonds sont-ils à rénover ?' )
                 ->setBelongsTo( 'Renovation' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_etat_plafond );
    
    // electrique
    $electrique = new Zend_Form_Element_Select( 'electrique' );
    $electrique->setLabel( 'L\'installation électrique est-elle à refaire ?' )
               ->setBelongsTo( 'Renovation' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_electrique );
    
    // plombrie
    $plombrie = new Zend_Form_Element_Select( 'plombrie' );
    $plombrie->setLabel( 'Des travaux de plomberie sont-ils à prévoir ?' )
             ->setBelongsTo( 'Renovation' )
             ->addFilters( $select_filters )
             ->addMultiOptions( $this->_plombrie );
    
    
    // menuiserie
    $menuiserie = new Zend_Form_Element_Select( 'menuiserie' );
    $menuiserie->setLabel( 'Les menuiseries sont-elles à changer (fenêtres, portes, volets) ?' )
               ->setBelongsTo( 'Renovation' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_menuiserie );
    
    // architecte
    $architecte = new Zend_Form_Element_Select( 'architecte' );
    $architecte->setLabel( 'Avez-vous besoin d\'un Architecte ?' )
               ->setBelongsTo( 'Renovation' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_architecte );
    
    // permis_construction
    $permis_construction = new Zend_Form_Element_Select( 'permis_construction' );
    $permis_construction->setLabel( 'Avez-vous déposé un permis de construire ?' )
                        ->setBelongsTo( 'Renovation' )
                        ->addFilters( $select_filters )
                        ->addMultiOptions( $this->_permis_construction );
    
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale à rénover' )
                   ->setBelongsTo( 'Renovation' )
                   ->addFilters( $default_filters );
    
    $this->addElements( [
      $nbre_piece,
      $surface_totale,
      $etat_general,
      $piece_renover,
      $etat_murs,
      $etat_sol,
      $etat_plafond,
      $electrique,
      $plombrie,
      $menuiserie,
      $architecte,
      $permis_construction,
    
    ] );
    
    parent::init();
    
  }
  
}

