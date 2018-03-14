<?php


/**
 * Class Auth_Form_Veranda
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Veranda extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_travaux = [
    ''    => 'Veuillez préciser',
    'Remplacement' => 'Remplacement',
    'Installation Neuve' => 'Installation Neuve',
    'Réparation' => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
    'Autre' => 'Autre',

  ];


  private $_depose_existant = [
    ''               => 'Veuillez préciser',
    'Oui'   => 'Oui',
    'Non' => 'Non',
  ];

  private $_type_veranda = [
    ''          => 'Veuillez préciser',
    'Aluminium' => 'Aluminium',
    'Bois'   => 'Bois',
    'PVC'  => 'PVC',
    'Fer Forgé'     => 'Fer Forgé',
    'En Kit'     => 'En Kit',
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

    // type_travaux
    $type_travaux = new Zend_Form_Element_Select('type_travaux');
    $type_travaux->setLabel('Type de Travaux')
      ->setBelongsTo('Veranda')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);
  
    // depose_existant
    $depose_existant = new Zend_Form_Element_Select('depose_existant');
    $depose_existant->setLabel("Dépose d'une Véranda existante ?")
      ->setBelongsTo('Veranda')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_depose_existant);

    // type_veranda
    $type_veranda = new Zend_Form_Element_Select('type_veranda');
    $type_veranda->setLabel('Type de Véranda')
      ->setBelongsTo('Veranda')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_veranda);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $depose_existant,
      $type_veranda,
      $submit,
    ]);

    parent::init();

  }

}
