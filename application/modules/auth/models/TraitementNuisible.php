<?php


/**
 * Auth_Model_TraitementNuisible
 *
 * @Table(name="qualif_traitement_nuisible")
 * @Entity(repositoryClass="Auth_Model_TraitementNuisibleRepository")
 */
class Auth_Model_TraitementNuisible {
  
  /**
   * @var integer $id_qualif_traitement_nuisible
   *
   * @Column(name="ID_QUALIF_TRAITEMENT_NUISIBLE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_traitement_nuisible;
  
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
   * @var string $diagnostic_fait
   *
   * @Column(name="DIAGNOSTIC_FAIT", type="string", length=50, nullable=false)
   */
  private $diagnostic_fait;

  /**
   * @var string $desinsectisation
   *
   * @Column(name="DESINSECTISATION", type="string", length=50, nullable=false)
   */
  private $desinsectisation;

  /**
   * @var string $insecte
   *
   * @Column(name="INSECTE", type="string", length=50, nullable=false)
   */
  private $insecte;

  /**
   * @var string $deratisation
   *
   * @Column(name="DERATISATION", type="string", length=50, nullable=false)
   */
  private $deratisation;

  /**
   * @var string $animal
   *
   * @Column(name="ANIMAL", type="string", length=50, nullable=false)
   */
  private $animal;
  
  
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
  public function getId_qualif_traitement_nuisible() {
    
    return $this->id_qualif_traitement_nuisible;
  }
  
  /**
   * @param int $id_qualif_traitement_nuisible
   */
  public function setId_qualif_traitement_nuisible( $id_qualif_traitement_nuisible ) {
    
    $this->id_qualif_traitement_nuisible = $id_qualif_traitement_nuisible;
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
  public function getDesinsectisation() {
    
    return $this->desinsectisation;
  }
  
  /**
   * @param string $desinsectisation
   */
  public function setDesinsectisation( $desinsectisation ) {
    
    $this->desinsectisation = $desinsectisation;
  }


  /**
   * @return string
   */
  public function getInsecte() {
    
    return $this->insecte;
  }
  
  /**
   * @param string $insecte
   */
  public function setInsecte( $insecte ) {
    
    $this->insecte = $insecte;
  }

   /**
   * @return string
   */
  public function getDeratisation() {
    
    return $this->deratisation;
  }
  
  /**
   * @param string $deratisation
   */
  public function setDeratisation( $deratisation ) {
    
    $this->deratisation = $deratisation;
  }


   /**
   * @return string
   */
  public function getAnimal() {
    
    return $this->animal;
  }
  
  /**
   * @param string $animal
   */
  public function setAnimal( $animal ) {
    
    $this->animal = $animal;
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
