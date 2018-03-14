<?php


/**
 * Class Auth_Form_Carrelage
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Carrelage extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_travaux = [
    ''    => 'Veuillez préciser',
    'Carrelage Intérieur' => 'Carrelage Intérieur',
    'Carrelage Extérieur' => 'Carrelage Extérieur',

  ];


  private $_enlevement_revetement = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
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
      ->setBelongsTo('Carrelage')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // surface_totale
    $surface_totale = new Zend_Form_Element_Text('surface_totale');
    $surface_totale->setLabel('Surface totale à carreler')
      ->setBelongsTo('Carrelage')
      ->addFilters($select_filters);
  
    // enlevement_revetement
    $enlevement_revetement = new Zend_Form_Element_Select('enlevement_revetement');
    $enlevement_revetement->setLabel('Enlevement du revêtement actuel')
      ->setBelongsTo('Carrelage')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_enlevement_revetement);

    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel('Nombre de pièces')
      ->setBelongsTo('Carrelage')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_piece);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $surface_totale,
      $enlevement_revetement,
      $nbre_piece,
      $submit,
    ]);

    parent::init();

  }

}
