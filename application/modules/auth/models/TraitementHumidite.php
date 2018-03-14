<?php


/**
 * Auth_Model_TraitementHumidite
 *
 * @Table(name="qualif_traitement_humidite")
 * @Entity(repositoryClass="Auth_Model_TraitementHumiditeRepository")
 */
class Auth_Model_TraitementHumidite {
  
  /**
   * @var integer $id_qualif_traitement_humidite
   *
   * @Column(name="ID_QUALIF_TRAITEMENT_HUMIDITE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_traitement_humidite;
  
  /**
   * @var string $nbre_pieces
   *
   * @Column(name="NBRE_PIECES", type="string", length=50, nullable=false)
   */
  private $nbre_pieces;
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=50, nullable=false)
   */
  private $surface_totale;
  
  /**
   * @var string $annee_construction
   *
   * @Column(name="ANNEE_CONSTRUCTION", type="string", length=50, nullable=false)
   */
  private $annee_construction;
  
  
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
  public function getId_qualif_traitement_humidite() {
    
    return $this->id_qualif_traitement_humidite;
  }
  
  /**
   * @param int $id_qualif_traitement_humidite
   */
  public function setId_qualif_traitement_humidite( $id_qualif_traitement_humidite ) {
    
    $this->id_qualif_traitement_humidite = $id_qualif_traitement_humidite;
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
