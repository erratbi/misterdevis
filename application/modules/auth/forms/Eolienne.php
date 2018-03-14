<?php


/**
 * Class Auth_Form_Eolienne
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Eolienne extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_nbre_etage = [
    ''           => 'Veuillez préciser',
    'Plain-pied' => 'Plain-pied',
    '1'          => '1',
    '2'          => '2',
    '3'          => '3',
    'plus de 3'  => 'plus de 3',
  ];
  
  private $_dispose_jardin = [
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
    
    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select( 'nbre_etage' );
    $nbre_etage->setLabel( 'Nombre d\'Étage à chauffer' )
               ->setBelongsTo( 'Eolienne' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_etage );
    
    // dispose_jardin
    $dispose_jardin = new Zend_Form_Element_Select( 'dispose_jardin' );
    $dispose_jardin->setLabel( 'Avez-vous un jardin ?' )
                   ->setBelongsTo( 'Eolienne' )
                   ->addFilters( $select_filters )
                   ->setAttrib( 'slugify', true )
                   ->addMultiOptions( $this->_dispose_jardin );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $nbre_etage,
      $dispose_jardin,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
