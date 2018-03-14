<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="qualif_climatisation")
 * @Entity(repositoryClass="Auth_Model_ClimatisationRepository")
 */
class Auth_Model_Climatisation
{
    /**
     * @var integer $id_qualif_climatisation
     *
     * @Column(name="ID_QUALIF_CLIMATISATION", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id_qualif_climatisation;

    /**
     * @var string $nbre_piece
     *
     * @Column(name="NBRE_PIECE", type="string", length=50, nullable=false)
     */
    private $nbre_piece;
	
	/**
     * @var string $surface_climatiser
     *
     * @Column(name="SURFACE_CLIMATISER", type="string", length=50, nullable=false)
     */
    private $surface_climatiser;
	
	/**
     * @var string $hauteur_plafond
     *
     * @Column(name="HAUTEUR_PLAFOND", type="string", length=50, nullable=false)
     */
    private $hauteur_plafond;
	
	/**
     * @var string $accord_copropriete
     *
     * @Column(name="ACCORD_COPROPRIETE", type="string", length=50, nullable=false)
     */
    private $accord_copropriete;


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
	 * @return the $id_qualif_climatisation
	 */
	public function getId_qualif_climatisation() {
		return $this->id_qualif_climatisation;
	}

	/**
	 * @return the $nbre_piece
	 */
	public function getNbre_piece() {
		return $this->nbre_piece;
	}
	
	/**
	 * @return the $surface_climatiser
	 */
	public function getSurface_climatiser() {
		return $this->surface_climatiser;
	}
	
	/**
	 * @return the $hauteur_plafond
	 */
	public function getHauteur_plafond() {
		return $this->hauteur_plafond;
	}
	
	/**
	 * @return the $accord_copropriete
	 */
	public function getAccord_copropriete() {
		return $this->accord_copropriete;
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
	 * @param integer $id_qualif_climatisation
	 */
	public function setId_qualif_climatisation($id_qualif_climatisation) {
		$this->id_qualif_climatisation = $id_qualif_climatisation;
	}

	/**
	 * @param string $nbre_piece
	 */
	public function setNbre_piece($nbre_piece) {
		$this->nbre_piece = $nbre_piece;
	}
	
	/**
	 * @param string $surface_climatiser
	 */
	public function setSurface_climatiser($surface_climatiser) {
		$this->surface_climatiser = $surface_climatiser;
	}
	
	/**
	 * @param string $hauteur_plafond
	 */
	public function setHauteur_plafond($hauteur_plafond) {
		$this->hauteur_plafond = $hauteur_plafond;
	}
	
	/**
	 * @param string $accord_copropriete
	 */
	public function setAccord_copropriete($accord_copropriete) {
		$this->accord_copropriete = $accord_copropriete;
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