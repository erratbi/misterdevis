<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_electricite")
 * @Entity(repositoryClass="Auth_Model_ElectriciteRepository")
 */
class Auth_Model_Electricite {
  
  /**
   * @var integer $id_qualif_electricite
   *
   * @Column(name="ID_QUALIF_ELECTRICITE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_electricite;
  
  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=50, nullable=false)
   */
  private $surface;
  
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
  public function getId_qualif_electricite() {
    
    return $this->id_qualif_electricite;
  }
  
  /**
   * @param int $id_qualif_electricite
   */
  public function setId_qualif_electricite( $id_qualif_electricite ) {
    
    $this->id_qualif_electricite = $id_qualif_electricite;
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
