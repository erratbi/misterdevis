<?php


/**
 * Auth_Model_Facade
 *
 * @Table(name="qualif_facade")
 * @Entity(repositoryClass="Auth_Model_FacadeRepository")
 */
class Auth_Model_Facade {
  
  /**
   * @var integer $id_qualif_facade
   *
   * @Column(name="ID_QUALIF_FACADE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_facade;
  
  /**
   * @var string $hauteur_batiement
   *
   * @Column(name="HAUTEUR_BATIEMENT", type="string", length=200, nullable=true)
   */
  private $hauteur_batiement;
  
  /**
   * @var string $etat_general
   *
   * @Column(name="ETAT_GENERAL", type="string", length=200, nullable=true)
   */
  private $etat_general;
  
  /**
   * @var string $type_facade
   *
   * @Column(name="TYPE_FACADE", type="string", length=200, nullable=true)
   */
  private $type_facade;
  
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=true)
   */
  private $surface_totale;
  
  /**
   * @var string $revetement_actuel
   *
   * @Column(name="REVETEMENT_ACTUEL", type="string", length=200, nullable=true)
   */
  private $revetement_actuel;
  
  /**
   * @var string $changer_menuiseries
   *
   * @Column(name="CHANGER_MENUISERIES", type="string", length=200, nullable=true)
   */
  private $changer_menuiseries;
  
  /**
   * @var string $preciser_menuiseries
   *
   * @Column(name="PRECISER_MENUISERIES", type="string", length=200, nullable=true)
   */
  private $preciser_menuiseries;
  
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
  public function getId_qualif_facade() {
    
    return $this->id_qualif_facade;
  }
  
  /**
   * @param int $id_qualif_facade
   */
  public function setId_qualif_facade( $id_qualif_facade ) {
    
    $this->id_qualif_facade = $id_qualif_facade;
  }
  
  /**
   * @return string
   */
  public function getHauteur_batiement() {
    
    return $this->hauteur_batiement;
  }
  
  /**
   * @param string $hauteur_batiement
   */
  public function setHauteur_batiement( $hauteur_batiement ) {
    
    $this->hauteur_batiement = $hauteur_batiement;
  }
  
  /**
   * @return string
   */
  public function getEtat_general() {
    
    return $this->etat_general;
  }
  
  /**
   * @param string $etat_general
   */
  public function setEtat_general( $etat_general ) {
    
    $this->etat_general = $etat_general;
  }
  
  /**
   * @return string
   */
  public function getType_facade() {
    
    return $this->type_facade;
  }
  
  /**
   * @param string $type_facade
   */
  public function setType_facade( $type_facade ) {
    
    $this->type_facade = $type_facade;
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
  public function getRevetement_actuel() {
    
    return $this->revetement_actuel;
  }
  
  /**
   * @param string $revetement_actuel
   */
  public function setRevetement_actuel( $revetement_actuel ) {
    
    $this->revetement_actuel = $revetement_actuel;
  }
  
  /**
   * @return string
   */
  public function getPreciser_menuiseries() {
    
    return $this->preciser_menuiseries;
  }
  
  /**
   * @param string $preciser_menuiseries
   */
  public function setPreciser_menuiseries( $preciser_menuiseries ) {
    
    $this->preciser_menuiseries = $preciser_menuiseries;
  }
  
  
  /**
   * @return string
   */
  public function getChanger_menuiseries() {
    
    return $this->changer_menuiseries;
  }
  
  /**
   * @param string $changer_menuiseries
   */
  public function setChanger_menuiseries( $changer_menuiseries ) {
    
    $this->changer_menuiseries = $changer_menuiseries;
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
