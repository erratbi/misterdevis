<?php


/**
 * Class Auth_Form_Sauna
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    25/12/17
 */
class Auth_Form_Sauna extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */


  private $_niveau_gamme = [
    ''               => 'Veuillez préciser',
    'Premier Prix'   => 'Premier Prix',
    'Moyen de Gamme' => 'Moyen de Gamme',
    'Haut de Gamme'  => 'Haut de Gamme',
  ];

  private $_surface_au_sol = [
    ''              => 'Veuillez préciser',
    'Plus de 5 m²'  => 'Plus de 5 m²',
    'Moins de 5 m²' => 'Moins de 5 m²',
  ];


  private $_travaux_peinture = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_travaux_plomberie = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_travaux_revetement = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_travaux_electricite = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];


  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Créer un Sauna'        => 'Créer un Sauna',
    'Créer un Hammam'       => 'Créer un Hammam',
    'Cabine Infrarouge'     => 'Cabine Infrarouge',
    'Entretien/Maintenance' => 'Entretien/Maintenance',

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
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // niveau_gamme
    $niveau_gamme = new Zend_Form_Element_Select('niveau_gamme');
    $niveau_gamme->setLabel('Niveau de Gamme souhaité')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_niveau_gamme);


    // surface_au_sol
    $surface_au_sol = new Zend_Form_Element_Select('surface_au_sol');
    $surface_au_sol->setLabel('Surface au sol prévue')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_surface_au_sol);

    // travaux_peinture
    $travaux_peinture = new Zend_Form_Element_Select('travaux_peinture');
    $travaux_peinture->setLabel('Travaux de Peinture')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_peinture);

    // travaux_plomberie
    $travaux_plomberie = new Zend_Form_Element_Select('travaux_plomberie');
    $travaux_plomberie->setLabel('Travaux de Plomberie')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_plomberie);

    // travaux_electricite
    $travaux_electricite = new Zend_Form_Element_Select('travaux_electricite');
    $travaux_electricite->setLabel('Travaux d\'Électricité')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_electricite);

    // travaux_revetement
    $travaux_revetement = new Zend_Form_Element_Select('travaux_revetement');
    $travaux_revetement->setLabel('Travaux de revêtement de sol')
      ->setBelongsTo('Sauna')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_revetement);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $niveau_gamme,
      $surface_au_sol,
      $travaux_peinture,
      $travaux_plomberie,
      $travaux_electricite,
      $travaux_revetement,
      $submit,
    ]);

    parent::init();

  }

}
