<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_chauffe_eau")
 * @Entity(repositoryClass="Auth_Model_ChauffeEauRepository")
 */
class Auth_Model_ChauffeEau {
  
  /**
   * @var integer $id_qualif_chauffe_eau
   *
   * @Column(name="ID_QUALIF_CHAUFFE_EAU", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_chauffe_eau;
  
  /**
   * @var string $type_chauffe_eau
   *
   * @Column(name="TYPE_CHAUFFE_EAU", type="string", length=50, nullable=false)
   */
  private $type_chauffe_eau;
  
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
   */
  private $nbre_etage;
  
  
  /**
   * @var string $dispose_chauffe_eau
   *
   * @Column(name="DISPOSE_CHAUFFE_EAU", type="string", length=50, nullable=false)
   */
  private $dispose_chauffe_eau;
  
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=false)
   */
  private $surface_totale;
  
  /**
   * @var string $hauteur_sous_plafond
   *
   * @Column(name="HAUTEUR_SOUS_PLAFOND", type="string", length=200, nullable=false)
   */
  private $hauteur_sous_plafond;
  
  
  /**
   * @var string $type_diffusion_chaleur
   *
   * @Column(name="TYPE_DIFFUSION_CHALEUR", type="string", length=200, nullable=false)
   */
  private $type_diffusion_chaleur;
  
  /**
   * @var string $type_energie
   *
   * @Column(name="TYPE_ENERGIE", type="string", length=200, nullable=false)
   */
  private $type_energie;
  
  
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
  public function getId_qualif_chauffe_eau() {
    
    return $this->id_qualif_chauffe_eau;
  }
  
  /**
   * @param int $id_qualif_chauffe_eau
   */
  public function setId_qualif_chauffe_eau( $id_qualif_chauffe_eau ) {
    
    $this->id_qualif_chauffe_eau = $id_qualif_chauffe_eau;
  }
  
  /**
   * @return string
   */
  public function getType_chauffe_eau() {
    
    return $this->type_chauffe_eau;
  }
  
  /**
   * @param string $type_chauffe_eau
   */
  public function setType_chauffe_eau( $type_chauffe_eau ) {
    
    $this->type_chauffe_eau = $type_chauffe_eau;
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
  public function getDispose_chauffe_eau() {
    
    return $this->dispose_chauffe_eau;
  }
  
  /**
   * @param string $dispose_chauffe_eau
   */
  public function setDispose_chauffe_eau( $dispose_chauffe_eau ) {
    
    $this->dispose_chauffe_eau = $dispose_chauffe_eau;
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
  public function getHauteur_sous_plafond() {
    
    return $this->hauteur_sous_plafond;
  }
  
  /**
   * @param string $hauteur_sous_plafond
   */
  public function setHauteur_sous_plafond( $hauteur_sous_plafond ) {
    
    $this->hauteur_sous_plafond = $hauteur_sous_plafond;
  }
  
  /**
   * @return string
   */
  public function getType_diffusion_chaleur() {
    
    return $this->type_diffusion_chaleur;
  }
  
  /**
   * @param string $type_diffusion_chaleur
   */
  public function setType_diffusion_chaleur( $type_diffusion_chaleur ) {
    
    $this->type_diffusion_chaleur = $type_diffusion_chaleur;
  }
  
  /**
   * @return string
   */
  public function getType_energie() {
    
    return $this->type_energie;
  }
  
  /**
   * @param string $type_energie
   */
  public function setType_energie( $type_energie ) {
    
    $this->type_energie = $type_energie;
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
