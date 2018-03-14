<?php


/**
 * Class Auth_Form_DemenagementEntreprise
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_DemenagementEntreprise extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_quoi_demenager = [
    ''                 => 'Veuillez préciser',
    'Box de stockage'  => 'Box de stockage',
    'Quelques meubles' => 'Quelques meubles',
    'Autre'            => 'Autre',
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
    ''                           => 'Veuillez préciser',
    'Bureau/Local de plein pied' => 'Bureau/Local de plein pied',
    'Bureau/Local avec étage(s)' => 'Bureau/Local avec étage(s)',
    'Garage ou Box de stockage'  => 'Garage ou Box de stockage',
    'Garde-meuble'               => 'Garde-meuble',
    'Autre'                      => 'Autre',
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
               ->setBelongsTo( 'DemenagementEntreprise' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    // quoi_demenager
    $quoi_demenager = new Zend_Form_Element_Select( 'quoi_demenager' );
    $quoi_demenager->setLabel( 'Je déménage' )
                   ->setBelongsTo( 'DemenagementEntreprise' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_quoi_demenager );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'étage' )
               ->setBelongsTo( 'DemenagementEntreprise' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // type_logement
    $type_logement = new Zend_Form_Element_Select( 'type_logement' );
    $type_logement->setLabel( 'Type de logement' )
                  ->setBelongsTo( 'DemenagementEntreprise' )
                  ->addFilters( $select_filters )
                  ->addMultiOptions( $this->_type_logement );
    
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale concernée' )
                   ->setBelongsTo( 'DemenagementEntreprise' )
                   ->addFilters( $default_filters );
    
    
    // ville_depart
    $ville_depart = new Zend_Form_Element_Text( 'ville_depart' );
    $ville_depart->setLabel( 'Ville de Départ' )
                 ->setBelongsTo( 'DemenagementEntreprise' )
                 ->addFilters( $default_filters );
    
    
    // ville_arriver
    $ville_arriver = new Zend_Form_Element_Text( 'ville_arriver' );
    $ville_arriver->setLabel( 'Ville d\'Arrivée' )
                  ->setBelongsTo( 'DemenagementEntreprise' )
                  ->addFilters( $default_filters );
    
    
    // volume
    $volume = new Zend_Form_Element_Text( 'volume' );
    $volume->setLabel( 'Connaissez-vous le volume à déménager ?' )
           ->setBelongsTo( 'DemenagementEntreprise' )
           ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $quoi_demenager,
      $nbre_etage,
      $type_logement,
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
