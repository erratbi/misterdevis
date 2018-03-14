<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_Departement
 *
 * @Table(name="departement")
 * @Entity(repositoryClass="Auth_Model_DepartementRepository")
 */
class Auth_Model_Departement {
  
  /**
   * @var string $code_departement
   *
   * @Column(name="CODE_DEPARTEMENT", type="string", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $code_departement;
  
  /**
   * @var string $nom_departement
   *
   * @Column(name="NOM_DEPARTEMENT", type="string", length=50, nullable=false)
   */
  private $nom_departement;
  
  
  /**
   * Many Departements have Many Artisans.
   * @ManyToMany(targetEntity="Auth_Model_Artisan", inversedBy="departements")
   * @JoinTable(name="intervenir",
   *      joinColumns={@JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")}
   *   )
   */
  protected $artisans;

    /**
     * One Deparatement has Many Zones.
     * @OneToMany(targetEntity="Auth_Model_Zone", mappedBy="departement")
     */
    private $zones;
  
  
  public function __construct() {
    
    $this->artisans = new \Doctrine\Common\Collections\ArrayCollection();
  }
  
  public function addArtisan( Auth_Model_Artisan $artisan ) {
    
    if ( $this->artisans->contains( $artisan ) ) {
      return;
    }
    
    $this->artisans->add( $artisan );
    $artisan->addDepartement( $this );
  }
  
  
  public function removeArtisan( Auth_Model_Artisan $artisan ) {
    
    if ( $this->artisans->contains( $artisan ) ) {
      return;
    }
    $this->artisans->removeElement( $artisan );
    $artisan->removeDepartement( $this );
  }
  
  
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
   * @return string $code_departement
   */
  public function getCode_departement() {
    
    return $this->code_departement;
  }
  
  
  /**
   * @return the $nom_departement
   */
  public function getNom_departement() {
    
    return $this->nom_departement;
  }
  
  
  /**
   * @param string $code_departement
   */
  public function setCode_departement( $code_departement ) {
    
    $this->code_departement = $code_departement;
  }
  
  
  /**
   * @param string $nom_departement
   */
  public function setNom_departement( $nom_departement ) {
    
    $this->nom_departement = $nom_departement;
  }
  
}
