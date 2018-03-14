<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_terrassement")
 * @Entity(repositoryClass="Auth_Model_TerrassementRepository")
 */
class Auth_Model_Terrassement {

  /**
   * @var integer $id_qualif_terrassement
   *
   * @Column(name="ID_QUALIF_TERRASSEMENT", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_terrassement;

  /**
   * @var string $surface
   *
   * @Column(name="SURFACE", type="string", length=50, nullable=true)
   */
  private $surface;

  /**
   * @var string $permis_construire
   *
   * @Column(name="PERMIS_CONSTRUIRE", type="string", length=50, nullable=true)
   */
  private $permis_construire;

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
   * @return the $id_qualif_terrassement
   */
  public function getId_qualif_terrassement() {

    return $this->id_qualif_terrassement;
  }


  /**
   * @return the $surface
   */
  public function getSurface() {

    return $this->surface;
  }


  /**
   * @return the $permis_construire
   */
  public function getPermis_construire() {

    return $this->permis_construire;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_terrassement
   */
  public function setId_qualif_terrassement($id_qualif_terrassement) {

    $this->id_qualif_terrassement = $id_qualif_terrassement;
  }


  /**
   * @param string $surface
   */
  public function setSurface($surface) {

    $this->surface = $surface;
  }


  /**
   * @param string $permis_construire
   */
  public function setPermis_construire($permis_construire) {

    $this->permis_construire = $permis_construire;
  }
  
  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
