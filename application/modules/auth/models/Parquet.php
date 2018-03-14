<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_parquet")
 * @Entity(repositoryClass="Auth_Model_ParquetRepository")
 */
class Auth_Model_Parquet {

  /**
   * @var integer $id_qualif_parquet
   *
   * @Column(name="ID_QUALIF_PARQUET", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_parquet;

  /**
   * @var string $renovation_souhaite
   *
   * @Column(name="RENOVATION_SOUHAITE", type="string", length=200, nullable=true)
   */
  private $renovation_souhaite;

  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=true)
   */
  private $nbre_piece;


  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=true)
   */
  private $surface_totale;

  /**
   * @var string $enlevement_revetement
   *
   * @Column(name="ENLEVEMENT_REVETEMENT", type="string", length=200, nullable=true)
   */
  private $enlevement_revetement;

  /**
   * @var string $type_pose
   *
   * @Column(name="TYPE_POSE", type="string", length=200, nullable=true)
   */
  private $type_pose;

  /**
   * @var string $type_parquet
   *
   * @Column(name="TYPE_PARQUET", type="string", length=200, nullable=true)
   */
  private $type_parquet;

  /**
   * @var string $finition
   *
   * @Column(name="FINITION", type="string", length=200, nullable=true)
   */
  private $finition;

  /**
   * @var Demandedevis
   *
   * @ManyToOne(targetEntity="Auth_Model_Demandedevis")
   * @JoinColumns({
   *   @JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")
   * })
   */
  private $id_demande;


  /**
   * @return the attribute
   */
  public function __set($attr, $val) {

    $this->$attr = $val;
  }


  /**
   * @param the attribute
   */
  public function __get($attr) {

    return $this->$attr;
  }


  /**
   * @return toArray
   */
  public function toArray() {

    return get_object_vars($this);
  }


  /**
   * @return the $id_qualif_parquet
   */
  public function getId_qualif_parquet() {

    return $this->id_qualif_parquet;
  }

  /**
   * @return the $nbre_piece
   */
  public function getNbre_piece() {

    return $this->nbre_piece;
  }

  /**
   * @return the $surface_totale
   */
  public function getSurface_totale() {

    return $this->surface_totale;
  }

  /**
   * @return the $enlevement_revetement
   */
  public function getEnlevement_revetement() {

    return $this->enlevement_revetement;
  }

  /**
   * @return the $type_pose
   */
  public function getType_pose() {

    return $this->type_pose;
  }

  /**
   * @return the $type_parquet
   */
  public function getType_parquet() {

    return $this->type_parquet;
  }

  /**
   * @return the $finition
   */
  public function getFinition() {

    return $this->finition;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_parquet
   */
  public function setId_qualif_parquet($id_qualif_parquet) {

    $this->id_qualif_parquet = $id_qualif_parquet;
  }


  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece($nbre_piece) {

    $this->nbre_piece = $nbre_piece;
  }

  /**
   * @param string $surface_totale
   */
  public function setSurface_totale($surface_totale) {

    $this->surface_totale = $surface_totale;
  }


  /**
   * @param string $enlevement_revetement
   */
  public function setEnlevement_revetement($enlevement_revetement) {

    $this->enlevement_revetement = $enlevement_revetement;
  }

  /**
   * @param string $type_pose
   */
  public function setType_pose($type_pose) {

    $this->type_pose = $type_pose;
  }

  /**
   * @param string $type_parquet
   */
  public function setType_parquet($type_parquet) {

    $this->type_parquet = $type_parquet;
  }

  /**
   * @param string $finition
   */
  public function setFinition($finition) {

    $this->finition = $finition;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
