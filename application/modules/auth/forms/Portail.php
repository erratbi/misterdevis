<?php


/**
 * Class Auth_Form_Portail
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Portail extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_nbre_portail = [
    ''    => 'Veuillez préciser',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    'Plus de 3' => 'Plus de 3',

  ];


  private $_depose_existant = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
  ];

  private $_portail_motorise = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
    'Je ne sais pas' => 'Je ne sais pas',
  ];

  private $_type_materiau = [
    ''               => 'Veuillez préciser',
    'PVC'   => 'PVC',
    'Aluminium' => 'Aluminium',
    'Bois' => 'Bois',
    'Métal' => 'Métal',
    'Je ne sais pas' => 'Je ne sais pas',
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


    $select_filters = ['StripTags'];

    // nbre_portail
    $nbre_portail = new Zend_Form_Element_Select('nbre_portail');
    $nbre_portail->setLabel('Nombre de Portail à installer')
      ->setBelongsTo('Portail')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_portail);
  
    // depose_existant
    $depose_existant = new Zend_Form_Element_Select('depose_existant');
    $depose_existant->setLabel("Dépose des Portails existants ?")
      ->setBelongsTo('Portail')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_depose_existant);

    // portail_motorise
    $portail_motorise = new Zend_Form_Element_Select('portail_motorise');
    $portail_motorise->setLabel('Souhaitez-vous un Portail motorisé ?')
      ->setBelongsTo('Portail')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_portail_motorise);

    // type_materiau
    $type_materiau = new Zend_Form_Element_Select('type_materiau');
    $type_materiau->setLabel('Type de Matériau')
      ->setBelongsTo('Portail')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_materiau);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $nbre_portail,
      $depose_existant,
      $portail_motorise,
      $type_materiau,
      $submit,
    ]);

    parent::init();

  }

}
