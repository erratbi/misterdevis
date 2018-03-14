<?php


/**
 * Auth_Model_TraitementCharpente
 *
 * @Table(name="qualif_traitement_charpente")
 * @Entity(repositoryClass="Auth_Model_TraitementCharpenteRepository")
 */
class Auth_Model_TraitementCharpente {
  
  /**
   * @var integer $id_qualif_traitement_charpente
   *
   * @Column(name="ID_QUALIF_TRAITEMENT_CHARPENTE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_traitement_charpente;
  
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
   * @var string $diagnostic_termite_fait
   *
   * @Column(name="DIAGNOSTIC_TERMITE_FAIT", type="string", length=200, nullable=true)
   */
  private $diagnostic_termite_fait;
  
  /**
   * @var string $traitement_charpente
   *
   * @Column(name="TRAITEMENT_CHARPENTE", type="string", length=200, nullable=true)
   */
  private $traitement_charpente;
  
  /**
   * @var string $traitement_termite
   *
   * @Column(name="TRAITEMENT_TERMITE", type="string", length=200, nullable=true)
   */
  private $traitement_termite;
  
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
  public function getId_qualif_traitement_charpente() {
    
    return $this->id_qualif_traitement_charpente;
  }
  
  /**
   * @param int $id_qualif_traitement_charpente
   */
  public function setId_qualif_traitement_charpente( $id_qualif_traitement_charpente ) {
    
    $this->id_qualif_traitement_charpente = $id_qualif_traitement_charpente;
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
  public function getDiagnostic_termite_fait() {
    
    return $this->diagnostic_termite_fait;
  }
  
  /**
   * @param string $diagnostic_termite_fait
   */
  public function setDiagnostic_termite_fait( $diagnostic_termite_fait ) {
    
    $this->diagnostic_termite_fait = $diagnostic_termite_fait;
  }
  
  /**
   * @return string
   */
  public function getTraitement_charpente() {
    
    return $this->traitement_charpente;
  }
  
  /**
   * @param string $traitement_charpente
   */
  public function setTraitement_charpente( $traitement_charpente ) {
    
    $this->traitement_charpente = $traitement_charpente;
  }
  
  /**
   * @return string
   */
  public function getTraitement_termite() {
    
    return $this->traitement_termite;
  }
  
  /**
   * @param string $traitement_termite
   */
  public function setTraitement_termite( $traitement_termite ) {
    
    $this->traitement_termite = $traitement_termite;
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
