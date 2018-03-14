<?php


/**
 * Class Auth_Form_Sallebain
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Sallebain extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_depose_ancienne_salle = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];


  private $_niveau_gamme = [
    ''               => 'Veuillez préciser',
    'Premier Prix'   => 'Premier Prix',
    'Moyen de Gamme' => 'Moyen de Gamme',
    'Haut de Gamme'  => 'Haut de Gamme',
  ];

  private $_equipement_futur_salle = [
    ''                => 'Veuillez préciser',
    'Baignoire'       => 'Baignoire',
    'Douche'          => 'Douche',
    'Vasque'          => 'Vasque',
    'WC'              => 'WC',
    'Bidet'           => 'Bidet',
    'Sèche-Serviette' => 'Sèche-Serviette',
    'Autre'           => 'Autre',
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


  private $_meuble_rengement = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',
  ];


  private $_type_travaux = [
    ''                                     => 'Veuillez préciser',
    'Créer une Salle de Bains neuve'       => 'Créer une Salle de Bains neuve',
    'Rénover une salle de bains existante' => 'Rénover une salle de bains existante',
    'Entretien/Maintenance'                => 'Entretien/Maintenance',
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
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // depose_ancienne_salle
    $depose_ancienne_salle = new Zend_Form_Element_Select('depose_ancienne_salle');
    $depose_ancienne_salle->setLabel('Dépose de l\'Ancienne Salle de Bains')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_depose_ancienne_salle);

    // niveau_gamme
    $niveau_gamme = new Zend_Form_Element_Select('niveau_gamme');
    $niveau_gamme->setLabel('Niveau de Gamme souhaité')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_niveau_gamme);

    // equipement_futur_salle
    $equipement_futur_salle = new Zend_Form_Element_Select('equipement_futur_salle');
    $equipement_futur_salle->setLabel('Équipement de votre future Salle de Bains')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_equipement_futur_salle);

    // surface_au_sol
    $surface_au_sol = new Zend_Form_Element_Select('surface_au_sol');
    $surface_au_sol->setLabel('Surface au sol de la Salle de Bains')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_surface_au_sol);

    // travaux_peinture
    $travaux_peinture = new Zend_Form_Element_Select('travaux_peinture');
    $travaux_peinture->setLabel('Travaux de Peinture')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_peinture);

    // travaux_plomberie
    $travaux_plomberie = new Zend_Form_Element_Select('travaux_plomberie');
    $travaux_plomberie->setLabel('Travaux de Plomberie')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_plomberie);

    // travaux_electricite
    $travaux_electricite = new Zend_Form_Element_Select('travaux_electricite');
    $travaux_electricite->setLabel('Travaux d\'Électricité')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_electricite);

    // travaux_revetement
    $travaux_revetement = new Zend_Form_Element_Select('travaux_revetement');
    $travaux_revetement->setLabel('Travaux de revêtement de sol')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_travaux_revetement);

    // meuble_rengement
    $meuble_rengement = new Zend_Form_Element_Select('meuble_rengement');
    $meuble_rengement->setLabel('Meubles de Rangement')
      ->setBelongsTo('Sallebain')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_meuble_rengement);


    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text('hauteur_sous_plafond');
    $hauteur_sous_plafond->setLabel('Hauteur sous plafond')
      ->setBelongsTo('Sallebain')
      ->addFilters($default_filters);


    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $depose_ancienne_salle,
      $niveau_gamme,
      $equipement_futur_salle,
      $surface_au_sol,
      $travaux_peinture,
      $travaux_plomberie,
      $travaux_electricite,
      $travaux_revetement,
      $meuble_rengement,
      $hauteur_sous_plafond,
      $submit,
    ]);

    parent::init();

  }

}
