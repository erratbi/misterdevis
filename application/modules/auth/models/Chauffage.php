<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="qualif_chauffage")
 * @Entity(repositoryClass="Auth_Model_ChauffageRepository")
 */
class Auth_Model_Chauffage
{
    /**
     * @var integer $id_qualif_chauffage
     *
     * @Column(name="ID_QUALIF_CHAUFFAGE", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id_qualif_chauffage;

    /**
     * @var string $type_chauffage
     *
     * @Column(name="TYPE_CHAUFFAGE", type="string", length=50, nullable=false)
     */
    private $type_chauffage;
	
	/**
     * @var string $type_installation
     *
     * @Column(name="TYPE_INSTALLATION", type="string", length=50, nullable=false)
     */
    private $type_installation;
	
	/**
     * @var string $conduite_fumee
     *
     * @Column(name="CONDUITE_FUMEE", type="string", length=50, nullable=false)
     */
    private $conduite_fumee;
	
	/**
     * @var string $nbre_etage
     *
     * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
     */
    private $nbre_etage;


    /**
     * @var string $surface_totale
     *
     * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=false)
     */
    private $surface_totale;
	
	/**
     * @var string $hauteur_sous_plafond
     *
     * @Column(name="HAUTEUR_SOUS_PLAFOND", type="string", length=200, nullable=false)
     */
    private $hauteur_sous_plafond;
	
	/**
     * @var string $type_radiateur
     *
     * @Column(name="TYPE_RADIATEUR", type="string", length=200, nullable=false)
     */
    private $type_radiateur;
	
	/**
     * @var string $type_diffusion_chaleur
     *
     * @Column(name="TYPE_DIFFUSION_CHALEUR", type="string", length=200, nullable=false)
     */
    private $type_diffusion_chaleur;
	
	/**
     * @var string $type_energie
     *
     * @Column(name="TYPE_ENERGIE", type="string", length=200, nullable=false)
     */
    private $type_energie;
	
	/**
     * @var string $dispose_jardin
     *
     * @Column(name="DISPOSE_JARDIN", type="string", length=200, nullable=false)
     */
    private $dispose_jardin;
	
	/**
     * @var string $type_travaux
     *
     * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
     */
    private $type_travaux;

    /**
     * @var Demandedevis
     *
     * @ManyToOne(targetEntity="Auth_Model_Demandedevis")
     * @JoinColumns({
     *   @JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")
     * })
     */
    private $id_demande;
    
    
	 /**
	 * @return the attribute
	 */
    public function __set($attr, $val)
    {
    	$this->$attr = $val;
    }
    
    /**
	 * @param the attribute
	 */
    public function __get($attr)
    {
    	return $this->$attr;
    }
        
    /**
	 * @return toArray
	 */
 	public function toArray() {
        return get_object_vars($this);
    }
    
	/**
	 * @return the $id_qualif_chauffage
	 */
	public function getId_qualif_chauffage() {
		return $this->id_qualif_chauffage;
	}

	/**
	 * @return the $type_chauffage
	 */
	public function getType_chauffage() {
		return $this->type_chauffage;
	}
	
	/**
	 * @return the $type_installation
	 */
	public function getType_installation() {
		return $this->type_installation;
	}
	
	/**
	 * @return the $conduite_fumee
	 */
	public function getConduite_fumee() {
		return $this->conduite_fumee;
	}
	
	/**
	 * @return the $nbre_etage
	 */
	public function getNbre_etage() {
		return $this->nbre_etage;
	}
	
	/**
	 * @return the $surface_totale
	 */
	public function getSurface_totale() {
		return $this->surface_totale;
	}
	
	/**
	 * @return the $hauteur_sous_plafond
	 */
	public function getHauteur_sous_plafond() {
		return $this->hauteur_sous_plafond;
	}
	
	/**
	 * @return the $type_radiateur
	 */
	public function getType_radiateur() {
		return $this->type_radiateur;
	}
	
	/**
	 * @return the $type_diffusion_chaleur
	 */
	public function getType_diffusion_chaleur() {
		return $this->type_diffusion_chaleur;
	}
	
	/**
	 * @return the $type_energie
	 */
	public function getType_energie() {
		return $this->type_energie;
	}
	
	/**
	 * @return the $dispose_jardin
	 */
	public function getDispose_jardin() {
		return $this->dispose_jardin;
	}
	
	/**
	 * @return the $type_travaux
	 */
	public function getType_travaux() {
		return $this->type_travaux;
	}

	/**
	 * @return the $id_demande
	 */
	public function getId_demande() {
		return $this->id_demande;
	}

	/**
	 * @param integer $id_qualif_chauffage
	 */
	public function setId_qualif_chauffage($id_qualif_chauffage) {
		$this->id_qualif_chauffage = $id_qualif_chauffage;
	}

	/**
	 * @param string $type_chauffage
	 */
	public function setType_chauffage($type_chauffage) {
		$this->type_chauffage = $type_chauffage;
	}
	
	/**
	 * @param string $type_installation
	 */
	public function setType_installation($type_installation) {
		$this->type_installation = $type_installation;
	}
	
	/**
	 * @param string $conduite_fumee
	 */
	public function setConduite_fumee($conduite_fumee) {
		$this->conduite_fumee = $conduite_fumee;
	}
	
	/**
	 * @param string $nbre_etage
	 */
	public function setNbre_etage($nbre_etage) {
		$this->nbre_etage = $nbre_etage;
	}
	
	/**
	 * @param string $surface_totale
	 */
	public function setSurface_totale($surface_totale) {
		$this->surface_totale = $surface_totale;
	}
	
	/**
	 * @param string $hauteur_sous_plafond
	 */
	public function setHauteur_sous_plafond($hauteur_sous_plafond) {
		$this->hauteur_sous_plafond = $hauteur_sous_plafond;
	}
	
	/**
	 * @param string $type_radiateur
	 */
	public function setType_radiateur($type_radiateur) {
		$this->type_radiateur = $type_radiateur;
	}
	
	/**
	 * @param string $type_diffusion_chaleur
	 */
	public function setType_diffusion_chaleur($type_diffusion_chaleur) {
		$this->type_diffusion_chaleur = $type_diffusion_chaleur;
	}
	
	/**
	 * @param string $type_energie
	 */
	public function setType_energie($type_energie) {
		$this->type_energie = $type_energie;
	}
	
	/**
	 * @param string $dispose_jardin
	 */
	public function setDispose_jardin($dispose_jardin) {
		$this->dispose_jardin = $dispose_jardin;
	}

	/**
	 * @param string $type_travaux
	 */
	public function setType_travaux($type_travaux) {
		$this->type_travaux = $type_travaux;
	}

	/**
	 * @param Demandedevis $id_demande
	 */
	public function setId_demande($id_demande) {
		$this->id_demande = $id_demande;
	}
	

}