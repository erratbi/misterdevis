<?php


/**
 * Auth_Model_MonteEscalier
 *
 * @Table(name="qualif_monte_escalier")
 * @Entity(repositoryClass="Auth_Model_MonteEscalierRepository")
 */
class Auth_Model_MonteEscalier {
  
  /**
   * @var integer $id_qualif_monte_escalier
   *
   * @Column(name="ID_QUALIF_MONTE_ESCALIER", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_monte_escalier;
  
  
  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=50, nullable=false)
   */
  private $type_travaux;
  
  
  /**
   * @var string $type_escalier
   *
   * @Column(name="TYPE_ESCALIER", type="string", length=50, nullable=false)
   */
  private $type_escalier;
  
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
   */
  private $nbre_etage;
  
  
  /**
   * @var string $perference_esthetique
   *
   * @Column(name="PERFERENCE_ESTHETIQUE", type="string", length=50, nullable=false)
   */
  private $perference_esthetique;
  
  
  /**
   * @var string $largeur_escalier
   *
   * @Column(name="LARGEUR_ESCALIER", type="string", length=50, nullable=false)
   */
  private $largeur_escalier;
  
  
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
  public function getId_qualif_monte_escalier() {
    
    return $this->id_qualif_monte_escalier;
  }
  
  /**
   * @param int $id_qualif_monte_escalier
   */
  public function setId_qualif_monte_escalier( $id_qualif_monte_escalier ) {
    
    $this->id_qualif_monte_escalier = $id_qualif_monte_escalier;
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
   * @return string
   */
  public function getType_escalier() {
    
    return $this->type_escalier;
  }
  
  /**
   * @param string $type_escalier
   */
  public function setType_escalier( $type_escalier ) {
    
    $this->type_escalier = $type_escalier;
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
  public function getPerference_esthetique() {
    
    return $this->perference_esthetique;
  }
  
  /**
   * @param string $perference_esthetique
   */
  public function setPerference_esthetique( $perference_esthetique ) {
    
    $this->perference_esthetique = $perference_esthetique;
  }
  
  /**
   * @return string
   */
  public function getLargeur_escalier() {
    
    return $this->largeur_escalier;
  }
  
  /**
   * @param string $largeur_escalier
   */
  public function setLargeur_escalier( $largeur_escalier ) {
    
    $this->largeur_escalier = $largeur_escalier;
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
