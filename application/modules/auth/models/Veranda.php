<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_veranda")
 * @Entity(repositoryClass="Auth_Model_VerandaRepository")
 */
class Auth_Model_Veranda {

  /**
   * @var integer $id_qualif_veranda
   *
   * @Column(name="ID_QUALIF_VERANDA", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_veranda;

  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;

  /**
   * @var string $depose_existant
   *
   * @Column(name="DEPOSE_EXISTANT", type="string", length=200, nullable=true)
   */
  private $depose_existant;

  /**
   * @var string $type_veranda
   *
   * @Column(name="TYPE_VERANDA", type="string", length=200, nullable=true)
   */
  private $type_veranda;

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
   * @return the $id_qualif_veranda
   */
  public function getId_qualif_veranda() {

    return $this->id_qualif_veranda;
  }

  /**
   * @return the $type_travaux
   */
  public function getType_travaux() {

    return $this->type_travaux;
  }

  /**
   * @return the $depose_existant
   */
  public function getDepose_existant() {

    return $this->depose_existant;
  }

  /**
   * @return the $type_veranda
   */
  public function getType_veranda() {

    return $this->type_veranda;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_veranda
   */
  public function setId_qualif_veranda($id_qualif_veranda) {

    $this->id_qualif_veranda = $id_qualif_veranda;
  }


  /**
   * @param string $type_travaux
   */
  public function setType_travaux($type_travaux) {

    $this->type_travaux = $type_travaux;
  }

  /**
   * @param string $depose_existant
   */
  public function setDepose_existant($depose_existant) {

    $this->depose_existant = $depose_existant;
  }

  /**
   * @param string $type_veranda
   */
  public function setType_veranda($type_veranda) {

    $this->type_veranda = $type_veranda;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
