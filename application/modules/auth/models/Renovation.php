<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_renovation")
 * @Entity(repositoryClass="Auth_Model_RenovationRepository")
 */
class Auth_Model_Renovation {
  
  /**
   * @var integer $id_qualif_renovation
   *
   * @Column(name="ID_QUALIF_RENOVATION", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_renovation;
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=50, nullable=false)
   */
  private $nbre_piece;
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=50, nullable=true)
   */
  private $surface_totale;
  
  /**
   * @var string $etat_general
   *
   * @Column(name="ETAT_GENERAL", type="string", length=50, nullable=true)
   */
  private $etat_general;
  
  /**
   * @var string $piece_renover
   *
   * @Column(name="PIECE_RENOVER", type="string", length=50, nullable=true)
   */
  private $piece_renover;
  
  
  /**
   * @var string $etat_murs
   *
   * @Column(name="ETAT_MURS", type="string", length=200, nullable=true)
   */
  private $etat_murs;
  
  
  /**
   * @var string $etat_sol
   *
   * @Column(name="ETAT_SOL", type="string", length=200, nullable=true)
   */
  private $etat_sol;
  
  
  /**
   * @var string $etat_plafond
   *
   * @Column(name="ETAT_PLAFOND", type="string", length=200, nullable=true)
   */
  private $etat_plafond;
  
  
  /**
   * @var string $electrique
   *
   * @Column(name="ELECTRIQUE", type="string", length=200, nullable=true)
   */
  private $electrique;
  
  
  /**
   * @var string $plombrie
   *
   * @Column(name="PLOMBRIE", type="string", length=200, nullable=true)
   */
  private $plombrie;
  
  
  /**
   * @var string $menuiserie
   *
   * @Column(name="MENUISERIE", type="string", length=200, nullable=true)
   */
  private $menuiserie;
  
  
  /**
   * @var string $architecte
   *
   * @Column(name="ARCHITECTE", type="string", length=200, nullable=true)
   */
  private $architecte;
  
  
  /**
   * @var string $permis_construction
   *
   * @Column(name="PERMIS_CONSTRUCTION", type="string", length=200, nullable=true)
   */
  private $permis_construction;
  
  
  /**
   * @var int Demandedevis
   *
   * @ManyToOne(targetEntity="Auth_Model_Demandedevis")
   * @JoinColumns({
   *   @JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")
   * })
   */
  private $id_demande;
  
  
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
   * @return int $id_qualif_renovation
   */
  public function getId_qualif_renovation() {
    
    return $this->id_qualif_renovation;
  }
  
  /**
   * @return string $nbre_piece
   */
  public function getNbre_piece() {
    
    return $this->nbre_piece;
  }
  
  /**
   * @return string $surface_totale
   */
  public function getSurface_totale() {
    
    return $this->surface_totale;
  }
  
  /**
   * @return string $etat_general
   */
  public function getEtat_general() {
    
    return $this->etat_general;
  }
  
  /**
   * @return string $piece_renover
   */
  public function getPiece_renover() {
    
    return $this->piece_renover;
  }
  
  /**
   * @return string $etat_murs
   */
  public function getEtat_murs() {
    
    return $this->etat_murs;
  }
  
  
  /**
   * @return string $etat_sol
   */
  public function getEtat_sol() {
    
    return $this->etat_sol;
  }
  
  
  /**
   * @return string $etat_plafond
   */
  public function getEtat_plafond() {
    
    return $this->etat_plafond;
  }
  
  
  /**
   * @return string $electrique
   */
  public function getElectrique() {
    
    return $this->electrique;
  }
  
  
  /**
   * @return string $plombrie
   */
  public function getPlombrie() {
    
    return $this->plombrie;
  }
  
  
  /**
   * @return string $menuiserie
   */
  public function getMenuiserie() {
    
    return $this->menuiserie;
  }
  
  
  /**
   * @return string $architecte
   */
  public function getArchitecte() {
    
    return $this->architecte;
  }
  
  
  /**
   * @return string $permis_construction
   */
  public function getPermis_construction() {
    
    return $this->permis_construction;
  }
  
  /**
   * @return the $id_demande
   */
  public function getId_demande() {
    
    return $this->id_demande;
  }
  
  /**
   * @param integer $id_qualif_renovation
   */
  public function setId_qualif_renovation( $id_qualif_renovation ) {
    
    $this->id_qualif_renovation = $id_qualif_renovation;
  }
  
  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece( $nbre_piece ) {
    
    $this->nbre_piece = $nbre_piece;
  }
  
  /**
   * @param string $surface_totale
   */
  public function setSurface_totale( $surface_totale ) {
    
    $this->surface_totale = $surface_totale;
  }
  
  /**
   * @param string $etat_general
   */
  public function setEtat_general( $etat_general ) {
    
    $this->etat_general = $etat_general;
  }
  
  /**
   * @param string $piece_renover
   */
  public function setPiece_renover( $piece_renover ) {
    
    $this->piece_renover = $piece_renover;
  }
  
  /**
   * @param string $etat_murs
   */
  public function setEtat_murs( $etat_murs ) {
    
    $this->etat_murs = $etat_murs;
  }
  
  /**
   * @param string $etat_sol
   */
  public function setEtat_sol( $etat_sol ) {
    
    $this->etat_sol = $etat_sol;
  }
  
  /**
   * @param string $etat_plafond
   */
  public function setEtat_plafond( $etat_plafond ) {
    
    $this->etat_plafond = $etat_plafond;
  }
  
  /**
   * @param string $electrique
   */
  public function setElectrique( $electrique ) {
    
    $this->electrique = $electrique;
  }
  
  
  /**
   * @param string $plombrie
   */
  public function setPlombrie( $plombrie ) {
    
    $this->plombrie = $plombrie;
  }
  
  /**
   * @param string $menuiserie
   */
  public function setMenuiserie( $menuiserie ) {
    
    $this->menuiserie = $menuiserie;
  }
  
  /**
   * @param string $architecte
   */
  public function setArchitecte( $architecte ) {
    
    $this->architecte = $architecte;
  }
  
  /**
   * @param string $permis_construction
   */
  public function setPermis_construction( $permis_construction ) {
    
    $this->permis_construction = $permis_construction;
  }
  
  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande( $id_demande ) {
    
    $this->id_demande = $id_demande;
  }
  
  
}
