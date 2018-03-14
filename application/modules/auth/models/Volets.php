<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_volets")
 * @Entity(repositoryClass="Auth_Model_VoletsRepository")
 */
class Auth_Model_Volets {
  
  /**
   * @var integer $id_qualif_volets
   *
   * @Column(name="ID_QUALIF_VOLETS", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_volets;
  
  /**
   * @var string $type_volets
   *
   * @Column(name="TYPE_VOLETS", type="string", length=50, nullable=false)
   */
  private $type_volets;
  
  /**
   * @var string $nbre_volets
   *
   * @Column(name="NBRE_VOLETS", type="string", length=50, nullable=false)
   */
  private $nbre_volets;
  
  /**
   * @var string $dispose_volets
   *
   * @Column(name="DISPOSE_VOLETS", type="string", length=50, nullable=false)
   */
  private $dispose_volets;
  
  /**
   * @var string $fermeture
   *
   * @Column(name="FERMETURE", type="string", length=50, nullable=false)
   */
  private $fermeture;
  
  
  /**
   * @var string $volets_motorises
   *
   * @Column(name="VOLETS_MOTORISES", type="string", length=200, nullable=false)
   */
  private $volets_motorises;
  
  /**
   * @var string $materiaux_volets
   *
   * @Column(name="MATERIAUX_VOLETS", type="string", length=200, nullable=false)
   */
  private $materiaux_volets;
  
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
  public function getId_qualif_volets() {
    
    return $this->id_qualif_volets;
  }
  
  /**
   * @param int $id_qualif_volets
   */
  public function setId_qualif_volets( $id_qualif_volets ) {
    
    $this->id_qualif_volets = $id_qualif_volets;
  }
  
  /**
   * @return string
   */
  public function getType_volets() {
    
    return $this->type_volets;
  }
  
  /**
   * @param string $type_volets
   */
  public function setType_volets( $type_volets ) {
    
    $this->type_volets = $type_volets;
  }
  
  /**
   * @return string
   */
  public function getNbre_volets() {
    
    return $this->nbre_volets;
  }
  
  /**
   * @param string $nbre_volets
   */
  public function setNbre_volets( $nbre_volets ) {
    
    $this->nbre_volets = $nbre_volets;
  }
  
  /**
   * @return string
   */
  public function getDispose_volets() {
    
    return $this->dispose_volets;
  }
  
  /**
   * @param string $dispose_volets
   */
  public function setDispose_volets( $dispose_volets ) {
    
    $this->dispose_volets = $dispose_volets;
  }
  
  /**
   * @return string
   */
  public function getFermeture() {
    
    return $this->fermeture;
  }
  
  /**
   * @param string $fermeture
   */
  public function setFermeture( $fermeture ) {
    
    $this->fermeture = $fermeture;
  }
  
  /**
   * @return string
   */
  public function getVolets_motorises() {
    
    return $this->volets_motorises;
  }
  
  /**
   * @param string $volets_motorises
   */
  public function setVolets_motorises( $volets_motorises ) {
    
    $this->volets_motorises = $volets_motorises;
  }
  
  /**
   * @return string
   */
  public function getMateriaux_volets() {
    
    return $this->materiaux_volets;
  }
  
  /**
   * @param string $materiaux_volets
   */
  public function setMateriaux_volets( $materiaux_volets ) {
    
    $this->materiaux_volets = $materiaux_volets;
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
