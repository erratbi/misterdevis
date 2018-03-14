<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Class Auth_Model_AlarmeIncendie
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    26/01/18
 *
 * @Table(name="qualif_alarme_incendie")
 * @Entity(repositoryClass="Auth_Model_AlarmeIncendieRepository")
 */
class Auth_Model_AlarmeIncendie {
  
  /**
   * @var integer $id_qualif_alarme_incendie
   *
   * @Column(name="ID_QUALIF_ALARME_INCENDIE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_alarme_incendie;
  
  
  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;
  
  
  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=false)
   */
  private $surface_totale;
  
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=false)
   */
  private $nbre_piece;
  
  
  /**
   * @var \Auth_Model_Demandedevis $id_demande
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
  public function getIdQualif_alarme_incendie() {
    
    return $this->id_qualif_alarme_incendie;
  }
  
  /**
   * @param int $id_qualif_alarme_incendie
   */
  public function setIdQualif_alarme_incendie( $id_qualif_alarme_incendie ) {
    
    $this->id_qualif_alarme_incendie = $id_qualif_alarme_incendie;
  }
  
  /**
   * @return string
   */
  public function getType_Travaux() {
    
    return $this->type_travaux;
  }
  
  /**
   * @param string $type_travaux
   */
  public function setType_Travaux( $type_travaux ) {
    
    $this->type_travaux = $type_travaux;
  }
  
  /**
   * @return string
   */
  public function getSurface_totale() {
    
    return $this->surface_totale;
  }
  
  /**
   * @param string $surface_totale
   */
  public function setSurface_totale( $surface_totale ) {
    
    $this->surface_totale = $surface_totale;
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
