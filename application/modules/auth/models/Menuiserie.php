<?php


/**
 * Auth_Model_Menuiserie
 *
 * @Table(name="qualif_menuiserie")
 * @Entity(repositoryClass="Auth_Model_MenuiserieRepository")
 */
class Auth_Model_Menuiserie {
  
  /**
   * @var integer $id_qualif_menuiserie
   *
   * @Column(name="ID_QUALIF_MENUISERIE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_menuiserie;
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=50, nullable=false)
   */
  private $nbre_piece;
  
  /**
   * @var string $type_projet
   *
   * @Column(name="TYPE_PROJET", type="string", length=50, nullable=false)
   */
  private $type_projet;
  
  
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
  public function getId_qualif_menuiserie() {
    
    return $this->id_qualif_menuiserie;
  }
  
  /**
   * @param int $id_qualif_menuiserie
   */
  public function setId_qualif_menuiserie( $id_qualif_menuiserie ) {
    
    $this->id_qualif_menuiserie = $id_qualif_menuiserie;
  }
  
  /**
   * @return string
   */
  public function getNbre_piece() {
    
    return $this->nbre_piece;
  }
  
  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece( $nbre_piece ) {
    
    $this->nbre_piece = $nbre_piece;
  }
  
  /**
   * @return string
   */
  public function getType_projet() {
    
    return $this->type_projet;
  }
  
  /**
   * @param string $type_projet
   */
  public function setType_projet( $type_projet ) {
    
    $this->type_projet = $type_projet;
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
