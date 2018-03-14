<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="zone")
 * @Entity(repositoryClass="Auth_Model_ZoneRepository")
 */
class Auth_Model_Zone {

  /**
   * @var integer $id_zone
   *
   * @Column(name="ID_ZONE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_zone;

  /**
   * @var string $ville
   *
   * @Column(name="VILLE", type="string", length=50, nullable=false)
   */
  private $ville;

  /**
   * @var string $code
   *
   * @Column(name="CODE", type="string", length=10, nullable=false)
   */
  private $code;

  /**
   * @var integer $code_departement
   *
   * @Column(name="CODE_DEPARTEMENT", type="integer", length=20, nullable=false)
   */
  private $code_departement;

  /**
   * @var integer $lat
   *
   * @Column(name="LAT", type="string", length=20, nullable=false)
   */
  private $lat;

  /**
   * @var integer $lng
   *
   * @Column(name="LNG", type="string", length=20, nullable=false)
   */
  private $lng;


  /**
   * @var Departement
   *
   * @ManyToOne(targetEntity="Auth_Model_Departement")
   * @JoinColumns({
   *   @JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")
   * })
   */
  private $departement;


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
   * @return the $id_zone
   */
  public function getId_zone() {

    return $this->id_zone;
  }


  /**
   * @return the $ville
   */
  public function getVille() {

    return $this->ville;
  }


  /**
   * @return the $code
   */
  public function getCode() {

    return $this->code;
  }


  /**
   * @return the $code_departement
   */
  public function getCode_departement() {

    return $this->code_departement;
  }

  /**
   * @return the $lat
   */
  public function getLat() {

    return $this->lat;
  }

  /**
   * @return the $lng
   */
  public function getLng() {

    return $this->lng;
  }

   /**
   * @return the $departement
   */
  public function getDepartement() {

    return $this->departement;
  }


  /**
   * @param integer $id_zone
   */
  public function setId_zone($id_zone) {

    $this->id_zone = $id_zone;
  }


  /**
   * @param string $ville
   */
  public function setVille($ville) {

    $this->ville = $ville;
  }


  /**
   * @param string $code
   */
  public function setCode($code) {

    $this->code = $code;
  }

   /**
   * @param string $code_departement
   */
  public function setCode_departement($code_departement) {

    $this->code_departement = $code_departement;
  }

   /**
   * @param string $lat
   */
  public function setLat($lat) {

    $this->lat = $lat;
  }

   /**
   * @param string $lng
   */
  public function setLng($lng) {

    $this->lng = $lng;
  }


}
