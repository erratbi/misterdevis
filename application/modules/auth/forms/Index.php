<?php


/**
 * Class Auth_Form_Index
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Index extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_mois = [
    ''    => 'Veuillez préciser',
    '1' => 'Janvier',
    '2' => 'Février',
    '3' => 'Mars',
    '4' => 'Avril',
    '5' => 'Mai',
    '6' => 'Juin',
    '7' => 'Juillet',
    '8' => 'Aôut',
    '9' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',

  ];

  private $_annee = [
    ''  =>   'Veuillez préciser',
    '2017' => '2017',
    '2018' => '2018',
    '2019' => '2019',
    '2020' => '2020',
    '2021' => '2021',
    '2022' => '2022',
    '2023' => '2023',
    '2024' => '2024',
    '2025' => '2025',
    '2026' => '2026',
    '2027' => '2027',
    '2028' => '2028',
    '2029' => '2029',
    '2030' => '2030',
  ];

  private $_artisans = [
    ''  =>   'Veuillez préciser',
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

    // mois
    $mois = new Zend_Form_Element_Select('mois');
    $mois->setLabel('Mois')
      ->setBelongsTo('Index')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_mois);
  
    // annee
    $annee = new Zend_Form_Element_Select('annee');
    $annee->setLabel('Année')
      ->setBelongsTo('Index')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_annee);

    // artisans
    $artisans = new Zend_Form_Element_Select('artisans');
    $artisans->setLabel('Artisan')
      ->setBelongsTo('Index')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_artisans);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $mois,
      $annee,
      $artisans,
      $submit,
    ]);

    parent::init();

  }

}
