<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_chauffage_inertie")
 * @Entity(repositoryClass="Auth_Model_ChauffageInertieRepository")
 */
class Auth_Model_ChauffageInertie {
  
  /**
   * @var integer $id_qualif_chauffage_inertie
   *
   * @Column(name="ID_QUALIF_CHAUFFAGE_INERTIE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_chauffage_inertie;
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=50, nullable=false)
   */
  private $nbre_piece;
  
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
   */
  private $nbre_etage;
  
  
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
  public function getId_qualif_chauffage_inertie() {
    
    return $this->id_qualif_chauffage_inertie;
  }
  
  /**
   * @param int $id_qualif_chauffage_inertie
   */
  public function setId_qualif_chauffage_inertie( $id_qualif_chauffage_inertie ) {
    
    $this->id_qualif_chauffage_inertie = $id_qualif_chauffage_inertie;
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
