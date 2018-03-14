<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_poele_granule")
 * @Entity(repositoryClass="Auth_Model_PoeleGranuleRepository")
 */
class Auth_Model_PoeleGranule {

  /**
   * @var integer $id_qualif_poele_granule
   *
   * @Column(name="ID_QUALIF_POELE_GRANULE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_poele_granule;

  /**
   * @var string $conduite_fume
   *
   * @Column(name="CONDUITE_FUME", type="string", length=200, nullable=true)
   */
  private $conduite_fume;

  /**
   * @var string $nbre_etage
   *
   * @Column(name="NBRE_ETAGE", type="string", length=200, nullable=true)
   */
  private $nbre_etage;

  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=true)
   */
  private $surface_totale;

  /**
   * @var string $hauteur_sous_plafond
   *
   * @Column(name="HAUTEUR_SOUS_PLAFOND", type="string", length=200, nullable=true)
   */
  private $hauteur_sous_plafond;

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
   * @return the $id_qualif_poele_granule
   */
  public function getId_qualif_poele_granule() {

    return $this->id_qualif_poele_granule;
  }

  /**
   * @return the $conduite_fume
   */
  public function getConduite_fume() {

    return $this->conduite_fume;
  }

  /**
   * @return the $nbre_etage
   */
  public function getNbre_etage() {

    return $this->nbre_etage;
  }

  /**
   * @return the $surface_totale
   */
  public function getSurface_totale() {

    return $this->surface_totale;
  }

  /**
   * @return the $hauteur_sous_plafond
   */
  public function getHauteur_sous_plafond() {

    return $this->hauteur_sous_plafond;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_poele_granule
   */
  public function setId_qualif_poele_granule($id_qualif_poele_granule) {

    $this->id_qualif_poele_granule = $id_qualif_poele_granule;
  }


  /**
   * @param string $conduite_fume
   */
  public function setConduite_fume($conduite_fume) {

    $this->conduite_fume = $conduite_fume;
  }

  /**
   * @param string $nbre_etage
   */
  public function setNbre_etage($nbre_etage) {

    $this->nbre_etage = $nbre_etage;
  }

  /**
   * @param string $surface_totale
   */
  public function setSurface_totale($surface_totale) {

    $this->surface_totale = $surface_totale;
  }

  /**
   * @param string $hauteur_sous_plafond
   */
  public function setHauteur_sous_plafond($hauteur_sous_plafond) {

    $this->hauteur_sous_plafond = $hauteur_sous_plafond;
  }


  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
