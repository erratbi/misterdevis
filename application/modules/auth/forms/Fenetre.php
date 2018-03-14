<?php


/**
 * Class Auth_Form_Fenetre
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Fenetre extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_nbre_fenetre = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];


  private $_depose_fenetre_existant = [
    ''  => 'Veuillez préciser',
    '1' => 'Oui',
    '0' => 'Non',
  ];

  private $_type_fenetre = [
    ''                => 'Veuillez préciser',
    'PVC'             => 'PVC',
    'Aluminium'       => 'Aluminium',
    'Bois'            => 'Bois',
    'Je ne sais pas'  => 'Je ne sais pas',
    'Fenêtre de toit' => 'Fenêtre de toit',
  ];

  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
    'Entretien/Maintenance' => 'Entretien/Maintenance',
    'Autre'                 => 'Autre',
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
      ->setBelongsTo('Fenetre')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // nbre_fenetre
    $nbre_fenetre = new Zend_Form_Element_Select('nbre_fenetre');
    $nbre_fenetre->setLabel('Nombre de Fenêtre et porte Fenêtre')
      ->setBelongsTo('Fenetre')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_nbre_fenetre);

    // depose_fenetre_existant
    $depose_fenetre_existant = new Zend_Form_Element_Select('depose_fenetre_existant');
    $depose_fenetre_existant->setLabel('Dépose de Fenêtres existantes ?')
      ->setBelongsTo('Fenetre')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_depose_fenetre_existant);

    // type_fenetre
    $type_fenetre = new Zend_Form_Element_Select('type_fenetre');
    $type_fenetre->setLabel('Quel type de Fenêtres ou Porte Fenêtre ?')
      ->setBelongsTo('Fenetre')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_fenetre);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $type_fenetre,
      $depose_fenetre_existant,
      $nbre_fenetre,
    ]);

    parent::init();

  }

}
