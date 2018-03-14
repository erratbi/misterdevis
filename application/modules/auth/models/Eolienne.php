<?php


/**
 * Auth_Model_Eolienne
 *
 * @Table(name="qualif_eolienne")
 * @Entity(repositoryClass="Auth_Model_EolienneRepository")
 */
class Auth_Model_Eolienne {
  
  /**
   * @var integer $id_qualif_eolienne
   *
   * @Column(name="ID_QUALIF_EOLIENNE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_eolienne;
  
  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=50, nullable=false)
   */
  private $nbre_etage;
  
  /**
   * @var string $dispose_jardin
   *
   * @Column(name="DISPOSE_JARDIN", type="string", length=50, nullable=false)
   */
  private $dispose_jardin;
  
  
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
  public function getId_qualif_eolienne() {
    
    return $this->id_qualif_eolienne;
  }
  
  /**
   * @param int $id_qualif_eolienne
   */
  public function setId_qualif_eolienne( $id_qualif_eolienne ) {
    
    $this->id_qualif_eolienne = $id_qualif_eolienne;
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
  public function getDispose_jardin() {
    
    return $this->dispose_jardin;
  }
  
  /**
   * @param string $dispose_jardin
   */
  public function setDispose_jardin( $dispose_jardin ) {
    
    $this->dispose_jardin = $dispose_jardin;
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
