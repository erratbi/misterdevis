<?php


/**
 * Class Auth_Form_CloisonPlatre
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_CloisonPlatre extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_faux_plafond = [
    ''    => 'Veuillez préciser',
    'Plaque de Plâtre' => 'Plaque de Plâtre',
    'Tissu tendu' => 'Tissu tendu',
    'Plafond Rayonnant' => 'Plafond Rayonnant',
    'Je ne sais pas' => 'Je ne sais pas',
    'Autre' => 'Autre',

  ];


  private $_nbre_piece = [
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

    // surface_placo
    $surface_placo = new Zend_Form_Element_Text('surface_placo');
    $surface_placo->setLabel('Surface Plaques de Plâtre (Placo)')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);
  
    // faux_plafond
    $faux_plafond = new Zend_Form_Element_Select('faux_plafond');
    $faux_plafond->setLabel("Faux Plafond souhaité")
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_faux_plafond);

    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel("Nombre de pièces")
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_piece);

    // surface_plafond
    $surface_plafond = new Zend_Form_Element_Text('surface_plafond');
    $surface_plafond->setLabel('Surface de Plafond')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);

    // type_plafond
    $type_plafond = new Zend_Form_Element_Text('type_plafond');
    $type_plafond->setLabel('Type de Plafond Actuel')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);

    // surface_sol
    $surface_sol = new Zend_Form_Element_Text('surface_sol');
    $surface_sol->setLabel('Surface au sol à cloisonner')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);


    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text('hauteur_sous_plafond');
    $hauteur_sous_plafond->setLabel('Hauteur sous plafond')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);

     // type_cloison
    $type_cloison = new Zend_Form_Element_Text('type_cloison');
    $type_cloison->setLabel('Type de cloison souhaité')
      ->setBelongsTo('CloisonPlatre')
      ->addFilters($select_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $surface_placo,
      $surface_plafond,
      $type_plafond,
      $faux_plafond,
      $surface_sol,
      $hauteur_sous_plafond,
      $type_cloison,
      $nbre_piece,
      $submit,
    ]);

    parent::init();

  }

}
