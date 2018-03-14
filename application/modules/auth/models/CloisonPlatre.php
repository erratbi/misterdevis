<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_cloison_platre")
 * @Entity(repositoryClass="Auth_Model_CloisonPlatreRepository")
 */
class Auth_Model_CloisonPlatre {

  /**
   * @var integer $id_qualif_cloison_platre
   *
   * @Column(name="ID_QUALIF_CLOISON_PLATRE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_cloison_platre;

  /**
   * @var string $surface_placo
   *
   * @Column(name="SURFACE_PLACO", type="string", length=200, nullable=true)
   */
  private $surface_placo;

  /**
   * @var string $surface_plafond
   *
   * @Column(name="SURFACE_PLAFOND", type="string", length=200, nullable=true)
   */
  private $surface_plafond;

  /**
   * @var string $type_plafond
   *
   * @Column(name="TYPE_PLAFOND", type="string", length=200, nullable=true)
   */
  private $type_plafond;

   /**
   * @var string $faux_plafond
   *
   * @Column(name="FAUX_PLAFOND", type="string", length=200, nullable=true)
   */
  private $faux_plafond;

   /**
   * @var string $surface_sol
   *
   * @Column(name="SURFACE_SOl", type="string", length=200, nullable=true)
   */
  private $surface_sol;

   /**
   * @var string $hauteur_sous_plafond
   *
   * @Column(name="HAUTEUR_SOUS_PLAFOND", type="string", length=200, nullable=true)
   */
  private $hauteur_sous_plafond;

   /**
   * @var string $type_cloison
   *
   * @Column(name="TYPE_CLOISON", type="string", length=200, nullable=true)
   */
  private $type_cloison;

   /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=true)
   */
  private $nbre_piece;

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
   * @return the $id_qualif_cloison_platre
   */
  public function getId_qualif_cloison_platre() {

    return $this->id_qualif_cloison_platre;
  }

  /**
   * @return the $surface_placo
   */
  public function getSurface_placo() {

    return $this->surface_placo;
  }

  /**
   * @return the $surface_plafond
   */
  public function getSurface_plafond() {

    return $this->surface_plafond;
  }

  /**
   * @return the $type_plafond
   */
  public function getType_plafond() {

    return $this->type_plafond;
  }

  /**
   * @return the $faux_plafond
   */
  public function getFaux_plafond() {

    return $this->faux_plafond;
  }

  /**
   * @return the $surface_sol
   */
  public function getSurface_sol() {

    return $this->surface_sol;
  }

  /**
   * @return the $hauteur_sous_plafond
   */
  public function getHauteur_sous_plafond() {

    return $this->hauteur_sous_plafond;
  }

  /**
   * @return the $type_cloison
   */
  public function getType_cloison() {

    return $this->type_cloison;
  }

  /**
   * @return the $nbre_piece
   */
  public function getNbre_piece() {

    return $this->nbre_piece;
  }

  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_cloison_platre
   */
  public function setId_qualif_cloison_platre($id_qualif_cloison_platre) {

    $this->id_qualif_cloison_platre = $id_qualif_cloison_platre;
  }


  /**
   * @param string $surface_placo
   */
  public function setSurface_placo($surface_placo) {

    $this->surface_placo = $surface_placo;
  }

  /**
   * @param string $type_plafond
   */
  public function setType_plafond($type_plafond) {

    $this->type_plafond = $type_plafond;
  }

  /**
   * @param string $surface_plafond
   */
  public function setSurface_plafond($surface_plafond) {

    $this->surface_plafond = $surface_plafond;
  }

  /**
   * @param string $faux_plafond
   */
  public function setFaux_plafond($faux_plafond) {

    $this->faux_plafond = $faux_plafond;
  }

  /**
   * @param string $surface_sol
   */
  public function setSurface_sol($surface_sol) {

    $this->surface_sol = $surface_sol;
  }

  /**
   * @param string $hauteur_sous_plafond
   */
  public function setHauteur_sous_plafond($hauteur_sous_plafond) {

    $this->hauteur_sous_plafond = $hauteur_sous_plafond;
  }

  /**
   * @param string $type_cloison
   */
  public function setType_cloison($type_cloison) {

    $this->type_cloison = $type_cloison;
  }

  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece($nbre_piece) {

    $this->nbre_piece = $nbre_piece;
  }

  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
