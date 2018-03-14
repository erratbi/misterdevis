<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_chauffage_piscine")
 * @Entity(repositoryClass="Auth_Model_ChauffagePiscineRepository")
 */
class Auth_Model_ChauffagePiscine {

  /**
   * @var integer $id_qualif_chauffage_piscine
   *
   * @Column(name="ID_QUALIF_CHAUFFAGE_PISCINE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_chauffage_piscine;

  /**
   * @var string $type_piscine
   *
   * @Column(name="TYPE_PISCINE", type="string", length=200, nullable=false)
   */
  private $type_piscine;

  /**
   * @var string $forme_piscine
   *
   * @Column(name="FORME_PISCINE", type="string", length=200, nullable=true)
   */
  private $forme_piscine;


  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=200, nullable=true)
   */
  private $surface;

  /**
   * @var string $profondeur
   *
   * @Column(name="PROFONDEUR", type="string", length=200, nullable=true)
   */
  private $profondeur;

  /**
   * @var string $situation_piscine
   *
   * @Column(name="SITUATION_PISCINE", type="string", length=200, nullable=true)
   */
  private $situation_piscine;

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
   * @return the $id_qualif_chauffage_piscine
   */
  public function getId_qualif_chauffage_piscine() {

    return $this->id_qualif_chauffage_piscine;
  }

  /**
   * @return the $type_piscine
   */
  public function getType_piscine() {

    return $this->type_piscine;
  }

  /**
   * @return the $forme_piscine
   */
  public function getForme_piscine() {

    return $this->forme_piscine;
  }

  /**
   * @return the $surface
   */
  public function getSurface() {

    return $this->surface;
  }

  /**
   * @return the $profondeur
   */
  public function getProfondeur() {

    return $this->profondeur;
  }

  /**
   * @return the $situation_piscine
   */
  public function getSituation_piscine() {

    return $this->situation_piscine;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_chauffage_piscine
   */
  public function setId_qualif_chauffage_piscine($id_qualif_chauffage_piscine) {

    $this->id_qualif_chauffage_piscine = $id_qualif_chauffage_piscine;
  }


  /**
   * @param string $type_piscine
   */
  public function setType_piscine($type_piscine) {

    $this->type_piscine = $type_piscine;
  }

  /**
   * @param string $forme_piscine
   */
  public function setForme_piscine($forme_piscine) {

    $this->forme_piscine = $forme_piscine;
  }

  /**
   * @param string $surface
   */
  public function setSurface($surface) {

    $this->surface = $surface;
  }

  /**
   * @param string $profondeur
   */
  public function setProfondeur($profondeur) {

    $this->profondeur = $profondeur;
  }

  /**
   * @param string $situation_piscine
   */
  public function setSituation_piscine($situation_piscine) {

    $this->situation_piscine = $situation_piscine;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
