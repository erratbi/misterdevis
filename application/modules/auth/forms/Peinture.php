<?php


/**
 * Class Auth_Form_Peinture
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Peinture extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_travaux = [
    ''           => 'Veuillez préciser',
    'Neuf'       => 'Neuf',
    'Rénovation' => 'Rénovation',
    'Extension'  => 'Extension',
    'Autre'      => 'Autre',
  ];
  
  
  private $_etat_surface = [
    ''                  => 'Veuillez préciser',
    'Bon état'          => 'Bon état',
    'État moyen'        => 'État moyen',
    'Mauvais état'      => 'Mauvais état',
    'Très mauvais état' => 'Très mauvais état',
  ];
  
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $select_filters = [ 'StripTags' ];
    
    // etat_surface
    $etat_surface = new Zend_Form_Element_Select( 'etat_surface' );
    $etat_surface->setLabel( 'État des surfaces' )
                 ->setBelongsTo( 'Peinture' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_etat_surface );
    
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Peinture' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $etat_surface,
      $type_travaux,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
