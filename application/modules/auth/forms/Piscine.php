<?php


/**
 * Class Auth_Form_Piscine
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Piscine extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_forme_piscine = [
    ''               => 'Veuillez préciser',
    'Rectangle'      => 'Rectangle',
    'Ronde'          => 'Ronde',
    'Ovale '         => 'Ovale ',
    'Haricot'        => 'Haricot',
    'Autre'          => 'Autre',
    'Je ne sais pas' => 'Je ne sais pas',
  ];

  private $_securite_piscine = [
    ''                      => 'Veuillez préciser',
    'Barrière de Piscine'   => 'Barrière de Piscine',
    'Alarme de Piscine'     => 'Alarme de Piscine',
    'Couverture de Piscine' => 'Couverture de Piscine',
    'Abri de Piscine'       => 'Abri de Piscine',
    'Je ne sais pas'        => 'Je ne sais pas',
  ];

  private $_type_piscine = [
    ''                          => 'Veuillez préciser',
    'Piscine à Coque Polyester' => 'Piscine à Coque Polyester',
    'Piscine Béton'             => 'Piscine Béton',
    'Piscine Hors Sol'          => 'Piscine Hors Sol',
    'Autre'                     => 'Autre',
  ];


  private $_type_travaux = [
    ''                                => 'Veuillez préciser',
    'Installer une Piscine Neuve'     => 'Installer une Piscine Neuve',
    'Remplacer une Piscine Existante' => 'Remplacer une Piscine Existante',
    'Entretien/Maintenance'           => 'Entretien/Maintenance',
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

    // type_travaux
    $type_travaux = new Zend_Form_Element_Select('type_travaux');
    $type_travaux->setLabel('Type de Travaux')
      ->setBelongsTo('Piscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // forme_piscine
    $forme_piscine = new Zend_Form_Element_Select('forme_piscine');
    $forme_piscine->setLabel('Forme de la Piscine')
      ->setBelongsTo('Piscine')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_forme_piscine);

    // securite_piscine
    $securite_piscine = new Zend_Form_Element_Select('securite_piscine');
    $securite_piscine->setLabel('Comment souhaitez vous sécuriser votre Piscine')
      ->setBelongsTo('Piscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_securite_piscine);

    // type_piscine
    $type_piscine = new Zend_Form_Element_Select('type_piscine');
    $type_piscine->setLabel('Type de la piscine')
      ->setBelongsTo('Piscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_piscine);


    // dimension
    $dimension = new Zend_Form_Element_Text('dimension');
    $dimension->setLabel('Dimensions approximatives souhaitées')
      ->setBelongsTo('Piscine')
      ->addFilters($default_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $forme_piscine,
      $securite_piscine,
      $type_piscine,
      $dimension,
      $submit,
    ]);

    parent::init();

  }

}
