<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_terrasse_piscine")
 * @Entity(repositoryClass="Auth_Model_TerrassePiscineRepository")
 */
class Auth_Model_TerrassePiscine {

  /**
   * @var integer $id_qualif_terrasse_piscine
   *
   * @Column(name="ID_QUALIF_TERRASSE_PISCINE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_terrasse_piscine;

  /**
   * @var string $piscine_construite
   *
   * @Column(name="PISCINE_CONSTRUITE", type="string", length=200, nullable=false)
   */
  private $piscine_construite;

  /**
   * @var string $forme_piscine
   *
   * @Column(name="FORME_PISCINE", type="string", length=200, nullable=true)
   */
  private $forme_piscine;

  /**
   * @var string $dimension
   *
   * @Column(name="DIMENSION", type="string", length=200, nullable=true)
   */
  private $dimension;

  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=200, nullable=true)
   */
  private $surface;

  /**
   * @var string $prevoir_chape
   *
   * @Column(name="PREVOIR_CHAPE", type="string", length=200, nullable=true)
   */
  private $prevoir_chape;


   /**
   * @var string $type_materiau
   *
   * @Column(name="TYPE_MATERIAU", type="string", length=200, nullable=true)
   */
  private $type_materiau;

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
   * @return the $id_qualif_terrasse_piscine
   */
  public function getId_qualif_terrasse_piscine() {

    return $this->id_qualif_terrasse_piscine;
  }

  /**
   * @return the $piscine_construite
   */
  public function getPiscine_construite() {

    return $this->piscine_construite;
  }

  /**
   * @return the $forme_piscine
   */
  public function getForme_piscine() {

    return $this->forme_piscine;
  }

  /**
   * @return the $dimension
   */
  public function getDimension() {

    return $this->dimension;
  }

  /**
   * @return the $surface
   */
  public function getSurface() {

    return $this->surface;
  }

  /**
   * @return the $prevoir_chape
   */
  public function getPrevoir_chape() {

    return $this->prevoir_chape;
  }

  /**
   * @return the $type_materiau
   */
  public function getType_materiau() {

    return $this->type_materiau;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_terrasse_piscine
   */
  public function setId_qualif_terrasse_piscine($id_qualif_terrasse_piscine) {

    $this->id_qualif_terrasse_piscine = $id_qualif_terrasse_piscine;
  }


  /**
   * @param string $piscine_construite
   */
  public function setPiscine_construite($piscine_construite) {

    $this->piscine_construite = $piscine_construite;
  }

  /**
   * @param string $forme_piscine
   */
  public function setForme_piscine($forme_piscine) {

    $this->forme_piscine = $forme_piscine;
  }

  /**
   * @param string $dimension
   */
  public function setDimension($dimension) {

    $this->dimension = $dimension;
  }

  /**
   * @param string $surface
   */
  public function setSurface($surface) {

    $this->surface = $surface;
  }

  /**
   * @param string $prevoir_chape
   */
  public function setPrevoir_chape($prevoir_chape) {

    $this->prevoir_chape = $prevoir_chape;
  }

   /**
   * @param string $type_materiau
   */
  public function setType_materiau($type_materiau) {

    $this->type_materiau = $type_materiau;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
