<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_Packs
 *
 * @Table(name="packs")
 * @Entity(repositoryClass="Auth_Model_PacksRepository")
 */
class Auth_Model_Packs {
  
  /**
   * @var string $id_pack
   *
   * @Column(name="ID_PACK", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_pack;
  
  /**
   * @var string $libelle
   *
   * @Column(name="LIBELLE", type="string", length=50, nullable=false)
   */
  private $libelle;

  /**
   * @var string $prix_pack
   *
   * @Column(name="PRIX_PACK", type="float", length=50, nullable=false)
   */
  private $prix_pack;

  /**
   * @var string $nbre_credit
   *
   * @Column(name="NBRE_CREDIT", type="integer", length=50, nullable=false)
   */
  private $nbre_credit;

  /**
   * @var string $economie
   *
   * @Column(name="ECONOMIE", type="integer", length=50, nullable=false)
   */
  private $economie;
  
  
  /**
   * Many PACKS have Many Artisans.
   * @ManyToMany(targetEntity="Auth_Model_Artisan", inversedBy="departements")
   * @JoinTable(name="crediter",
   *      joinColumns={@JoinColumn(name="ID_PACK", referencedColumnName="ID_PACK")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")}
   *   )
   */
  protected $artisans;

  
  public function __construct() {
    
    $this->artisans = new \Doctrine\Common\Collections\ArrayCollection();
  }
  
  public function addArtisan( Auth_Model_Artisan $artisan ) {
    
    if ( $this->artisans->contains( $artisan ) ) {
      return;
    }
    
    $this->artisans->add( $artisan );
  }
  
  
  public function removeArtisan( Auth_Model_Artisan $artisan ) {
    
    if ( $this->artisans->contains( $artisan ) ) {
      return;
    }
    $this->artisans->removeElement( $artisan );
  }
  
  
  /**
   * @return the attribute
   */
  public function __set( $attr, $val ) {
    
    $this->$attr = $val;
  }
  
  
  /**
   * @param the attribute
   */
  public function __get( $attr ) {
    
    return $this->$attr;
  }
  
  
  /**
   * @return toArray
   */
  public function toArray() {
    
    return get_object_vars( $this );
  }
  
  
  /**
   * @return string $id_pack
   */
  public function getId_pack() {
    
    return $this->id_pack;
  }
  
  
  /**
   * @return the $libelle
   */
  public function getLibelle() {
    
    return $this->libelle;
  }

  /**
   * @return the $prix_pack
   */
  public function getPrix_pack() {
    
    return $this->prix_pack;
  }

  /**
   * @return the $nbre_credit
   */
  public function getNbre_credit() {
    
    return $this->nbre_credit;
  }

  /**
   * @return the $economie
   */
  public function getEconomie() {
    
    return $this->economie;
  }
  
  
  /**
   * @param integer $id_pack
   */
  public function setId_pack( $id_pack ) {
    
    $this->id_pack = $id_pack;
  }
  
  
  /**
   * @param string $libelle
   */
  public function setLibelle( $libelle ) {
    
    $this->libelle = $libelle;
  }

  /**
   * @param float $prix_pack
   */
  public function setPrix_pack( $prix_pack ) {
    
    $this->prix_pack = $prix_pack;
  }

  /**
   * @param integer $nbre_credit
   */
  public function setNbre_credit( $nbre_credit ) {
    
    $this->nbre_credit = $nbre_credit;
  }

  /**
   * @param integer $economie
   */
  public function setEconomie( $economie ) {
    
    $this->economie = $economie;
  }
  
}
