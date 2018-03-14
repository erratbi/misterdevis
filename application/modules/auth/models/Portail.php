<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_portail")
 * @Entity(repositoryClass="Auth_Model_PortailRepository")
 */
class Auth_Model_Portail {

  /**
   * @var integer $id_qualif_portail
   *
   * @Column(name="ID_QUALIF_PORTAIL", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_portail;

  /**
   * @var string $nbre_portail
   *
   * @Column(name="NBRE_PORTAIL", type="string", length=200, nullable=true)
   */
  private $nbre_portail;

  /**
   * @var string $depose_existant
   *
   * @Column(name="DEPOSE_EXISTANT", type="string", length=200, nullable=true)
   */
  private $depose_existant;

  /**
   * @var string $portail_motorise
   *
   * @Column(name="PORTAIL_MOTORISE", type="string", length=200, nullable=true)
   */
  private $portail_motorise;

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
   * @return the $id_qualif_portail
   */
  public function getId_qualif_portail() {

    return $this->id_qualif_portail;
  }

  /**
   * @return the $nbre_portail
   */
  public function getNbre_portail() {

    return $this->nbre_portail;
  }

  /**
   * @return the $depose_existant
   */
  public function getDepose_existant() {

    return $this->depose_existant;
  }

  /**
   * @return the $portail_motorise
   */
  public function getPortail_motorise() {

    return $this->portail_motorise;
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
   * @param integer $id_qualif_portail
   */
  public function setId_qualif_portail($id_qualif_portail) {

    $this->id_qualif_portail = $id_qualif_portail;
  }


  /**
   * @param string $nbre_portail
   */
  public function setNbre_portail($nbre_portail) {

    $this->nbre_portail = $nbre_portail;
  }

  /**
   * @param string $depose_existant
   */
  public function setDepose_existant($depose_existant) {

    $this->depose_existant = $depose_existant;
  }

  /**
   * @param string $portail_motorise
   */
  public function setPortail_motorise($portail_motorise) {

    $this->portail_motorise = $portail_motorise;
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
