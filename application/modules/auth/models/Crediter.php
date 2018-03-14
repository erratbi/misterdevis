<?php


/**
 * Crediter
 *
 * @Table(name="crediter")
 * @Entity(repositoryClass="Auth_Model_CrediterRepository")
 */
class Auth_Model_Crediter {

  /**
     * @var integer $id
     *
     * @Column(name="ID", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
  
  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   */
  private $id_artisan;
  
  /**
   * @var integer $id_pack
   *
   * @Column(name="ID_PACK", type="integer", nullable=false)
   */
  private $id_pack;
  
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
   * @var string $date_achat
   *
   * @Column(name="DATE_ACHAT", type="string", nullable=true)
   */

  private $date_achat;
  
  
  /**
   * @var Packs $pack
   *
   * @ManyToOne(targetEntity="Auth_Model_Packs")
   * @JoinColumns({
   *   @JoinColumn(name="ID_PACK", referencedColumnName="ID_PACK")
   * })
   */

  private $pack;
  
  
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
   * @return the $id
   */
  public function getId() {
    
    return $this->id;
  }
  
  /**
   * @return the $id_artisan
   */
  public function getId_artisan() {
    
    return $this->id_artisan;
  }
  
  
  /**
   * @return the $id_pack
   */
  public function getId_pack() {
    
    return $this->id_pack;
  }
  
  /**
   * @return the $mode_paiement
   */
  public function getMode_paiement() {
    
    return $this->mode_paiement;
  }
  
   /**
   * @return string
   */
  public function getReglee() {
    
    return $this->reglee;
  }

   /**
   * @return string
   */
  public function getDate_achat() {
    
    return $this->date_achat;
  }

  /**
   * @return the $artisan
   */
  public function getArtisan() {
    
    return $this->artisan;
  }
  
  
  /**
   * @return the $pack
   */
  public function getPack() {
    
    return $this->pack;
  }
  

  /**
   * @param integer $id
   */
  public function setId( $id ) {
    
    $this->id = $id;
  }
  
  /**
   * @param integer $id_artisan
   */
  public function setId_artisan( $id_artisan ) {
    
    $this->id_artisan = $id_artisan;
  }
  
  
  /**
   * @param integer $id_pack
   */
  public function setId_pack( $id_pack ) {
    
    $this->id_pack = $id_pack;
  }
  
  /**
   * @param integer $mode_paiement
   */
  public function setMode_paiement( $mode_paiement ) {
    
    $this->mode_paiement = $mode_paiement;
  }
  
  
  /**
   * @param Artisan $artisan
   */
  public function setArtisan( $artisan ) {
    
    $this->artisan = $artisan;
  }
  
  
  /**
   * @param Packs $pack
   */
  public function setPack( $pack ) {
    
    $this->pack = $pack;
  }
  
  
  /**
   * @param string $reglee
   */
  public function setReglee( $reglee ) {
    
    $this->reglee = $reglee;
  }

  /**
   * @param string $date_achat
   */
  public function setDate_achat( $date_achat ) {
    
    $this->date_achat = $date_achat;
  }
}
