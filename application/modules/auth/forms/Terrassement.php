<?php


/**
 * Class Auth_Form_Terrassement
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Terrassement extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_permis_construire = [
    ''    => 'Veuillez préciser',
    'Oui, je l\'ai obtenu' => 'Oui, je l\'ai obtenu',
    'Oui, j\'attends la réponse' => 'Oui, j\'attends la réponse',
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

    // permis_construire
    $permis_construire = new Zend_Form_Element_Select('permis_construire');
    $permis_construire->setLabel('Avez-vous déposé un permis de construire ?')
      ->setBelongsTo('Terrassement')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_permis_construire);
  
    // surface
    $surface = new Zend_Form_Element_Text('surface');
    $surface->setLabel("Surface du terrain à terrasser en m<sup>2</sup>")
      ->setAttrib("Placeholder","Surface du terrain à terrasser")
      ->setBelongsTo('Terrassement')
      ->addFilters($select_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $permis_construire,
      $surface,
      $submit,
    ]);

    parent::init();

  }

}
