<?php


/**
 * Auth_Model_Cloture
 *
 * @Table(name="qualif_cloture")
 * @Entity(repositoryClass="Auth_Model_ClotureRepository")
 */
class Auth_Model_Cloture {
  
  /**
   * @var integer $id_qualif_cloture
   *
   * @Column(name="ID_QUALIF_CLOTURE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_cloture;
  
  /**
   * @var string $longueur
   *
   * @Column(name="LONGUEUR", type="string", length=200, nullable=true)
   */
  private $longueur;
  
  /**
   * @var string $hauteur
   *
   * @Column(name="HAUTEUR", type="string", length=200, nullable=true)
   */
  private $hauteur;
  
  /**
   * @var string $type_materiau
   *
   * @Column(name="TYPE_MATERIAU", type="string", length=200, nullable=true)
   */
  private $type_materiau;
  
  
  /**
   * @var string $installer_interphone
   *
   * @Column(name="INSTALLER_INTERPHONE", type="string", length=200, nullable=true)
   */
  private $installer_interphone;
  
  /**
   * @var string $installer_portail
   *
   * @Column(name="INSTALLER_PORTAIL", type="string", length=200, nullable=true)
   */
  private $installer_portail;
  
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
  public function getId_qualif_cloture() {
    
    return $this->id_qualif_cloture;
  }
  
  /**
   * @param int $id_qualif_cloture
   */
  public function setId_qualif_cloture( $id_qualif_cloture ) {
    
    $this->id_qualif_cloture = $id_qualif_cloture;
  }
  
  /**
   * @return string
   */
  public function getLongueur() {
    
    return $this->longueur;
  }
  
  /**
   * @param string $longueur
   */
  public function setLongueur( $longueur ) {
    
    $this->longueur = $longueur;
  }
  
  /**
   * @return string
   */
  public function getHauteur() {
    
    return $this->hauteur;
  }
  
  /**
   * @param string $hauteur
   */
  public function setHauteur( $hauteur ) {
    
    $this->hauteur = $hauteur;
  }
  
  /**
   * @return string
   */
  public function getType_materiau() {
    
    return $this->type_materiau;
  }
  
  /**
   * @param string $type_materiau
   */
  public function setType_materiau( $type_materiau ) {
    
    $this->type_materiau = $type_materiau;
  }
  
  /**
   * @return string
   */
  public function getInstaller_interphone() {
    
    return $this->installer_interphone;
  }
  
  /**
   * @param string $installer_interphone
   */
  public function setInstaller_interphone( $installer_interphone ) {
    
    $this->installer_interphone = $installer_interphone;
  }
  
  /**
   * @return string
   */
  public function getInstaller_portail() {
    
    return $this->installer_portail;
  }
  
  /**
   * @param string $installer_portail
   */
  public function setInstaller_portail( $installer_portail ) {
    
    $this->installer_portail = $installer_portail;
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
