<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_Diagnostic
 *
 * @Table(name="qualif_diagnostic")
 * @Entity(repositoryClass="Auth_Model_DiagnosticRepository")
 */
class Auth_Model_Diagnostic {
  
  /**
   * @var integer $id_qualif_diagnostic
   *
   * @Column(name="ID_QUALIF_DIAGNOSTIC", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_diagnostic;
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=true)
   */
  private $nbre_piece;
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=true)
   */
  private $surface_totale;
  
  /**
   * @var string $annee_construction
   *
   * @Column(name="ANNEE_CONSTRUCTION", type="string", length=200, nullable=true)
   */
  private $annee_construction;
  
  
  /**
   * @var string $diagnostic_fait
   *
   * @Column(name="DIAGNOSTIC_FAIT", type="string", length=200, nullable=true)
   */
  private $diagnostic_fait;
  
  
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
  public function getId_qualif_diagnostic() {
    
    return $this->id_qualif_diagnostic;
  }
  
  /**
   * @param int $id_qualif_diagnostic
   */
  public function setId_qualif_diagnostic( $id_qualif_diagnostic ) {
    
    $this->id_qualif_diagnostic = $id_qualif_diagnostic;
  }
  
  /**
   * @return string
   */
  public function getType_diagnostic() {
    
    return $this->type_diagnostic;
  }
  
  /**
   * @param string $type_diagnostic
   */
  public function setType_diagnostic( $type_diagnostic ) {
    
    $this->type_diagnostic = $type_diagnostic;
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
  public function getDiagnostic_fait() {
    
    return $this->diagnostic_fait;
  }
  
  /**
   * @param string $diagnostic_fait
   */
  public function setDiagnostic_fait( $diagnostic_fait ) {
    
    $this->diagnostic_fait = $diagnostic_fait;
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
  public function getAnnee_construction() {
    
    return $this->annee_construction;
  }
  
  /**
   * @param string $annee_construction
   */
  public function setAnnee_construction( $annee_construction ) {
    
    $this->annee_construction = $annee_construction;
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
