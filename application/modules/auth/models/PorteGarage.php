<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_PorteGarage
 *
 * @Table(name="qualif_porte_garage")
 * @Entity(repositoryClass="Auth_Model_PorteGarageRepository")
 */
class Auth_Model_PorteGarage {
  
  /**
   * @var integer $id_qualif_porte_garage
   *
   * @Column(name="ID_QUALIF_PORTE_GARAGE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_porte_garage;
  
  /**
   * @var string $nbre_porte
   *
   * @Column(name="NBRE_PORTE", type="string", length=200, nullable=true)
   */
  private $nbre_porte;
  
  /**
   * @var string $installation_motorisee
   *
   * @Column(name="INSTALLATION_MOTORISEE", type="string", length=200, nullable=true)
   */
  private $installation_motorisee;
  
  /**
   * @var string $depose_porte_existant
   *
   * @Column(name="DEPOSE_PORTE_EXISTANT", type="string", length=200, nullable=true)
   */
  private $depose_porte_existant;
  
  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=true)
   */
  private $type_travaux;

  /**
   * @var string $materiau_volet
   *
   * @Column(name="MATERIAU_VOLET", type="string", length=200, nullable=true)
   */
  private $materiau_volet;
  
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
  public function getId_qualif_porte_garage() {
    
    return $this->id_qualif_porte_garage;
  }
  
  /**
   * @param int $id_qualif_porte_garage
   */
  public function setId_qualif_porte_garage( $id_qualif_porte_garage ) {
    
    $this->id_qualif_porte_garage = $id_qualif_porte_garage;
  }
  
  /**
   * @return string
   */
  public function getNbre_porte() {
    
    return $this->nbre_porte;
  }
  
  /**
   * @param string $nbre_porte
   */
  public function setNbre_porte( $nbre_porte ) {
    
    $this->nbre_porte = $nbre_porte;
  }
  
  /**
   * @return string
   */
  public function getInstallation_motorisee() {
    
    return $this->installation_motorisee;
  }
  
  /**
   * @param string $installation_motorisee
   */
  public function setInstallation_motorisee( $installation_motorisee ) {
    
    $this->installation_motorisee = $installation_motorisee;
  }
  
  /**
   * @return string
   */
  public function getDepose_porte_existant() {
    
    return $this->depose_porte_existant;
  }
  
  /**
   * @param string $depose_porte_existant
   */
  public function setDepose_porte_existant( $depose_porte_existant ) {
    
    $this->depose_porte_existant = $depose_porte_existant;
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
  public function getMateriau_volet() {
    
    return $this->materiau_volet;
  }
  
  /**
   * @param string $materiau_volet
   */
  public function setMateriau_volet( $materiau_volet ) {
    
    $this->materiau_volet = $materiau_volet;
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
