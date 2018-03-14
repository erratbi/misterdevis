<?php


/**
 * Class Auth_Form_Artisan
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    02/01/18
 */
class Auth_Form_Artisan extends Auth_Form_Base {
  
  private $_qualification = [
    ''              => 'Veuillez préciser',
    'Non qualifiée' => 'Non qualifiée',
    'NRP'           => 'NRP',
    'Occupé'        => 'Occupé',
    'Qualifié'      => 'Qualifié',
    'Trop tard'     => 'Trop tard',
    'Rappel'        => 'Rappel',
  ];
  
  private $_activites = [
    '' => 'Veuillez préciser',
  ];
  
  
  private $_departement = [
    '' => 'Veuillez préciser',
  ];

  private $_rayon = [

    ''  => 'Veuillez préciser',
    '5000'  => '5 km',
    '10000'  => '10 km',
    '15000'  => '15 km',
    '20000'  => '20 km',
    '30000'  => '30 km',
    '50000'  => '50 km',
    '100000'  => '100 km',
    '200000'  => '+ de 100 km',

  ];

  private $_validation = [
    '1'  => 'Oui',
    '0'  => 'Non',
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
    
    // nom_artisan
    $nom_artisan = new Zend_Form_Element_Text( 'nom_artisan' );
    $nom_artisan->setLabel( 'Nom' )
                ->setRequired( true )
                ->setBelongsTo( 'Artisan' )
                ->addFilters( $default_filters );
    
    // prenom_artisan
    $prenom_artisan = new Zend_Form_Element_Text( 'prenom_artisan' );
    $prenom_artisan->setLabel( 'Prénom' )
                   ->setRequired( true )
                   ->setBelongsTo( 'Artisan' )
                   ->addFilters( $default_filters );
    
    
    // login
    $login = new Zend_Form_Element_Text( 'login' );
    $login->setLabel( 'Login' )
          ->setRequired( true )
          ->setBelongsTo( 'Artisan' )
          ->addFilters( $default_filters );
    
    // pass
    $pass = new Zend_Form_Element_Password( 'pass' );
    $pass->setLabel( 'Mot de passe' )
         ->setBelongsTo( 'Artisan' )
         ->addFilters( [ 'StripTags' ] );
    
    // pass2
    $pass2 = new Zend_Form_Element_Password( 'pass2' );
    $pass2->setLabel( 'Confirmer le mot de passe' )
          ->setBelongsTo( 'Artisan' )
          ->addFilters( $default_filters );
    
    // raison_social
    $raison_social = new Zend_Form_Element_Text( 'raison_sociale' );
    $raison_social->setLabel( 'Raison sociale' )
                  ->setRequired( true )
                  ->setBelongsTo( 'Artisan' )
                  ->addFilters( $default_filters );
    
    // email_artisan
    $email_artisan = new Zend_Form_Element_Text( 'email_artisan' );
    $email_artisan->setLabel( 'Adresse email principale' )
                  ->setRequired( true )
                  ->setValidators( [ new Zend_Validate_EmailAddress ] )
                  ->setBelongsTo( 'Artisan' )
                  ->addFilters( $default_filters );

    // email2
    $email2 = new Zend_Form_Element_Text( 'email2' );
    $email2->setLabel( 'Adresse email 2' )
                  ->setValidators( [ new Zend_Validate_EmailAddress ] )
                  ->setBelongsTo( 'Artisan' )
                  ->addFilters( $default_filters );
    
    // telephone_fixe
    $telephone_fixe = new Zend_Form_Element_Text( 'telephone_fixe' );
    $telephone_fixe->setLabel( 'Tél. Fixe' )
                   ->setBelongsTo( 'Artisan' )
                   ->addValidator( 'Regex', true, [ '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i' ] )
                   ->addFilters( $default_filters );
    
    // telephone_portable
    $telephone_portable = new Zend_Form_Element_Text( 'telephone_portable' );
    $telephone_portable->setLabel( 'Tél. Portable' )
                       ->setRequired( true )
                       ->addValidator( 'Regex', true, [ '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i' ] )
                       ->setBelongsTo( 'Artisan' )
                       ->addFilters( $default_filters );
    
    // fax
    $fax = new Zend_Form_Element_Text( 'fax' );
    $fax->setLabel( 'Fax' )
        ->setBelongsTo( 'Artisan' )
        ->addFilters( $default_filters );
    
    // rcs
    $rcs = new Zend_Form_Element_Text( 'rcs' );
    $rcs->setLabel( 'RCS' )
        ->setBelongsTo( 'Artisan' )
        ->addFilters( $default_filters );
    
    // siret
    $siret = new Zend_Form_Element_Text( 'siret' );
    $siret->setLabel( 'SIRET' )
          ->setBelongsTo( 'Artisan' )
          ->addFilters( $default_filters );
    
    // code_naf
    $code_naf = new Zend_Form_Element_Text( 'code_NAF' );
    $code_naf->setLabel( 'Code NAF' )
             ->setBelongsTo( 'Artisan' )
             ->addFilters( $default_filters );
    
    // horairerdv
    $horairerdv = new Zend_Form_Element_Text( 'horaireRDV' );
    $horairerdv->setLabel( 'Horaire pour vous joindre' )
               ->setBelongsTo( 'Artisan' )
               ->addFilters( $default_filters );
    
    
    // adresse
    $adresse = new Zend_Form_Element_Text( 'adresse' );
    $adresse->setLabel( 'Adresse' )
            ->setBelongsTo( 'Artisan' )
            ->addFilters( $default_filters );
    
    // adresse2
    $adresse2 = new Zend_Form_Element_Text( 'adresse2' );
    $adresse2->setLabel( 'Adresse 2' )
             ->setBelongsTo( 'Artisan' )
             ->addFilters( $default_filters );
    
    // Code Postal
    $code_postal = new Zend_Form_Element_Text( 'code_postal' );
    $code_postal->setLabel( 'Code Postal' )
                ->setRequired( true )
                ->setBelongsTo( 'Artisan' )
                ->addFilters( $default_filters );
    
    // Ville
    $ville = new Zend_Form_Element_Text( 'ville' );
    $ville->setLabel( 'Ville' )
          ->setBelongsTo( 'Artisan' )
          ->addFilters( $default_filters );
    
    // description
    $description = new Zend_Form_Element_Textarea( 'description' );
    $description->setLabel( 'Description' )
                ->setBelongsTo( 'Artisan' )
                ->addFilters( $default_filters );
    
    
    // qualification
    $qualification = new Zend_Form_Element_Select( 'qualification' );
    $qualification->setLabel( 'Qualification' )
                  ->setBelongsTo( 'Artisan' )
                  ->addFilters( $select_filters )
                  ->addMultiOptions( $this->_qualification );
    
    
    // select_activites
    $select_activites = new Zend_Form_Element_Select( 'select_activites' );
    $select_activites->setLabel( 'Activités' )
                     ->setBelongsTo( 'Artisan' )
                     ->setIsArray( true )
                     ->addFilters( $select_filters )
                     ->addMultiOptions( $this->_activites );
    
    
    // select_departement
    $select_departement = new Zend_Form_Element_Select( 'select_departement' );
    $select_departement->setLabel( 'Departement' )
                       ->setBelongsTo( 'Artisan' )
                       ->setIsArray( true )
                       ->addFilters( $select_filters )
                       ->addMultiOptions( $this->_departement );

     // Rayon
    $rayon = new Zend_Form_Element_Select( 'rayon' );
    $rayon->setLabel( 'Rayon' )
                       ->setBelongsTo( 'Artisan' )
                       ->addFilters( $select_filters )
                       ->addMultiOptions( $this->_rayon );

    // Center
    $center = new Zend_Form_Element_Text( 'center' );
    $center->setLabel( 'Code Postal' )
                       ->setBelongsTo( 'Artisan' )
                       ->addFilters( $select_filters );

    // LAT
    $lat = new Zend_Form_Element_Hidden( 'lat' );
    $lat->setBelongsTo( 'Artisan' )
                      ->setValue("48.8626304852")
                       ->addFilters( $select_filters );

    // LNG
    $lng = new Zend_Form_Element_Hidden( 'lng' );
    $lng->setBelongsTo( 'Artisan' )
                      ->setValue("2.33629344655")
                       ->addFilters( $select_filters );

      // validation
    $validation = new Zend_Form_Element_Select( 'validation' );
    $validation->setLabel( 'Validation des chèques et virements' )
                       ->setBelongsTo( 'Artisan' )
                       ->addFilters( $select_filters )
                       ->addMultiOptions( $this->_validation );
    
    
    // Submit button
    $submit = new Zend_Form_Element_Submit( 'submit' );
    $submit->setLabel( 'Envoyer' )
           ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
    
    $this->addElements( [
      $nom_artisan,
      $prenom_artisan,
      $raison_social,
      $email_artisan,
      $email2,
      $telephone_fixe,
      $telephone_portable,
      $fax,
      $rcs,
      $siret,
      $code_naf,
      $horairerdv,
      $login,
      $pass,
      $pass2,
      $adresse,
      $adresse2,
      $code_postal,
      $validation,
      $ville,
      $description,
      $qualification,
      $select_activites,
      $select_departement,
      $rayon,
      $center,
      $lat,
      $lng,
      $submit,
    ] );
    
    parent::init();
    
  }
  
}
