<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_ramonage")
 * @Entity(repositoryClass="Auth_Model_RamonageRepository")
 */
class Auth_Model_Ramonage {
  
  /**
   * @var integer $id_qualif_ramonage
   *
   * @Column(name="ID_QUALIF_RAMONAGE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_ramonage;
  
  
  /**
   * @var string $type_cheminee
   *
   * @Column(name="TYPE_CHEMINEE", type="string", length=200, nullable=false)
   */
  private $type_cheminee;
  
  
  /**
   * @var string $date_ramonage
   *
   * @Column(name="DATE_RAMONAGE", type="string", length=200, nullable=false)
   */
  private $date_ramonage;
  
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
  public function getId_qualif_ramonage() {
    
    return $this->id_qualif_ramonage;
  }
  
  /**
   * @param int $id_qualif_ramonage
   */
  public function setId_qualif_ramonage( $id_qualif_ramonage ) {
    
    $this->id_qualif_ramonage = $id_qualif_ramonage;
  }
  
  
  /**
   * @return string
   */
  public function getType_cheminee() {
    
    return $this->type_cheminee;
  }
  
  /**
   * @param string $type_cheminee
   */
  public function setType_cheminee( $type_cheminee ) {
    
    $this->type_cheminee = $type_cheminee;
  }
  
  
  /**
   * @return string
   */
  public function getDate_ramonage() {
    
    return $this->date_ramonage;
  }
  
  /**
   * @param string $date_ramonage
   */
  public function setDate_ramonage( $date_ramonage ) {
    
    $this->date_ramonage = $date_ramonage;
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
