<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_escalier")
 * @Entity(repositoryClass="Auth_Model_EscalierRepository")
 */
class Auth_Model_Escalier {

  /**
   * @var integer $id_qualif_escalier
   *
   * @Column(name="ID_QUALIF_ESCALIER", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_escalier;

  /**
   * @var string $type_escalier
   *
   * @Column(name="TYPE_ESCALIER", type="string", length=200, nullable=false)
   */
  private $type_escalier;

  /**
   * @var string $escalier_creer
   *
   * @Column(name="ESCALIER_CREER", type="string", length=200, nullable=false)
   */
  private $escalier_creer;

  /**
   * @var string $hauteur
   *
   * @Column(name="HAUTEUR", type="string", length=200, nullable=false)
   */
  private $hauteur;

  /**
   * @var string $percer_plafond
   *
   * @Column(name="PERCER_PLAFOND", type="string", length=200, nullable=false)
   */
  private $percer_plafond;

   /**
   * @var string $preference
   *
   * @Column(name="PREFERENCE", type="string", length=200, nullable=false)
   */
  private $preference;

   /**
   * @var string $largeur
   *
   * @Column(name="LARGEUR", type="string", length=200, nullable=false)
   */
  private $largeur;

   /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=200, nullable=false)
   */
  private $nbre_etage;

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
   * @return the $id_qualif_escalier
   */
  public function getId_qualif_escalier() {

    return $this->id_qualif_escalier;
  }

  /**
   * @return the $type_escalier
   */
  public function getType_escalier() {

    return $this->type_escalier;
  }

  /**
   * @return the $escalier_creer
   */
  public function getEscalier_creer() {

    return $this->escalier_creer;
  }

  /**
   * @return the $hauteur
   */
  public function getHauteur() {

    return $this->hauteur;
  }

  /**
   * @return the $percer_plafond
   */
  public function getPercer_plafond() {

    return $this->percer_plafond;
  }

  /**
   * @return the $preference
   */
  public function getPreference() {

    return $this->preference;
  }

  /**
   * @return the $largeur
   */
  public function getLargeur() {

    return $this->largeur;
  }

  /**
   * @return the $nbre_etage
   */
  public function getNbre_etage() {

    return $this->nbre_etage;
  }


  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_escalier
   */
  public function setId_qualif_escalier($id_qualif_escalier) {

    $this->id_qualif_escalier = $id_qualif_escalier;
  }


  /**
   * @param string $type_escalier
   */
  public function setType_escalier($type_escalier) {

    $this->type_escalier = $type_escalier;
  }

  /**
   * @param string $escalier_creer
   */
  public function setEscalier_creer($escalier_creer) {

    $this->escalier_creer = $escalier_creer;
  }

  /**
   * @param string $hauteur
   */
  public function setHauteur($hauteur) {

    $this->hauteur = $hauteur;
  }

  /**
   * @param string $percer_plafond
   */
  public function setPercer_plafond($percer_plafond) {

    $this->percer_plafond = $percer_plafond;
  }


  /**
   * @param string $preference
   */
  public function setPreference($preference) {

    $this->preference = $preference;
  }

  /**
   * @param string $largeur
   */
  public function setLargeur($largeur) {

    $this->largeur = $largeur;
  }

   /**
   * @param string $nbre_etage
   */
  public function setNbre_etage($nbre_etage) {

    $this->nbre_etage = $nbre_etage;
  }



  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
