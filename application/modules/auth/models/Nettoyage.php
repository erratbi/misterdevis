<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_nettoyage")
 * @Entity(repositoryClass="Auth_Model_NettoyageRepository")
 */
class Auth_Model_Nettoyage {
  
  /**
   * @var integer $id_qualif_nettoyage
   *
   * @Column(name="ID_QUALIF_NETTOYAGE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_nettoyage;
  
  
  /**
   * @var string $type_nettoyage
   *
   * @Column(name="TYPE_NETTOYAGE", type="string", length=200, nullable=false)
   */
  private $type_nettoyage;
  
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
  public function getId_qualif_nettoyage() {
    
    return $this->id_qualif_nettoyage;
  }
  
  /**
   * @param int $id_qualif_nettoyage
   */
  public function setId_qualif_nettoyage( $id_qualif_nettoyage ) {
    
    $this->id_qualif_nettoyage = $id_qualif_nettoyage;
  }
  
  /**
   * @return string
   */
  public function getType_nettoyage() {
    
    return $this->type_nettoyage;
  }
  
  /**
   * @param string $type_nettoyage
   */
  public function setType_nettoyage( $type_nettoyage ) {
    
    $this->type_nettoyage = $type_nettoyage;
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
