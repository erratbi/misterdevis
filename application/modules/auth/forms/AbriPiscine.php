<?php


/**
 * Class Auth_Form_Abri_piscine
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_AbriPiscine extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_travaux = [
    ''    => 'Veuillez préciser',
    'Installation Neuve' => 'Remplacement',
    'Remplacement' => 'Installation Neuve',
    'Réparation' => 'Réparation',
    'Autre' => 'Autre',

  ];


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
    'Autre'     => 'Autre',
  ];

  private $_type_abri = [
    ''          => 'Veuillez préciser',
    'Abri Haut' => 'Abri Haut',
    'Abri Bas'   => 'Abri Bas',
    'Abri télescopique'  => 'Abri télescopique',
    'Autre'     => 'Autre',
    'Je ne sais pas'     => 'Je ne sais pas',
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
      ->setBelongsTo('AbriPiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);
  
    // forme_piscine
    $forme_piscine = new Zend_Form_Element_Select('forme_piscine');
    $forme_piscine->setLabel("Forme de la Piscine")
      ->setBelongsTo('AbriPiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_forme_piscine);

    // type_piscine
    $type_piscine = new Zend_Form_Element_Select('type_piscine');
    $type_piscine->setLabel('Type de Piscine')
      ->setBelongsTo('AbriPiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_piscine);

    // type_abri
    $type_abri = new Zend_Form_Element_Select('type_abri');
    $type_abri->setLabel("Type d'Abri")
      ->setBelongsTo('AbriPiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_abri);

    // dimension_piscine
    $dimension_piscine = new Zend_Form_Element_Text('dimension_piscine');
    $dimension_piscine->setLabel("Dimensions de la Piscine")
      ->setBelongsTo('AbriPiscine')
      ->addFilters($select_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $forme_piscine,
      $type_piscine,
      $type_abri,
      $dimension_piscine,
      $submit,
    ]);

    parent::init();

  }

}
