<?php


/**
 * Class Auth_Form_PoeleGranule
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_PoeleGranule extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_conduite_fume = [
    ''    => 'Veuillez préciser',
    'Déjà posé' => 'Déjà posé',
    'Pas encore posé' => 'Pas encore posé',
    'A remplacer' => 'A remplacer',
    'A réparer' => 'A réparer',
    'A nettoyer' => 'A nettoyer',

  ];


  private $_nbre_etage = [
    ''               => 'Veuillez préciser',
    'Plain-pied'   => 'Plain-pied',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    'Plus de 3' => 'Plus de 3',
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

    // conduite_fume
    $conduite_fume = new Zend_Form_Element_Select('conduite_fume');
    $conduite_fume->setLabel('Conduite de Fumée')
      ->setBelongsTo('PoeleGranule')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_conduite_fume);

    // nbre_etage
    $nbre_etage = new Zend_Form_Element_Select('nbre_etage');
    $nbre_etage->setLabel('Nombre d\'Étage à Chauffer')
      ->setBelongsTo('PoeleGranule')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_etage);
  
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text('surface_totale');
    $surface_totale->setLabel("Surface totale à Chauffer")
      ->setBelongsTo('PoeleGranule')
      ->addFilters($select_filters);

    // hauteur_sous_plafond
    $hauteur_sous_plafond = new Zend_Form_Element_Text('hauteur_sous_plafond');
    $hauteur_sous_plafond->setLabel("Hauteur sous plafond")
      ->setBelongsTo('PoeleGranule')
      ->addFilters($select_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $conduite_fume,
      $nbre_etage,
      $surface_totale,
      $hauteur_sous_plafond,
      $submit,
    ]);

    parent::init();

  }

}
