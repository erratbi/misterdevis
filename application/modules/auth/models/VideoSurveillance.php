<?php


/**
 * Auth_Model_VideoSurveillance
 *
 * @Table(name="qualif_video_surveillance")
 * @Entity(repositoryClass="Auth_Model_VideoSurveillanceRepository")
 */
class Auth_Model_VideoSurveillance {
  
  /**
   * @var integer $id_qualif_video_surveillance
   *
   * @Column(name="ID_QUALIF_VIDEO_SURVEILLANCE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_video_surveillance;
  
  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=50, nullable=false)
   */
  private $nbre_piece;
  
  /**
   * @var string $nbre_fenetre
   *
   * @Column(name="NBRE_FENETRE", type="string", length=50, nullable=false)
   */
  private $nbre_fenetre;
  
  
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
  public function getId_qualif_video_surveillance() {
    
    return $this->id_qualif_video_surveillance;
  }
  
  /**
   * @param int $id_qualif_video_surveillance
   */
  public function setId_qualif_video_surveillance( $id_qualif_video_surveillance ) {
    
    $this->id_qualif_video_surveillance = $id_qualif_video_surveillance;
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
  public function getNbre_fenetre() {
    
    return $this->nbre_fenetre;
  }
  
  /**
   * @param string $nbre_fenetre
   */
  public function setNbre_fenetre( $nbre_fenetre ) {
    
    $this->nbre_fenetre = $nbre_fenetre;
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
