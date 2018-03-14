<?php


/**
 * Auth_Model_Photovoltaique
 *
 * @Table(name="qualif_photovoltaique")
 * @Entity(repositoryClass="Auth_Model_PhotovoltaiqueRepository")
 */
class Auth_Model_Photovoltaique {
  
  /**
   * @var integer $id_qualif_photovoltaique
   *
   * @Column(name="ID_QUALIF_PHOTOVOLTAIQUE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_photovoltaique;
  
  /**
   * @var string $finalite_installation
   *
   * @Column(name="FINALITE_INSTALLATION", type="string", length=50, nullable=false)
   */
  private $finalite_installation;
  
  /**
   * @var string $utilite
   *
   * @Column(name="UTILITE", type="string", length=50, nullable=false)
   */
  private $utilite;
  
  /**
   * @var string $hauteur_plafond
   *
   * @Column(name="HAUTEUR_PLAFOND", type="string", length=50, nullable=false)
   */
  private $hauteur_plafond;
  
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=50, nullable=false)
   */
  private $surface_totale;
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
   */
  private $nbre_etage;
  
  
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
  public function getId_qualif_photovoltaique() {
    
    return $this->id_qualif_photovoltaique;
  }
  
  /**
   * @param int $id_qualif_photovoltaique
   */
  public function setId_qualif_photovoltaique( $id_qualif_photovoltaique ) {
    
    $this->id_qualif_photovoltaique = $id_qualif_photovoltaique;
  }
  
  /**
   * @return string
   */
  public function getFinalite_installation() {
    
    return $this->finalite_installation;
  }
  
  /**
   * @param string $finalite_installation
   */
  public function setFinalite_installation( $finalite_installation ) {
    
    $this->finalite_installation = $finalite_installation;
  }
  
  /**
   * @return string
   */
  public function getUtilite() {
    
    return $this->utilite;
  }
  
  /**
   * @param string $utilite
   */
  public function setUtilite( $utilite ) {
    
    $this->utilite = $utilite;
  }
  
  /**
   * @return string
   */
  public function getHauteur_plafond() {
    
    return $this->hauteur_plafond;
  }
  
  /**
   * @param string $hauteur_plafond
   */
  public function setHauteur_plafond( $hauteur_plafond ) {
    
    $this->hauteur_plafond = $hauteur_plafond;
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
