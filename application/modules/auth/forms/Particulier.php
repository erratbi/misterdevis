<?php


/**
 * Class Auth_Form_Particulier
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Particulier extends Auth_Form_Base {
  
  /**
   * @throws \Zend_Form_Exception
   */
  
  private $_civilite = [
    ''     => 'Veuillez préciser',
    'Mme.' => 'Madame',
    'M.'   => 'Monsieur',
  ];
  
  
  /**
   * @throws \Zend_Form_Exception
   */
  public function init() {
    
    $default_filters = [
      'StringTrim',
      'StripTags',
    ];
    
    $select_filters = [ 'StripTags' ];
    
    // civilite
    $civilite = new Zend_Form_Element_Select( 'civilite' );
    $civilite->setLabel( 'Civilité' )
             ->setBelongsTo( 'Particulier' )
             ->addFilters( $select_filters )
             ->addMultiOptions( $this->_civilite );
    
    // nom_particulier
    $nom_particulier = new Zend_Form_Element_Text( 'nom_particulier' );
    $nom_particulier->setLabel( 'Nom du particulier' )
                    ->setBelongsTo( 'Particulier' )
                    ->setRequired( true )
                    ->addFilters( $default_filters );
    
    // prenom_particulier
    $prenom_particulier = new Zend_Form_Element_Text( 'prenom_particulier' );
    $prenom_particulier->setLabel( 'Prénom du particulier' )
                       ->setBelongsTo( 'Particulier' )
                       ->setRequired( true )
                       ->addFilters( $default_filters );
    
    // telephone_fixe
    $telephone_fixe = new Zend_Form_Element_Text( 'telephone_fixe' );
    $telephone_fixe->setLabel( 'Tél. Fixe' )
                   ->setBelongsTo( 'Particulier' )
                   ->addValidator( 'Regex', true, [ '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i' ] )
                   ->addFilters( $default_filters );
    
    // telephone_portable
    $telephone_portable = new Zend_Form_Element_Text( 'telephone_portable' );
    $telephone_portable->setLabel( 'Tél. Portable' )
                       ->setRequired( true )
                       ->setBelongsTo( 'Particulier' )
                       ->addValidator( 'Regex', true, [ '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i' ] )
                       ->addFilters( $default_filters );
    
    
    // email
    $email = new Zend_Form_Element_Text( 'email' );
    $email->setLabel( 'Adresse email' )
          ->setRequired( true )
          ->setValidators( [ new Zend_Validate_EmailAddress ] )
          ->setBelongsTo( 'Particulier' )
          ->addFilters( $default_filters );
    
    
    // horaireRDV
    $horaireRDV = new Zend_Form_Element_Text( 'horaireRDV' );
    $horaireRDV->setLabel( 'Horaire pour vous joindre' )
               ->setBelongsTo( 'Particulier' )
               ->addFilters( $default_filters );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $civilite,
      $nom_particulier,
      $prenom_particulier,
      $telephone_fixe,
      $telephone_portable,
      $email,
      $horaireRDV,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
