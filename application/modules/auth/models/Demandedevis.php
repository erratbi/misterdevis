<?php


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;


/**
 * User
 *
 * @Table(name="demande_devis")
 * @Entity(repositoryClass="Auth_Model_DemandedevisRepository")
 *
 */
class Auth_Model_Demandedevis {
	
	/**
	 * @var integer $id_demande
	 *
	 * @Column(name="ID_DEMANDE", type="integer", nullable=false)
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	private $id_demande;
	
	/**
	 * @var string $titre_demande
	 *
	 * @Column(name="TITRE_DEMANDE", type="string", length=50, nullable=false)
	 */
	private $titre_demande;
	
	/**
	 * @var string $delai_souhaite
	 *
	 * @Column(name="DELAI_SOUHAITE", type="string", length=50, nullable=false)
	 */
	private $delai_souhaite;
	
	/**
	 * @var string $description
	 *
	 * @Column(name="DESCRIPTION", type="string", length=50, nullable=false)
	 */
	private $description;
	
	/**
	 * @var string $type_demandeur
	 *
	 * @Column(name="TYPE_DEMANDEUR", type="string", length=50, nullable=false)
	 */
	private $type_demandeur;
	
	
	/**
	 * @var string $type_propriete
	 *
	 * @Column(name="TYPE_PROPRIETE", type="string", length=200, nullable=false)
	 */
	private $type_propriete;
	
	/**
	 * @var string $type_batiment
	 *
	 * @Column(name="TYPE_BATIMENT", type="string", length=200, nullable=false)
	 */
	private $type_batiment;
	
	/**
	 * @var string $budget_approximatif
	 *
	 * @Column(name="BUDGET_APPROXIMATIF", type="string", length=200, nullable=false)
	 */
	private $budget_approximatif;
	
	/**
	 * @var string $financement_projet
	 *
	 * @Column(name="FINANCEMENT_PROJET", type="string", length=200, nullable=false)
	 */
	private $financement_projet;
	
	/**
	 * @var string $objectif_demande
	 *
	 * @Column(name="OBJECTIF_DEMANDE", type="string", length=200, nullable=false)
	 */
	private $objectif_demande;
	
	/**
	 * @var string $prestation_souhaite
	 *
	 * @Column(name="PRESTATION_SOUHAITE", type="string", length=200, nullable=false)
	 */
	private $prestation_souhaite;
	
	/**
	 * @var string $type_travaux
	 *
	 * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
	 */
	private $type_travaux;
	
	/**
	 * @var string $indication_complementaire
	 *
	 * @Column(name="INDICATION_COMPLEMENTAIRE", type="string", length=200, nullable=false)
	 */
	private $indication_complementaire;
	
	/**
	 * @var string $qualification
	 *
	 * @Column(name="QUALIFICATION", type="string", length=200, nullable=false)
	 */
	private $qualification;
	
	/**
	 * @var string $prix_mise_en_ligne
	 *
	 * @Column(name="PRIX_MISE_EN_LIGNE", type="string", length=200, nullable=false)
	 */
	private $prix_mise_en_ligne;
	
	/**
	 * @var string $prix_promo
	 *
	 * @Column(name="PRIX_PROMO", type="string", length=200, nullable=false)
	 */
	private $prix_promo;
	
	/**
	 * @var string $publier_en_ligne
	 *
	 * @Column(name="PUBLIER_EN_LIGNE", type="boolean",  nullable=false)
	 */
	private $publier_en_ligne;
	
	/**
	 * @var string $publier_envoi
	 *
	 * @Column(name="PUBLIER_ENVOI", type="boolean",  nullable=false)
	 */
	private $publier_envoi;
	
	/**
	 * @var string $audio
	 *
	 * @Column(name="AUDIO", type="string", length=200,  nullable=false)
	 */
	private $audio;
	
	/**
	 * @var string $date_creation
	 *
	 * @Column(name="DATE_CREATION", type="string", length=200,  nullable=false)
	 */
	private $date_creation;
	
	/**
	 * @var string $date_publication
	 *
	 * @Column(name="DATE_PUBLICATION", type="string", length=200,  nullable=false)
	 */
	private $date_publication;
	
	/**
	 * @var Particulier
	 *
	 * @ManyToOne(targetEntity="Auth_Model_Particulier")
	 * @JoinColumns({
	 *   @JoinColumn(name="ID_PARTICULIER", referencedColumnName="ID_PARTICULIER")
	 * })
	 */
	private $id_particulier;
	
	/**
	 * @var Activite
	 *
	 * @ManyToOne(targetEntity="Auth_Model_Activite")
	 * @JoinColumns({
	 *   @JoinColumn(name="ID_ACTIVITE", referencedColumnName="ID_ACTIVITE")
	 * })
	 */
	private $id_activite;
	
	/**
	 * @var Chantier
	 *
	 * @ManyToOne(targetEntity="Auth_Model_Chantier")
	 * @JoinColumns({
	 *   @JoinColumn(name="ID_CHANTIER", referencedColumnName="ID_CHANTIER")
	 * })
	 */
	private $id_chantier;
	
	/**
	 * @var User
	 *
	 * @ManyToOne(targetEntity="Auth_Model_User")
	 * @JoinColumns({
	 *   @JoinColumn(name="ID_USER", referencedColumnName="ID_USER")
	 * })
	 */
	private $id_user;
	
	
	/**
	 * @var integer $vendu
	 *
	 * @Column(name="VENDU", type="integer", length=1,  nullable=false)
	 */
	private $vendu;
	
	
	/**
	 * Many Demandes have Many Artisan.
	 * @ManyToMany(targetEntity="Auth_Model_Artisan", inversedBy="acheteurs")
	 * @JoinTable(name="acheter",
	 *      joinColumns={@JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")},
	 *      inverseJoinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")}
	 *   )
	 */
	private $acheteurs;
	
	
	/**
	 * @return the attribute
	 */
	public function __set( $attr, $val ) {
		
		$this->$attr = $val;
	}
	
	
	/**
	 * @param the attribute
	 */
	public function __get( $attr ) {
		
		return $this->$attr;
	}
	
	
	/**
	 * @return toArray
	 */
	public function toArray() {
		
		return get_object_vars( $this );
	}
	
	
	/**
	 * @return the $id_demande
	 */
	public function getId_demande() {
		
		return $this->id_demande;
	}
	
	
	/**
	 * @return the $titre_demande
	 */
	public function getTitre_demande() {
		
		return $this->titre_demande;
	}
	
	
	/**
	 * @return the $delai_souhaite
	 */
	public function getDelai_souhaite() {
		
		return $this->delai_souhaite;
	}
	
	
	/**
	 * @return the $description
	 */
	public function getDescription() {
		
		return $this->description;
	}
	
	
	/**
	 * @return the $type_demandeur
	 */
	public function getType_demandeur() {
		
		return $this->type_demandeur;
	}
	
	
	/**
	 * @return the $type_propriete
	 */
	public function getType_propriete() {
		
		return $this->type_propriete;
	}
	
	
	/**
	 * @return the $type_batiment
	 */
	public function getType_batiment() {
		
		return $this->type_batiment;
	}
	
	
	/**
	 * @return the $budget_approximatif
	 */
	public function getBudget_approximatif() {
		
		return $this->budget_approximatif;
	}
	
	
	/**
	 * @return the $financement_projet
	 */
	public function getFinancement_projet() {
		
		return $this->financement_projet;
	}
	
	
	/**
	 * @return the $objectif_demande
	 */
	public function getObjectif_demande() {
		
		return $this->objectif_demande;
	}
	
	
	/**
	 * @return the $prestation_souhaite
	 */
	public function getPrestation_souhaite() {
		
		return $this->prestation_souhaite;
	}
	
	
	/**
	 * @return the $type_travaux
	 */
	public function getType_travaux() {
		
		return $this->type_travaux;
	}
	
	
	/**
	 * @return the $indication_complementaire
	 */
	public function getIndication_complementaire() {
		
		return $this->indication_complementaire;
	}
	
	
	/**
	 * @return the $qualification
	 */
	public function getQualification() {
		
		return $this->qualification;
	}
	
	
	/**
	 * @return the $prix_mise_en_ligne
	 */
	public function getPrix_mise_en_ligne() {
		
		return $this->prix_mise_en_ligne;
	}
	
	
	/**
	 * @return the $prix_promo
	 */
	public function getPrix_promo() {
		
		return $this->prix_promo;
	}
	
	
	/**
	 * @return the $publier_en_ligne
	 */
	public function getPublier_en_ligne() {
		
		return $this->publier_en_ligne;
	}
	
	
	/**
	 * @return the $publier_envoi
	 */
	public function getPublier_envoi() {
		
		return $this->publier_envoi;
	}
	
	
	/**
	 * @return the $audio
	 */
	public function getAudio() {
		
		return $this->audio;
	}
	
	
	/**
	 * @return the $date_creation
	 */
	public function getDate_creation() {
		
		return $this->date_creation;
	}
	
	
	/**
	 * @return the $date_publication
	 */
	public function getDate_publication() {
		
		return $this->date_publication;
	}
	
	
	/**
	 * @return the $id_particulier
	 */
	public function getId_particulier() {
		
		return $this->id_particulier;
	}
	
	
	/**
	 * @return the $id_activite
	 */
	public function getId_activite() {
		
		return $this->id_activite;
	}
	
	
	/**
	 * @return the $id_chantier
	 */
	public function getId_chantier() {
		
		return $this->id_chantier;
	}
	
	
	/**
	 * @return the $id_user
	 */
	public function getId_user() {
		
		return $this->id_user;
	}
	
	
	/**
	 * @return int
	 */
	public function getVendu() {
		
		return $this->vendu;
	}
	
	
	/**
	 * @param integer $id_demande
	 */
	public function setId_demande( $id_demande ) {
		
		$this->id_demande = $id_demande;
	}
	
	
	/**
	 * @param string $titre_demande
	 */
	public function setTitre_demande( $titre_demande ) {
		
		$this->titre_demande = $titre_demande;
	}
	
	
	/**
	 * @param string $delai_souhaite
	 */
	public function setDelai_souhaite( $delai_souhaite ) {
		
		$this->delai_souhaite = $delai_souhaite;
	}
	
	
	/**
	 * @param string $description
	 */
	public function setDescription( $description ) {
		
		$this->description = $description;
	}
	
	
	/**
	 * @param string $type_demandeur
	 */
	public function setType_demandeur( $type_demandeur ) {
		
		$this->type_demandeur = $type_demandeur;
	}
	
	
	/**
	 * @param string $type_propriete
	 */
	public function setType_propriete( $type_propriete ) {
		
		$this->type_propriete = $type_propriete;
	}
	
	
	/**
	 * @param string $type_batiment
	 */
	public function setType_batiment( $type_batiment ) {
		
		$this->type_batiment = $type_batiment;
	}
	
	
	/**
	 * @param string $budget_approximatif
	 */
	public function setBudget_approximatif( $budget_approximatif ) {
		
		$this->budget_approximatif = $budget_approximatif;
	}
	
	
	/**
	 * @param string $financement_projet
	 */
	public function setFinancement_projet( $financement_projet ) {
		
		$this->financement_projet = $financement_projet;
	}
	
	
	/**
	 * @param string $objectif_demande
	 */
	public function setObjectif_demande( $objectif_demande ) {
		
		$this->objectif_demande = $objectif_demande;
	}
	
	
	/**
	 * @param string $prestation_souhaite
	 */
	public function setPrestation_souhaite( $prestation_souhaite ) {
		
		$this->prestation_souhaite = $prestation_souhaite;
	}
	
	
	/**
	 * @param string $type_travaux
	 */
	public function setType_travaux( $type_travaux ) {
		
		$this->type_travaux = $type_travaux;
	}
	
	
	/**
	 * @param string $indication_complementaire
	 */
	public function setIndication_complementaire( $indication_complementaire ) {
		
		$this->indication_complementaire = $indication_complementaire;
	}
	
	
	/**
	 * @param string $qualification
	 */
	public function setQualification( $qualification ) {
		
		$this->qualification = $qualification;
	}
	
	
	/**
	 * @param string $prix_mise_en_ligne
	 */
	public function setPrix_mise_en_ligne( $prix_mise_en_ligne ) {
		
		$this->prix_mise_en_ligne = $prix_mise_en_ligne;
	}
	
	
	/**
	 * @param string $prix_promo
	 */
	public function setPrix_promo( $prix_promo ) {
		
		$this->prix_promo = $prix_promo;
	}
	
	
	/**
	 * @param string $publier_en_ligne
	 */
	public function setPublier_en_ligne( $publier_en_ligne ) {
		
		$this->publier_en_ligne = $publier_en_ligne;
	}
	
	
	/**
	 * @param string $publier_envoi
	 */
	public function setPublier_envoi( $publier_envoi ) {
		
		$this->publier_envoi = $publier_envoi;
	}
	
	
	/**
	 * @param string $audio
	 */
	public function setAudio( $audio ) {
		
		$this->audio = $audio;
	}
	
	
	/**
	 * @param string $date_creation
	 */
	public function setDate_creation( $date_creation ) {
		
		$this->date_creation = $date_creation;
	}
	
	
	/**
	 * @param string $date_publication
	 */
	public function setDate_publication( $date_publication ) {
		
		$this->date_publication = $date_publication;
	}
	
	
	/**
	 * @param \Auth_Model_Particulier $id_particulier
	 */
	public function setId_particulier( $id_particulier ) {
		
		$this->id_particulier = $id_particulier;
	}
	
	
	/**
	 * @param \Auth_Model_Activite $id_activite
	 */
	public function setId_activite( $id_activite ) {
		
		$this->id_activite = $id_activite;
	}
	
	
	/**
	 * @param \Auth_Model_Chantier $id_chantier
	 */
	public function setId_chantier( $id_chantier ) {
		
		$this->id_chantier = $id_chantier;
	}
	
	
	/**
	 * @param \Auth_Model_User $id_user
	 */
	public function setId_user( $id_user ) {
		
		$this->id_user = $id_user;
	}
	
	/**
	 * @param int $vendu
	 */
	public function setVendu( $vendu ) {
		
		$this->vendu = $vendu;
	}
	
	
	public function getUrl( $toPdf = false ) {
		
		$exceptions = [
			'POG' => 'porte-garage',
			'TAC' => 'anticalcaire',
			'POE' => 'porte-entree',
			'TCH' => 'traitement-humidite',
			'TCN' => 'traitement-nuisible',
			'PAY' => 'jardin-parc',
			'RAM' => 'ramonage',
			'MSE' => 'station-epuration',
			'ADO' => 'adoucisseur-eau',
			'SDB' => 'sallebain',
			'SBS' => 'sallebain',
			'PAC' => 'pompe-chaleur',
			'PGR' => 'poele-granule',
			'SBB' => 'spa',
		];
		
		if ( ! $this->getId_activite() ) {
			return null;
		}
		
		$baseUrl  = $_SERVER['HTTP_HOST'];
		$protocol = strtolower( substr( $_SERVER["SERVER_PROTOCOL"], 0, strpos( $_SERVER["SERVER_PROTOCOL"], '/' ) ) ) . '://';
		
		$ref     = $this->getId_activite()->getRef();
		$libelle = $this->getId_activite()->getLibelle();
		
		if ( in_array( $ref, $exceptions ) ) {
			$type = $exceptions[ $ref ];
		} else {
			$type = self::slugify( $libelle );
		}
		
		return "{$protocol}{$baseUrl}/auth/{$type}/" . ( $toPdf ? 'pdf' : 'edit' ) . "/id/{$this->getId_demande()}";
	}
	
	
	public function getAudioUrl() {
		
		$config = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
		$ftp    = $config->system->audio->ftp;
		
		$file = str_replace( 'httpdocs/', '', $this->audio );
		
		
		return "http://{$ftp->host}{$file}";
	}
	
	
	public function pdfLocation( $full = false ) {
		
		$pdf_path = realpath( APPLICATION_PATH . "/../public/pdf/" );
		
		return $pdf_path . ( $full ? "/{$this->getRef()}.pdf" : "" );
	}
	
	
	public function factureLocation( $id_artisan, $full = false ) {
		
		$facture_path = realpath( APPLICATION_PATH . "/../public/pdf/factures" );
		
		return $facture_path . ( $full ? "/FAC-{$this->getRef()}-{$id_artisan}.pdf" : "" );
	}
	
	
	public function soldCount() {
		
		return $this->acheteurs->count();
	}
	
	public function getType() {
		
		if ( ! $this->getId_activite() ) {
			return null;
		}
		
		return $this->getId_activite()->getRef();
	}
	
	
	public function saveAudio( $file ) {
		
		$config = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
		$ftp    = $config->system->audio->ftp;
		
		$source = APPLICATION_PATH . $file;
		$ext    = pathinfo( basename( $file ), PATHINFO_EXTENSION );
		if ( ! is_file( $source ) ) {
			return false;
		}
		
		$remote = "{$ftp->path}{$this->getRef()}.{$ext}";
		
		//exec( "ffmpeg -i {$file['tmp_name']} -ar 44100 -ac 2 -ab 64k -f mp3 {$source}" );
		
		$conn = ftp_connect( $ftp->host );
		
		$login = ftp_login( $conn, $ftp->user, $ftp->pass );
		
		if ( ! $conn || ! $login ) {
			return null;
		}
		
		ftp_pasv( $conn, true );
		if ( ! ftp_put( $conn, $remote, $source, FTP_BINARY ) ) {
			return null;
		}
		
		unlink( $source );
		
		$this->setAudio( $remote );
		
		return $this;
	}
	
	public function getRef() {
		
		$type = $this->getType();
		
		return ( $type ? "{$type}-" : "" ) . ( 16180 + $this->getId_demande() );
	}
	
	public function getLibelle() {
		
		return "{$this->titre_demande} {$this->getRef()}";
	}
	
	public function getTotalHT() {
		
		return round( (float) $this->prix_mise_en_ligne, 2 );
	}
	
	
	public function getTVA() {
		
		return round( $this->getTotalHT() * .2, 2 );
	}
	
	public function getTotal() {
		
		return round( $this->getTotalHT() * 1.2, 2 );
	}
	
	public function getDownloadUrl() {
		
		$baseUrl  = $_SERVER['HTTP_HOST'];
		$protocol = strtolower( substr( $_SERVER["SERVER_PROTOCOL"], 0, strpos( $_SERVER["SERVER_PROTOCOL"], '/' ) ) ) . '://';
		
		return "{$protocol}{$baseUrl}/pdf/{$this->getRef()}.pdf";
	}
	
	static public function slugify( $text ) {
		
		$table = [
			'Š' => 'S',
			'š' => 's',
			'Đ' => 'Dj',
			'đ' => 'dj',
			'Ž' => 'Z',
			'ž' => 'z',
			'Č' => 'C',
			'č' => 'c',
			'Ć' => 'C',
			'ć' => 'c',
			'À' => 'A',
			'Á' => 'A',
			'Â' => 'A',
			'Ã' => 'A',
			'Ä' => 'A',
			'Å' => 'A',
			'Æ' => 'A',
			'Ç' => 'C',
			'È' => 'E',
			'É' => 'E',
			'Ê' => 'E',
			'Ë' => 'E',
			'Ì' => 'I',
			'Í' => 'I',
			'Î' => 'I',
			'Ï' => 'I',
			'Ñ' => 'N',
			'Ò' => 'O',
			'Ó' => 'O',
			'Ô' => 'O',
			'Õ' => 'O',
			'Ö' => 'O',
			'Ø' => 'O',
			'Ù' => 'U',
			'Ú' => 'U',
			'Û' => 'U',
			'Ü' => 'U',
			'Ý' => 'Y',
			'Þ' => 'B',
			'ß' => 'Ss',
			'à' => 'a',
			'á' => 'a',
			'â' => 'a',
			'ã' => 'a',
			'ä' => 'a',
			'å' => 'a',
			'æ' => 'a',
			'ç' => 'c',
			'è' => 'e',
			'é' => 'e',
			'ê' => 'e',
			'ë' => 'e',
			'ì' => 'i',
			'í' => 'i',
			'î' => 'i',
			'ï' => 'i',
			'ð' => 'o',
			'ñ' => 'n',
			'ò' => 'o',
			'ó' => 'o',
			'ô' => 'o',
			'õ' => 'o',
			'ö' => 'o',
			'ø' => 'o',
			'ù' => 'u',
			'ú' => 'u',
			'û' => 'u',
			'ý' => 'y',
			'þ' => 'b',
			'ÿ' => 'y',
			'Ŕ' => 'R',
			'ŕ' => 'r',
			'/' => '-',
			' ' => '-',
		];
		
		$text = strtr( $text, $table );
		
		// replace non letter or digits by -
		$text = preg_replace( '~[^\pL\d]+~u', '-', $text );
		
		// transliterate
		$text = iconv( 'utf-8', 'us-ascii//TRANSLIT', $text );
		
		// remove unwanted characters
		$text = preg_replace( '~[^-\w]+~', '', $text );
		
		// trim
		$text = trim( $text, '-' );
		
		// remove duplicate -
		$text = preg_replace( '~-+~', '-', $text );
		
		// lowercase
		$text = strtolower( $text );
		
		if ( empty( $text ) ) {
			return 'n-a';
		}
		
		return $text;
	}
}
