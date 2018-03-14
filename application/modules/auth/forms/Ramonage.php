<?php


/**
 * Class Auth_Form_Ramonage
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Ramonage extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_type_cheminee = [
    ''                => 'Veuillez préciser',
    'Foyer Ouvert'    => 'Foyer Ouvert',
    'Foyer Fermé'     => 'Foyer Fermé',
    'Cheminée au Gaz' => 'Cheminée au Gaz',
    'Pöele à Bois'    => 'Pöele à Bois',
    'Autre'           => 'Autre',
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
    
    // type_cheminee
    $type_cheminee = new Zend_Form_Element_Select( 'type_cheminee' );
    $type_cheminee->setLabel( 'Type de Cheminée' )
                  ->setBelongsTo( 'Ramonage' )
                  ->addFilters( $select_filters )
                  ->addMultiOptions( $this->_type_cheminee );
    
    // date_ramonage
    $date_ramonage = new Zend_Form_Element_Text( 'date_ramonage' );
    $date_ramonage->setLabel( 'Date dernier Ramonage' )
                  ->setBelongsTo( 'Ramonage' )
                  ->addFilters( $default_filters );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $type_cheminee,
      $date_ramonage,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
