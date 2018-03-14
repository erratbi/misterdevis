<?php


/**
 * Class Auth_Form_Incendie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    26/12/17
 */
class Auth_Form_Incendie extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */


  private $_nbre_piece = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',

  ];


  private $_type_travaux = [
    ''                   => 'Veuillez préciser',
    'Installation neuve' => 'Installation neuve',
    'Remplacement'       => 'Remplacement',
    'Réparation'         => 'Réparation',
    'Autre'              => 'Autre',

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
      ->setBelongsTo('Incendie')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel('Nombre de Pièces')
      ->setBelongsTo('Incendie')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_nbre_piece);


    // surface
    $surface = new Zend_Form_Element_Text('surface');
    $surface->setLabel('Surface en m²')
      ->setBelongsTo('Cuisine')
      ->addFilters($default_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $nbre_piece,
      $surface,
    ]);

    parent::init();

  }

}
