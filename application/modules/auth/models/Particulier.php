<?php


/**
 * Auth_Model_Particulier
 *
 * @Table(name="particulier")
 * @Entity(repositoryClass="Auth_Model_ParticulierRepository")
 */
class Auth_Model_Particulier {
  
  /**
   * @var integer $id_particulier
   *
   * @Column(name="ID_PARTICULIER", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_particulier;
  
  /**
   * @var string $nom_particulier
   *
   * @Column(name="NOM_PARTICULIER", type="string", length=50, nullable=false)
   */
  private $nom_particulier;
  
  /**
   * @var string $prenom_particulier
   *
   * @Column(name="PRENOM_PARTICULIER", type="string", length=50, nullable=false)
   */
  private $prenom_particulier;
  
  /**
   * @var string $telephone_fixe
   *
   * @Column(name="TELEPHONE_FIXE", type="string", length=50, nullable=false)
   */
  private $telephone_fixe;
  
  /**
   * @var string $telephone_portable
   *
   * @Column(name="TELEPHONE_PORTABLE", type="string", length=50, nullable=false)
   */
  private $telephone_portable;
  
  
  /**
   * @var string $civilite
   *
   * @Column(name="CIVILITE", type="string", length=200, nullable=false)
   */
  private $civilite;
  
  /**
   * @var string $email
   *
   * @Column(name="EMAIL", type="string", length=200, nullable=false)
   */
  private $email;
  
  /**
   * @var string $horaireRDV
   *
   * @Column(name="HORAIRERDV", type="string", length=200, nullable=false)
   */
  private $horaireRDV;
  
  
  /**
   * @param $attr
   * @param $val
   */
  public function __set( $attr, $val ) {
    
    $this->$attr = $val;
  }
  
  /**
   * @param $attr
   *
   * @return mixed
   */
  public function __get( $attr ) {
    
    return $this->$attr;
  }
  
  
  /**
   * @return array
   */
  public function toArray() {
    
    return get_object_vars( $this );
  }
  
  
  /**
   * @return int
   */
  public function getId_particulier() {
    
    return $this->id_particulier;
  }
  
  
  /**
   * @return string
   */
  public function getNom_particulier() {
    
    return $this->nom_particulier;
  }
  
  
  /**
   * @return string
   */
  public function getPrenom_particulier() {
    
    return $this->prenom_particulier;
  }
  
  
  /**
   * @return string
   */
  public function getTelephone_fixe() {
    
    return $this->telephone_fixe;
  }
  
  
  /**
   * @return string
   */
  public function getTelephone_portable() {
    
    return $this->telephone_portable;
  }
  
  
  /**
   * @return string
   */
  public function getCivilite() {
    
    return $this->civilite;
  }
  
  
  /**
   * @return string
   */
  public function getEmail() {
    
    return $this->email;
  }
  
  
  /**
   * @return string
   */
  public function getHoraireRDV() {
    
    return $this->horaireRDV;
  }
  
  
  /**
   * @param $id_particulier
   */
  public function setId_particulier( $id_particulier ) {
    
    $this->id_particulier = $id_particulier;
  }
  
  
  /**
   * @param $nom_particulier
   */
  public function setNom_particulier( $nom_particulier ) {
    
    $this->nom_particulier = $nom_particulier;
  }
  
  
  /**
   * @param $prenom_particulier
   */
  public function setPrenom_particulier( $prenom_particulier ) {
    
    $this->prenom_particulier = $prenom_particulier;
  }
  
  
  /**
   * @param $telephone_fixe
   */
  public function setTelephone_fixe( $telephone_fixe ) {
    
    $this->telephone_fixe = preg_replace( '/^(?:(?:\+|00|0)?\s?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/', '0$1$2$3$4$5', $telephone_fixe );
  }
  
  
  /**
   * @param $telephone_portable
   */
  public function setTelephone_portable( $telephone_portable ) {
    
    $this->telephone_portable = preg_replace( '/^(?:(?:\+|00|0)?\s?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/', '0$1$2$3$4$5', $telephone_portable );
  }
  
  
  /**
   * @param $civilite
   */
  public function setCivilite( $civilite ) {
    
    $this->civilite = $civilite;
  }
  
  
  /**
   * @param $email
   */
  public function setEmail( $email ) {
    
    $this->email = $email;
  }
  
  
  /**
   * @param $horaireRDV
   */
  public function setHoraireRDV( $horaireRDV ) {
    
    $this->horaireRDV = $horaireRDV;
  }
  
  
}
