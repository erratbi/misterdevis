<?php

/**
 * Class Auth_ApiController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date     23/12/17
 * Ce controlleur est api nécessaire au fonctionnement du site d'espace pro de mister devis
 * Il contient une action demandesAction qui permet de retourner toutes les demandes de devis qui
 * sont dans la zone géographique de l'artisan en question, aussi qui appartiennent aux activités de cet artisan.
 * Il y'a aussi l'action demandeAction qui permet de donner le détail d'une demande donnée.
 * Il y'a aussi l'action checkoutAction qui permet de retourner les informations de l'artisan qui a fait le checkout dans l'espace pro.
 * Il y'a aussi l'action updateAction qui permet de sauvegarder l'achat du chantier dans la table Acheter avec le mode de paiement 'CARTE BANCAIRE'
 * elle permet aussi d'envoyer un email à l'artisan contenant le pdf du chantier acheté et la facture qui sera génerée en appelant la fonction generateFacture
 * et aussi un email au particulier qui lui informant q'un artisan est intéressé par ça demande de devis.
 * Il y'a aussi l'action virementAction qui permet de sauvegarder  l'achat dans le cas où le professionnel a opté pour le mode de paiement 'VIREMENT BANCAIRE'.
 * Et enfin il y'a la fonction generateFacture qui permet de générer une facture au format pdf qui sera envoyée à l'artisan qui a fait l'achat du chantier.
 */


class Auth_ApiController extends Zend_Controller_Action {
	
	private $_sys_email;
	
	public function init() {
		
		$config           = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
		$this->_sys_email = $config->system->email->toArray();
	}
	
	
	public function demandesAction() {
		
		$em = $this->getRequest()->_em;
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$email = urldecode( $this->getRequest()->getParam( 'email' ) );
		
		$artisan = $em->getRepository( 'Auth_Model_Artisan' )->findOneBy( [ 'email_artisan' => $email ] );
		
		
		if ( ! $artisan ) {
			echo json_encode( [] );
		} else {
			$demandes = $em->getRepository( 'Auth_Model_Demandedevis' )->findOpenJobs( $artisan->email_artisan );
			
			
			$resp = array_map( function ( $demande ) use ( $artisan ) {
				
				return [
					'id'                        => $demande->getId_demande(),
					'titre'                     => $demande->getTitre_demande(),
					'libelle'                   => "$demande->titre_demande {$demande->getRef()}",
					'type'                      => ucfirst( strtolower( $demande->getId_activite()->getLibelle() ) ),
					'prix'                      => $demande->getPrix_mise_en_ligne(),
					'ref'                       => $demande->getRef(),
					'ville'                     => $demande->getId_chantier()->getZone()->getVille(),
					'icon'                      => $demande->getType() . '.png',
					'code_postal'               => $demande->getId_chantier()->getZone()->getCode(),
					'type_demandeur'            => $demande->getType_demandeur(),
					'type_propriete'            => $demande->getType_propriete(),
					'type_batiment'             => $demande->getType_batiment(),
					'delai_souhaite'            => $demande->getDelai_souhaite(),
					'prestation_souhaite'       => $demande->getPrestation_souhaite(),
					'indication_complementaire' => $demande->getIndication_complementaire(),
					'budget_approximatif'       => $demande->getBudget_approximatif(),
					'financement_projet'        => $demande->getFinancement_projet(),
					'objectif_demande'          => $demande->getObjectif_demande(),
					'description'               => $demande->getDescription(),
					'tva'                       => ( (float) $demande->getPrix_mise_en_ligne() ) * 0.2,
					'prixttc'                   => ( (float) $demande->getPrix_mise_en_ligne() ) * 1.2,
					'nom_artisan'               => $artisan->getNom_artisan(),
					'prenom_artisan'            => $artisan->getPrenom_artisan(),
					'email_artisan'             => $artisan->getEmail_artisan(),
					'raison_sociale'            => $artisan->getRaison_sociale(),
					'telephone_portable'        => $artisan->getTelephone_portable(),
					'adresse'                   => $artisan->getAdresse(),
				];
				
			}, $demandes );
			
			echo json_encode( $resp );
		}
	}
	
	
	public function demandeAction() {
		
		$em = $this->getRequest()->_em;
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$id = $this->getRequest()->getParam( 'id' );
		if ( ! $id ) {
			echo json_encode( [] );
			
			return;
		}
		
		$demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
		
		if ( ! $demande ) {
			echo json_encode( [] );
		} else {
			echo json_encode( [
				'id'                  => $demande->id_demande,
				'titre'               => $demande->titre_demande,
				'ref'                 => $demande->getRef(),
				'libelle'             => "$demande->titre_demande {$demande->getRef()}",
				'prix'                => $demande->getPrix_mise_en_ligne(),
				'ville'               => $demande->getId_chantier()->getZone()->getVille(),
				'code_postal'         => $demande->getId_chantier()->getZone()->getCode(),
				'type_demandeur'      => $demande->getType_demandeur(),
				'type_propriete'      => $demande->getType_propriete(),
				'type_batiment'       => $demande->getType_batiment(),
				'delai_souhaite'      => $demande->getDelai_souhaite(),
				'budget_approximatif' => $demande->getBudget_approximatif(),
				'financement_projet'  => $demande->getFinancement_projet(),
				'objectif_demande'    => $demande->getObjectif_demande(),
				'description'         => $demande->getDescription(),
			] );
		}
	}
	
	public function checkoutAction() {
		
		$em = $this->getRequest()->_em;
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$id = $this->getRequest()->getParam( 'id' );
		if ( ! $id ) {
			echo json_encode( [] );
			
			return;
		}
		
		$email = $this->getRequest()->getParam( 'email' );
		
		$artisan = $em->getRepository( 'Auth_Model_Artisan' )->findOneBy( [ 'email_artisan' => $email ] );
		
		$demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
		
		if ( ! $demande ) {
			echo json_encode( [] );
		} else {
			echo json_encode( [
				'id'                 => $demande->id_demande,
				'titre'              => $demande->titre_demande,
				'ref'                => $demande->getRef(),
				'libelle'            => "$demande->titre_demande {$demande->getRef()}",
				'nom_artisan'        => $artisan->getNom_artisan(),
				'prenom_artisan'     => $artisan->getPrenom_artisan(),
				'email_artisan'      => $artisan->getEmail_artisan(),
				'raison_sociale'     => $artisan->getRaison_sociale(),
				'telephone_portable' => $artisan->getTelephone_portable(),
				'adresse'            => $artisan->getAdresse(),
				'prix'               => $demande->getPrix_mise_en_ligne(),
				'tva'                => ( (float) $demande->getPrix_mise_en_ligne() ) * 0.2,
				'prixttc'            => ( (float) $demande->getPrix_mise_en_ligne() ) * 1.2,
			] );
		}
	}
	
	public function updateAction() {
		
		$date = new Zend_Date();
		
		$em = $this->getRequest()->_em;
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$id    = $this->getRequest()->getPost( 'id' );
		$email = urldecode( $this->getRequest()->getPost( 'email' ) );
		
		
		$artisan = $em->getRepository( 'Auth_Model_Artisan' )->findOneBy( [ 'email_artisan' => $email ] );
		$demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
		
		$ref = $demande->getRef();
		
		//Saving and generating Facture
		try {
			$acheter = new Auth_Model_Acheter();
			
			$acheter->setArtisan( $artisan );
			$acheter->setId_artisan( $artisan->id_artisan );
			$acheter->setDemande( $demande );
			$acheter->setId_demande( $demande->id_demande );
			$acheter->setReglee( true );
			$acheter->setMode_paiement( 'CARTE BANCAIRE' );
			
			$em->persist( $acheter );
			$em->flush();
			
			// Fetching the html string from the view
			$html = $this->view->partial( 'shared/facture.phtml', [
				'demande' => $demande,
				'artisan' => $artisan,
				'acheter' => $acheter,
			] );
			
			$this->generateFacture( $ref . "-" . $artisan->id_artisan, $html );
			
			
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
		
		
		$pdf_location     = $demande->pdfLocation( true );
		$facture_location = $demande->factureLocation( $artisan->id_artisan, true );
		
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
		$facture_attachement->filename    = "FAC-{$ref}-{$artisan->id_artisan}.pdf";
		
		
		// Sending email to artisan
		try {
			
			$html = $this->view->partial( 'shared/mail_invoice_artisan.phtml', [
				'artisan' => $artisan,
				'demande' => $demande,
				'acheter' => $acheter,
			] );
			
			$mail = new Zend_Mail( 'utf-8' );
			$mail->setBodyHtml( $html );
			$mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
			$mail->setSubject( "Votre Commande avec paiement CB" );
			$mail->addTo( $artisan->email_artisan );
			$mail->addAttachment( $pdf_attachement );
			$mail->addAttachment( $facture_attachement );
			
			$mail->send();
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
		
		// Sending email to particulier
		
		try {
			
			$html = $this->view->partial( 'shared/mail_confirme_particulier.phtml', [
				'artisan'     => $artisan,
				'particulier' => $demande->id_particulier,
			] );
			
			$mail = new Zend_Mail( 'utf-8' );
			$mail->setBodyHtml( $html );
			$mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
			$mail->setSubject( "Un artisan est intérssé par votre demande de devis" );
			$mail->addTo( $demande->id_particulier->email );
			
			$mail->send();
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
	}
	
	
	public function virementAction() {
		
		$date = new Zend_Date();
		
		$em = $this->getRequest()->_em;
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$id    = $this->getRequest()->getPost( 'id' );
		$email = urldecode( $this->getRequest()->getPost( 'email' ) );
		
		
		$artisan = $em->getRepository( 'Auth_Model_Artisan' )->findOneBy( [ 'email_artisan' => $email ] );
		$demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find( $id );
		
		//Saving and generating Facture
		try {
			$acheter = new Auth_Model_Acheter();
			
			$acheter->setArtisan( $artisan );
			$acheter->setId_artisan( $artisan->id_artisan );
			$acheter->setDemande( $demande );
			$acheter->setId_demande( $demande->id_demande );
			$acheter->setReglee( false );
			$acheter->setMode_paiement( 'VIREMENT BANCAIRE' );
			
			$em->persist( $acheter );
			$em->flush();
			
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
		
		// Sending email
		try {
			
			$html = $this->view->partial( 'shared/mail_virement_artisan.phtml', [
				'artisan' => $artisan,
				'demande' => $demande,
			] );
			
			$mail = new Zend_Mail( 'utf-8' );
			$mail->setBodyHtml( $html );
			$mail->setFrom( $this->_sys_email['address'], $this->_sys_email['name'] );
			$mail->setSubject( "Votre Commande a été enregistrée" );
			$mail->addTo( $artisan->email_artisan );
			
			$mail->send();
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
		
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
	
	public function uploadAudioAction() {
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$file = $_FILES['file'];
		
		if ( isset( $file['tmp_name'] ) ) {
			if ( ! in_array( $file['type'], [ 'audio/wav', 'audio/x-wav', 'audio/mpeg', 'audio/mp3', 'application/ogg' ] ) ) {
				http_response_code( 400 );
				echo json_encode( [
					'error'   => true,
					'message' => 'Ce type de fichier n\'est pas autorisé',
				] );
				exit;
			}
			
			if ( $file['error'] !== 0 ) {
				http_response_code( 400 );
				echo json_encode( [
					'error'   => true,
					'message' => 'Une erreur s\'est produite',
				] );
				exit;
			}
		} else {
			http_response_code( 400 );
			echo json_encode( [
				'error'   => true,
				'message' => 'Aucun fichier sélectionné',
			] );
			exit;
		}
		$target_dir  = APPLICATION_PATH . '/tmp/';
		$target_file = $target_dir . basename( time() . '.' . pathinfo( $file['name'], PATHINFO_EXTENSION ) );
		
		
		move_uploaded_file( $file['tmp_name'], $target_file );
		
		echo json_encode( [
			'error'    => false,
			'message'  => 'Fichier importé avec succès',
			'filename' => str_replace( APPLICATION_PATH, '', $target_file ),
		] );
		exit;
	}
}
