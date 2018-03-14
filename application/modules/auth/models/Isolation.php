<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="qualif_isolation")
 * @Entity(repositoryClass="Auth_Model_IsolationRepository")
 */
class Auth_Model_Isolation {

  /**
   * @var integer $id_qualif_isolation
   *
   * @Column(name="ID_QUALIF_ISOLATION", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_qualif_isolation;

  /**
   * @var string $type_travaux
   *
   * @Column(name="TYPE_TRAVAUX", type="string", length=200, nullable=false)
   */
  private $type_travaux;

  /**
   * @var string $surface_totale
   *
   * @Column(name="SURFACE_TOTALE", type="string", length=200, nullable=true)
   */
  private $surface_totale;

  /**
   * @var string $categorie_isolation
   *
   * @Column(name="CATEGORIE_ISOLATION", type="string", length=200, nullable=true)
   */
  private $categorie_isolation;

  /**
   * @var string $nbre_piece
   *
   * @Column(name="NBRE_PIECE", type="string", length=200, nullable=true)
   */
  private $nbre_piece;

  /**
   * @var string $type_comble
   *
   * @Column(name="TYPE_COMBLE", type="string", length=200, nullable=true)
   */
  private $type_comble;

  /**
   * @var string $type_isolant
   *
   * @Column(name="TYPE_ISOLANT", type="string", length=200, nullable=true)
   */
  private $type_isolant;

  /**
   * @var string $type_isolation
   *
   * @Column(name="TYPE_ISOLATION", type="string", length=200, nullable=true)
   */
  private $type_isolation;

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
   * @return the $id_qualif_isolation
   */
  public function getId_qualif_isolation() {

    return $this->id_qualif_isolation;
  }

  /**
   * @return the $type_travaux
   */
  public function getType_travaux() {

    return $this->type_travaux;
  }

  /**
   * @return the $surface_totale
   */
  public function getSurface_totale() {

    return $this->surface_totale;
  }

  /**
   * @return the $categorie_isolation
   */
  public function getCategorie_isolation() {

    return $this->categorie_isolation;
  }

  /**
   * @return the $nbre_piece
   */
  public function getNbre_piece() {

    return $this->nbre_piece;
  }

  /**
   * @return the $type_comble
   */
  public function getType_comble() {

    return $this->type_comble;
  }

  /**
   * @return the $type_isolant
   */
  public function getType_isolant() {

    return $this->type_isolant;
  }

  /**
   * @return the $type_isolation
   */
  public function getType_isolation() {

    return $this->type_isolation;
  }


  /**
   * @return the $id_demande
   */
  public function getId_demande() {

    return $this->id_demande;
  }


  /**
   * @param integer $id_qualif_isolation
   */
  public function setId_qualif_isolation($id_qualif_isolation) {

    $this->id_qualif_isolation = $id_qualif_isolation;
  }


  /**
   * @param string $type_travaux
   */
  public function setType_travaux($type_travaux) {

    $this->type_travaux = $type_travaux;
  }

  /**
   * @param string $surface_totale
   */
  public function setSurface_totale($surface_totale) {

    $this->surface_totale = $surface_totale;
  }

  /**
   * @param string $categorie_isolation
   */
  public function setCategorie_isolation($categorie_isolation) {

    $this->categorie_isolation = $categorie_isolation;
  }


  /**
   * @param string $nbre_piece
   */
  public function setNbre_piece($nbre_piece) {

    $this->nbre_piece = $nbre_piece;
  }

   /**
   * @param string $type_comble
   */
  public function setType_comble($type_comble) {

    $this->type_comble = $type_comble;
  }

    /**
   * @param string $type_isolant
   */
  public function setType_isolant($type_isolant) {

    $this->type_isolant = $type_isolant;
  }

    /**
   * @param string $type_isolation
   */
  public function setType_isolation($type_isolation) {

    $this->type_isolation = $type_isolation;
  }
  /**
   * @param Demandedevis $id_demande
   */
  public function setId_demande($id_demande) {

    $this->id_demande = $id_demande;
  }


}
