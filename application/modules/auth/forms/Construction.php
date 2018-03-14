<?php


/**
 * Class Auth_Form_Construction
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Construction extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_type_maison = [
    ''                                    => 'Veuillez préciser',
    'Maison de plein pied (pas d\'étage)' => 'Maison de plein pied (pas d\'étage)',
    'Maison ave étage'                    => 'Maison ave étage',
    'Non défini'                          => 'Non défini',
  ];
  
  
  private $_type_construction = [
    ''                          => 'Veuillez préciser',
    'Traditionnelle (Parpaing)' => 'Traditionnelle (Parpaing)',
    'En Brique'                 => 'En Brique',
    'Ossature bois'             => 'Ossature bois',
    'Monomur'                   => 'Monomur',
    'Bioclimatique'             => 'Bioclimatique',
    'Ecologique'                => 'Ecologique',
    'Non défini'                => 'Non défini',
    'Autre'                     => 'Autre',
  ];
  
  private $_style_construction = [
    ''               => 'Veuillez préciser',
    'Traditionnelle' => 'Traditionnelle',
    'Contenporain'   => 'Contenporain',
    'Je ne sais pas' => 'Je ne sais pas',
    'Autre'          => 'Autre',
  ];
  
  private $_nbre_pieces = [
    ''           => 'Veuillez préciser',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    '4'          => '4',
    '5'          => '5',
    'Plus de 5'  => 'Plus de 5',
    'Non défini' => 'Non défini',
  ];
  
  private $_terrain = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  
  private $_architecte = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  
  private $_permis_construction = [
    ''                           => 'Veuillez préciser',
    'Oui, je l\'ai obtenu'       => 'Oui, je l\'ai obtenu',
    'Oui, j\'attends la réponse' => 'Oui, j\'attends la réponse',
    'Non'                        => 'Non',
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
    
    // type_maison
    $type_maison = new Zend_Form_Element_Select( 'type_maison' );
    $type_maison->setLabel( 'Type de maison' )
                ->setBelongsTo( 'Construction' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_type_maison );
    
    // type_construction
    $type_construction = new Zend_Form_Element_Select( 'type_construction' );
    $type_construction->setLabel( 'Type de construction' )
                      ->setBelongsTo( 'Construction' )
                      ->addFilters( $select_filters )
                      ->setAttrib( 'slugify', true )
                      ->addMultiOptions( $this->_type_construction );
    
    // style_construction
    $style_construction = new Zend_Form_Element_Select( 'style_construction' );
    $style_construction->setLabel( 'Style de construction' )
                       ->setBelongsTo( 'Construction' )
                       ->addFilters( $select_filters )
                       ->setAttrib( 'slugify', true )
                       ->addMultiOptions( $this->_style_construction );
    
    // nbre_pieces
    $nbre_pieces = new Zend_Form_Element_Select( 'nbre_pieces' );
    $nbre_pieces->setLabel( 'Nombre de pièces' )
                ->setBelongsTo( 'Construction' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_nbre_pieces );
    
    // terrain
    $terrain = new Zend_Form_Element_Select( 'terrain' );
    $terrain->setLabel( 'Avez-vous un Terrain ?' )
            ->setBelongsTo( 'Construction' )
            ->addFilters( $select_filters )
            ->addMultiOptions( $this->_terrain );
    
    // architecte
    $architecte = new Zend_Form_Element_Select( 'architecte' );
    $architecte->setLabel( 'Avez-vous besoin d\'un Architecte ?' )
               ->setBelongsTo( 'Construction' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_architecte );
    
    // permis_construction
    $permis_construction = new Zend_Form_Element_Select( 'permis_construction' );
    $permis_construction->setLabel( 'Avez-vous déposé le permis de construire ?' )
                        ->setBelongsTo( 'Construction' )
                        ->addFilters( $select_filters )
                        ->addMultiOptions( $this->_permis_construction );
    
    // surface_habitable
    $surface_habitable = new Zend_Form_Element_Text( 'surface_habitable' );
    $surface_habitable->setLabel( 'Surface Habitable' )
                      ->setBelongsTo( 'Construction' )
                      ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $type_maison,
      $type_construction,
      $style_construction,
      $nbre_pieces,
      $surface_habitable,
      $terrain,
      $architecte,
      $permis_construction,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
