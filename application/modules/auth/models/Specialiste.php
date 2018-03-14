<?php


/**
 * Specialiste
 *
 * @Table(name="specialiste")
 * @Entity(repositoryClass="Auth_Model_SpecialisteRepository")
 */
class Auth_Model_Specialiste {

  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   * @Id
   */
  private $id_artisan;

  /**
   * @var integer $id_activite
   *
   * @Column(name="ID_ACTIVITE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_activite;


  /**
   * @var Activite $activite
   *
   * @ManyToOne(targetEntity="Auth_Model_Activite")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ACTIVITE", referencedColumnName="ID_ACTIVITE")
   * })
   */
  private $activite;


  /**
   * @var Artisan $artisan
   *
   * @ManyToOne(targetEntity="Auth_Model_Artisan")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")
   * })
   */
  private $artisan;


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
   * @return the $id_artisan
   */
  public function getId_artisan() {

    return $this->id_artisan;
  }


  /**
   * @return the $id_activite
   */
  public function getId_activite() {

    return $this->id_activite;
  }


  /**
   * @return the $artisan
   */
  public function getArtisan() {

    return $this->artisan;
  }


  /**
   * @return the $activite
   */
  public function getActivite() {

    return $this->activite;
  }


  /**
   * @param integer $id_artisan
   */
  public function setId_artisan($id_artisan) {

    $this->id_artisan = $id_artisan;
  }


  /**
   * @param integer $id_activite
   */
  public function setId_activite($id_activite) {

    $this->id_activite = $id_activite;
  }


  /**
   * @param integer $artisan
   */
  public function setArtisan($artisan) {

    $this->artisan = $artisan;
  }


  /**
   * @param integer $activite
   */
  public function setActivite($activite) {

    $this->activite = $activite;
  }


}
