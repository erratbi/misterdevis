<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_plombrie")
 * @Entity(repositoryClass="Auth_Model_PlombrieRepository")
 */
class Auth_Model_Plombrie {
  
  /**
   * @var integer $id_qualif_plombrie
   *
   * @Column(name="ID_QUALIF_PLOMBRIE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_plombrie;
  
  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=50, nullable=false)
   */
  private $surface;
  
  
  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;
  
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
  public function getId_qualif_plombrie() {
    
    return $this->id_qualif_plombrie;
  }
  
  /**
   * @param int $id_qualif_plombrie
   */
  public function setId_qualif_plombrie( $id_qualif_plombrie ) {
    
    $this->id_qualif_plombrie = $id_qualif_plombrie;
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
