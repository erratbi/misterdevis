<?php


/**
 * Acheter
 *
 * @Table(name="acheter")
 * @Entity(repositoryClass="Auth_Model_AcheterRepository")
 */
class Auth_Model_Acheter {
  
  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_artisan;
  
  /**
   * @var integer $id_demande
   *
   * @Column(name="ID_DEMANDE", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="NONE")
   */
  private $id_demande;

  /**
   * @var string $date_achat
   *
   * @Column(name="DATE_ACHAT", type="string", nullable=true)
   */
  
  private $date_achat;
  
  /**
   * @var string $mode_paiement
   *
   * @Column(name="MODE_PAIEMENT", type="string", nullable=true)
   */
  
  private $mode_paiement;
  
  /**
   * @var string $reglee
   *
   * @Column(name="REGLEE", type="integer", nullable=true)
   */
  
  private $reglee;
  
  
  /**
   * @var Demandedevis $demande
   *
   * @ManyToOne(targetEntity="Auth_Model_Demandedevis")
   * @JoinColumns({
   *   @JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")
   * })
   */
  private $demande;
  
  
  /**
   * @var Artisan $artisan
   *
   * @ManyToOne(targetEntity="Auth_Model_Artisan")
   * @JoinColumns({
   *   @JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")
   * })
   */
  private $artisan;
  
  
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
   * @return the $id_artisan
   */
  public function getId_artisan() {
    
    return $this->id_artisan;
  }
  
  
  /**
   * @return the $id_demande
   */
  public function getId_demande() {
    
    return $this->id_demande;
  }
  

   /**
   * @return the $date_achat
   */
  public function getDate_achat() {
    
    return $this->date_achat;
  }


  /**
   * @return the $mode_paiement
   */
  public function getMode_paiement() {
    
    return $this->mode_paiement;
  }
  
  /**
   * @return the $artisan
   */
  public function getArtisan() {
    
    return $this->artisan;
  }
  
  
  /**
   * @return the $demande
   */
  public function getDemande() {
    
    return $this->demande;
  }
  
  
  /**
   * @param integer $id_artisan
   */
  public function setId_artisan( $id_artisan ) {
    
    $this->id_artisan = $id_artisan;
  }
  
  
  /**
   * @param integer $id_demande
   */
  public function setId_demande( $id_demande ) {
    
    $this->id_demande = $id_demande;
  }

   /**
   * @param integer $date_achat
   */
  public function setDate_achat( $date_achat ) {
    
    $this->date_achat = $date_achat;
  }
  
  /**
   * @param integer $mode_paiement
   */
  public function setMode_paiement( $mode_paiement ) {
    
    $this->mode_paiement = $mode_paiement;
  }
  
  
  /**
   * @param integer $artisan
   */
  public function setArtisan( $artisan ) {
    
    $this->artisan = $artisan;
  }
  
  
  /**
   * @param integer $demande
   */
  public function setDemande( $demande ) {
    
    $this->demande = $demande;
  }
  
  
  /**
   * @return string
   */
  public function getReglee() {
    
    return $this->reglee;
  }
  
  /**
   * @param string $reglee
   */
  public function setReglee( $reglee ) {
    
    $this->reglee = $reglee;
  }
}
