<?php


/**
 * Class Auth_Form_Facade
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    24/12/17
 */
class Auth_Form_Facade extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_etat_general = [
    ''                  => 'Veuillez préciser',
    'Bon état'          => 'Bon état',
    'Mauvais état'      => 'Mauvais état',
    'Très mauvais état' => 'Très mauvais état',
  ];
  
  
  private $_type_facade = [
    ''               => 'Veuillez préciser',
    'En brique'      => 'En brique',
    'En parpaing'    => 'En parpaing',
    'En béton'       => 'En béton',
    'En pierre'      => 'En pierre',
    'Je ne sais pas' => 'Je ne sais pas',
    'Autre'          => 'Autre',
  ];
  
  private $_revetement_actuel = [
    ''                => 'Veuillez préciser',
    'Crépis'          => 'Crépis',
    'Peinture'        => 'Peinture',
    'Ciment lisse'    => 'Ciment lisse',
    'Aucun'           => 'Aucun',
    'Je ne sais pas ' => 'Je ne sais pas ',
    'Autre'           => 'Autre',
  ];
  
  private $_changer_menuiseries = [
    ''         => 'Veuillez préciser',
    'Oui'      => 'Oui',
    'Précisez' => 'Précisez',
    'Non'      => 'Non',
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
    
    $select_filters = [ 'StripTags' ];
    
    // etat_general
    $etat_general = new Zend_Form_Element_Select( 'etat_general' );
    $etat_general->setLabel( 'État général du bien concerné' )
                 ->setBelongsTo( 'Facade' )
                 ->addFilters( $select_filters )
                 ->addMultiOptions( $this->_etat_general );
    
    // type_facade
    $type_facade = new Zend_Form_Element_Select( 'type_facade' );
    $type_facade->setLabel( 'Type de façade' )
                ->setBelongsTo( 'Facade' )
                ->addFilters( $select_filters )
                ->addMultiOptions( $this->_type_facade );
    
    // revetement_actuel
    $revetement_actuel = new Zend_Form_Element_Select( 'revetement_actuel' );
    $revetement_actuel->setLabel( 'Révêtement actuel' )
                      ->setBelongsTo( 'Facade' )
                      ->addFilters( $select_filters )
                      ->addMultiOptions( $this->_revetement_actuel );
    
    // changer_menuiseries
    $changer_menuiseries = new Zend_Form_Element_Select( 'changer_menuiseries' );
    $changer_menuiseries->setLabel( 'Les menuiseries sont-elles à changer (fenêtres, portes, volets) ?' )
                        ->setBelongsTo( 'Facade' )
                        ->addFilters( $select_filters )
                        ->addMultiOptions( $this->_changer_menuiseries );
    
    // hauteur_batiement
    $hauteur_batiement = new Zend_Form_Element_Text( 'hauteur_batiement' );
    $hauteur_batiement->setLabel( 'Hauteur du bâtiment' )
                      ->setBelongsTo( 'Facade' )
                      ->addFilters( $default_filters );
    
    // preciser_menuiseries
    $preciser_menuiseries = new Zend_Form_Element_Text( 'preciser_menuiseries' );
    $preciser_menuiseries->setLabel( 'Les menuiseries à changer' )
                         ->setBelongsTo( 'Facade' )
                         ->addFilters( $default_filters );
    
    // surface_totale
    $surface_totale = new Zend_Form_Element_Text( 'surface_totale' );
    $surface_totale->setLabel( 'Surface totale' )
                   ->setBelongsTo( 'Facade' )
                   ->addFilters( $default_filters );
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    
    $this->addElements( [
      $etat_general,
      $type_facade,
      $revetement_actuel,
      $changer_menuiseries,
      $hauteur_batiement,
      $surface_totale,
      $preciser_menuiseries,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
