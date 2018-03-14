<?php


/**
 * Class Auth_Form_TerrassePiscine
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_TerrassePiscine extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_piscine_construite = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
    'En Cours' => 'En Cours',

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

  private $_prevoir_chape = [
    ''          => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non'   => 'Non',
    'Je ne sais pas'  => 'Je ne sais pas',
  ];

  private $_type_materiau = [
    ''          => 'Veuillez préciser',
    'Béton' => 'Béton',
    'Bois'   => 'Bois',
    'Bois Éxotique'  => 'Bois Éxotique',
    'Grès'     => 'Grès',
    'Pierre Naturelle ou Reconstituée'     => 'Pierre Naturelle ou Reconstituée',
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

    // piscine_construite
    $piscine_construite = new Zend_Form_Element_Select('piscine_construite');
    $piscine_construite->setLabel('Votre Piscine es-elle Construite ?')
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_piscine_construite);
  
    // forme_piscine
    $forme_piscine = new Zend_Form_Element_Select('forme_piscine');
    $forme_piscine->setLabel("Forme de la Piscine")
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_forme_piscine);

    // prevoir_chape
    $prevoir_chape = new Zend_Form_Element_Select('prevoir_chape');
    $prevoir_chape->setLabel('Faut-il prévoir une chape ?')
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_prevoir_chape);

    // type_materiau
    $type_materiau = new Zend_Form_Element_Select('type_materiau');
    $type_materiau->setLabel("Type de Matériaux")
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_materiau);

    // dimension
    $dimension = new Zend_Form_Element_Text('dimension');
    $dimension->setLabel("Dimensions de la Piscine")
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters);

    // surface
    $surface = new Zend_Form_Element_Text('surface');
    $surface->setLabel("Surface prévue pour la Terrasse")
      ->setBelongsTo('TerrassePiscine')
      ->addFilters($select_filters);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $piscine_construite,
      $forme_piscine,
      $dimension,
      $surface,
      $prevoir_chape,
      $type_materiau,
      $submit,
    ]);

    parent::init();

  }

}
