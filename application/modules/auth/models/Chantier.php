<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="chantier")
 * @Entity(repositoryClass="Auth_Model_ChantierRepository")
 */
class Auth_Model_Chantier {
  
  /**
   * @var integer $id_chantier
   *
   * @Column(name="ID_CHANTIER", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_chantier;
  
  /**
   * @var string $adresse
   *
   * @Column(name="ADRESSE", type="string", length=50, nullable=false)
   */
  private $adresse;
  
  /**
   * @var string $adresse2
   *
   * @Column(name="ADRESSE2", type="string", length=50, nullable=false)
   */
  private $adresse2;
  
  
  /**
   * @var integer $id_zone
   *
   * @Column(name="ID_ZONE", type="integer", length=20, nullable=false)
   */
  private $id_zone;
  
  
  /**
   * @var Zone
   *
   * @ManyToOne(targetEntity="Auth_Model_Zone")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ZONE", referencedColumnName="ID_ZONE")
   * })
   */
  private $zone;
  
  
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
   * @return the $id_chantier
   */
  public function getId_chantier() {
    
    return $this->id_chantier;
  }
  
  
  /**
   * @return the $adresse
   */
  public function getAdresse() {
    
    return $this->adresse;
  }
  
  
  /**
   * @return the $adresse2
   */
  public function getAdresse2() {
    
    return $this->adresse2;
  }
  
  
  /**
   * @return the $id_zone
   */
  public function getId_zone() {
    
    return $this->id_zone;
  }
  
  
  /**
   * @return the $zone
   */
  public function getZone() {
    
    return $this->zone;
  }
  
  
  /**
   * @param integer $id_chantier
   */
  public function setId_chantier( $id_chantier ) {
    
    $this->id_chantier = $id_chantier;
  }
  
  
  /**
   * @param string $adresse
   */
  public function setAdresse( $adresse ) {
    
    $this->adresse = $adresse;
  }
  
  
  /**
   * @param string $adresse2
   */
  public function setAdresse2( $adresse2 ) {
    
    $this->adresse2 = $adresse2;
  }
  
  
  /**
   * @param integer $id_zone
   */
  public function setId_zone( $id_zone ) {
    
    $this->id_zone = $id_zone;
  }
  
  
  /**
   * @param \Auth_Model_Zone $zone
   */
  public function setZone( $zone ) {
    
    $this->zone = $zone;
  }
  
  
}
