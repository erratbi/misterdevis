<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * Auth_Model_Artisan
 *
 * @Table(name="artisan")
 * @Entity(repositoryClass="Auth_Model_ArtisanRepository")
 */
class Auth_Model_Artisan {
  
  /**
   * @var integer $id_artisan
   *
   * @Column(name="ID_ARTISAN", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_artisan;
  
  /**
   * @var string $nom_artisan
   *
   * @Column(name="NOM_ARTISAN", type="string", length=50, nullable=false)
   */
  private $nom_artisan;
  
  /**
   * @var string $prenom_artisan
   *
   * @Column(name="PRENOM_ARTISAN", type="string", length=50, nullable=false)
   */
  private $prenom_artisan;
  
  /**
   * @var string $raison_sociale
   *
   * @Column(name="RAISON_SOCIALE", type="string", length=50, nullable=false)
   */
  private $raison_sociale;
  
  
  /**
   * @var string $email_artisan
   *
   * @Column(name="EMAIL_ARTISAN", type="string", length=200, nullable=false)
   */
  private $email_artisan;

  /**
   * @var string $email2
   *
   * @Column(name="EMAIL2", type="string", length=200, nullable=false)
   */
  private $email2;
  
  /**
   * @var string $telephone_fixe
   *
   * @Column(name="TELEPHONE_FIXE", type="string", length=200, nullable=false)
   */
  private $telephone_fixe;
  
  /**
   * @var string $telephone_portable
   *
   * @Column(name="TELEPHONE_PORTABLE", type="string", length=200, nullable=false)
   */
  private $telephone_portable;
  
  /**
   * @var string $fax
   *
   * @Column(name="FAX", type="string", length=200, nullable=false)
   */
  private $fax;
  
  
  /**
   * @var string $rcs
   *
   * @Column(name="RCS", type="string", length=200, nullable=false)
   */
  private $rcs;
  
  /**
   * @var string $siret
   *
   * @Column(name="SIRET", type="string", length=200, nullable=false)
   */
  private $siret;
  
  /**
   * @var string $code_NAF
   *
   * @Column(name="CODE_NAF", type="string", length=200, nullable=false)
   */
  private $code_NAF;
  
  /**
   * @var string $horaireRDV
   *
   * @Column(name="HORAIRERDV", type="string", length=200, nullable=false)
   */
  private $horaireRDV;
  
  
  /**
   * @var string $description
   *
   * @Column(name="DESCRIPTION", type="string", length=200,  nullable=false)
   */
  private $description;
  
  /**
   * @var string $pass
   *
   * @Column(name="PASS", type="string", length=200,  nullable=false)
   */
  private $pass;
  
  /**
   * @var string $login
   *
   * @Column(name="LOGIN", type="string", length=200,  nullable=false)
   */
  private $login;
  
  /**
   * @var string $adresse
   *
   * @Column(name="ADRESSE", type="string", length=200,  nullable=false)
   */
  private $adresse;
  
  /**
   * @var string $adresse2
   *
   * @Column(name="ADRESSE2", type="string", length=200,  nullable=true)
   */
  private $adresse2;
  
  /**
   * @var string $code_postal
   *
   * @Column(name="CODE_POSTAL", type="string", length=200,  nullable=false)
   */
  private $code_postal;
  
  /**
   * @var string $ville
   *
   * @Column(name="VILLE", type="string", length=200,  nullable=true)
   */
  private $ville;
  
  /**
   * @var string $credit_dispo
   *
   * @Column(name="CREDIT_DISPO", type="float", length=200,  nullable=true)
   */
  private $credit_dispo;
  
  /**
   * @var string $qualification
   *
   * @Column(name="QUALIFICATION", type="string", length=200,  nullable=false)
   */
  private $qualification;
  
  /**
   * @var string $center
   *
   * @Column(name="CENTER", type="string", length=200,  nullable=true)
   */
  private $center;
  
  /**
   * @var string $rayon
   *
   * @Column(name="RAYON", type="integer", nullable=true)
   */
  private $rayon;
  
  /**
   * @var string $lat
   *
   * @Column(name="LAT", type="string", length=200,  nullable=true)
   */
  private $lat;
  
  /**
   * @var string $lng
   *
   * @Column(name="LNG", type="string", length=200,  nullable=true)
   */
  private $lng;
  
  /**
   * @var string $geolocalisation
   *
   * @Column(name="GEOLOCALISATION", type="string", length=200,  nullable=true)
   */
  private $geolocalisation;

  /**
   * @var string $validation
   *
   * @Column(name="VALIDATION", type="string", length=200,  nullable=true)
   */
  private $validation;
  
  
  /**
   * Many Artisans have Many Activites.
   * @ManyToMany(targetEntity="Auth_Model_Activite", inversedBy="artisans")
   * @JoinTable(name="specialiste",
   *      joinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ACTIVITE", referencedColumnName="ID_ACTIVITE")}
   *   )
   */
  private $activites;
  
  
  /**
   * Many Artisans have Many Departements.
   * @ManyToMany(targetEntity="Auth_Model_Departement", inversedBy="artisans")
   * @JoinTable(name="intervenir",
   *      joinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")},
   *      inverseJoinColumns={@JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")}
   *   )
   */
  private $departements;
  
  /**
   * Many Artisans have Many Zones.
   * @ManyToMany(targetEntity="Auth_Model_Zone", inversedBy="artisans")
   * @JoinTable(name="geolocaliser",
   *      joinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ZONE", referencedColumnName="ID_ZONE")}
   *   )
   */
  private $zones;
  
  /**
   * Many Artisans have Many Demandes.
   * @ManyToMany(targetEntity="Auth_Model_Demandedevis", inversedBy="demandes")
   * @JoinTable(name="acheter",
   *      joinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")},
   *      inverseJoinColumns={@JoinColumn(name="ID_DEMANDE", referencedColumnName="ID_DEMANDE")}
   *   )
   */
  private $demandes;

  /**
   * Many Artisans have Many Zones.
   * @ManyToMany(targetEntity="Auth_Model_Zone", inversedBy="artisans")
   * @JoinTable(name="code",
   *      joinColumns={@JoinColumn(name="ID_ARTISAN", referencedColumnName="ID_ARTISAN")},
   *      inverseJoinColumns={@JoinColumn(name="ID_ZONE", referencedColumnName="ID_ZONE")}
   *   )
   */
  private $codes;
  
  
  /**
   * Auth_Model_Artisan constructor.
   */
  public function __construct() {
    
    $this->activites    = new \Doctrine\Common\Collections\ArrayCollection();
    $this->departements = new \Doctrine\Common\Collections\ArrayCollection();
    $this->zones        = new \Doctrine\Common\Collections\ArrayCollection();
    $this->codes        = new \Doctrine\Common\Collections\ArrayCollection();
  }
  
  /**
   * @param $id
   *
   * @return bool
   */
  public function hasActivite( $id ) {
    
    foreach ( $this->activites as $activite ) {
      
      return $activite->id_activite == $id;
    }
    
    return false;
  }
  
  /**
   * @param $id
   *
   * @return bool
   */
  public function hasZone( $id ) {
    
    foreach ( $this->zones as $zone ) {
      
      return $zone->id_zone == $id;
    }
    
    return false;
  }
  
  /**
   * @param $code
   *
   * @return bool
   */
  public function hasDepartement( $code ) {
    
    foreach ( $this->departements as $departement ) {
      
      return $departement->code_departement == $code;
    }
    
    return false;
  }

  /**
   * @param $code
   *
   * @return bool
   */
  public function hasCode( $code ) {
    
    foreach ( $this->codes as $code ) {
      
      return $code->id_zone == $code;
    }
    
    return false;
  }
  
  
  /**
   * @param \Auth_Model_Activite $activite
   */
  public function addActivite( Auth_Model_Activite $activite ) {
    
    if ( ! $this->hasActivite( $activite->getId_activite() ) ) {
      $this->activites[] = $activite;
    }
  }
  
  /**
   * @param \Auth_Model_Departement $departement
   */
  public function addDepartement( Auth_Model_Departement $departement ) {
    
    if ( $this->departements->contains( $departement ) ) {
      return;
    }
    
    $this->departements->add( $departement );
  }
  
  /**
   * @param \Auth_Model_Zone $code
   */
  public function addCode( Auth_Model_Zone $zone ) {
    
    if ( $this->codes->contains( $zone ) ) {
      return;
    }
    
    $this->codes->add( $zone );
  }


  /**
   * @param \Auth_Model_Departement $departement
   */
  public function removeDepartement( Auth_Model_Departement $departement ) {
    
    if ( $this->departements->contains( $departement ) ) {
      return;
    }
    $this->departements->removeElement( $departement );
    $departement->removeArtisan( $this );
  }
  
  
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
  public function getId_artisan() {
    
    return $this->id_artisan;
  }
  
  
  /**
   * @return string
   */
  public function getNom_artisan() {
    
    return $this->nom_artisan;
  }
  
  
  /**
   * @return string
   */
  public function getPrenom_artisan() {
    
    return $this->prenom_artisan;
  }
  
  
  /**
   * @return string
   */
  public function getRaison_sociale() {
    
    return $this->raison_sociale;
  }
  
  
  /**
   * @return string
   */
  public function getEmail_artisan() {
    
    return $this->email_artisan;
  }

  /**
   * @return string
   */
  public function getEmail2() {
    
    return $this->email2;
  }
  
  
  /**
   * @param bool $formated
   *
   * @return null|string|string[]
   */
  public function getTelephone_fixe( $formated = false ) {
    
    if ( ! $formated ) {
      return $this->telephone_fixe;
    }
    
    
    $input = preg_replace( '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i',
      '0$1 $2 $3 $4 $5', $this->telephone_fixe );
    
    
    return $input;
  }
  
  
  /**
   * @param bool $formated
   *
   * @return null|string|string[]
   */
  public function getTelephone_portable( $formated = false ) {
    
    if ( ! $formated ) {
      return $this->telephone_portable;
    }
    
    
    $input = preg_replace( '/^(?:(?:\+|00|0)?33(?:\s*\(0\))?)?\s?0?[-\s]*(\d)[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})[\.\s-]?(\d{2})$/i',
      '0$1 $2 $3 $4 $5', $this->telephone_portable );
    
    
    return $input;
  }
  
  
  /**
   * @return string
   */
  public function getFax() {
    
    return $this->fax;
  }
  
  
  /**
   * @return string
   */
  public function getRcs() {
    
    return $this->rcs;
  }
  
  
  /**
   * @return string
   */
  public function getSiret() {
    
    return $this->siret;
  }
  
  
  /**
   * @return string
   */
  public function getCode_NAF() {
    
    return $this->code_NAF;
  }
  
  
  /**
   * @return string
   */
  public function getHoraireRDV() {
    
    return $this->horaireRDV;
  }
  
  
  /**
   * @return string
   */
  public function getLogin() {
    
    return $this->login;
  }
  
  
  /**
   * @return string
   */
  public function getPass() {
    
    return $this->pass;
  }
  
  
  /**
   * @return string
   */
  public function getDescription() {
    
    return $this->description;
  }
  
  
  /**
   * @return string
   */
  public function getQualification() {
    
    return $this->qualification;
  }
  
  
  /**
   * @return string
   */
  public function getAdresse() {
    
    return $this->adresse;
  }
  
  
  /**
   * @return string
   */
  public function getAdresse2() {
    
    return $this->adresse2;
  }
  
  
  /**
   * @return string
   */
  public function getCode_postal() {
    
    return $this->code_postal;
  }
  
  
  /**
   * @return string
   */
  public function getVille() {
    
    return $this->ville;
  }
  
  
  /**
   * @return string
   */
  public function getCredit_dispo() {
    
    return $this->credit_dispo;
  }
  
  
  /**
   * @return string
   */
  public function getCenter() {
    
    return $this->center;
  }
  
  
  /**
   * @return string
   */
  public function getRayon() {
    
    return $this->rayon;
  }
  
  
  /**
   * @return string
   */
  public function getLat() {
    
    return $this->lat;
  }
  
  
  /**
   * @return string
   */
  public function getLng() {
    
    return $this->lng;
  }
  
  
  /**
   * @return string
   */
  public function getGeolocalisation() {
    
    return $this->geolocalisation;
  }

  /**
   * @return string
   */
  public function getValidation() {
    
    return $this->validation;
  }
  
  
  /**
   * @param $id_artisan
   */
  public function setId_artisan( $id_artisan ) {
    
    $this->id_artisan = $id_artisan;
  }
  
  
  /**
   * @param $nom_artisan
   */
  public function setNom_artisan( $nom_artisan ) {
    
    $this->nom_artisan = $nom_artisan;
  }
  
  
  /**
   * @param $prenom_artisan
   */
  public function setPrenom_artisan( $prenom_artisan ) {
    
    $this->prenom_artisan = $prenom_artisan;
  }
  
  
  /**
   * @param $raison_sociale
   */
  public function setRaison_sociale( $raison_sociale ) {
    
    $this->raison_sociale = $raison_sociale;
  }
  
  
  /**
   * @param $email_artisan
   */
  public function setEmail_artisan( $email_artisan ) {
    
    $this->email_artisan = $email_artisan;
  }

  /**
   * @param $email2
   */
  public function setEmail2( $email2 ) {
    
    $this->email2 = $email2;
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
   * @param $fax
   */
  public function setFax( $fax ) {
    
    $this->fax = $fax;
  }
  
  
  /**
   * @param $login
   */
  public function setLogin( $login ) {
    
    $this->login = $login;
  }
  
  
  /**
   * @param $pass
   */
  public function setPass( $pass ) {
    
    $this->pass = $pass;
  }
  
  
  /**
   * @param $rcs
   */
  public function setRcs( $rcs ) {
    
    $this->rcs = $rcs;
  }
  
  
  /**
   * @param $siret
   */
  public function setSiret( $siret ) {
    
    $this->siret = $siret;
  }
  
  
  /**
   * @param $code_NAF
   */
  public function setCode_NAF( $code_NAF ) {
    
    $this->code_NAF = $code_NAF;
  }
  
  
  /**
   * @param $horaireRDV
   */
  public function setHoraireRDV( $horaireRDV ) {
    
    $this->horaireRDV = $horaireRDV;
  }
  
  
  /**
   * @param $description
   */
  public function setDescription( $description ) {
    
    $this->description = $description;
  }
  
  
  /**
   * @param $qualification
   */
  public function setQualification( $qualification ) {
    
    $this->qualification = $qualification;
  }
  
  
  /**
   * @param $adresse
   */
  public function setAdresse( $adresse ) {
    
    $this->adresse = $adresse;
  }
  
  
  /**
   * @param $adresse2
   */
  public function setAdresse2( $adresse2 ) {
    
    $this->adresse2 = $adresse2;
  }
  
  
  /**
   * @param $code_postal
   */
  public function setCode_postal( $code_postal ) {
    
    $this->code_postal = $code_postal;
  }
  
  
  /**
   * @param $ville
   */
  public function setVille( $ville ) {
    
    $this->ville = $ville;
  }
  
  
  /**
   * @param $credit_dispo
   */
  public function setCredit_dispo( $credit_dispo ) {
    
    $this->credit_dispo = $credit_dispo;
  }
  
  
  /**
   * @param $center
   */
  public function setCenter( $center ) {
    
    $this->center = $center;
  }
  
  
  /**
   * @param $rayon
   */
  public function setRayon( $rayon ) {
    
    $this->rayon = $rayon;
  }
  
  
  /**
   * @param $lat
   */
  public function setLat( $lat ) {
    
    $this->lat = $lat;
  }
  
  
  /**
   * @param $lng
   */
  public function setLng( $lng ) {
    
    $this->lng = $lng;
  }
  
  
  /**
   * @param $geolocalisation
   */
  public function setGeolocalisation( $geolocalisation ) {
    
    $this->geolocalisation = $geolocalisation;
  }

  /**
   * @param $validation
   */
  public function setValidation( $validation ) {
    
    $this->validation = $validation;
  }
  
  
  /**
   * @return array
   */
  public function getSpecialities() {
    
    
    $types = array_map( function ( $item ) {
      
      return $item->id_activite;
    }, $this->activites->toArray() );
    
    return $types;
    
  }
  
  
  /**
   * @return array
   */
  public function getDepartements() {
    
    
    $types = array_map( function ( $item ) {
      
      return $item->code_departement;
    }, $this->departements->toArray() );
    
    return $types;
    
  }

  /**
   * @return array
   */
  public function getCodes() {
    
    
    $types = array_map( function ( $item ) {
      
      return $item->id_zone;
    }, $this->codes->toArray() );
    
    return $types;
    
  }
  
}
