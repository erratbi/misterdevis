<?php


/**
 * Class Auth_Form_Diagnostic
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Diagnostic extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  private $_type_diagnostic = [
    ''                    => 'Veuillez préciser',
    'Diagnostic Amiante'  => 'Diagnostic Amiante',
    'Diagnostic DPE'      => 'Diagnostic DPE',
    'Diagnostic Termites' => 'Diagnostic Termites',
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
  
  private $_diagnostic_fait = [
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
    
    // type_diagnostic
    $type_diagnostic = new Zend_Form_Element_Select( 'type_diagnostic' );
    $type_diagnostic->setLabel( 'Type de Diagnostic' )
                    ->setBelongsTo( 'Diagnostic' )
                    ->addFilters( $select_filters )
                    ->addMultiOptions( $this->_type_diagnostic );
    
    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select( 'nbre_piece' );
    $nbre_piece->setLabel( 'Nombre de pièces' )
               ->setBelongsTo( 'Diagnostic' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    
    // diagnostic_fait
    $diagnostic_fait = new Zend_Form_Element_Select( 'diagnostic_fait' );
    $diagnostic_fait->setLabel( 'Avez-vous déjà fait établir un diagnostic ?' )
                    ->setBelongsTo( 'Diagnostic' )
                    ->addFilters( $select_filters )
                    ->addMultiOptions( $this->_diagnostic_fait );
    
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale du bien concerné' )
                   ->setBelongsTo( 'Diagnostic' )
                   ->addFilters( $default_filters );
    
    
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text( 'annee_construction' );
    $annee_construction->setLabel( 'Année de construction' )
                       ->setBelongsTo( 'Diagnostic' )
                       ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_diagnostic,
      $nbre_piece,
      $diagnostic_fait,
      $surface_totale,
      $annee_construction,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
