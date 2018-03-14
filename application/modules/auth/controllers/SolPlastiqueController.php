<?php


/**
 * Class Auth_SolPlastiqueController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date     23/12/17
 * Ce controlleur est responsable sur la gestion de l'activité sol-plastique,
 * il permet de lister les demande de devis concernant le sol-plastique avec l'action indexAction,
 * d'ajouter une nouvelle de demande de devis avec l'action addAction et de
 * modifier une demande de devis existante avec l'action editAction.
 * d'afficher les notifications qui sont venues des mini sites par l'action notificationAction.
 * Lors de l'ajout ou la modification d'une demande de devis, il y'a un envoi d'email au particulier
 * l'informant que sa demande de devis est mise en ligne, et un email à l'artisan l'informant
 * qu'une nouvelle demande de devis est disponible en ligne.
 * Il y'a aussi en parallèle l'envoi d'un sms à l'artisan l'informant qu'un nouveau chantier est disponible
 * en ligne.
 * Et aussi lors de l'edition d'une demande de devis, un fichier pdf contenant les informations de cette demande
 * est crée et stocké dans le serveur, et il peut être consulter par l'operateur en appelant l'action pdfAction,
 * aussi il sera envoyé par email à l'artisan si ce dernier a acheté cette demande (Cela est géré dans le controlleur ApiController).
 */
class Auth_SolPlastiqueController extends Zend_Controller_Action {
  
  private $_sys_email;
  private $type       = 'SOP';
  private $slug       = 'sol-plastique';
  private $name       = 'SolPlastique';
  private $form_name  = 'Auth_Form_SolPlastique';
  private $model_name = 'Auth_Model_SolPlastique';
  
  
  public function init() {
    
    $config           = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
    $this->_sys_email = $config->system->email->toArray();
  }
  
  
  public function indexAction() {
    
    //$this->_helper->layout()->disableLayout();
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em                   = $this->getRequest()->_em;
    $this->view->demandes = $em->getRepository( $this->model_name )->getList();
  }
  
  
  public function notificationAction() {
    
    // Disabling render and layout to be able to return json
    $this->_helper->layout()->disableLayout();
    $this->_helper->viewRenderer->setNoRender( true );
    
    
    // Getting the initial counts
    $lastCount         = $this->getRequest()->getParam( 'count' ) ? (int) $this->getRequest()->getParam( 'count' ) : - 1;
    $this->view->count = (int) $this->getRequest()->_em->getRepository( $this->model_name )->getNotifications( true );
    
    
    // Checcking if there is a change
    while ( $this->view->count === 0 || $this->view->count === $lastCount ) {
      flush();
      usleep( 5000 );
      clearstatcache();
      session_write_close();
      $this->view->count = (int) $this->getRequest()->_em->getRepository( $this->model_name )->getNotifications( true );
    }
    
    // Fetching the new demandes
    $this->view->notifications = $this->getRequest()->_em->getRepository( $this->model_name )->getNotifications();
    
    // Preparing data to send back
    $data = [
      'count' => $this->view->count,
      'html'  => $this->view->render( "{$this->slug}/notification.phtml" ),
    ];
    
    // Changing the response header content type to json
    $this->_response->setHeader( 'Content-type', 'application/json' );
    
    echo json_encode( $data );
    flush();
    
  }
  
  
  private function sendEmailNotifications( $demande ) {
    
    $em = $this->getRequest()->_em;
    
    // Fetching the artisans concerned with this demande
    $artisans1 = $em->getRepository( 'Auth_Model_Artisan' )->findListEmail(
      $demande->getId_activite()->getId_activite(),
      $demande->getId_chantier()->getZone()->getCode_departement()
    );
    
    
    $artisans2 = $em->getRepository( 'Auth_Model_Artisan' )->findListEmailByGeo(
      $demande->getId_activite()->getId_activite(),
      $demande->getId_chantier()->getZone()->getId_zone()
    );
    
    $artisans = array_merge( $artisans1, $artisans2 );
    
    //Envoi SMS
    
    $this->sendSMSNotification( $artisans, $demande->getRef() );
    
    $data = [
      'artisans'     => $artisans,
      'particuliers' => [
        [
          'nom_particulier'    => $demande->getId_particulier()->getNom_particulier(),
          'prenom_particulier' => $demande->getId_particulier()->getPrenom_particulier(),
          'email_particulier'  => $demande->getId_particulier()->getEmail(),
        ],
      ],
      'ref'          => $demande->getRef(),
    ];
    
    $data_string = json_encode( $data );
    
    
    $ch = curl_init( '127.0.0.1:9090' );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'Authorization: ' . md5( 'erratbi' ),
      'Content-Length: ' . strlen( $data_string ),
    ] );
    
    curl_exec( $ch );
    
    
  }
  
  public function sendSMSNotification( $artisans, $ref ) {
    
    //Envoi SMS :
    
    $sms = new smsenvoi();
    
    $content = "Bonjour,\nFantastique, 1 nouveau Chantier est maintenant disponible dans votre Espace Pro et nous vous invitons à le consulter dans les meilleurs délais.\nDemande N° {$ref}\n<a href=\"http://pro.mister-devis.com\">Espace Pro</a>";
    
    foreach ( $artisans as $artisan ) {
      
      $tel = $artisan['telephone_portable'];
      
      if ( strlen( $tel ) == 10 ) {
        
        $tel = substr( $tel, 1, 9 );
        
        $tel = "+33" . $tel;
        
        $sms->sendSMS( $tel, $content, 'PREMIUM', 'Mister Devis', date( 'Y-m-d' ), date( 'H:m:s' ) );
        
      }
    }
  }
  
  public function addAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    
    $form = new Zend_Form();
    $form->addSubForms( [
      'form_demande'     => new Auth_Form_Demande,
      'form_qualif'      => new $this->form_name,
      'form_chantier'    => new Auth_Form_Chantier,
      'form_particulier' => new Auth_Form_Particulier,
    ] );
    
    $this->view->form = $form;
    
    $this->render( 'edit' );
  }
  
  public function editAction() {
    
    // If it's an ajax request disable the layout
    if ( $this->getRequest()->isXmlHttpRequest() ) {
      $this->_helper->layout()->disableLayout();
    } else {
      $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    }
    
    $id = $this->getRequest()->getParam( 'id' );
    $em = $this->getRequest()->_em;
    
    // Load demande;
    $demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
    if ( ! $demande ) {
      $demande  = new Auth_Model_Demandedevis;
      $activite = $em->getRepository( 'Auth_Model_Activite' )->findOneBy( [ 'ref' => $this->type ] );
      $demande->setId_activite( $activite );
    }
    
    
    // Initializing the forms
    $form = new Zend_Form();
    $form->addSubForms( [
      'form_demande'     => new Auth_Form_Demande,
      'form_qualif'      => new $this->form_name,
      'form_chantier'    => new Auth_Form_Chantier,
      'form_particulier' => new Auth_Form_Particulier,
    ] );
    
    
    $form->form_chantier->code_postal->setAttrib( 'autocomplete', 'off' );
    
    // Load qualification
    $qualification = $em->getRepository( $this->model_name )->findOneBy( [ 'id_demande' => $id ] );
    
    $form->setDefaults( [
      'Demande'     => $demande ? $demande->toArray() : null,
      'Particulier' => $demande->id_particulier ? $demande->id_particulier->toArray() : null,
      'Chantier'    => $demande->id_chantier ? $demande->id_chantier->toArray() : null,
      $this->name   => $qualification ? $qualification->toArray() : null,
    ] );
    
    $form->form_demande->setDefaults( [ 'titre_demande' => $demande->getRef() ] );
    $form->form_chantier->setDefaults( [ 'code_postal' => $demande->id_chantier->zone->code ] );
    $form->form_chantier->setDefaults( [ 'ville' => $demande->id_chantier->zone->ville ] );
    
    // Proccess the posted data;
    if ( $this->getRequest()->isPost() ) {
      
      $data = $this->getRequest()->getPost();
      
      
      $zone = $em->getRepository( 'Auth_Model_Zone' )->find( $data['Chantier']['id_zone'] );
      
      $valid = $form->isValid( $data );

      
      
      if ( ! $zone ) {
        $form->form_chantier->code_postal->setAttribs( [ 'class' => 'has-error' ] );
      } else {
        $data['Chantier']['id_zone'] = $zone->getId_zone();
      }
      
      
      if ( $valid && $zone !== null ) {
        // We will send an email
        $sendEmail = false;
        
        if ( $data['Demande']['publier_en_ligne'] ) {
          $sendEmail                        = ! $demande || ! $demande->getPublier_envoi();
          $data['Demande']['publier_envoi'] = true;
        }
        
        
        // Fetching the current user id
        $data['id_user'] = unserialize( Zend_Auth::getInstance()->getIdentity() )->id_user;
        
        
        // Set the file if there is any
        $data['file'] = $_FILES['audio_file'];
        
        // Save the qualification
        $qualification = $em->getRepository( $this->model_name )->save( $id, $data );
        
        if ( $qualification ) {
          if ( $sendEmail ) {
            // Send an email if there hasn't been one sent
            $this->sendEmailNotifications( $qualification->id_demande );
            
            
          }
        }
        
        $title = $qualification->id_demande->titre_demande;
        
        $ref = $qualification->id_demande->getRef();
        
        // Fetching the html string from the view
        $html = $this->view->partial( 'shared/pdf.phtml', [
          'demande'       => $qualification->id_demande,
          'qualification' => $qualification,
        ] );
        
        
        $this->generatePdf( $ref, $title, $html, $qualification->id_demande->pdfLocation( true ) );
        
        $_SESSION['flash'] = "La mise à jour a été effectuée avec success";
        $this->getResponse()->setRedirect( "/auth/{$this->slug}" );
        
        
      } else // If the form is not valid keep the data provided by the user
      
      {
        $form->setDefaults( $data );
      }
      
    }
    
    
    $this->view->form          = $form;
    $this->view->id            = $id;
    $this->view->qualification = $qualification;
  }
  
  
  private function generatePdf( $ref, $title, $html, $location ) {
    
    // Initializing the pdf object
    $pdf = new Auth_Controller_Helper_MyPdf( 'P', 'mm', 'A4', true, 'UTF-8', false );
    
    
    // Set document info
    $pdf->SetAuthor( 'MisterDevis' );
    $pdf->SetTitle( $title );
    
    
    // Set the page
    $pdf->AddPage();
    
    $pdf->writeHTML( $html );
    
    $pdf->Output( $location, 'F' );
    
    return $location;
  }
  
  
  public function extrafieldsAction() {
    
    $em = $this->getRequest()->_em;
    $this->_helper->layout()->disableLayout();
    $this->_helper->viewRenderer->setNoRender( true );
    
    $this->getResponse()->setHeader( 'Content-Type', 'application/json' );
    
    $type = $this->getRequest()->getParam( 'type' );
    $id   = $this->getRequest()->getParam( 'id' );
    
    
    $qualification = $em->getRepository( $this->model_name )->find( $id );
    
    if ( ! $type ) {
      echo json_encode( [ 'error' => 1, 'html' => '' ] );
      
    } else {
      $form = new $this->form_name;
      $form->setDefaults( $qualification ? $qualification->toArray() : [] );
      $this->view->type = $type;
      $this->view->form = $form;
      echo json_encode( [
        'error' => 0,
        'html'  => $this->view->render( "{$this->slug}/extrafields.phtml" ),
      ] );
      
    }
    
  }
  
  public function pdfAction() {
    
    $this->_helper->layout()->disableLayout();
    
    $this->_helper->viewRenderer->setNoRender( true );
    
    $id = $this->getRequest()->getParam( 'id' );
    
    $em = $this->getRequest()->_em;
    
    $demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
    
    $location = $demande->pdfLocation( true );
    
    header( "Content-disposition: attachment; filename=" . $demande->getRef() . ".pdf" );
    header( "Cache-Control: must-revalidate, post-check=0, pre-check=0, public" );
    header( "Content-Type: application/force-download" );
    header( "Pragma: no-cache" );
    header( "Expires: 0" );
    
    readfile( $location );
  }
}
