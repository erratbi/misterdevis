<?php


/**
 * Default Controller
 *
 * @author          Eddie Jaoude
 * @package         Default Module
 *
 */
class IndexController extends Zend_Controller_Action {
  
  /**
   * Initialisation method
   *
   * @author           Lamari Alaa
   *
   * @param           void
   *
   * @return           void
   *
   */
  public function init() {
    
    parent::init();
  }
  
  
  /**
   * post dispatch method
   *
   * @author          Eddie Jaoude
   *
   * @param           void
   *
   * @return           void
   *
   */
  public function postDispatch() {
    
    parent::postDispatch();
  }
  
  
  /**
   * default method
   *
   * @author           Lamari Alaa
   *
   * @param           void
   *
   * @return           void
   *
   */
  public function indexAction() {
    
    $this->_redirect( '/auth/dashboard' );
  }
  
  
  public function downloadAction() {
    
    $em = $this->getRequest()->_em;
    
    $id = $this->getRequest()->getParam( 'id' );
    
    
    $demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
    
    if ( ! $demande ) {
      $this->_redirect( 'http://mister-devis.com' );
    }
  }
}

