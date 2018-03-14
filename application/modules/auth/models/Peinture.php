<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_peinture")
 * @Entity(repositoryClass="Auth_Model_PeintureRepository")
 */
class Auth_Model_Peinture {
  
  /**
   * @var integer $id_qualif_peinture
   *
   * @Column(name="ID_QUALIF_PEINTURE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_peinture;
  
  /**
   * @var string $etat_surface
   *
   * @Column(name="ETAT_SURFACE", type="string", length=50, nullable=false)
   */
  private $etat_surface;
  
  
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
  public function getId_qualif_peinture() {
    
    return $this->id_qualif_peinture;
  }
  
  /**
   * @param int $id_qualif_peinture
   */
  public function setId_qualif_peinture( $id_qualif_peinture ) {
    
    $this->id_qualif_peinture = $id_qualif_peinture;
  }
  
  /**
   * @return string
   */
  public function getEtat_surface() {
    
    return $this->etat_surface;
  }
  
  /**
   * @param string $etat_surface
   */
  public function setEtat_surface( $etat_surface ) {
    
    $this->etat_surface = $etat_surface;
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
