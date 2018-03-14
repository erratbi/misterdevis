<?php


/**
 * Class Auth_Form_Etancheite
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Etancheite extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
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
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'Etancheite' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text( 'annee_construction' );
    $annee_construction->setLabel( 'Année de construction' )
                       ->setBelongsTo( 'Etancheite' )
                       ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $type_travaux,
      $annee_construction,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
