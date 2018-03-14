<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_PorteBlindee
 *
 * @Table(name="qualif_porte_blindee")
 * @Entity(repositoryClass="Auth_Model_PorteBlindeeRepository")
 */
class Auth_Model_PorteBlindee {
  
  /**
   * @var integer $id_qualif_porte_blindee
   *
   * @Column(name="ID_QUALIF_PORTE_BLINDEE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_porte_blindee;
  
  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=true)
   */
  private $type_travaux;
  
  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=200, nullable=true)
   */
  private $surface;
  
  /**
   * @var string $garder_porte_actuelle
   *
   * @Column(name="GARDER_PORTE_ACTUELLE", type="string", length=200, nullable=true)
   */
  private $garder_porte_actuelle;
  
  /**
   * @var \Auth_Model_Demandedevis
   *
   * @ManyToOne(targetEntity="Auth_Model_Demandedevis")
   * @JoinColumns({
   *   @JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")
   * })
   */
  private $id_demande;
  
  
  /**
   * @param $attr
   * @param $val
   */
  public function __set( $attr, $val ) {
    
    $this->$attr = $val;
  }
  
  /**
   * @param mixed attribute
   */
  public function __get( $attr ) {
    
    return $this->$attr;
  }
  
  /**
   * @return array
   */
  public function toArray() {
    
    return get_object_vars( $this );
  }
  
  /**
   * @return int
   */
  public function getId_qualif_porte_blindee() {
    
    return $this->id_qualif_porte_blindee;
  }
  
  /**
   * @param int $id_qualif_porte_blindee
   */
  public function setId_qualif_porte_blindee( $id_qualif_porte_blindee ) {
    
    $this->id_qualif_porte_blindee = $id_qualif_porte_blindee;
  }
  
  /**
   * @return string
   */
  public function getSurface() {
    
    return $this->surface;
  }
  
  /**
   * @param string $surface
   */
  public function setSurface( $surface ) {
    
    $this->surface = $surface;
  }
  
  /**
   * @return string
   */
  public function getType_travaux() {
    
    return $this->type_travaux;
  }
  
  /**
   * @param string $type_travaux
   */
  public function setType_travaux( $type_travaux ) {
    
    $this->type_travaux = $type_travaux;
  }
  
  /**
   * @return string
   */
  public function getGarder_porte_actuelle() {
    
    return $this->garder_porte_actuelle;
  }
  
  /**
   * @param string $garder_porte_actuelle
   */
  public function setGarder_porte_actuelle( $garder_porte_actuelle ) {
    
    $this->garder_porte_actuelle = $garder_porte_actuelle;
  }
  
  /**
   * @return \Auth_Model_Demandedevis
   */
  public function getId_demande() {
    
    return $this->id_demande;
  }
  
  /**
   * @param \Auth_Model_Demandedevis $id_demande
   */
  public function setId_demande( $id_demande ) {
    
    $this->id_demande = $id_demande;
  }
  
  
}
