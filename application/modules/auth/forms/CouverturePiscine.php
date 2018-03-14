<?php


/**
 * Class Auth_Form_CouverturePiscine
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_CouverturePiscine extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */


  private $_forme_piscine = [
    ''               => 'Veuillez préciser',
    'Rectangle'   => 'Rectangle',
    'Ronde' => 'Ronde',
    'Ovale ' => 'Ovale',
    'Haricot' => 'Haricot',
    'Autre' => 'Autre',
    'Je ne sais pas' => 'Je ne sais pas',
  ];

  private $_type_piscine = [
    ''          => 'Veuillez préciser',
    'Piscine Béton' => 'Piscine Béton',
    'Piscine à Coque Polyester'   => 'Piscine à Coque Polyester',
    'Piscine Bois'  => 'Piscine Bois',
    'Piscine Hors Sol'  => 'Piscine Hors Sol',
    'Autre'     => 'Autre',
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

    // forme_piscine
    $forme_piscine = new Zend_Form_Element_Select('forme_piscine');
    $forme_piscine->setLabel("Forme de la Piscine")
      ->setBelongsTo('CouverturePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_forme_piscine);

    // type_piscine
    $type_piscine = new Zend_Form_Element_Select('type_piscine');
    $type_piscine->setLabel('Type de Piscine')
      ->setBelongsTo('CouverturePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_piscine);

    // dimension
    $dimension = new Zend_Form_Element_Text('dimension');
    $dimension->setLabel("Dimensions de la Piscine")
      ->setBelongsTo('CouverturePiscine')
      ->addFilters($select_filters);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $forme_piscine,
      $type_piscine,
      $dimension,
      $submit,
    ]);

    parent::init();

  }

}
