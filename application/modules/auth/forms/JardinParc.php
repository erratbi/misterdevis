<?php


/**
 * Class Auth_Form_JardinParc
 *
 * @author  Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date    25/01/2018
 */
class Auth_Form_JardinParc extends Auth_Form_Base {

  /**
   * @throws \Zend_Form_Exception
   */

  private $_type_lieu = [
    ''    => 'Veuillez préciser',
    'Jardin privé' => 'Jardin privé',
    'Jardin Public' => 'Jardin Public',
    'Stade' => 'Stade',
    'Golf' => 'Golf',
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

    // type_lieu
    $type_lieu = new Zend_Form_Element_Select('type_lieu');
    $type_lieu->setLabel('Type de lieu')
      ->setBelongsTo('JardinParc')
      ->addFilters($select_filters)
      ->addMultiOptions($this->_type_lieu);
  
    // surface
    $surface = new Zend_Form_Element_Text('surface');
    $surface->setLabel("Surface du lieu")
      ->setBelongsTo('JardinParc')
      ->addFilters($select_filters);

    // description
    $description = new Zend_Form_Element_Textarea( 'description' );
    $description->setLabel( 'Décrivez précisement ce que vous souhaitez' )
                ->setBelongsTo( 'JardinParc' )
                ->setAttribs( [ 'rows' => 5 ] )
                ->addFilters( $default_filters );

    // Submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Envoyer')
      ->setAttribs(['class' => 'btn btn-primary btn-block']);

    $this->addElements([
      $type_lieu,
      $surface,
      $description,
      $submit,
    ]);

    parent::init();

  }

}
