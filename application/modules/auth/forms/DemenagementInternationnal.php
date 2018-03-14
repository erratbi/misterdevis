<?php


/**
 * Class Auth_Form_DemenagementInternationnal
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_DemenagementInternationnal extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_quoi_demenager = [
    ''                      => 'Veuillez préciser',
    'Studio < 20m²'         => 'Studio < 20m²',
    'T1 de 20 m² à 40 m²'   => 'T1 de 20 m² à 40 m²',
    'T2 de 40 m² à 60 m²'   => 'T2 de 40 m² à 60 m²',
    'T3 de 60 m² à 80 m²'   => 'T3 de 60 m² à 80 m²',
    'T4 de 80 m² à 100 m²'  => 'T4 de 80 m² à 100 m²',
    'T5 de 100 m² à 200 m²' => 'T5 de 100 m² à 200 m²',
    'T6 200 m² et plus'     => 'T6 200 m² et plus',
    'Box de stockage'       => 'Box de stockage',
    'Quelques meubles'      => 'Quelques meubles',
    'Un piano droit'        => 'Un piano droit',
  ];
  
  private $_nbre_piece = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  private $_type_logement = [
    ''                          => 'Veuillez préciser',
    'Appartement'               => 'Appartement',
    'Maison de plein pied'      => 'Maison de plein pied',
    'Maison avec étage(s)'      => 'Maison avec étage(s)',
    'Garage ou Box de stockage' => 'Garage ou Box de stockage',
    'Garde-meuble'              => 'Garde-meuble',
  ];
  
  private $_nbre_etage = [
    ''      => 'Veuillez préciser',
    '1'     => '1',
    '2'     => '2',
    '3'     => '3',
    '4'     => '4',
    '5'     => '5',
    'Autre' => 'Autre',
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
    $nbre_piece->setLabel( 'Nombre de pièces concernées' )
               ->setBelongsTo( 'DemenagementInternationnal' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    // quoi_demenager
    $quoi_demenager = new Zend_Form_Element_Select( 'quoi_demenager' );
    $quoi_demenager->setLabel( 'Je déménage' )
                   ->setBelongsTo( 'DemenagementInternationnal' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_quoi_demenager );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'étage' )
               ->setBelongsTo( 'DemenagementInternationnal' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // type_logement
    $type_logement = new Zend_Form_Element_Select( 'type_logement' );
    $type_logement->setLabel( 'Type de logement' )
                  ->setBelongsTo( 'DemenagementInternationnal' )
                  ->addFilters( $select_filters )
                  ->addMultiOptions( $this->_type_logement );
    
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale concernée' )
                   ->setBelongsTo( 'DemenagementInternationnal' )
                   ->addFilters( $default_filters );
    
    
    // pays_depart
    $pays_depart = new Zend_Form_Element_Text( 'pays_depart' );
    $pays_depart->setLabel( 'Pays de Départ' )
                ->setBelongsTo( 'DemenagementInternationnal' )
                ->addFilters( $default_filters );
    
    
    // pays_arriver
    $pays_arriver = new Zend_Form_Element_Text( 'pays_arriver' );
    $pays_arriver->setLabel( 'Pays d\'Arrivée' )
                 ->setBelongsTo( 'DemenagementInternationnal' )
                 ->addFilters( $default_filters );
    
    
    // ville_depart
    $ville_depart = new Zend_Form_Element_Text( 'ville_depart' );
    $ville_depart->setLabel( 'Ville de Départ' )
                 ->setBelongsTo( 'DemenagementInternationnal' )
                 ->addFilters( $default_filters );
    
    
    // ville_arriver
    $ville_arriver = new Zend_Form_Element_Text( 'ville_arriver' );
    $ville_arriver->setLabel( 'Ville d\'Arrivée' )
                  ->setBelongsTo( 'DemenagementInternationnal' )
                  ->addFilters( $default_filters );
    
    
    // volume
    $volume = new Zend_Form_Element_Text( 'volume' );
    $volume->setLabel( 'Connaissez-vous le volume à déménager ?' )
           ->setBelongsTo( 'DemenagementInternationnal' )
           ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $quoi_demenager,
      $nbre_etage,
      $type_logement,
      $pays_depart,
      $pays_arriver,
      $ville_depart,
      $ville_arriver,
      $volume,
      $nbre_piece,
      $surface_totale,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
