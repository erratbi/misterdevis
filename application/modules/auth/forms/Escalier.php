<?php


/**
 * Class Auth_Form_Escalier
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Escalier extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_escalier = [
    ''    => 'Veuillez préciser',
    'Droit' => 'Droit',
    'Tournant/Courbé' => 'Tournant/Courbé',
    'En colimaçon' => 'En colimaçon',
    'Autre' => 'Autre',

  ];


  private $_escalier_creer = [
    ''               => 'Veuillez préciser',
    'Extérieur'   => 'Extérieur',
    'Intérieur' => 'Intérieur',
  ];

  private $_percer_plafond = [
    ''          => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non'   => 'Non',
  ];

  private $_preference = [
    ''          => 'Veuillez préciser',
    'Classique' => 'Classique',
    'Moderne'   => 'Moderne',
  ];

  private $_largeur = [
    ''          => 'Veuillez préciser',
    'Etroit (60 cm à 70 cm)' => 'Etroit (60 cm à 70 cm)',
    'Standard (70 cm à 100 cm)'   => 'Standard (70 cm à 100 cm)',
    'Large (100 cm à 150 cm)'   => 'Large (100 cm à 150 cm)',
    'Très Large (+ de 150 cm)'   => 'Très Large (+ de 150 cm)',
  ];

  private $_nbre_etage = [
    ''               => 'Veuillez préciser',
    '1'   => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    'Plus de 5' => 'Plus de 5',
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

    // type_escalier
    $type_escalier = new Zend_Form_Element_Select('type_escalier');
    $type_escalier->setLabel('Type d\'escalier')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_escalier);

    // hauteur
    $hauteur = new Zend_Form_Element_Text('hauteur');
    $hauteur->setLabel('Hauteur de l\'escalier')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters);
  
    // escalier_creer
    $escalier_creer = new Zend_Form_Element_Select('escalier_creer');
    $escalier_creer->setLabel('L\'escalier à créer est à')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_escalier_creer);

    // percer_plafond
    $percer_plafond = new Zend_Form_Element_Select('percer_plafond');
    $percer_plafond->setLabel('Faut-il percer le plafond ou le plancher ?')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_percer_plafond);

    // preference
    $preference = new Zend_Form_Element_Select('preference');
    $preference->setLabel('Votre Préférence Esthétique est')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_preference);

    // largeur
    $largeur = new Zend_Form_Element_Select('largeur');
    $largeur->setLabel('Quelle est la largeur de votre Escalier ?')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_largeur);

    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select('nbre_etage');
    $nbre_etage->setLabel('Nombre d\'étages')
      ->setBelongsTo('Escalier')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_etage);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_escalier,
      $escalier_creer,
      $hauteur,
      $percer_plafond,
      $preference,
      $largeur,
      $nbre_etage,
      $submit,
    ]);

    parent::init();

  }

}
