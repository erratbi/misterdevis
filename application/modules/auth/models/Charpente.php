<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_charpente")
 * @Entity(repositoryClass="Auth_Model_CharpenteRepository")
 */
class Auth_Model_Charpente {
  
  /**
   * @var integer $id_qualif_charpente
   *
   * @Column(name="ID_QUALIF_CHARPENTE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_charpente;
  
  /**
   * @var string $type_charpente
   *
   * @Column(name="TYPE_CHARPENTE", type="string", length=50, nullable=false)
   */
  private $type_charpente;
  
  
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
  public function getId_qualif_charpente() {
    
    return $this->id_qualif_charpente;
  }
  
  /**
   * @param int $id_qualif_charpente
   */
  public function setId_qualif_charpente( $id_qualif_charpente ) {
    
    $this->id_qualif_charpente = $id_qualif_charpente;
  }
  
  /**
   * @return string
   */
  public function getType_charpente() {
    
    return $this->type_charpente;
  }
  
  /**
   * @param string $type_charpente
   */
  public function setType_charpente( $type_charpente ) {
    
    $this->type_charpente = $type_charpente;
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
