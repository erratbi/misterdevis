<?php


/**
 * Class Auth_Form_TraitementNuisible
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_TraitementNuisible extends Auth_Form_Base {
  
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

  private $_diagnostic_fait = [
    ''          => 'Veuillez préciser',
    'OUI'         => 'OUI',
    'NON'         => 'NON',
  ];

  private $_desinsectisation = [
    ''          => 'Veuillez préciser',
    'OUI'         => 'OUI',
    'NON'         => 'NON',
  ];

  private $_insecte = [
    ''          => 'Veuillez préciser',
    'Cafard & Blattes'         => 'Cafard & Blattes',
    'Puces & Tiques'         => 'Puces & Tiques',
    'Punaises de Lits'         => 'Punaises de Lits',
    'Chenilles'         => 'Chenilles',
    'Fourmis'         => 'Fourmis',
    'Acariens'         => 'Acariens',
    'Les Moustiques'         => 'Les Moustiques',
    'Les Guêpes'         => 'Les Guêpes',
    'Les Frelons & Frelon Asiatiques'         => 'Les Frelons & Frelon Asiatiques',
    'Les Mouches'         => 'Les Mouches',
    'Autre'         => 'Autre',
    'Je ne sais pas'         => 'Je ne sais pas',
  ];

  private $_deratisation = [
    ''          => 'Veuillez préciser',
    'OUI'         => 'OUI',
    'NON'         => 'NON',
    'Je ne sais pas'         => 'Je ne sais pas',
  ];

  private $_animal = [
    ''          => 'Veuillez préciser',
    'Le Rat Noir'         => 'Le Rat Noir',
    'Le Rat d\'Égout'         => 'Le Rat d\'Égout',
    'La Souris'         => 'La Souris',
    'Le Loir ou Lerot'         => 'Le Loir ou Lerot',
    'Je ne sais pas'         => 'Je ne sais pas',
    'Autre'         => 'Autre',
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
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_nbre_pieces );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale du bien concerné' )
                   ->setBelongsTo( 'TraitementNuisible' )
                   ->addFilters( $default_filters );
    
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text( 'annee_construction' );
    $annee_construction->setLabel( 'Année de construction' )
                       ->setBelongsTo( 'TraitementNuisible' )
                       ->addFilters( $default_filters );

    // diagnostic_fait
    $diagnostic_fait = new Zend_Form_Element_Select( 'diagnostic_fait' );
    $diagnostic_fait->setLabel( 'Avez-vous fait établir un diagnostic ?' )
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_diagnostic_fait );

     //  desinsectisation
    $desinsectisation = new Zend_Form_Element_Select( 'desinsectisation' );
    $desinsectisation->setLabel( 'Souhaitez-vous une Désinsectisation ?' )
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_desinsectisation );


     //  insecte
    $insecte = new Zend_Form_Element_Select( 'insecte' );
    $insecte->setLabel( 'Pour quel insecte ?' )
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_insecte );
    
     //  deratisation
    $deratisation = new Zend_Form_Element_Select( 'deratisation' );
    $deratisation->setLabel( 'Souhaitez-vous une Dératisation ?' )
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_deratisation );

     //  animal
    $animal = new Zend_Form_Element_Select( 'animal' );
    $animal->setLabel( 'Pour quel Animal ?' )
                ->setBelongsTo( 'TraitementNuisible' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_animal );



    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_pieces,
      $surface_totale,
      $annee_construction,
      $diagnostic_fait,
      $desinsectisation,
      $insecte,
      $deratisation,
      $animal,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
