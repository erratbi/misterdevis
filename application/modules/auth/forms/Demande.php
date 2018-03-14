<?php


/**
 * Class Auth_Form_Demande
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Demande extends Auth_Form_Base {
	
	private $_type_demandeur = [
		''                       => 'Veuillez préciser',
		'Particulier'            => 'Particulier',
		'Société'                => 'Société',
		'Commerçant'             => 'Commerçant',
		'Industriel'             => 'Industriel',
		'Profession Libérale'    => 'Profession Libérale',
		'Syndic de Copropriété'  => 'Syndic de Copropriété',
		'Promoteur Constructeur' => 'Promoteur Constructeur',
		'Administration'         => 'Administration',
		'Association'            => 'Association',
		'Architecte'             => 'Architecte',
		'Agence Immobilière'     => 'Agence Immobilière',
		'Autre'                  => 'Autre',
	
	];
	
	private $_type_propriete = [
		''                      => 'Veuillez préciser',
		'Propriétaire'          => 'Propriétaire Occupant',
		'Propriétaire Bailleur' => 'Propriétaire Bailleur',
		'Futur Propriétaire'    => 'Futur Propriétaire',
		'Locataire'             => 'Locataire',
		'Futur Locataire'       => 'Futur Locataire',
		'Administrateur'        => 'Administrateur',
		'Autre'                 => 'Autre',
	];
	
	private $_type_batiment = [
		''                   => 'Veuillez préciser',
		'Appartement'        => 'Appartement',
		'Maison & Villa'     => 'Maison Individuelle',
		'Commerce ou Bureau' => 'Bureau',
		'Commerce'           => 'Commerce',
		'Immeuble'           => 'Immeuble',
		'Local Industriel'   => 'Local Industriel',
		'Usine'              => 'Usine',
		'Hotel'              => 'Hotel',
		'Autre...'           => 'Autre',
	];
	
	private $_delai_souhaite = [
		''                  => 'Veuillez préciser',
		'Au plus vite'      => 'Au plus vite',
		'Moins de 2 mois'   => 'Moins de 2 mois',
		'Plus de 2 mois'    => 'Plus de 2 mois',
		'Dans l\'année'     => 'Dans l\'année',
		'Pas de date fixée' => 'Pas de date fixée',
	];
	
	private $_financement_projet = [
		''                           => 'Veuillez préciser',
		'Comptant'                   => 'Comptant',
		'Demande de crédit en cours' => 'Demande de crédit en cours',
		'Crédit Obtenu'              => 'Crédit Obtenu',
		'Je ne sais pas'             => 'Je ne sais pas',
	];
	
	private $_objectif_demande = [
		''                                            => 'Veuillez préciser',
		'Trouver une entreprise disponible'           => 'Trouver une entreprise disponible',
		'Obtenir des devis et trouver une entreprise' => 'Obtenir des devis et trouver une entreprise',
		'Avoir juste une idée des prix'               => 'Avoir juste une idée des prix',
		'Autre'                                       => 'Autre',
	];
	
	private $_prestation_souhaite = [
		''                      => 'Veuillez préciser',
		'Fourniture et Pose'    => 'Fourniture et Pose',
		'Pose Uniquement'       => 'Pose Uniquement',
		'Fourniture Uniquement' => 'Fourniture Uniquement',
	];
	
	
	private $_type_travaux = [
		''                   => 'Veuillez préciser',
		'Remplacement'       => 'Remplacement',
		'Installation neuve' => 'Installation neuve',
		'Réparation'         => 'Réparation',
		'Entretien'          => 'Entretien',
	];
	
	
	private $_qualification = [
		''              => 'Veuillez préciser',
		'Non qualifiée' => 'Non qualifiée',
		'NRP'           => 'NRP',
		'Occupé'        => 'Occupé',
		'Qualifié'      => 'Qualifié',
		'Trop tard'     => 'Trop tard',
		'Rappel'        => 'Rappel',
	];
	
	private $_publier_en_ligne = [
		''  => 'Veuillez préciser',
		'1' => 'Oui',
		'0' => 'Non',
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
		
		
		// titre_demande
		$titre_demande = new Zend_Form_Element_Text( 'titre_demande' );
		$titre_demande->setLabel( 'Titre de la demande' )
		              ->setBelongsTo( 'Demande' )
		              ->setRequired( true )
		              ->addFilters( $default_filters );
		
		// description
		$description = new Zend_Form_Element_Textarea( 'description' );
		$description->setLabel( 'Description' )
		            ->setBelongsTo( 'Demande' )
		            ->setAttribs( [ 'rows' => 5 ] )
		            ->addFilters( $default_filters );
		
		
		// prestation_souhaite
		$prestation_souhaite = new Zend_Form_Element_Select( 'prestation_souhaite' );
		$prestation_souhaite->setLabel( 'Prestation souhaitée' )
		                    ->setBelongsTo( 'Demande' )
		                    ->addFilters( $select_filters )
		                    ->addMultiOptions( $this->_prestation_souhaite );
		
		
		// type_travaux
		$type_travaux = new Zend_Form_Element_Select( 'type_travaux' );
		$type_travaux->setLabel( 'Type de travaux' )
		             ->setBelongsTo( 'Demande' )
		             ->addFilters( $select_filters )
		             ->addMultiOptions( $this->_type_travaux );
		
		// type_demandeur
		$type_demandeur = new Zend_Form_Element_Select( 'type_demandeur' );
		$type_demandeur->setLabel( 'Vous êtes' )
		               ->setBelongsTo( 'Demande' )
		               ->addFilters( $select_filters )
		               ->addMultiOptions( $this->_type_demandeur );
		
		// type_propriete
		$type_propriete = new Zend_Form_Element_Select( 'type_propriete' );
		$type_propriete->setLabel( 'Et vous êtes' )
		               ->setBelongsTo( 'Demande' )
		               ->addFilters( $select_filters )
		               ->addMultiOptions( $this->_type_propriete );
		
		// type_batiment
		$type_batiment = new Zend_Form_Element_Select( 'type_batiment' );
		$type_batiment->setLabel( 'Type de Bâtiment' )
		              ->setBelongsTo( 'Demande' )
		              ->addFilters( $select_filters )
		              ->addMultiOptions( $this->_type_batiment );
		
		// financement_projet
		$financement_projet = new Zend_Form_Element_Select( 'financement_projet' );
		$financement_projet->setLabel( 'Financement de Projet' )
		                   ->setBelongsTo( 'Demande' )
		                   ->addFilters( $select_filters )
		                   ->addMultiOptions( $this->_financement_projet );
		
		
		// qualification
		$qualification = new Zend_Form_Element_Select( 'qualification' );
		$qualification->setLabel( 'Qualification' )
		              ->setBelongsTo( 'Demande' )
		              ->addFilters( $select_filters )
		              ->setRequired( true )
		              ->addMultiOptions( $this->_qualification );
		
		// indication_complementaire
		$indication_complementaire = new Zend_Form_Element_Textarea( 'indication_complementaire' );
		$indication_complementaire->setLabel( 'Indications Complémentaires Importantes' )
		                          ->setBelongsTo( 'Demande' )
		                          ->setAttrib( 'rows', 5 )
		                          ->addFilters( $default_filters );
		
		// delai_souhaite
		$delai_souhaite = new Zend_Form_Element_Select( 'delai_souhaite' );
		$delai_souhaite->setLabel( 'Délai souhaité' )
		               ->setBelongsTo( 'Demande' )
		               ->addFilters( $select_filters )
		               ->addMultiOptions( $this->_delai_souhaite );
		
		// objectif_demande
		$objectif_demande = new Zend_Form_Element_Select( 'objectif_demande' );
		$objectif_demande->setLabel( 'Quel est l\'Objectif de votre demande' )
		                 ->setBelongsTo( 'Demande' )
		                 ->addFilters( $select_filters )
		                 ->addMultiOptions( $this->_objectif_demande );
		
		
		// budget_approximatif
		$budget_approximatif = new Zend_Form_Element_Text( 'budget_approximatif' );
		$budget_approximatif->setLabel( 'Budget Approximatif' )
		                    ->setBelongsTo( 'Demande' )
		                    ->addFilters( $default_filters );
		
		// prix_mise_en_ligne
		$prix_mise_en_ligne = new Zend_Form_Element_Text( 'prix_mise_en_ligne' );
		$prix_mise_en_ligne->setLabel( 'Prix de Mise en Ligne' )
		                   ->setBelongsTo( 'Demande' )
		                   ->setRequired( true )
		                   ->setValidators( [ new Zend_Validate_Int ] )
		                   ->addFilters( $default_filters );
		
		
		// prix_promo
		$prix_promo = new Zend_Form_Element_Text( 'prix_promo' );
		$prix_promo->setLabel( 'Prix Promotionnel' )
		           ->setBelongsTo( 'Demande' )
		           ->setValidators( [ new Zend_Validate_Int ] )
		           ->addFilters( $default_filters );
		
		// audio
		$audio = new Zend_Form_Element_Hidden( 'audio' );
		$audio->setBelongsTo( 'Demande' );
		
		
		// Submit button
		$submit = new Zend_Form_Element_Submit( 'submit' );
		$submit->setLabel( 'Envoyer' )
		       ->setAttribs( [ 'class' => 'btn btn-primary btn-block' ] );
		
		
		// publier_en_ligne
		$publier_en_ligne = new Zend_Form_Element_Select( 'publier_en_ligne' );
		$publier_en_ligne->setLabel( 'Publier en Ligne' )
		                 ->setBelongsTo( 'Demande' )
		                 ->addFilters( $select_filters )
		                 ->setRequired( true )
		                 ->addMultiOptions( $this->_publier_en_ligne );
		
		// upload audio file
		
		$audio_file = new Zend_Form_Element_File( 'audio_file' );
		$audio_file->setLabel( 'Conversation audio' )
		           ->setAttrib( 'accept', 'audio/wav, audio/x-wav, audio/mpeg, application/ogg' )
		           ->setBelongsTo( 'Demande' );
		
		
		$this->addElements( [
			$titre_demande,
			$delai_souhaite,
			$description,
			$type_demandeur,
			$type_propriete,
			$type_batiment,
			$budget_approximatif,
			$financement_projet,
			$objectif_demande,
			$indication_complementaire,
			$prestation_souhaite,
			$type_travaux,
			$qualification,
			$prix_mise_en_ligne,
			$prix_promo,
			$publier_en_ligne,
			$audio_file,
			$audio,
		
		] );
		
		parent::init();
		
	}
	
}
