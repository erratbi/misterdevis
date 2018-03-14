<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_moquette")
 * @Entity(repositoryClass="Auth_Model_MoquetteRepository")
 */
class Auth_Model_Moquette {
  
  /**
   * @var integer $id_qualif_moquette
   *
   * @Column(name="ID_QUALIF_MOQUETTE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_moquette;
  
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=false)
   */
  private $nbre_piece;
  
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=false)
   */
  private $surface_totale;
  
  
  /**
   * @var string $enlevement_revetement
   *
   * @Column(name="ENLEVEMENT_REVETEMENT", type="string", length=200, nullable=false)
   */
  private $enlevement_revetement;
  
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
  public function getId_qualif_moquette() {
    
    return $this->id_qualif_moquette;
  }
  
  /**
   * @param int $id_qualif_moquette
   */
  public function setId_qualif_moquette( $id_qualif_moquette ) {
    
    $this->id_qualif_moquette = $id_qualif_moquette;
  }
  
  
  /**
   * @return string
   */
  public function getNbre_piece() {
    
    return $this->nbre_piece;
  }
  
  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece( $nbre_piece ) {
    
    $this->nbre_piece = $nbre_piece;
  }
  
  
  /**
   * @return string
   */
  public function getEnlevement_revetement() {
    
    return $this->enlevement_revetement;
  }
  
  /**
   * @param string $enlevement_revetement
   */
  public function setEnlevement_revetement( $enlevement_revetement ) {
    
    $this->enlevement_revetement = $enlevement_revetement;
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
