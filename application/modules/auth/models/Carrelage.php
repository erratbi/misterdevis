<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_carrelage")
 * @Entity(repositoryClass="Auth_Model_CarrelageRepository")
 */
class Auth_Model_Carrelage {

  /**
   * @var integer $id_qualif_carrelage
   *
   * @Column(name="ID_QUALIF_CARRELAGE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_carrelage;

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
   * @var string $enlevement_revetement
   *
   * @Column(name="ENLEVEMENT_REVETEMENT", type="string", length=200, nullable=false)
   */
  private $enlevement_revetement;

  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=false)
   */
  private $nbre_piece;

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
   * @return the $id_qualif_carrelage
   */
  public function getId_qualif_carrelage() {

    return $this->id_qualif_carrelage;
  }

  /**
   * @return the $type_travaux
   */
  public function getType_travaux() {

    return $this->type_travaux;
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
   * @return the $nbre_piece
   */
  public function getNbre_piece() {

    return $this->nbre_piece;
  }


  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_carrelage
   */
  public function setId_qualif_carrelage($id_qualif_carrelage) {

    $this->id_qualif_carrelage = $id_qualif_carrelage;
  }


  /**
   * @param string $type_travaux
   */
  public function setType_travaux($type_travaux) {

    $this->type_travaux = $type_travaux;
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
   * @param string $nbre_piece
   */
  public function setNbre_piece($nbre_piece) {

    $this->nbre_piece = $nbre_piece;
  }



  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
