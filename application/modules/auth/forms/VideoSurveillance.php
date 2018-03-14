<?php


/**
 * Class Auth_Form_VideoSurveillance
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_VideoSurveillance extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
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
    
    // nbre_fenetre
    $nbre_fenetre = new Zend_Form_Element_Text( 'nbre_fenetre' );
    $nbre_fenetre->setLabel( 'Nombre de Fenêtres' )
                 ->setBelongsTo( 'VideoSurveillance' )
                 ->addFilters( $default_filters );
    
    
    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Text( 'nbre_piece' );
    $nbre_piece->setLabel( 'Nombre de Pièces à Surveiller' )
               ->setBelongsTo( 'VideoSurveillance' )
               ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $nbre_piece,
      $nbre_fenetre,
    ] );
    
    parent::init();
    
  }
  
}
