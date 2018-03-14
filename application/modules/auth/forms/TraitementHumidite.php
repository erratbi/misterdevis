<?php


/**
 * Class Auth_Form_TraitementHumidite
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_TraitementHumidite extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_nbre_pieces = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
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
    
    // nbre_pieces
    $nbre_pieces = new Zend_Form_Element_Select( 'nbre_pieces' );
    $nbre_pieces->setLabel( 'Nombre de pièces' )
                ->setBelongsTo( 'TraitementHumidite' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_nbre_pieces );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale du bien concerné' )
                   ->setBelongsTo( 'TraitementHumidite' )
                   ->addFilters( $default_filters );
    
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text( 'annee_construction' );
    $annee_construction->setLabel( 'Année de construction' )
                       ->setBelongsTo( 'TraitementHumidite' )
                       ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_pieces,
      $surface_totale,
      $annee_construction,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
