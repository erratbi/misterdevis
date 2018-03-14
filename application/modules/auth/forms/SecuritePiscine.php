<?php


/**
 * Class Auth_Form_SecuritePiscine
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_SecuritePiscine extends Auth_Form_Base {

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

  private $_securite_piscine = [
    ''          => 'Veuillez préciser',
    'Barrière de Piscine' => 'Barrière de Piscine',
    'Alarme de Piscine'   => 'Alarme de Piscine',
    'Couverture de Piscine'  => 'Couverture de Piscine',
    'Abri de Piscine'  => 'Abri de Piscine',
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

    // forme_piscine
    $forme_piscine = new Zend_Form_Element_Select('forme_piscine');
    $forme_piscine->setLabel("Forme de la Piscine")
      ->setBelongsTo('SecuritePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_forme_piscine);

    // securite
    $securite = new Zend_Form_Element_Select('securite');
    $securite->setLabel('Comment souhaitez vous sécuriser votre Piscine ?')
      ->setBelongsTo('SecuritePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_securite_piscine);

    // dimension
    $dimension = new Zend_Form_Element_Text('dimension');
    $dimension->setLabel("Dimensions de la Piscine")
      ->setBelongsTo('SecuritePiscine')
      ->addFilters($select_filters);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $forme_piscine,
      $securite,
      $dimension,
      $submit,
    ]);

    parent::init();

  }

}
