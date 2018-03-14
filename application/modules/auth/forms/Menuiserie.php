<?php


/**
 * Class Auth_Form_Menuiserie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Menuiserie extends Auth_Form_Base {
  
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
  
  private $_type_projet = [
    ''                      => 'Veuillez préciser',
    'Placard'               => 'Placard',
    'Dressing'              => 'Dressing',
    'Escalier en bois'      => 'Escalier en bois',
    'Plancher en bois'      => 'Plancher en bois',
    'Bar/Comptoir'          => 'Bar/Comptoir',
    'Bibliothèque'          => 'Bibliothèque',
    'Bureau forme libre'    => 'Bureau forme libre',
    'Lits Escamotables'     => 'Lits Escamotables',
    'Bardage bois'          => 'Bardage bois',
    'Meubles gain de place' => 'Meubles gain de place',
    'Mezzanine'             => 'Mezzanine',
    'Autre'                 => 'Autre',
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
               ->setBelongsTo( 'Menuiserie' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_piece );
    
    // type_projet
    $type_projet = new Zend_Form_Element_Select( 'type_projet' );
    $type_projet->setLabel( 'Votre projet' )
                ->setBelongsTo( 'Menuiserie' )
                ->addFilters( $select_filters )
                ->setAttrib( 'slugify', true )
                ->addMultiOptions( $this->_type_projet );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_piece,
      $type_projet,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
