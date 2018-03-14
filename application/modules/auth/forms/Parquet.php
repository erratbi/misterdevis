<?php


/**
 * Class Auth_Form_Parquet
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_Parquet extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_renovation_souhaite = [
    ''    => 'Veuillez préciser',
    'Rénovation complète' => 'Rénovation complète',
    'Ponçage' => 'Ponçage',
    'Vitrification' => 'Vitrification',
    'Réparation' => 'Réparation',
    'Autre' => 'Autre',

  ];

  private $_nbre_piece = [
    ''    => 'Veuillez préciser',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    'Plus de 5' => 'Plus de 5',

  ];

  private $_enlevement_revetement = [
    ''    => 'Veuillez préciser',
    'Oui' => 'Oui',
    'Non' => 'Non',

  ];

  private $_type_pose = [
    ''    => 'Veuillez préciser',
    'Parquet flottant' => 'Parquet flottant',
    'Parquet collé' => 'Parquet collé',
    'Parquet cloué' => 'Parquet cloué',
    'Non défini' => 'Non défini',
    'Autre' => 'Autre',

  ];

   private $_type_parquet = [
    ''    => 'Veuillez préciser',
    'Massif' => 'Massif',
    'Contrecollé' => 'Contrecollé',
    'Stratifié' => 'Stratifié',
    'Non défini' => 'Non défini',
    'Autre' => 'Autre',

  ];

  private $_finition = [
    ''    => 'Veuillez préciser',
    'Bois brut' => 'Bois brut',
    'Bois verni' => 'Bois verni',
    'Bois huilé' => 'Bois huilé',
    'Je ne sais pas' => 'Je ne sais pas',
    'Autre' => 'Autre',

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

    // renovation_souhaite
    $renovation_souhaite = new Zend_Form_Element_Select('renovation_souhaite');
    $renovation_souhaite->setLabel('Rénovation, prestation souhaitée')
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_renovation_souhaite);
  
    // nbre_piece
    $nbre_piece = new Zend_Form_Element_Select('nbre_piece');
    $nbre_piece->setLabel("Nombre de pièces concernées")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_nbre_piece);

    // surface_totale
    $surface_totale = new Zend_Form_Element_Text('surface_totale');
    $surface_totale->setLabel("Surface totale concernée")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters);

    // enlevement_revetement
    $enlevement_revetement = new Zend_Form_Element_Select('enlevement_revetement');
    $enlevement_revetement->setLabel("Enlèvement du revêtement actuel ?")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_enlevement_revetement);

    // type_pose
    $type_pose = new Zend_Form_Element_Select('type_pose');
    $type_pose->setLabel("Type de pose souhaitée")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_pose);

    // type_parquet
    $type_parquet = new Zend_Form_Element_Select('type_parquet');
    $type_parquet->setLabel("Type de Parquet souhaité")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_parquet);

    // finition
    $finition = new Zend_Form_Element_Select('finition');
    $finition->setLabel("Finition du Parquet")
      ->setBelongsTo('Parquet')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_finition);

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $renovation_souhaite,
      $nbre_piece,
      $surface_totale,
      $enlevement_revetement,
      $type_pose,
      $type_parquet,
      $finition,
      $submit,
    ]);

    parent::init();

  }

}
