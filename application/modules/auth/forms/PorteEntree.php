<?php


/**
 * Class Auth_Form_PorteEntree
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_PorteEntree extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  private $_nbre_porte = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];
  
  
  private $_depose_porte_existant = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];
  
  private $_type_porte = [
    ''                => 'Veuillez préciser',
    'PVC'             => 'PVC',
    'Aluminium'       => 'Aluminium',
    'Bois'            => 'Bois',
    'Je ne sais pas'  => 'Je ne sais pas',
    'Fenêtre de toit' => 'Fenêtre de toit',
  ];
  
  
  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
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
    
    // nbre_porte
    $nbre_porte = new Zend_Form_Element_Select( 'nbre_porte' );
    $nbre_porte->setLabel( 'Nombre de portes d\'entrée' )
               ->setBelongsTo( 'PorteEntree' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_nbre_porte );
    
    // depose_porte_existant
    $depose_porte_existant = new Zend_Form_Element_Select( 'depose_porte_existant' );
    $depose_porte_existant->setLabel( 'Dépose des Portes d\'Entrée existantes ?' )
                          ->setBelongsTo( 'PorteEntree' )
                          ->addFilters( $select_filters )
                          ->addMultiOptions( $this->_depose_porte_existant );
    
    
    // type_porte
    $type_porte = new Zend_Form_Element_Select( 'type_porte' );
    $type_porte->setLabel( 'Quel type de Porte d\'Entrée ?' )
               ->setBelongsTo( 'PorteEntree' )
               ->addFilters( $select_filters )
               ->addMultiOptions( $this->_type_porte );
    
    
    // type_travaux
    $type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
    $type_travaux->setLabel( 'Type de Travaux' )
                 ->setBelongsTo( 'PorteEntree' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_type_travaux );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $nbre_porte,
      $depose_porte_existant,
      $type_porte,
      $type_travaux,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
