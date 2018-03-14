<?php


/**
 * Auth_Model_Etancheite
 *
 * @Table(name="qualif_etancheite")
 * @Entity(repositoryClass="Auth_Model_EtancheiteRepository")
 */
class Auth_Model_Etancheite {
  
  /**
   * @var integer $id_qualif_etancheite
   *
   * @Column(name="ID_QUALIF_ETANCHEITE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_etancheite;
  
  /**
   * @var string $annee_construction
   *
   * @Column(name="ANNEE_CONSTRUCTION", type="string", length=50, nullable=false)
   */
  private $annee_construction;
  
  
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
  public function getId_qualif_etancheite() {
    
    return $this->id_qualif_etancheite;
  }
  
  /**
   * @param int $id_qualif_etancheite
   */
  public function setId_qualif_etancheite( $id_qualif_etancheite ) {
    
    $this->id_qualif_etancheite = $id_qualif_etancheite;
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
