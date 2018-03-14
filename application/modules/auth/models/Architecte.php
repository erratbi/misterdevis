<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_architecte")
 * @Entity(repositoryClass="Auth_Model_ArchitecteRepository")
 */
class Auth_Model_Architecte {
  
  /**
   * @var integer $id_qualif_architecte
   *
   * @Column(name="ID_QUALIF_ARCHITECTE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_architecte;
  
  /**
   * @var string $mision
   *
   * @Column(name="MISION", type="string", length=50, nullable=false)
   */
  private $mision;
  
  /**
   * @var string $pieces_meublees
   *
   * @Column(name="PIECES_MEUBLEES", type="string", length=50, nullable=false)
   */
  private $pieces_meublees;
  
  /**
   * @var string $description_projet
   *
   * @Column(name="DESCRIPTION_PROJET", type="string", length=50, nullable=false)
   */
  private $description_projet;
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=50, nullable=false)
   */
  private $surface_totale;
  
  /**
   * @var string $terrain
   *
   * @Column(name="TERRAIN", type="string", length=50, nullable=false)
   */
  private $terrain;
  
  
  /**
   * @var string $terrain_viabilise
   *
   * @Column(name="TERRAIN_VIABILISE", type="string", length=200, nullable=false)
   */
  private $terrain_viabilise;
  
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
  public function getId_qualif_architecte() {
    
    return $this->id_qualif_architecte;
  }
  
  /**
   * @param int $id_qualif_architecte
   */
  public function setId_qualif_architecte( $id_qualif_architecte ) {
    
    $this->id_qualif_architecte = $id_qualif_architecte;
  }
  
  /**
   * @return string
   */
  public function getMision() {
    
    return $this->mision;
  }
  
  /**
   * @param string $mision
   */
  public function setMision( $mision ) {
    
    $this->mision = $mision;
  }
  
  /**
   * @return string
   */
  public function getPieces_meublees() {
    
    return $this->pieces_meublees;
  }
  
  /**
   * @param string $pieces_meublees
   */
  public function setPieces_meublees( $pieces_meublees ) {
    
    $this->pieces_meublees = $pieces_meublees;
  }
  
  /**
   * @return string
   */
  public function getDescription_projet() {
    
    return $this->description_projet;
  }
  
  /**
   * @param string $description_projet
   */
  public function setDescription_projet( $description_projet ) {
    
    $this->description_projet = $description_projet;
  }
  
  /**
   * @return string
   */
  public function getSurface_totale() {
    
    return $this->surface_totale;
  }
  
  /**
   * @param string $surface_totale
   */
  public function setSurface_totale( $surface_totale ) {
    
    $this->surface_totale = $surface_totale;
  }
  
  /**
   * @return string
   */
  public function getTerrain() {
    
    return $this->terrain;
  }
  
  /**
   * @param string $terrain
   */
  public function setTerrain( $terrain ) {
    
    $this->terrain = $terrain;
  }
  
  /**
   * @return string
   */
  public function getTerrain_viabilise() {
    
    return $this->terrain_viabilise;
  }
  
  /**
   * @param string $terrain_viabilise
   */
  public function setTerrain_viabilise( $terrain_viabilise ) {
    
    $this->terrain_viabilise = $terrain_viabilise;
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
