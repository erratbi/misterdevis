<?php


/**
 * Class Auth_Form_ChauffageInertie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_ChauffageInertie extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_nbre_piece = [
    ''                              => 'Veuillez préciser',
    '1'         => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
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
    
    // type_chauffe_eau
    $nbre_piece = new Zend_Form_Element_Select( 'nbre_piece' );
    $nbre_piece->setLabel( 'Nombre de pièces à chauffer' )
                     ->setBelongsTo( 'ChauffageInertie' )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_nbre_piece );
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à Chauffer' )
               ->setBelongsTo( 'ChauffageInertie' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface Totale à Chauffer' )
                   ->setBelongsTo( 'ChauffageInertie' )
                   ->addFilters( $default_filters );
    
    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text( 'hauteur_sous_plafond' );
    $hauteur_sous_plafond->setLabel( 'Hauteur sous plafond' )
                         ->setBelongsTo( 'ChauffageInertie' )
                         ->addFilters( $default_filters );
    
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $nbre_piece,
      $nbre_etage,
      $surface_totale,
      $hauteur_sous_plafond,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
