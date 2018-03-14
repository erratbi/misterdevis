<?php


/**
 * Class Auth_Form_Anticalcaire
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Anticalcaire extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_procede_traitement = [
    ''    => 'Veuillez préciser',
    'Électrolise galvanique' => 'Électrolise galvanique',
    'Adoucisseur au sel' => 'Adoucisseur au sel',
    'Système Magnétique' => 'Système Magnétique',
    'Système au CO2' => 'Système au CO2',
    'Je ne sais pas' => 'Je ne sais pas',
    'Autre' => 'Autre',

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

    // procede_traitement
    $procede_traitement = new Zend_Form_Element_Select('procede_traitement');
    $procede_traitement->setLabel('Procédé de traiement souhaité')
      ->setBelongsTo('Anticalcaire')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_procede_traitement);
  
    // annee_construction
    $annee_construction = new Zend_Form_Element_Text('annee_construction');
    $annee_construction->setLabel("Année de construction")
      ->setBelongsTo('Anticalcaire')
      ->addFilters($select_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $procede_traitement,
      $annee_construction,
      $submit,
    ]);

    parent::init();

  }

}
