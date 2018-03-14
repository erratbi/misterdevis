<?php


/**
 * Class Auth_Form_Charpente
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Charpente extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_travaux = [
    ''           => 'Veuillez préciser',
    'Neuf'       => 'Neuf',
    'Rénovation' => 'Rénovation',
  ];
  
  
  private $_type_charpente = [
    ''                    => 'Veuillez préciser',
    'Charpente Bois'      => 'Charpente Bois',
    'Charpente Metalique' => 'Charpente Metalique',
  ];
  
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $select_filters = [ 'StripTags' ];
    
    // type_charpente
    $type_charpente = new Zend_Form_Element_Select( 'type_charpente' );
    $type_charpente->setLabel( 'Type de Charpente' )
                   ->setBelongsTo( 'Charpente' )
                   ->addFilters( $select_filters )
                   ->addMultiOptions( $this->_type_charpente );
    
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Charpente' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $type_charpente,
      $type_travaux,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
