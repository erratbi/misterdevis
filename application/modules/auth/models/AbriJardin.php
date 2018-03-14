<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_abri_jardin")
 * @Entity(repositoryClass="Auth_Model_AbriJardinRepository")
 */
class Auth_Model_AbriJardin {

  /**
   * @var integer $id_qualif_abri_jardin
   *
   * @Column(name="ID_QUALIF_ABRI_JARDIN", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_abri_jardin;

  /**
   * @var string $type_construction
   *
   * @Column(name="TYPE_CONSTRUCTION", type="string", length=200, nullable=true)
   */
  private $type_construction;

  /**
   * @var string $surface_prevue
   *
   * @Column(name="SURFACE_PREVUE", type="string", length=200, nullable=true)
   */
  private $surface_prevue;

  /**
   * @var string $prevoir_chape
   *
   * @Column(name="PREVOIR_CHAPE", type="string", length=200, nullable=true)
   */
  private $prevoir_chape;

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
   * @return the $id_qualif_abri_jardin
   */
  public function getId_qualif_abri_jardin() {

    return $this->id_qualif_abri_jardin;
  }

  /**
   * @return the $type_construction
   */
  public function getType_construction() {

    return $this->type_construction;
  }

  /**
   * @return the $surface_prevue
   */
  public function getSurface_prevue() {

    return $this->surface_prevue;
  }

  /**
   * @return the $prevoir_chape
   */
  public function getPrevoir_chape() {

    return $this->prevoir_chape;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_abri_jardin
   */
  public function setId_qualif_abri_jardin($id_qualif_abri_jardin) {

    $this->id_qualif_abri_jardin = $id_qualif_abri_jardin;
  }


  /**
   * @param string $type_construction
   */
  public function setType_construction($type_construction) {

    $this->type_construction = $type_construction;
  }

  /**
   * @param string $surface_prevue
   */
  public function setSurface_prevue($surface_prevue) {

    $this->surface_prevue = $surface_prevue;
  }

  /**
   * @param string $prevoir_chape
   */
  public function setPrevoir_chape($prevoir_chape) {

    $this->prevoir_chape = $prevoir_chape;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
