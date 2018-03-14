<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="qualif_piscine")
 * @Entity(repositoryClass="Auth_Model_PiscineRepository")
 */
class Auth_Model_Piscine
{
    /**
     * @var integer $id_qualif_piscine
     *
     * @Column(name="ID_QUALIF_PISCINE", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id_qualif_piscine;

    /**
     * @var string $type_piscine
     *
     * @Column(name="TYPE_PISCINE", type="string", length=50, nullable=false)
     */
    private $type_piscine;
	
	/**
     * @var string $dimension
     *
     * @Column(name="DIMENSION", type="string", length=50, nullable=false)
     */
    private $dimension;
	
	/**
     * @var string $forme_piscine
     *
     * @Column(name="FORME_PISCINE", type="string", length=50, nullable=false)
     */
    private $forme_piscine;
	
	/**
     * @var string $securite_piscine
     *
     * @Column(name="SECURITE_PISCINE", type="string", length=50, nullable=false)
     */
    private $securite_piscine;


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
	 * @return the $id_qualif_piscine
	 */
	public function getId_qualif_piscine() {
		return $this->id_qualif_piscine;
	}

	/**
	 * @return the $type_piscine
	 */
	public function getType_piscine() {
		return $this->type_piscine;
	}
	
	/**
	 * @return the $dimension
	 */
	public function getDimension() {
		return $this->dimension;
	}
	
	/**
	 * @return the $forme_piscine
	 */
	public function getForme_piscine() {
		return $this->forme_piscine;
	}
	
	/**
	 * @return the $securite_piscine
	 */
	public function getSecurite_piscine() {
		return $this->securite_piscine;
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
	 * @param integer $id_qualif_piscine
	 */
	public function setId_qualif_piscine($id_qualif_piscine) {
		$this->id_qualif_piscine = $id_qualif_piscine;
	}

	/**
	 * @param string $type_piscine
	 */
	public function setType_piscine($type_piscine) {
		$this->type_piscine = $type_piscine;
	}
	
	/**
	 * @param string $dimension
	 */
	public function setDimension($dimension) {
		$this->dimension = $dimension;
	}
	
	/**
	 * @param string $forme_piscine
	 */
	public function setForme_piscine($forme_piscine) {
		$this->forme_piscine = $forme_piscine;
	}
	
	/**
	 * @param string $securite_piscine
	 */
	public function setSecurite_piscine($securite_piscine) {
		$this->securite_piscine = $securite_piscine;
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