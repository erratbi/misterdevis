<?php


use Doctrine\ORM\Mapping as ORM;


/**
 * User
 *
 * @Table(name="user")
 * @Entity(repositoryClass="Auth_Model_UserRepository")
 */
class Auth_Model_User {

  /**
   * @var integer $id_user
   *
   * @Column(name="ID_USER", type="integer", nullable=false)
   * @Id
   * @GeneratedValue(strategy="IDENTITY")
   */
  private $id_user;

  /**
   * @var string $email_user
   *
   * @Column(name="EMAIL_USER", type="string", length=50, nullable=false)
   */
  private $email_user;

  /**
   * @var string $firstname_user
   *
   * @Column(name="FIRSTNAME_USER", type="string", length=50, nullable=false)
   */
  private $firstname_user;

  /**
   * @var string $lastname_user
   *
   * @Column(name="LASTNAME_USER", type="string", length=50, nullable=false)
   */
  private $lastname_user;

  /**
   * @var string $login_user
   *
   * @Column(name="LOGIN_USER", type="string", length=50, nullable=false)
   */
  private $login_user;


  /**
   * @var string $password_user
   *
   * @Column(name="PASSWORD_USER", type="string", length=200, nullable=false)
   */
  private $password_user;


  /**
   * @var string $rank_user
   *
   * @Column(name="RANK_USER", type="string", length=50, nullable=false)
   */
  private $rank_user;

  /**
   * @var string $isActive_user
   *
   * @Column(name="ISACTIVE_USER", type="boolean", nullable=false)
   */
  private $isActive_user;

  /**
   * @var string $dateregister_user
   *
   * @Column(name="DATEREGISTER_USER", type="string", length=50, nullable=false)
   */
  private $dateregister_user;

  /**
   * @var string $lastlogin_user
   *
   * @Column(name="LASTLOGIN_USER", type="string", length=50, nullable=false)
   */
  private $lastlogin_user;

  /**
   * @var string $token
   *
   * @Column(name="TOKEN", type="string", length=50, nullable=false)
   */
  private $token;


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
   * Set password
   *
   * @param string $password
   */
  public function setPassword($password, $hash) {

    if (empty($hash)) {
      throw new Exception('Hash required (2nd argument): use $object->setPassword($password, $hash)');
    }

    $this->password_user = hash('SHA256', $hash . $password);
  }


  /**
   * @return toArray
   */
  public function toArray() {

    return get_object_vars($this);
  }


  /**
   * @return the $id_user
   */
  public function getId_user() {

    return $this->id_user;
  }


  /**
   * @return the $email_user
   */
  public function getEmail_user() {

    return $this->email_user;
  }


  /**
   * @return the $firstname_user
   */
  public function getFirstname_user() {

    return $this->firstname_user;
  }


  /**
   * @return the $lastname_user
   */
  public function getLastname_user() {

    return $this->lastname_user;
  }


  /**
   * @return the $login_user
   */
  public function getLogin_user() {

    return $this->login_user;
  }


  /**
   * @return the $password_user
   */
  public function getPassword_user() {

    return $this->password_user;
  }


  /**
   * @return the $rank_user
   */
  public function getRank_user() {

    return $this->rank_user;
  }


  /**
   * @return the $isActive_user
   */
  public function getIsActive_user() {

    return $this->isActive_user;
  }


  /**
   * @return the $dateregister_user
   */
  public function getDateregister_user() {

    return $this->dateregister_user;
  }


  /**
   * @return the $lastlogin_user
   */
  public function getLastlogin_user() {

    return $this->lastlogin_user;
  }


  /**
   * @return the $token
   */
  public function getToken() {

    return $this->token;
  }


  /**
   * @param integer $id_user
   */
  public function setId_user($id_user) {

    $this->id_user = $id_user;
  }


  /**
   * @param string $email_user
   */
  public function setEmail_user($email_user) {

    $this->email_user = $email_user;
  }


  /**
   * @param string $firstname_user
   */
  public function setFirstname_user($firstname_user) {

    $this->firstname_user = $firstname_user;
  }


  /**
   * @param string $lastname_user
   */
  public function setLastname_user($lastname_user) {

    $this->lastname_user = $lastname_user;
  }


  /**
   * @param string $login_user
   */
  public function setLogin_user($login_user) {

    $this->login_user = $login_user;
  }


  /**
   * @param string $password_user
   */
  public function setPassword_user($password_user) {

    $this->password_user = $password_user;
  }


  /**
   * @param string $rank_user
   */
  public function setRank_user($rank_user) {

    $this->rank_user = $rank_user;
  }


  /**
   * @param string $isActive_user
   */
  public function setIsActive_user($isActive_user) {

    $this->isActive_user = $isActive_user;
  }


  /**
   * @param string $dateregister_user
   */
  public function setDateregister_user($dateregister_user) {

    $this->dateregister_user = $dateregister_user;
  }


  /**
   * @param string $lastlogin_user
   */
  public function setLastlogin_user($lastlogin_user) {

    $this->lastlogin_user = $lastlogin_user;
  }


  /**
   * @param string $token
   */
  public function setToken($token) {

    $this->token = $token;
  }


}
