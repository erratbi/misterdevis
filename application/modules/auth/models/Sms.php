<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="sms")
 * @Entity(repositoryClass="Auth_Model_SmsRepository")
 */
class Auth_Model_Sms {

  /**
   * @var integer $id
   *
   * @Column(name="ID", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id;

  /**
   * @var string $telephone
   *
   * @Column(name="TELEPHONE", type="string", length=200, nullable=true)
   */
  private $telephone;

  /**
   * @var string $ref
   *
   * @Column(name="REF", type="string", length=200, nullable=true)
   */
  private $ref;

  /**
   * @var Departement
   *
   * @ManyToOne(targetEntity="Auth_Model_Departement")
   * @JoinColumns({
   *   @JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")
   * })
   */
  private $code_departement;


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
   * @return the $id
   */
  public function getId() {

    return $this->id;
  }

  /**
   * @return the $telephone
   */
  public function getTelephone() {

    return $this->telephone;
  }

  /**
   * @return the $ref
   */
  public function getRef() {

    return $this->ref;
  }

  /**
   * @return the $code_departement
   */
  public function getCode_departement() {

    return $this->code_departement;
  }


  /**
   * @param integer $id
   */
  public function setId($id) {

    $this->id = $id;
  }


  /**
   * @param string $telephone
   */
  public function setTelephone($telephone) {

    $this->telephone = $telephone;
  }

  /**
   * @param string $ref
   */
  public function setRef($ref) {

    $this->ref = $ref;
  }

  /**
   * @param Departement $code_departement
   */
  public function setCode_departement($code_departement) {

    $this->code_departement = $code_departement;
  }


}
