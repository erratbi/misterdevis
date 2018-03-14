<?php


/**
 * Class Auth_Form_Photovoltaique
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Photovoltaique extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_finalite_installation = [
    ''                  => 'Veuillez préciser',
    'Revente EDF'       => 'Revente EDF',
    'Auto-Consommation' => 'Auto-Consommation',
  ];
  
  
  private $_utilite = [
    ''                        => 'Veuillez préciser',
    'Électricité'             => 'Électricité',
    'Chauffage'               => 'Chauffage',
    'Chauffage & Électricité' => 'Chauffage & Électricité',
  
  ];
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
  
  ];
  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
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
                 ->setBelongsTo( 'Photovoltaique' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // finalite_installation
    $finalite_installation = new Zend_Form_Element_Select( 'finalite_installation' );
    $finalite_installation->setLabel( 'Finalité de votre installation ?' )
                          ->setBelongsTo( 'Photovoltaique' )
                          ->addFilters( $select_filters )
                          ->setAttrib( 'slugify', true )
                          ->addMultiOptions( $this->_finalite_installation );
    
    // utilite
    $utilite = new Zend_Form_Element_Select( 'utilite' );
    $utilite->setLabel( 'Pour quelle utilité ?' )
            ->setBelongsTo( 'Photovoltaique' )
            ->addFilters( $select_filters )
            ->setAttrib( 'slugify', true )
            ->addMultiOptions( $this->_utilite );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à Chauffer' )
               ->setBelongsTo( 'Photovoltaique' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // hauteur_plafond
    $hauteur_plafond = new Zend_Form_Element_Text( 'hauteur_plafond' );
    $hauteur_plafond->setLabel( 'Hauteur sous plafond' )
                    ->setBelongsTo( 'Photovoltaique' )
                    ->addFilters( $default_filters );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale' )
                   ->setBelongsTo( 'Photovoltaique' )
                   ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $type_travaux,
      $finalite_installation,
      $utilite,
      $nbre_etage,
      $surface_totale,
      $hauteur_plafond,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
