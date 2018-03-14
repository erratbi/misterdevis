<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_anticalcaire")
 * @Entity(repositoryClass="Auth_Model_AnticalcaireRepository")
 */
class Auth_Model_Anticalcaire {

  /**
   * @var integer $id_qualif_anticalcaire
   *
   * @Column(name="ID_QUALIF_ANTICALCAIRE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_anticalcaire;

  /**
   * @var string $annee_construction
   *
   * @Column(name="ANNEE_CONSTRUCTION", type="string", length=200, nullable=true)
   */
  private $annee_construction;

  /**
   * @var string $procede_traitement
   *
   * @Column(name="PROCEDE_TRAITEMENT", type="string", length=200, nullable=true)
   */
  private $procede_traitement;

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
   * @return the $id_qualif_anticalcaire
   */
  public function getId_qualif_anticalcaire() {

    return $this->id_qualif_anticalcaire;
  }

  /**
   * @return the $annee_construction
   */
  public function getAnnee_construction() {

    return $this->annee_construction;
  }

  /**
   * @return the $procede_traitement
   */
  public function getProcede_traitement() {

    return $this->procede_traitement;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_anticalcaire
   */
  public function setId_qualif_anticalcaire($id_qualif_anticalcaire) {

    $this->id_qualif_anticalcaire = $id_qualif_anticalcaire;
  }


  /**
   * @param string $annee_construction
   */
  public function setAnnee_construction($annee_construction) {

    $this->annee_construction = $annee_construction;
  }

  /**
   * @param string $procede_traitement
   */
  public function setProcede_traitement($procede_traitement) {

    $this->procede_traitement = $procede_traitement;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
