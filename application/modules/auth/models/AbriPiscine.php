<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_abri_piscine")
 * @Entity(repositoryClass="Auth_Model_AbriPiscineRepository")
 */
class Auth_Model_AbriPiscine {

  /**
   * @var integer $id_qualif_abri_piscine
   *
   * @Column(name="ID_QUALIF_ABRI_PISCINE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_abri_piscine;

  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;

  /**
   * @var string $forme_piscine
   *
   * @Column(name="FORME_PISCINE", type="string", length=200, nullable=true)
   */
  private $forme_piscine;

  /**
   * @var string $type_piscine
   *
   * @Column(name="TYPE_PISCINE", type="string", length=200, nullable=true)
   */
  private $type_piscine;

  /**
   * @var string $type_abri
   *
   * @Column(name="TYPE_ABRI", type="string", length=200, nullable=true)
   */
  private $type_abri;

  /**
   * @var string $dimension_piscine
   *
   * @Column(name="DIMENSION_PISCINE", type="string", length=200, nullable=true)
   */
  private $dimension_piscine;

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
   * @return the $id_qualif_abri_piscine
   */
  public function getId_qualif_abri_piscine() {

    return $this->id_qualif_abri_piscine;
  }

  /**
   * @return the $type_travaux
   */
  public function getType_travaux() {

    return $this->type_travaux;
  }

  /**
   * @return the $forme_piscine
   */
  public function getForme_piscine() {

    return $this->forme_piscine;
  }

  /**
   * @return the $type_piscine
   */
  public function getType_piscine() {

    return $this->type_piscine;
  }

  /**
   * @return the $type_abri
   */
  public function getType_abri() {

    return $this->type_abri;
  }

  /**
   * @return the $dimension_piscine
   */
  public function getDimension_piscine() {

    return $this->dimension_piscine;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_abri_piscine
   */
  public function setId_qualif_abri_piscine($id_qualif_abri_piscine) {

    $this->id_qualif_abri_piscine = $id_qualif_abri_piscine;
  }


  /**
   * @param string $type_travaux
   */
  public function setType_travaux($type_travaux) {

    $this->type_travaux = $type_travaux;
  }

  /**
   * @param string $forme_piscine
   */
  public function setForme_piscine($forme_piscine) {

    $this->forme_piscine = $forme_piscine;
  }

  /**
   * @param string $type_piscine
   */
  public function setType_piscine($type_piscine) {

    $this->type_piscine = $type_piscine;
  }

  /**
   * @param string $type_piscine
   */
  public function setType_abri($type_abri) {

    $this->type_abri = $type_abri;
  }

  /**
   * @param string $dimension_piscine
   */
  public function setDimension_piscine($dimension_piscine) {

    $this->dimension_piscine = $dimension_piscine;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
