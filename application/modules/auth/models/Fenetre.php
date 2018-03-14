<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="qualif_fenetre")
 * @Entity(repositoryClass="Auth_Model_FenetreRepository")
 */
class Auth_Model_Fenetre
{
    /**
     * @var integer $id_qualif_fenetre
     *
     * @Column(name="ID_QUALIF_FENETRE", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id_qualif_fenetre;

    /**
     * @var string $nbre_fenetre
     *
     * @Column(name="NBRE_FENETRE", type="string", length=50, nullable=false)
     */
    private $nbre_fenetre;
	
	/**
     * @var string $depose_fenetre_existant
     *
     * @Column(name="DEPOSE_FENETRE_EXISTANT", type="string", length=50, nullable=false)
     */
    private $depose_fenetre_existant;
	
	/**
     * @var string $type_fenetre
     *
     * @Column(name="TYPE_FENETRE", type="string", length=50, nullable=false)
     */
    private $type_fenetre;

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
	 * @return the $id_qualif_fenetre
	 */
	public function getId_qualif_fenetre() {
		return $this->id_qualif_fenetre;
	}

	/**
	 * @return the $nbre_fenetre
	 */
	public function getNbre_fenetre() {
		return $this->nbre_fenetre;
	}
	
	/**
	 * @return the $depose_fenetre_existant
	 */
	public function getDepose_fenetre_existant() {
		return $this->depose_fenetre_existant;
	}
	
	/**
	 * @return the $type_fenetre
	 */
	public function getType_fenetre() {
		return $this->type_fenetre;
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
	 * @param integer $id_qualif_fenetre
	 */
	public function setId_qualif_fenetre($id_qualif_fenetre) {
		$this->id_qualif_fenetre = $id_qualif_fenetre;
	}

	/**
	 * @param string $nbre_fenetre
	 */
	public function setNbre_fenetre($nbre_fenetre) {
		$this->nbre_fenetre = $nbre_fenetre;
	}
	
	/**
	 * @param string $depose_fenetre_existant
	 */
	public function setDepose_fenetre_existant($depose_fenetre_existant) {
		$this->depose_fenetre_existant = $depose_fenetre_existant;
	}
	
	/**
	 * @param string $type_fenetre
	 */
	public function setType_fenetre($type_fenetre) {
		$this->type_fenetre = $type_fenetre;
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