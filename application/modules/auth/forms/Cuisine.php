<?php


/**
 * Class Auth_Form_Cuisine
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Cuisine extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_depose_ancienne_cuisine = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];


  private $_niveau_gamme_souhaite = [
    ''               => 'Veuillez préciser',
    'Premier Prix'   => 'Premier Prix',
    'Moyen de Gamme' => 'Moyen de Gamme',
    'Haut de Gamme'  => 'Haut de Gamme',
  ];

  private $_style_futur_cuisine = [
    ''          => 'Veuillez préciser',
    'Classique' => 'Classique',
    'Moderne'   => 'Moderne',
    'Rustique'  => 'Rustique',
    'Autre'     => 'Autre',
  ];


  private $_surface_au_sol_cuisine = [
    ''              => 'Veuillez préciser',
    'Plus de 7 m²'  => 'Plus de 7 m²',
    'Moins de 7 m²' => 'Moins de 7 m²',
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


  private $_travaux_revetement_sol = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_travaux_electricite = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];


  private $_equipement_electromenager = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_type_travaux = [
    ''                                => 'Veuillez préciser',
    'Installer une Cuisine Neuve'     => 'Installer une Cuisine Neuve',
    'Remplacer une Cuisine Existante' => 'Remplacer une Cuisine Existante',
    'Entretien/Maintenance'           => 'Entretien/Maintenance',
  ];

   private $_type_cuisine = [
    ''                                => 'Veuillez préciser',
    'Cuisine'     => 'Cuisine',
    'Cuisine en Kit' => 'Cuisine en Kit',
    'Cuisine sur Mesure'           => 'Cuisine sur Mesure',
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
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // depose_ancienne_cuisine
    $depose_ancienne_cuisine = new Zend_Form_Element_Select('depose_ancienne_cuisine');
    $depose_ancienne_cuisine->setLabel('Dépose de l\'Ancienne Cuisine')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_depose_ancienne_cuisine);

    // niveau_gamme_souhaite
    $niveau_gamme_souhaite = new Zend_Form_Element_Select('niveau_gamme_souhaite');
    $niveau_gamme_souhaite->setLabel('Niveau de Gamme souhaité')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_niveau_gamme_souhaite);

    // style_futur_cuisine
    $style_futur_cuisine = new Zend_Form_Element_Select('style_futur_cuisine');
    $style_futur_cuisine->setLabel('Style de votre future Cuisine')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_style_futur_cuisine);

    // surface_au_sol_cuisine
    $surface_au_sol_cuisine = new Zend_Form_Element_Select('surface_au_sol_cuisine');
    $surface_au_sol_cuisine->setLabel('Surface au sol de la Cuisine')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_surface_au_sol_cuisine);

    // travaux_peinture
    $travaux_peinture = new Zend_Form_Element_Select('travaux_peinture');
    $travaux_peinture->setLabel('Travaux de Peinture')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_peinture);

    // travaux_plomberie
    $travaux_plomberie = new Zend_Form_Element_Select('travaux_plomberie');
    $travaux_plomberie->setLabel('Travaux de Plomberie')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_plomberie);

    // travaux_electricite
    $travaux_electricite = new Zend_Form_Element_Select('travaux_electricite');
    $travaux_electricite->setLabel('Travaux d\'Électricité')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_electricite);

    // travaux_revetement_sol
    $travaux_revetement_sol = new Zend_Form_Element_Select('travaux_revetement_sol');
    $travaux_revetement_sol->setLabel('Travaux de revêtement de sol')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_revetement_sol);

    // equipement_electromenager
    $equipement_electromenager = new Zend_Form_Element_Select('equipement_electromenager');
    $equipement_electromenager->setLabel('Équipement Électroménager')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_equipement_electromenager);


    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text('hauteur_sous_plafond');
    $hauteur_sous_plafond->setLabel('Hauteur sous plafond')
      ->setBelongsTo('Cuisine')
      ->addFilters($default_filters);


    // type_cuisine
    $type_cuisine = new Zend_Form_Element_Select('type_cuisine');
    $type_cuisine->setLabel('Type de cuisine')
      ->setBelongsTo('Cuisine')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_cuisine);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $depose_ancienne_cuisine,
      $niveau_gamme_souhaite,
      $style_futur_cuisine,
      $surface_au_sol_cuisine,
      $travaux_peinture,
      $travaux_plomberie,
      $travaux_electricite,
      $travaux_revetement_sol,
      $equipement_electromenager,
      $hauteur_sous_plafond,
      $type_cuisine,
      $submit,
    ]);

    parent::init();

  }

}
