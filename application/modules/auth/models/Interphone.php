<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_interphone")
 * @Entity(repositoryClass="Auth_Model_InterphoneRepository")
 */
class Auth_Model_Interphone {

  /**
   * @var integer $id_qualif_interphone
   *
   * @Column(name="ID_QUALIF_INTERPHONE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_interphone;

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
   * @return the $id_qualif_interphone
   */
  public function getId_qualif_interphone() {

    return $this->id_qualif_interphone;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_interphone
   */
  public function setId_qualif_interphone($id_qualif_interphone) {

    $this->id_qualif_interphone = $id_qualif_interphone;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
