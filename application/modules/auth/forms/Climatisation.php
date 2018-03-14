<?php


/**
 * Class Auth_Form_Climatisation
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Climatisation extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_accord_copropriete = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];


  private $_nbre_piece = [
    ''          => 'Veuillez préciser',
    '1'         => '1',
    '2'         => '2',
    '3'         => '3',
    '4'         => '4',
    '5'         => '5',
    'Plus de 5' => 'Plus de 5',
  ];

  private $_type_travaux = [
    ''                      => 'Veuillez préciser',
    'Remplacement'          => 'Remplacement',
    'Installation Neuve'    => 'Installation Neuve',
    'Réparation'            => 'Réparation',
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
      ->setBelongsTo('Climatisation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_travaux);

    // accord_copropriete
    $accord_copropriete = new Zend_Form_Element_Select('accord_copropriete');
    $accord_copropriete->setLabel('Accord Copropriété')
      ->setBelongsTo('Climatisation')
      ->addFilters($select_filters)
      ->setAttrib('slugify', true)
      ->addMultiOptions($this->_accord_copropriete);

    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel('Nombre de pièces à Climatiser et à Chauffer')
      ->setBelongsTo('Climatisation')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_piece);

    // hauteur_plafond
    $hauteur_plafond = new Zend_Form_Element_Text('hauteur_plafond');
    $hauteur_plafond->setLabel('Hauteur sous plafond')
      ->setBelongsTo('Climatisation')
      ->addFilters($default_filters);

    // surface_climatiser
    $surface_climatiser = new Zend_Form_Element_Text('surface_climatiser');
    $surface_climatiser->setLabel('Surface totale à Climatiser et à Chauffer')
      ->setBelongsTo('Climatisation')
      ->addFilters($default_filters);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_travaux,
      $accord_copropriete,
      $nbre_piece,
      $hauteur_plafond,
      $surface_climatiser,
      $submit,
    ]);

    parent::init();

  }

}
