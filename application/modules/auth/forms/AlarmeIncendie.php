<?php


/**
 * Class Auth_Form_AlarmeIncendie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_AlarmeIncendie extends Auth_Form_Base {
  
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
                 ->setBelongsTo( 'AlarmeIncendie' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface en m²' )
                   ->setBelongsTo( 'AlarmeIncendie' )
                   ->addFilters( $default_filters );
    
    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Text( 'nbre_piece' );
    $nbre_piece->setLabel( 'Nombre de Pièces' )
               ->setBelongsTo( 'AlarmeIncendie' )
               ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_travaux,
      $surface_totale,
      $nbre_piece,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
