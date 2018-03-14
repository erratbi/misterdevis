<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_domotique")
 * @Entity(repositoryClass="Auth_Model_DomotiqueRepository")
 */
class Auth_Model_Domotique {
  
  /**
   * @var integer $id_qualif_domotique
   *
   * @Column(name="ID_QUALIF_DOMOTIQUE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_domotique;
  
  
  /**
   * @var string $type_installation
   *
   * @Column(name="TYPE_INSTALLATION", type="string", length=200, nullable=false)
   */
  private $type_installation;
  
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
  public function getId_qualif_domotique() {
    
    return $this->id_qualif_domotique;
  }
  
  /**
   * @param int $id_qualif_domotique
   */
  public function setId_qualif_domotique( $id_qualif_domotique ) {
    
    $this->id_qualif_domotique = $id_qualif_domotique;
  }
  
  /**
   * @return string
   */
  public function getSurface() {
    
    return $this->surface;
  }
  
  /**
   * @param string $surface
   */
  public function setSurface( $surface ) {
    
    $this->surface = $surface;
  }
  
  
  /**
   * @return string
   */
  public function getType_installation() {
    
    return $this->type_installation;
  }
  
  /**
   * @param string $type_installation
   */
  public function setType_installation( $type_installation ) {
    
    $this->type_installation = $type_installation;
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
