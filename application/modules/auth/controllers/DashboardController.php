<?php

/**
 * Class Auth_DashboardController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date     23/12/17
 * Ce controlleur est responsable sur le dashboard de l'application,
 * il permet de lister des information des totals de quelques activités
 * et des types de qualification en appelant, et aussi les achats réalisés avec leurs différents mode de paiemant,
 * tout cela dans l'action indexAction,
 * De lister les virements validés avec l'action virementvalideAction et ceux non validés avec l'action virementAction
 * De valider les virements avec l'action virementValiderAction, lors de l'appel de cette action il y'a la modification
 * de la table acheter et l'envoi d'un email au particulier et un autre à l'artisan centant le pdf de la demande de devis
 * en question et une facture de son opération d'achat qui sera générée par la fonction generateFacture.
 * elle y'a aussi l'action carteAction qui permet de lister les achats qui sont faits par carte bancaire.
 */


class Auth_DashboardController extends Zend_Controller_Action {
  
  private $_sys_email;
  
  public function init() {
    
    $config           = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
    $this->_sys_email = $config->system->email->toArray();
  }
  
  public function indexAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $countpiscine              = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'type' => 'Piscine' ] );
    $countchauffage            = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'type' => 'Chauffage' ] );
    $countclimatisation        = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'type' => 'Climatisation' ] );
    $countfenetre              = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'type' => 'Fenetre' ] );
    $countdevisqualifie        = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'qualification' => 'Qualifié' ] );
    $countdevisnonqualifie     = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'qualification' => 'Non qualifiée' ] );
    $countdevisnrp             = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'qualification' => 'NRP' ] );
    $countdevistard            = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'qualification' => 'Trop tard' ] );
    $countvendu                = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'sold' => true ] );
    $countvenducarte           = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'payement' => 'CARTE BANCAIRE' ] );
    $countvenduvirementvalide  = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'payement' => 'VIREMENT BANCAIRE', 'sold' => true ] );
    $countvenduvirementencours = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'payement' => 'VIREMENT BANCAIRE', 'sold' => false ] );
    $countvenduchequevalide  = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'payement' => 'CHEQUE BANCAIRE', 'sold' => true ] );
    $countvenduchequeencours = $em->getRepository( 'Auth_Model_Demandedevis' )->countBy( [ 'payement' => 'CHEQUE BANCAIRE', 'sold' => false ] );
    $countpacks                = $em->getRepository('Auth_Model_Crediter')->countPacks(['sold'=>true]);
    $countpackscart            = $em->getRepository('Auth_Model_Crediter')->countPacks(['payement'=>'CARTE BANCAIRE']);
    $countpacksvirementvalide  = $em->getRepository('Auth_Model_Crediter')->countPacks(['payement'=>'VIREMENT BANCAIRE','sold' => true]);
    $countpacksvirementnonvalide = $em->getRepository('Auth_Model_Crediter')->countPacks(['payement'=>'VIREMENT BANCAIRE','sold' => false]);
    $countpackschequevalide    = $em->getRepository('Auth_Model_Crediter')->countPacks(['payement'=>'CHEQUE BANCAIRE','sold' => true]);
    $countpackschequenonvalide    = $em->getRepository('Auth_Model_Crediter')->countPacks(['payement'=>'CHEQUE BANCAIRE','sold' => false]);


    $listusers = $em->getRepository( 'Auth_Model_Demandedevis' )->getListUsers( );
    
    $this->view->countpiscine              = $countpiscine;
    $this->view->countchauffage            = $countchauffage;
    $this->view->countclimatisation        = $countclimatisation;
    $this->view->countfenetre              = $countfenetre;
    $this->view->countdevisqualifie        = $countdevisqualifie;
    $this->view->countdevisnonqualifie     = $countdevisnonqualifie;
    $this->view->countdevisnrp             = $countdevisnrp;
    $this->view->countdevistard            = $countdevistard;
    $this->view->countvendu                = $countvendu;
    $this->view->countvenducarte           = $countvenducarte;
    $this->view->countvenduvirementvalide  = $countvenduvirementvalide;
    $this->view->countvenduvirementencours = $countvenduvirementencours;
    $this->view->countvenduchequevalide    = $countvenduchequevalide;
    $this->view->countvenduchequeencours   = $countvenduchequeencours;
    $this->view->listusers                 = $listusers;
    $this->view->countpacks                = $countpacks;
    $this->view->countpackscart            = $countpackscart;
    $this->view->countpacksvirementvalide  = $countpacksvirementvalide;
    $this->view->countpacksvirementnonvalide = $countpacksvirementnonvalide;
    $this->view->countpackschequenonvalide = $countpackschequenonvalide;
    $this->view->countpackschequevalide    = $countpackschequevalide;
  }
  
  public function virementAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Acheter' )->findBy( [
      'mode_paiement' => 'VIREMENT BANCAIRE',
      'reglee'        => 0,
    ] );
    
    $this->view->achats = $achats;
  }
  
  public function chequeAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Acheter' )->findBy( [
      'mode_paiement' => 'CHEQUE BANCAIRE',
      'reglee'        => 0,
    ] );
    
    $this->view->achats = $achats;
  }

  public function chequevalideAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Acheter' )->findBy( [
      'mode_paiement' => 'CHEQUE BANCAIRE',
      'reglee'        => 1,
    ] );
    
    $this->view->achats = $achats;
  }

  public function packsvirementAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->findBy( [
      'mode_paiement' => 'VIREMENT BANCAIRE',
      'reglee'        => 0,
    ] );
    
    $this->view->crediter = $crediter;
  }

  public function packschequevalideAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->findBy( [
      'mode_paiement' => 'CHEQUE BANCAIRE',
      'reglee'        => 1,
    ] );
    
    $this->view->crediter = $crediter;
  }

  public function packschequeAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->findBy( [
      'mode_paiement' => 'CHEQUE BANCAIRE',
      'reglee'        => 0,
    ] );
    
    $this->view->crediter = $crediter;
  }

  public function packsvirementvalideAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->findBy( [
      'mode_paiement' => 'VIREMENT BANCAIRE',
      'reglee'        => 1,
    ] );
    
    $this->view->crediter = $crediter;
  }


  public function virementvalideAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Acheter' )->findBy( [
      'mode_paiement' => 'VIREMENT BANCAIRE',
      'reglee'        => 1,
    ] );
    
    $this->view->achats = $achats;
  }
  
  public function carteAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Acheter' )->findBy( [
      'mode_paiement' => 'CARTE BANCAIRE',
    ] );
    
    $this->view->achats = $achats;
  }
  

  public function packscartAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    
    $achats = $em->getRepository( 'Auth_Model_Crediter' )->findBy( [
      'mode_paiement' => 'CARTE BANCAIRE',
    ] );
    
    $this->view->achats = $achats;
  }
  
  public function virementValiderAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    $id_artisan = $this->getRequest()->getParam( 'artisan' );
    $id_demande = $this->getRequest()->getParam( 'demande' );
    
    
    $achat = $em->getRepository( 'Auth_Model_Acheter' )->findOneBy( [
      'id_artisan' => $id_artisan,
      'id_demande' => $id_demande,
    ] );
    
    
    if ( ! $achat ) {
      $this->_redirect( '/auth/dashboard/virement' );
    }
    
    
    $date = new Zend_Date();
    
    
    $ref = $achat->demande->getRef();
    
    // Fetching the html for the invoice from the view
    $html = $this->view->partial( 'shared/facture.phtml', [
      'demande' => $achat->demande,
      'artisan' => $achat->artisan,
    ] );
    
    $this->generateFacture( $ref . "-" . $achat->id_artisan, $html );
    
    $pdf_location     = $achat->demande->pdfLocation( true );
    $facture_location = $achat->demande->factureLocation( $achat->id_artisan, true );
    
    $pdf_content     = file_get_contents( $pdf_location );
    $facture_content = file_get_contents( $facture_location );
    
    // Preparing attachements
    $pdf_attachement              = new Zend_Mime_Part( $pdf_content );
    $pdf_attachement->type        = 'application/pdf';
    $pdf_attachement->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
    $pdf_attachement->encoding    = Zend_Mime::ENCODING_BASE64;
    $pdf_attachement->filename    = $ref . ".pdf";
    
    $facture_attachement              = new Zend_Mime_Part( $facture_content );
    $facture_attachement->type        = 'application/pdf';
    $facture_attachement->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
    $facture_attachement->encoding    = Zend_Mime::ENCODING_BASE64;
    $facture_attachement->filename    = "FAC-{$ref}-{$achat->id_artisan}.pdf";
    
    
    // Sending email
    try {
      
      $html = $this->view->partial( 'shared/mail_invoice_artisan.phtml', [
        'artisan' => $achat->artisan,
        'demande' => $achat->demande,
        'acheter' => $achat,
      ] );
      
      $mail = new Zend_Mail( 'utf-8' );
      $mail->setBodyHtml( $html );
      $mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
      $mail->setSubject( "Votre commande du " . $date->toString( 'd MMMM Y' ) . " sur Mister Devis est complète" );
      $mail->addTo( $achat->artisan->email_artisan );
      $mail->addAttachment( $pdf_attachement );
      $mail->addAttachment( $facture_attachement );
      
      $mail->send();
    } catch ( Exception $e ) {
      die( $e->getMessage() );
    }
    
    
    try {
      
      $html = $this->view->partial( 'shared/mail_confirme_particulier.phtml', [
        'artisan'     => $achat->artisan,
        'particulier' => $achat->demande->id_particulier,
      ] );
      
      $mail = new Zend_Mail( 'utf-8' );
      $mail->setBodyHtml( $html );
      $mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
      $mail->setSubject( "Un artisan est intérssé par votre demande de devis" );
      $mail->addTo( $achat->demande->id_particulier->email );
      
      $mail->send();
    } catch ( Exception $e ) {
      die( $e->getMessage() );
    }
    
    // Flaging the transaction as sold
    $achat->setReglee( true );
    $em->persist( $achat );
    $em->flush();
    
    
    $_SESSION['flash'] = 'Le virement a été validé';
    $this->_redirect( '/auth/dashboard/virement' );
  }
  


  public function chequeValiderAction() {
    
    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    $id_artisan = $this->getRequest()->getParam( 'artisan' );
    $id_demande = $this->getRequest()->getParam( 'demande' );
    
    
    $achat = $em->getRepository( 'Auth_Model_Acheter' )->findOneBy( [
      'id_artisan' => $id_artisan,
      'id_demande' => $id_demande,
    ] );
    
    
    if ( ! $achat ) {
      $this->_redirect( '/auth/dashboard/cheque' );
    }
    
    
    $date = new Zend_Date();
    
    
    $ref = $achat->demande->getRef();
    
    // Fetching the html for the invoice from the view
    $html = $this->view->partial( 'shared/facture.phtml', [
      'demande' => $achat->demande,
      'artisan' => $achat->artisan,
    ] );
    
    $this->generateFacture( $ref . "-" . $achat->id_artisan, $html );
    
    $pdf_location     = $achat->demande->pdfLocation( true );
    $facture_location = $achat->demande->factureLocation( $achat->id_artisan, true );
    
    $pdf_content     = file_get_contents( $pdf_location );
    $facture_content = file_get_contents( $facture_location );
    
    // Preparing attachements
    $pdf_attachement              = new Zend_Mime_Part( $pdf_content );
    $pdf_attachement->type        = 'application/pdf';
    $pdf_attachement->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
    $pdf_attachement->encoding    = Zend_Mime::ENCODING_BASE64;
    $pdf_attachement->filename    = $ref . ".pdf";
    
    $facture_attachement              = new Zend_Mime_Part( $facture_content );
    $facture_attachement->type        = 'application/pdf';
    $facture_attachement->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
    $facture_attachement->encoding    = Zend_Mime::ENCODING_BASE64;
    $facture_attachement->filename    = "FAC-{$ref}-{$achat->id_artisan}.pdf";
    
    
    // Sending email
    try {
      
      $html = $this->view->partial( 'shared/mail_invoice_artisan.phtml', [
        'artisan' => $achat->artisan,
        'demande' => $achat->demande,
        'acheter' => $achat,
      ] );
      
      $mail = new Zend_Mail( 'utf-8' );
      $mail->setBodyHtml( $html );
      $mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
      $mail->setSubject( "Votre commande a été enregistrée" );
      $mail->addTo( $achat->artisan->email_artisan );
      $mail->addAttachment( $pdf_attachement );
      $mail->addAttachment( $facture_attachement );
      
      $mail->send();
    } catch ( Exception $e ) {
      die($e->getMessage() );
    }
    
    
    try {
      
      $html = $this->view->partial( 'shared/mail_confirme_particulier.phtml', [
        'artisan'     => $achat->artisan,
        'particulier' => $achat->demande->id_particulier,
      ] );
      
      $mail = new Zend_Mail( 'utf-8' );
      $mail->setBodyHtml( $html );
      $mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
      $mail->setSubject( "Un artisan est intérssé par votre demande de devis" );
      $mail->addTo( $achat->demande->id_particulier->email );
      
      $mail->send();
    } catch ( Exception $e ) {
      die( $e->getMessage() );
    }
    
    // Flaging the transaction as sold
    $achat->setReglee( true );
    $em->persist( $achat );
    $em->flush();
    
    
    $_SESSION['flash'] = 'Le chèque a été validé';
    $this->_redirect( '/auth/dashboard/cheque' );
  }

  public function packsvirementValiderAction(){

    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    $id = $this->getRequest()->getParam( 'id' );
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->find($id);
    
    
    if ( ! $crediter ) {
      $this->_redirect( '/auth/dashboard/packsvirement' );
    }
    
    
    $date = new Zend_Date();
    
    
    // Flaging the transaction as sold
    $crediter->setReglee( true );
    $em->persist( $crediter );
    $em->flush();

    $artisan=$crediter->artisan;
    $pack=$crediter->pack;

    $credit_dispo=$artisan->getCredit_dispo();
    $credit_dispo+=$pack->getNbre_credit();

    $artisan->setCredit_dispo($credit_dispo);

    $em->persist( $artisan );
    $em->flush();
    
    
    $_SESSION['flash'] = 'Le virement a été validé';
    $this->_redirect( '/auth/dashboard/packsvirement' );


  }

  public function packschequeValiderAction(){

    $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    $em = $this->getRequest()->_em;
    
    $id = $this->getRequest()->getParam( 'id' );    
    
    $crediter = $em->getRepository( 'Auth_Model_Crediter' )->find($id);
    
    if ( ! $crediter ) {
      $this->_redirect( '/auth/dashboard/packscheque' );
    }
    
    
    $date = new Zend_Date();
    
    
    // Flaging the transaction as sold
    $crediter->setReglee( true );
    $em->persist( $crediter );
    $em->flush();

    $artisan=$crediter->artisan;
    $pack=$crediter->pack;

    $credit_dispo=$artisan->getCredit_dispo();
    $credit_dispo+=$pack->getNbre_credit();

    $artisan->setCredit_dispo($credit_dispo);

    $em->persist( $artisan );
    $em->flush();
    
    
    $_SESSION['flash'] = 'Le cheque a été validé';
    $this->_redirect( '/auth/dashboard/packscheque' );


  }
  
  private function generateFacture( $ref, $html ) {
    
    $filename = "pdf/factures/FAC-{$ref}.pdf";
    
    // Initializing the pdf object
    $pdf = new Auth_Controller_Helper_MyPdf2( 'P', 'mm', 'A4', true, 'UTF-8', false );
    
    
    // Set document info
    $pdf->SetAuthor( 'MisterDevis' );
    $pdf->SetTitle( "FAC-{$ref}" );
    
    
    // Set the page
    $pdf->AddPage();
    
    $pdf->writeHTML( $html );
    
    $pdf->Output( $filename, 'F' );
    
    return $filename;
  }
}

