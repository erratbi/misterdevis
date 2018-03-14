<?php


/**
 * Intervenir
 *
 * @Table(name="code")
 * @Entity(repositoryClass="Auth_Model_CodeRepository")
 */
class Auth_Model_Code {
  
  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_artisan;
  
  /**
   * @var string $id_zone
   *
   * @Column(name="ID_ZONE", type="string", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_zone;
  
  
  /**
   * @var Auth_Model_Zone $zone
   *
   * @ManyToOne(targetEntity="Auth_Model_Departement")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ZONE", referencedColumnName="ID_ZONE")
   * })
   */
  private $zone;
  
  
  /**
   * @var Artisan $artisan
   *
   * @ManyToOne(targetEntity="Auth_Model_Artisan")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")
   * })
   */
  private $artisan;
  
  
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
   * @return the $id_artisan
   */
  public function getId_artisan() {
    
    return $this->id_artisan;
  }
  
  
  /**
   * @return string $id_zone
   */
  public function getId_zone() {
    
    return $this->id_zone;
  }
  
  /**
   * @return the $artisan
   */
  public function getArtisan() {
    
    return $this->artisan;
  }
  
  
  /**
   * @return the $zone
   */
  public function getZone() {
    
    return $this->zone;
  }
  
  
  /**
   * @param integer $id_artisan
   */
  public function setId_artisan( $id_artisan ) {
    
    $this->id_artisan = $id_artisan;
  }
  
  
  /**
   * @param string $id_zone
   */
  public function setId_zone( $id_zone ) {
    
    $this->id_zone = $id_zone;
  }
  
  
  /**
   * @param Auth_Model_Artisan $artisan
   */
  public function setArtisan( $artisan ) {
    
    $this->artisan = $artisan;
  }
  
  
  /**
   * @param Auth_Model_Zone $zone
   */
  public function setZone( $zone ) {
    
    $this->zone = $zone;
  }
}
