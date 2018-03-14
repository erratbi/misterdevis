<?php


/**
 * Class Auth_Form_Cloture
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Cloture extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_materiau = [
    ''    => 'Veuillez préciser',
    'Grillage' => 'Grillage',
    'En métal' => 'En métal',
    'Traditionnel (Parpaing)' => 'Traditionnel (Parpaing)',
    'En Boi' => 'En Boi',
    'En Pierre' => 'En Pierre',
    'En brique' => 'En brique',
    'Non défini' => 'Non défini',
    'Autre' => 'Autre',

  ];


  private $_installer_interphone = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
  ];

  private $_installer_portail = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
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


    $select_filters = ['StripTags'];

    // type_materiau
    $type_materiau = new Zend_Form_Element_Select('type_materiau');
    $type_materiau->setLabel('Type de Materiau')
      ->setBelongsTo('Cloture')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_materiau);

    // longueur
    $longueur = new Zend_Form_Element_Text('longueur');
    $longueur->setLabel('Longueur de la Clôture')
      ->setBelongsTo('Cloture')
      ->addFilters($select_filters);

    // hauteur
    $hauteur = new Zend_Form_Element_Text('hauteur');
    $hauteur->setLabel('Hauteur de la Clôture')
      ->setBelongsTo('Cloture')
      ->addFilters($select_filters);
  
    // installer_interphone
    $installer_interphone = new Zend_Form_Element_Select('installer_interphone');
    $installer_interphone->setLabel('Souhaitez-vous faire installer un interphone ?')
      ->setBelongsTo('Cloture')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_installer_interphone);

    // installer_portail
    $installer_portail = new Zend_Form_Element_Select('installer_portail');
    $installer_portail->setLabel('Souhaitez-vous faire installer un portail ?')
      ->setBelongsTo('Cloture')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_installer_portail);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_materiau,
      $longueur,
      $hauteur,
      $installer_portail,
      $installer_interphone,
      $submit,
    ]);

    parent::init();

  }

}
