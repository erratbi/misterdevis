<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_demenagement_internationnal")
 * @Entity(repositoryClass="Auth_Model_DemenagementInternationnalRepository")
 */
class Auth_Model_DemenagementInternationnal {
  
  /**
   * @var integer $id_qualif_demenagement_internationnal
   *
   * @Column(name="ID_QUALIF_DEMENAGEMENT_INTERNATIONNAL", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_demenagement_internationnal;
  
  
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
   * @var string $quoi_demenager
   *
   * @Column(name="QUOI_DEMENAGER", type="string", length=200, nullable=false)
   */
  private $quoi_demenager;
  
  
  /**
   * @var string $pays_depart
   *
   * @Column(name="PAYS_DEPART", type="string", length=200, nullable=false)
   */
  private $pays_depart;
  
  
  /**
   * @var string $pays_arriver
   *
   * @Column(name="PAYS_ARRIVER", type="string", length=200, nullable=false)
   */
  private $pays_arriver;
  
  
  /**
   * @var string $ville_depart
   *
   * @Column(name="VILLE_DEPART", type="string", length=200, nullable=false)
   */
  private $ville_depart;
  
  
  /**
   * @var string $ville_arriver
   *
   * @Column(name="VILLE_ARRIVER", type="string", length=200, nullable=false)
   */
  private $ville_arriver;
  
  
  /**
   * @var string $type_logement
   *
   * @Column(name="TYPE_LOGEMENT", type="string", length=200, nullable=false)
   */
  private $type_logement;
  
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=200, nullable=false)
   */
  private $nbre_etage;
  
  
  /**
   * @var string $volume
   *
   * @Column(name="VOLUME", type="string", length=200, nullable=false)
   */
  private $volume;
  
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
  public function getId_qualif_demenagement_internationnal() {
    
    return $this->id_qualif_demenagement_internationnal;
  }
  
  /**
   * @param int $id_qualif_demenagement_internationnal
   */
  public function setId_qualif_demenagement_internationnal( $id_qualif_demenagement_internationnal ) {
    
    $this->id_qualif_demenagement_internationnal = $id_qualif_demenagement_internationnal;
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
  public function getQuoi_demenager() {
    
    return $this->quoi_demenager;
  }
  
  /**
   * @param string $quoi_demenager
   */
  public function setQuoi_demenager( $quoi_demenager ) {
    
    $this->quoi_demenager = $quoi_demenager;
  }
  
  /**
   * @return string
   */
  public function getVille_depart() {
    
    return $this->ville_depart;
  }
  
  /**
   * @param string $ville_depart
   */
  public function setVille_depart( $ville_depart ) {
    
    $this->ville_depart = $ville_depart;
  }
  
  /**
   * @return string
   */
  public function getVille_arriver() {
    
    return $this->ville_arriver;
  }
  
  /**
   * @param string $ville_arriver
   */
  public function setVille_arriver( $ville_arriver ) {
    
    $this->ville_arriver = $ville_arriver;
  }
  
  /**
   * @return string
   */
  public function getPays_depart() {
    
    return $this->pays_depart;
  }
  
  /**
   * @param string $pays_depart
   */
  public function setPays_depart( $pays_depart ) {
    
    $this->pays_depart = $pays_depart;
  }
  
  /**
   * @return string
   */
  public function getPays_arriver() {
    
    return $this->pays_arriver;
  }
  
  /**
   * @param string $pays_arriver
   */
  public function setPays_arriver( $pays_arriver ) {
    
    $this->pays_arriver = $pays_arriver;
  }
  
  
  /**
   * @return string
   */
  public function getType_logement() {
    
    return $this->type_logement;
  }
  
  /**
   * @param string $type_logement
   */
  public function setType_logement( $type_logement ) {
    
    $this->type_logement = $type_logement;
  }
  
  /**
   * @return string
   */
  public function getNbre_etage() {
    
    return $this->nbre_etage;
  }
  
  /**
   * @param string $nbre_etage
   */
  public function setNbre_etage( $nbre_etage ) {
    
    $this->nbre_etage = $nbre_etage;
  }
  
  /**
   * @return string
   */
  public function getVolume() {
    
    return $this->volume;
  }
  
  /**
   * @param string $volume
   */
  public function setVolume( $volume ) {
    
    $this->volume = $volume;
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
