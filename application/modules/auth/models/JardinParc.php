<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_jardin_parc")
 * @Entity(repositoryClass="Auth_Model_JardinParcRepository")
 */
class Auth_Model_JardinParc {

  /**
   * @var integer $id_qualif_jardin_parc
   *
   * @Column(name="ID_QUALIF_JARDIN_PARC", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_jardin_parc;

  /**
   * @var string $type_lieu
   *
   * @Column(name="TYPE_LIEU", type="string", length=200, nullable=true)
   */
  private $type_lieu;

  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=200, nullable=true)
   */
  private $surface;

  /**
   * @var string $description
   *
   * @Column(name="DESCRIPTION", type="string", length=200, nullable=true)
   */
  private $description;

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
   * @return the $id_qualif_jardin_parc
   */
  public function getId_qualif_jardin_parc() {

    return $this->id_qualif_jardin_parc;
  }

  /**
   * @return the $type_lieu
   */
  public function getType_lieu() {

    return $this->type_lieu;
  }

  /**
   * @return the $description
   */
  public function getDescription() {

    return $this->description;
  }

  /**
   * @return the $surface
   */
  public function getSurface() {

    return $this->surface;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_jardin_parc
   */
  public function setId_qualif_jardin_parc($id_qualif_jardin_parc) {

    $this->id_qualif_jardin_parc = $id_qualif_jardin_parc;
  }


  /**
   * @param string $type_lieu
   */
  public function setType_lieu($type_lieu) {

    $this->type_lieu = $type_lieu;
  }

  /**
   * @param string $surface
   */
  public function setSurface($surface) {

    $this->surface = $surface;
  }

  /**
   * @param string $description
   */
  public function setDescription($description) {

    $this->description = $description;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
