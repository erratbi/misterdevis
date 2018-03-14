<?php


/**
 * Class Auth_Form_TraitementCharpente
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_TraitementCharpente extends Auth_Form_Base {
  
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
  
  private $_diagnostic_fait = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_diagnostic_termite_fait = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_traitement_charpente = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  private $_traitement_termite = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
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
               ->setBelongsTo( 'TraitementCharpente' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    // diagnostic_fait
    $diagnostic_fait = new Zend_Form_Element_Select( 'diagnostic_fait' );
    $diagnostic_fait->setLabel( 'Avez-vous fait établir un diagnostic ?' )
                    ->setBelongsTo( 'TraitementCharpente' )
                    ->addFilters( $select_filters )
                    ->addMultiOptions( $this->_diagnostic_fait );
    
    // diagnostic_termite_fait
    $diagnostic_termite_fait = new Zend_Form_Element_Select( 'diagnostic_termite_fait' );
    $diagnostic_termite_fait->setLabel( 'Avez-vous fait établir un diagnostic termite ?' )
                            ->setBelongsTo( 'TraitementCharpente' )
                            ->addFilters( $select_filters )
                            ->addMultiOptions( $this->_diagnostic_termite_fait );
    
    // traitement_charpente
    $traitement_charpente = new Zend_Form_Element_Select( 'traitement_charpente' );
    $traitement_charpente->setLabel( 'Avez-vous déjà fait traiter votre charpente ?' )
                         ->setBelongsTo( 'TraitementCharpente' )
                         ->addFilters( $select_filters )
                         ->addMultiOptions( $this->_traitement_charpente );
    
    // traitement_termite
    $traitement_termite = new Zend_Form_Element_Select( 'traitement_termite' );
    $traitement_termite->setLabel( 'Avez-vous déjà fait un traitement contre les termites ?' )
                       ->setBelongsTo( 'TraitementCharpente' )
                       ->addFilters( $select_filters )
                       ->addMultiOptions( $this->_traitement_termite );
    
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text( 'annee_construction' );
    $annee_construction->setLabel( 'Année de construction' )
                       ->setBelongsTo( 'TraitementCharpente' )
                       ->addFilters( $default_filters );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale du bien concerné :' )
                   ->setBelongsTo( 'TraitementCharpente' )
                   ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_piece,
      $diagnostic_fait,
      $diagnostic_termite_fait,
      $traitement_charpente,
      $traitement_termite,
      $annee_construction,
      $surface_totale,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
