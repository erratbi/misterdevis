<?php


/**
 * Class Auth_Form_Isolation
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Isolation extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_travaux = [
    ''    => 'Veuillez préciser',
    'Neuf' => 'Neuf',
    'Rénovation' => 'Rénovation',
    'Extension'  => 'Extension',
    'Autre'       => 'Autre',

  ];


  private $_categorie_isolation = [
    ''               => 'Veuillez préciser',
    'Isolation de combles'   => 'Isolation de combles',
    'Isolation Phonique, Acoustique' => 'Isolation Phonique, Acoustique',
    'Isolation Thermique' => 'Isolation Thermique',
    "Isolation par l'extèrieur" => "Isolation par l'extèrieur",
  ];

  private $_type_comble = [
    ''               => 'Veuillez préciser',
    'Combles aménageables'   => 'Combles aménageables',
    'Combles non aménageobles' => 'Combles non aménageobles',
    'Je ne sais pas' => 'Je ne sais pas',
  ];

  private $_type_isolant = [
    ''               => 'Veuillez préciser',
    'Laine de verre'   => 'Laine de verre',
    'Panneaux isolant naturel' => 'Panneaux isolant naturel',
    'Polystyrène' => 'Polystyrène',
    'Isolant mince' => 'Isolant mince',
    'Autre ' => 'Autre',
    'Je ne sais pas ' => 'Je ne sais pas',
  ];

  private $_type_isolation = [
    ''               => 'Veuillez préciser',
    "Isolation par l'intérieur"   => "Isolation par l'intérieur",
    "Isolation par l'extérieur" => "Isolation par l'extérieur",
    'Je ne sais pas' => 'Je ne sais pas',
  ];

  private $_nbre_piece = [
    ''          => 'Veuillez préciser',
    '1' => '1',
    '2'   => '2',
    '3'  => '3',
    '4'     => '4',
    '5'     => '5',
    'Plus de 5'     => 'Plus de 5',
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
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // surface_totale
    $surface_totale = new Zend_Form_Element_Text('surface_totale');
    $surface_totale->setLabel('Surface à isoler')
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters);
  
    // categorie_isolation
    $categorie_isolation = new Zend_Form_Element_Select('categorie_isolation');
    $categorie_isolation->setLabel("Catégorie d'solation")
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_categorie_isolation);

    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel('Nombre de pièces')
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_piece);

    // type_comble
    $type_comble = new Zend_Form_Element_Select('type_comble');
    $type_comble->setLabel('Type de Combles')
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_comble);

    // type_isolant
    $type_isolant = new Zend_Form_Element_Select('type_isolant');
    $type_isolant->setLabel("Type d'isolant souhaité")
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_isolant);

    // type_isolation
    $type_isolation = new Zend_Form_Element_Select('type_isolation');
    $type_isolation->setLabel("Type d'isolation")
      ->setBelongsTo('Isolation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_isolation);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $surface_totale,
      $categorie_isolation,
      $nbre_piece,
      $type_comble,
      $type_isolation,
      $type_isolant,
      $submit,
    ]);

    parent::init();

  }

}
