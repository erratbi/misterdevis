<?php


/**
 * Class Auth_Form_Moquette
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Moquette extends Auth_Form_Base {
  
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
  
  private $_enlevement_revetement = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
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
               ->setBelongsTo( 'Moquette' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale concernée' )
                   ->setBelongsTo( 'Moquette' )
                   ->addFilters( $default_filters );
    
    
    // enlevement_revetement
    $enlevement_revetement = new Zend_Form_Element_Select( 'enlevement_revetement' );
    $enlevement_revetement->setLabel( 'Enlèvement du revêtement actuel ?' )
                          ->setBelongsTo( 'Moquette' )
                          ->addFilters( $select_filters )
                          ->addMultiOptions( $this->_enlevement_revetement );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_piece,
      $surface_totale,
      $enlevement_revetement,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
