<?php


/**
 * Intervenir
 *
 * @Table(name="intervenir")
 * @Entity(repositoryClass="Auth_Model_IntervenirRepository")
 */
class Auth_Model_Intervenir {
  
  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_artisan;
  
  /**
   * @var string $code_departement
   *
   * @Column(name="CODE_DEPARTEMENT", type="string", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $code_departement;
  
  
  /**
   * @var Auth_Model_Departement $departement
   *
   * @ManyToOne(targetEntity="Auth_Model_Departement")
   * @JoinColumns({
   *   @JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")
   * })
   */
  private $departement;
  
  
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
   * @return string $code_departement
   */
  public function getCode_departement() {
    
    return $this->code_departement;
  }
  
  /**
   * @return the $artisan
   */
  public function getArtisan() {
    
    return $this->artisan;
  }
  
  
  /**
   * @return the $departement
   */
  public function getDepartement() {
    
    return $this->departement;
  }
  
  
  /**
   * @param integer $id_artisan
   */
  public function setId_artisan( $id_artisan ) {
    
    $this->id_artisan = $id_artisan;
  }
  
  
  /**
   * @param string $code_departement
   */
  public function setCode_departement( $code_departement ) {
    
    $this->code_departement = $code_departement;
  }
  
  
  /**
   * @param Auth_Model_Artisan $artisan
   */
  public function setArtisan( $artisan ) {
    
    $this->artisan = $artisan;
  }
  
  
  /**
   * @param Auth_Model_Departement $departement
   */
  public function setDepartement( $departement ) {
    
    $this->departement = $departement;
  }
}
