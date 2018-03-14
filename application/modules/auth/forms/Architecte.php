<?php


/**
 * Class Auth_Form_Architecte
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Architecte extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_mision = [
    ''                                                              => 'Veuillez préciser',
    'Mission complète (plan + dépôt du permis + suivi de chantier)' => 'Mission complète (plan + dépôt du permis + suivi de chantier)',
    'Réalisation des plans + dépôt du permis de construire'         => 'Réalisation des plans + dépôt du permis de construire',
    'Réalisation des plans uniquement'                              => 'Réalisation des plans uniquement',
    'Suivi de chantier uniquement'                                  => 'Suivi de chantier uniquement',
    'Autre, précisez'                                               => 'Autre, précisez',
  ];
  
  
  private $_terrain = [
    ''                                        => 'Veuillez préciser',
    'Oui, je suis le propriétaire du terrain' => 'Oui, je suis le propriétaire du terrain',
    'Oui, je suis en cours de signature'      => 'Oui, je suis en cours de signature',
    'Non, je recherche un terrain'            => 'Non, je recherche un terrain',
  ];
  
  
  private $_terrain_viabilise = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'En partie'      => 'En partie',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  
  private $_pieces_meublees = [
    ''               => 'Veuillez préciser',
    'Oui'            => 'Oui',
    'Non'            => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];
  
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $select_filters = [ 'StripTags' ];
    
    $default_filters = [
      'StringToLower',
      'StringTrim',
      'StripTags',
    ];
    
    // pieces_meublees
    $pieces_meublees = new Zend_Form_Element_Select( 'pieces_meublees' );
    $pieces_meublees->setLabel( 'Les pièces à rénover sont-elles meublées ?' )
                    ->setBelongsTo( 'Architecte' )
                    ->addFilters( $select_filters )
                    ->addMultiOptions( $this->_pieces_meublees );
    
    // terrain_viabilise
    $terrain_viabilise = new Zend_Form_Element_Select( 'terrain_viabilise' );
    $terrain_viabilise->setLabel( 'Le terrain est-il viabilisé ?' )
                      ->setBelongsTo( 'Architecte' )
                      ->addFilters( $select_filters )
                      ->addMultiOptions( $this->_terrain_viabilise );
    
    // terrain
    $terrain = new Zend_Form_Element_Select( 'terrain' );
    $terrain->setLabel( 'Avez-vous trouvé le terrain ?' )
            ->setBelongsTo( 'Architecte' )
            ->addFilters( $select_filters )
            ->addMultiOptions( $this->_terrain );
    
    
    // mision
    $mision = new Zend_Form_Element_Select( 'mision' );
    $mision->setLabel( 'Mission' )
           ->setBelongsTo( 'Architecte' )
           ->addFilters( $select_filters )
           ->addMultiOptions( $this->_mision );
    
    // description_projet
    $description_projet = new Zend_Form_Element_Textarea( 'description_projet' );
    $description_projet->setLabel( 'Décrivez précisément le projet que vous souhaitez confier à un architecte' )
                       ->setBelongsTo( 'Architecte' )
                       ->addFilters( $default_filters );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface à Construire en m²' )
                   ->setBelongsTo( 'Architecte' )
                   ->addFilters( $default_filters );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $pieces_meublees,
      $terrain_viabilise,
      $description_projet,
      $surface_totale,
      $terrain,
      $mision,
      $submit,
    ] );
    
    parent::init();
    
  }
}
