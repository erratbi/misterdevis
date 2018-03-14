<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="activite")
 * @Entity(repositoryClass="Auth_Model_ActiviteRepository")
 */
class Auth_Model_Activite {
  
  /**
   * @var integer $id_activite
   *
   * @Column(name="ID_ACTIVITE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_activite;
  
  /**
   * @var string $libelle
   *
   * @Column(name="LIBELLE", type="string", length=50, nullable=false)
   */
  private $libelle;
  
  /**
   * @var string $ref
   *
   * @Column(name="REF", type="string", length=5, nullable=false)
   */
  private $ref;
  
  /**
   * @var integer $group
   *
   * @Column(name="GROUP", type="integer", length=2, nullable=false)
   */
  private $group;
  
  
  /**
   * Many Activites have Many Artisans.
   * @ManyToMany(targetEntity="Auth_Model_Artisan", inversedBy="activites")
   * @JoinTable(name="specialiste",
   *      joinColumns={@JoinColumn(name="ID_ACTIVITE", referencedColumnName="ID_ACTIVITE")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")}
   *   )
   */
  private $artisans;
  
  
  public function __construct() {
    
    $this->artisans = new \Doctrine\Common\Collections\ArrayCollection();
  }
  
  
  public function addArtisan( Auth_Model_Artisan $artisan ) {
    
    $artisan->addActivite( $this );
    $this->artisans[] = $artisan;
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
   * @return the $id_activite
   */
  public function getId_activite() {
    
    return $this->id_activite;
  }
  
  
  /**
   * @return the $libelle
   */
  public function getLibelle() {
    
    return $this->libelle;
  }
  
  
  /**
   * @return the $ref
   */
  public function getRef() {
    
    return $this->ref;
  }
  
  
  /**
   * @return the $group
   */
  public function getGroup() {
    
    return $this->group;
  }
  
  
  /**
   * @param integer $id_activite
   */
  public function setId_activite( $id_activite ) {
    
    $this->id_activite = $id_activite;
  }
  
  
  /**
   * @param string $libelle
   */
  public function setLibelle( $libelle ) {
    
    $this->libelle = $libelle;
  }
  
  
  /**
   * @param string $ref
   */
  public function setRef( $ref ) {
    
    $this->libelle = $ref;
  }
  
  
  /**
   * @param integer $group
   */
  public function setGroup( $group ) {
    
    $this->group = $group;
  }
  
  
}
