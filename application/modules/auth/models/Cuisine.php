<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_cuisine")
 * @Entity(repositoryClass="Auth_Model_CuisineRepository")
 */
class Auth_Model_Cuisine {

  /**
   * @var integer $id_qualif_cuisine
   *
   * @Column(name="ID_QUALIF_CUISINE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_cuisine;

  /**
   * @var string $depose_ancienne_cuisine
   *
   * @Column(name="DEPOSE_ANCIENNE_CUISINE", type="string", length=50, nullable=false)
   */
  private $depose_ancienne_cuisine;

  /**
   * @var string $niveau_gamme_souhaite
   *
   * @Column(name="NIVEAU_GAMME_SOUHAITE", type="string", length=50, nullable=false)
   */
  private $niveau_gamme_souhaite;

  /**
   * @var string $style_futur_cuisine
   *
   * @Column(name="STYLE_FUTUR_CUISINE", type="string", length=50, nullable=false)
   */
  private $style_futur_cuisine;


  /**
   * @var string $surface_au_sol_cuisine
   *
   * @Column(name="SURFACE_AU_SOL_CUISINE", type="string", length=200, nullable=false)
   */
  private $surface_au_sol_cuisine;

  /**
   * @var string $travaux_plomberie
   *
   * @Column(name="TRAVAUX_PLOMBERIE", type="string", length=200, nullable=false)
   */
  private $travaux_plomberie;

  /**
   * @var string $travaux_peinture
   *
   * @Column(name="TRAVAUX_PEINTURE", type="string", length=200, nullable=false)
   */
  private $travaux_peinture;

  /**
   * @var string $travaux_revetement_sol
   *
   * @Column(name="TRAVAUX_REVETEMENT_SOL", type="string", length=200, nullable=false)
   */
  private $travaux_revetement_sol;

  /**
   * @var string $travaux_electricite
   *
   * @Column(name="TRAVAUX_ELECTRICITE", type="string", length=200, nullable=false)
   */
  private $travaux_electricite;

  /**
   * @var string $equipement_electromenager
   *
   * @Column(name="EQUIPEMENT_ELECTROMENAGER", type="string", length=200, nullable=false)
   */
  private $equipement_electromenager;

  /**
   * @var string $hauteur_sous_plafond
   *
   * @Column(name="HAUTEUR_SOUS_PLAFOND", type="string", length=200, nullable=false)
   */
  private $hauteur_sous_plafond;


  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;

  /**
   * @var string $type_cuisine
   *
   * @Column(name="TYPE_CUISINE", type="string", length=200, nullable=false)
   */
  private $type_cuisine;

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
   * @return the $id_qualif_cuisine
   */
  public function getId_qualif_cuisine() {

    return $this->id_qualif_cuisine;
  }


  /**
   * @return the $depose_ancienne_cuisine
   */
  public function getDepose_ancienne_cuisine() {

    return $this->depose_ancienne_cuisine;
  }


  /**
   * @return the $niveau_gamme_souhaite
   */
  public function getNiveau_gamme_souhaite() {

    return $this->niveau_gamme_souhaite;
  }


  /**
   * @return the $style_futur_cuisine
   */
  public function getStyle_futur_style() {

    return $this->style_futur_cuisine;
  }


  /**
   * @return the $hauteur_sous_plafond
   */
  public function getHauteur_sous_plafond() {

    return $this->hauteur_sous_plafond;
  }


  /**
   * @return the $surface_au_sol_cuisine
   */
  public function getSurface_au_sol_cuisine() {

    return $this->surface_au_sol_cuisine;
  }


  /**
   * @return the $travaux_plomberie
   */
  public function getTravaux_plomberie() {

    return $this->travaux_plomberie;
  }


  /**
   * @return the $travaux_peinture
   */
  public function getTravaux_peinture() {

    return $this->travaux_peinture;
  }


  /**
   * @return the $travaux_revetement_sol
   */
  public function getTravaux_revetement_sol() {

    return $this->travaux_revetement_sol;
  }


  /**
   * @return the $travaux_electricite
   */
  public function getTravaux_electricite() {

    return $this->travaux_electricite;
  }


  /**
   * @return the $equipement_electromenager
   */
  public function getEquipement_electromenager() {

    return $this->equipement_electromenager;
  }


  /**
   * @return the $type_travaux
   */
  public function getType_travaux() {

    return $this->type_travaux;
  }

  /**
   * @return the $type_cuisine
   */
  public function getType_cuisine() {

    return $this->type_cuisine;
  }


  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_cuisine
   */
  public function setId_qualif_cuisine($id_qualif_cuisine) {

    $this->id_qualif_cuisine = $id_qualif_cuisine;
  }


  /**
   * @param string $depose_ancienne_cuisine
   */
  public function setDepose_ancienne_cuisine($depose_ancienne_cuisine) {

    $this->depose_ancienne_cuisine = $depose_ancienne_cuisine;
  }


  /**
   * @param string $niveau_gamme_souhaite
   */
  public function setNiveau_gamme_souhaite($niveau_gamme_souhaite) {

    $this->niveau_gamme_souhaite = $niveau_gamme_souhaite;
  }


  /**
   * @param string $style_futur_cuisine
   */
  public function setStyle_futur_cuisine($style_futur_cuisine) {

    $this->style_futur_cuisine = $style_futur_cuisine;
  }


  /**
   * @param string $surface_au_sol_cuisine
   */
  public function setSurface_au_sol_cuisine($surface_au_sol_cuisine) {

    $this->surface_au_sol_cuisine = $surface_au_sol_cuisine;
  }


  /**
   * @param string $travaux_plomberie
   */
  public function setTravaux_plomberie($travaux_plomberie) {

    $this->travaux_plomberie = $travaux_plomberie;
  }


  /**
   * @param string $travaux_peinture
   */
  public function setTravaux_peinture($travaux_peinture) {

    $this->travaux_peinture = $travaux_peinture;
  }


  /**
   * @param string $hauteur_sous_plafond
   */
  public function setHauteur_sous_plafond($hauteur_sous_plafond) {

    $this->hauteur_sous_plafond = $hauteur_sous_plafond;
  }


  /**
   * @param string $travaux_revetement_sol
   */
  public function setTravaux_revetement_sol($travaux_revetement_sol) {

    $this->travaux_revetement_sol = $travaux_revetement_sol;
  }


  /**
   * @param string $travaux_electricite
   */
  public function setTravaux_electricite($travaux_electricite) {

    $this->travaux_electricite = $travaux_electricite;
  }


  /**
   * @param string $equipement_electromenager
   */
  public function setEquipement_electromenager($equipement_electromenager) {

    $this->equipement_electromenager = $equipement_electromenager;
  }


  /**
   * @param string $type_travaux
   */
  public function setType_travaux($type_travaux) {

    $this->type_travaux = $type_travaux;
  }

  /**
   * @param string $type_cuisine
   */
  public function setType_cuisine($type_cuisine) {

    $this->type_cuisine = $type_cuisine;
  }


  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
