<?php


/**
 * Class Auth_Form_AbriJardin
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_AbriJardin extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_construction = [
    ''    => 'Veuillez préciser',
    'Tradionnelle (Parpaing)' => 'Tradionnelle (Parpaing)',
    'En Brique' => 'En Brique',
    'Ossature Bois' => 'Ossature Bois',
    'Autre' => 'Autre',

  ];


  private $_prevoir_chape = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
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

    // type_construction
    $type_construction = new Zend_Form_Element_Select('type_construction');
    $type_construction->setLabel('Type de Construction')
      ->setBelongsTo('AbriJardin')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_construction);
  
    // surface_prevue
    $surface_prevue = new Zend_Form_Element_Text('surface_prevue');
    $surface_prevue->setLabel("Surface prévue pour l'Abri")
      ->setBelongsTo('AbriJardin')
      ->addFilters($select_filters);

    // prevoir_chape
    $prevoir_chape = new Zend_Form_Element_Select('prevoir_chape');
    $prevoir_chape->setLabel('Faut-il prévoir une chape ?')
      ->setBelongsTo('AbriJardin')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_prevoir_chape);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_construction,
      $surface_prevue,
      $prevoir_chape,
      $submit,
    ]);

    parent::init();

  }

}
