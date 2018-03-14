<?php


/**
 * Auth_Model_Visiophone
 *
 * @Table(name="qualif_visiophone")
 * @Entity(repositoryClass="Auth_Model_VisiophoneRepository")
 */
class Auth_Model_Visiophone {
  
  /**
   * @var integer $id_qualif_visiophone
   *
   * @Column(name="ID_QUALIF_VISIOPHONE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_visiophone;
  
  
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
  public function getId_qualif_visiophone() {
    
    return $this->id_qualif_visiophone;
  }
  
  /**
   * @param int $id_qualif_visiophone
   */
  public function setId_qualif_visiophone( $id_qualif_visiophone ) {
    
    $this->id_qualif_visiophone = $id_qualif_visiophone;
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
