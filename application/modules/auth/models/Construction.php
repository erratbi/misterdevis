<?php


/**
 * Auth_Model_Construction
 *
 * @Table(name="qualif_construction")
 * @Entity(repositoryClass="Auth_Model_ConstructionRepository")
 */
class Auth_Model_Construction {
  
  /**
   * @var integer $id_qualif_construction
   *
   * @Column(name="ID_QUALIF_CONSTRUCTION", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_construction;
  
  /**
   * @var string $type_maison
   *
   * @Column(name="TYPE_MAISON", type="string", length=50, nullable=false)
   */
  private $type_maison;
  
  /**
   * @var string $type_construction
   *
   * @Column(name="TYPE_CONSTRUCTION", type="string", length=50, nullable=false)
   */
  private $type_construction;
  
  /**
   * @var string $style_construction
   *
   * @Column(name="STYLE_CONSTRUCTION", type="string", length=50, nullable=false)
   */
  private $style_construction;
  
  
  /**
   * @var string $nbre_pieces
   *
   * @Column(name="NBRE_PIECES", type="string", length=50, nullable=false)
   */
  private $nbre_pieces;
  
  /**
   * @var string $surface_habitable
   *
   * @Column(name="SURFACE_HABITABLE", type="string", length=50, nullable=false)
   */
  private $surface_habitable;
  
  
  /**
   * @var string $terrain
   *
   * @Column(name="TERRAIN", type="string", length=200, nullable=false)
   */
  private $terrain;
  
  
  /**
   * @var string $architecte
   *
   * @Column(name="ARCHITECTE", type="string", length=200, nullable=false)
   */
  private $architecte;
  
  
  /**
   * @var string $permis_construction
   *
   * @Column(name="PERMIS_CONSTRUCTION", type="string", length=200, nullable=false)
   */
  private $permis_construction;
  
  
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
   * @param $attr
   *
   * @return mixed
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
  public function getId_qualif_construction() {
    
    return $this->id_qualif_construction;
  }
  
  /**
   * @param int $id_qualif_construction
   */
  public function setId_qualif_construction( $id_qualif_construction ) {
    
    $this->id_qualif_construction = $id_qualif_construction;
  }
  
  /**
   * @return string
   */
  public function getType_maison() {
    
    return $this->type_maison;
  }
  
  /**
   * @param string $type_maison
   */
  public function setType_maison( $type_maison ) {
    
    $this->type_maison = $type_maison;
  }
  
  /**
   * @return string
   */
  public function getType_construction() {
    
    return $this->type_construction;
  }
  
  /**
   * @param string $type_construction
   */
  public function setType_construction( $type_construction ) {
    
    $this->type_construction = $type_construction;
  }
  
  /**
   * @return string
   */
  public function getStyle_construction() {
    
    return $this->style_construction;
  }
  
  /**
   * @param string $style_construction
   */
  public function setStyle_construction( $style_construction ) {
    
    $this->style_construction = $style_construction;
  }
  
  /**
   * @return string
   */
  public function getNbre_pieces() {
    
    return $this->nbre_pieces;
  }
  
  /**
   * @param string $nbre_pieces
   */
  public function setNbre_pieces( $nbre_pieces ) {
    
    $this->nbre_pieces = $nbre_pieces;
  }
  
  /**
   * @return string
   */
  public function getSurface_habitable() {
    
    return $this->surface_habitable;
  }
  
  /**
   * @param string $surface_habitable
   */
  public function setSurface_habitable( $surface_habitable ) {
    
    $this->surface_habitable = $surface_habitable;
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
  public function getArchitecte() {
    
    return $this->architecte;
  }
  
  /**
   * @param string $architecte
   */
  public function setArchitecte( $architecte ) {
    
    $this->architecte = $architecte;
  }
  
  /**
   * @return string
   */
  public function getPermis_construction() {
    
    return $this->permis_construction;
  }
  
  /**
   * @param string $permis_construction
   */
  public function setPermis_construction( $permis_construction ) {
    
    $this->permis_construction = $permis_construction;
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
