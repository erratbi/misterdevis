<?php
/**
 * Class Auth_ArtisanController
 *
 * @authors  Youssef Erratbi <yerratbi@gmail.com>  - Aziz Idmansour <aziz.idmansour@gmail.com>
 * @date     23/12/17
 * Ce controlleur est responsable sur la gestion des artisans,
 * il permet de lister les artisans avec l'action indexAction,
 * d'ajouter un nouveau artisan avec l'action addAction et de
 * modifier un artisan existant avec l'action editAction.
 */


class Auth_ArtisanController extends Zend_Controller_Action {
	
	private $_sys_email;
	
	public function init() {
		
		$config           = new Zend_Config_Ini( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
		$this->_sys_email = $config->system->email->toArray();
	}
	
	
	public function indexAction() {
		
		$this->_helper->layout->setLayout( 'layout_fo_ehcg' );
		
		$artisans = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->findBy( [], [ 'id_artisan' => 'DESC' ] );
		
		
		$this->view->artisans = $artisans;
		
	}
	
	
	public function addAction() {
		
		$this->_helper->layout->setLayout( 'layout_fo_ehcg' );
		$em = $this->getRequest()->_em;
		
		
		// Initializing the forms
		$form = new Zend_Form();
		
		
		$form->addSubForms( [
			'form_artisan'  => new Auth_Form_Artisan,
			'form_chantier' => new Auth_Form_Chantier,
		] );
		
		
		$activites    = $em->getRepository( 'Auth_Model_Activite' )->getMultiOptions();
		$departements = $em->getRepository( 'Auth_Model_Departement' )->getMultiOptions();
		
		$form->form_artisan->select_activites->setMultiOptions( $activites );
		$form->form_artisan->select_departement->setMultiOptions( $departements );
		
		
		$form->form_artisan->pass->setRequired( true );
		$form->form_artisan->pass2->setRequired( true );
		$form->form_artisan->setDefault( 'validation', 1 );
		
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
		
		// Load artisan;
		$is_new  = false;
		$artisan = $em->getRepository( 'Auth_Model_Artisan' )->find( $id );
		if ( ! $artisan ) {
			$artisan = new Auth_Model_Artisan;
			$is_new  = true;
		}
		
		
		// Initializing the forms
		$form = new Zend_Form();
		
		$form->addSubForms( [
			'form_artisan' => new Auth_Form_Artisan,
		] );
		
		if ( ! $is_new ) {
			$form->form_artisan->login
				->setRequired( false )
				->setAttribs( [ 'disabled' => 'disabled' ] );
			$form->form_artisan->email_artisan
				->setRequired( false )
				->setAttribs( [ 'disabled' => 'disabled' ] );
		}
		
		$activites    = $em->getRepository( 'Auth_Model_Activite' )->getMultiOptions();
		$departements = $em->getRepository( 'Auth_Model_Departement' )->getMultiOptions();
		
		$form->form_artisan->select_activites->setMultiOptions( $activites );
		$form->form_artisan->select_departement->setMultiOptions( $departements );
		
		$this->view->departements = $artisan->departements;
		
		$this->view->code = $artisan->codes;
		
		$this->view->geolocalisation = $artisan->geolocalisation;
		
		$form->setDefaults( [
			'Artisan' => $artisan ? $artisan->toArray() : null,
		] );
		
		
		// Proccess the posted data;
		if ( $this->getRequest()->isPost() ) {
			
			$data = $this->getRequest()->getPost();
			
			$form->form_artisan->pass2->addValidator( 'identical', false, $data['Artisan']['pass'] );
			
			
			$valid = $form->isValid( $data );
			
			
			$existingEmail = (int) $em->getRepository( 'Auth_Model_Artisan' )->createQueryBuilder( 'a' )
			                          ->select( 'COUNT(a)' )
			                          ->where( 'a.email_artisan = :email' )
			                          ->setParameter( 'email', $data['Artisan']['email_artisan'] )
			                          ->getQuery()
			                          ->getSingleScalarResult() > 0;
			
			$existingLogin = (int) $em->getRepository( 'Auth_Model_Artisan' )->createQueryBuilder( 'a' )
			                          ->select( 'COUNT(a)' )
			                          ->where( 'a.login = :login' )
			                          ->setParameter( 'login', $data['Artisan']['login'] )
			                          ->getQuery()
			                          ->getSingleScalarResult() > 0;
			
			if ( $valid && ! $existingEmail && ! $existingLogin ) {
				
				// We will send an email
				$sendEmail = false;
				
				if ( ! $artisan->notifie ) {
					$sendEmail                  = true;
					$data['Artisan']['notifie'] = true;
				}
				
				$hash = $this->getRequest()->_registry->config->auth->hash;
				
				// Save the artisan
				$artisan = $em->getRepository( 'Auth_Model_Artisan' )->save( $id, $data, $hash );
				
				
				if ( $is_new ) {
					$this->remoteSubscribe( $artisan, $data['Artisan']['pass'] );
				}
				
				
				$_SESSION['flash'] = "La mise à jour a été effectuée avec success";
				
				$this->getResponse()->setRedirect( "/auth/artisan" );
				
			} else // If the form is not valid keep the data provided by the user
			
			{
				if ( $existingLogin ) {
					$form->form_artisan->login->setAttribs( [ 'class' => 'has-error' ] );
				}
				if ( $existingEmail ) {
					$form->form_artisan->email_artisan->setAttribs( [ 'class' => 'has-error' ] );
				}
				$form->setDefaults( $data );
			}
			
		}
		
		
		$form->form_artisan->setDefault( 'pass', null );
		
		
		$this->view->artisan = $artisan;
		$this->view->form    = $form;
		$this->view->data    = $data;
		$this->view->id      = $id;
	}
	
	
	public function profileAction() {
		
		$this->_helper->layout->setLayout( 'layout_fo_ehcg' );
		
		$id               = unserialize( Zend_Auth::getInstance()->getIdentity() )->id_user;
		$entity           = $this->getRequest()->_em->find( 'Auth_Model_Artisan', $id );
		$this->view->user = $entity;
		if ( $this->getRequest()->isPost() ) {
			# get params
			$data = $this->getRequest()->getPost();
			
			$accountExist = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->findBy( [ 'email_user' => (string) $data['EMAIL_USER'] ] );
			if ( count( $accountExist ) == 0 || count( $accountExist ) == 1 && $accountExist[0]->getId_user() == $entity->id_user ) {
				$entity->firstname_user = $data['FIRSTNAME_USER'];
				$entity->lastname_user  = $data['LASTNAME_USER'];
				$entity->email_user     = $data['EMAIL_USER'];
				$entity->login_user     = $data['LOGIN_USER'];
				
				if ( ! empty( $data['PASSWORD_USER'] ) ) {
					$entity->setPassword( $data['PASSWORD_USER'], $this->getRequest()->_registry->config->auth->hash );
				}
				
				$this->getRequest()->_em->persist( $entity );
				$this->getRequest()->_em->flush();
				$this->getRequest()->_cache->remove( 'Artisan' );
				
				$this->_helper->redirector( 'index', 'user', 'auth' );
			}
		}
	}
	
	public function removeAction() {
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		
		# get params
		$id = $this->_getParam( "id" );
		
		$entity = $this->getRequest()->_em->find( 'Auth_Model_Artisan', $id );
		$this->getRequest()->_em->remove( $entity );
		$this->getRequest()->_em->flush();
		$this->getRequest()->_cache->remove( 'Artisan' );
		$this->_helper->json->sendJson( [ 'response' => true ] );
	}
	
	
	public function permissionAction() {
		
		Zend_Registry::get( 'acl' )->isAllowed( new Custom_Acl_ArtisanRole(), new Custom_Acl_Resources( 'devis' ), 'view' );
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
	}
	
	public function enableAction() {
		
		$idArtisan = (int) $this->getRequest()->getParam( 'listId', 0 );
		$user      = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->find( $idArtisan );
		$user->setstatususer( 1 );
		
		$this->getRequest()->_em->persist( $user );
		$this->getRequest()->_em->flush();
		$this->getRequest()->_cache->remove( 'Artisan' );
		
		echo json_encode( [
			"response" => "true",
			"message"  => "Changement de statut effectué.",
		] );
		
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout()->disableLayout();
		
		
	}
	
	public function disableAction() {
		
		$idArtisan = (int) $this->getRequest()->getParam( 'listId', 0 );
		$user      = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->find( $idArtisan );
		$user->setstatususer( 0 );
		
		$this->getRequest()->_em->persist( $user );
		$this->getRequest()->_em->flush();
		$this->getRequest()->_cache->remove( 'Artisan' );
		
		echo json_encode( [
			"response" => "true",
			"message"  => "Changement de statut effectué.",
		] );
		
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout()->disableLayout();
		
	}
	
	public function deleteAction() {
		
		$idArtisan       = (int) $this->getRequest()->getParam( 'listId', 0 );
		$users           = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->find( $idArtisan );
		$estimate        = $this->getRequest()->_em->getRepository( 'Auth_Model_Estimate' )->findByIduser( $idArtisan );
		$user            = $this->getRequest()->_em->find( 'Auth_Model_Artisan', unserialize( Zend_Auth::getInstance()->getIdentity() )->iduser );
		$usersConnection = $this->getRequest()->_em->getRepository( 'Auth_Model_Connections' )->findByiduser( $idArtisan );
		
		foreach ( $usersConnection as $u ) {
			$this->getRequest()->_em->remove( $u );
		}
		foreach ( $estimate as $e ) {
			$e->iduser = $user;
			$this->getRequest()->_em->persist( $e );
		}
		//$this->getRequest()->_em->flush();
		$this->getRequest()->_em->remove( $users );
		$this->getRequest()->_em->flush();
		$this->getRequest()->_cache->remove( 'Artisan' );
		
		echo json_encode( [
			"response" => "true",
			"message"  => "Suppression effectuée.",
		] );
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout()->disableLayout();
	}
	
	public function countrecordsAction() {
		
		$total = $this->getRequest()->_em->getRepository( 'Auth_Model_Artisan' )->getCount();
		$this->_helper->json->sendJson( $total );
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout()->disableLayout();
	}
	
	
	public function newActiviteAction() {
		
		$em = $this->getRequest()->_em;
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		
		$form = new Auth_Form_Artisan;
		
		$activites = $em->getRepository( 'Auth_Model_Activite' )->getMultiOptions();
		$form->select_activites->setMultiOptions( $activites )->setLabel( null );
		
		echo json_encode( [
			'error' => 0,
			'html'  => $this->view->partial( "artisan/new-activite.phtml", [ 'form' => $form ] ),
		] );
		
	}
	
	
	public function newDepartementAction() {
		
		$em = $this->getRequest()->_em;
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender( true );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		
		$form = new Auth_Form_Artisan;
		
		$departements = $em->getRepository( 'Auth_Model_Departement' )->getMultiOptions();
		$form->select_departement->setMultiOptions( $departements )->setLabel( null );
		
		echo json_encode( [
			'error' => 0,
			'html'  => $this->view->partial( "artisan/new-departement.phtml", [ 'form' => $form ] ),
		] );
		
	}
	
	
	public function listDepartementsAction() {
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		$em = $this->getRequest()->_em;
		
		$q = $this->getRequest()->getParam( 'q' );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$departements = $em->getRepository( 'Auth_Model_Departement' )->findByNameOrCode( $q );
		
		echo json_encode( [ 'results' => $departements ] );
		
		
	}
	
	public function listZonesAction() {
		
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		$em = $this->getRequest()->_em;
		
		$q = $this->getRequest()->getParam( 'q' );
		
		$this->getResponse()->setHeader( 'Content-Type', 'application/json' );
		
		$zones   = $em->getRepository( 'Auth_Model_Zone' )->findByNameOrCode( $q );
		$results = [];
		
		foreach ( $zones as $zone ) {
			$results[] = [
				'id_zone' => $zone['id_zone'],
				'ville'   => "{$zone['code']} - {$zone['ville']}",
			];
		}
		
		echo json_encode( [ 'results' => $results ] );
		
		
	}
	
	
	private function remoteSubscribe( $artisan, $pass ) {
		
		// TODO : Change this URL
		$remote_url = 'https://mister-devis.com/inscription-pro';
		
		$activity_mapping = [
			0  => 220,
			1  => 216,
			2  => 210,
			3  => 221,
			4  => 194,
			5  => 222,
			6  => 223,
			7  => 214,
			8  => 224,
			9  => 225,
			10 => 226,
			11 => 217,
		];
		
		
		$specialities = $artisan->getSpecialities();
		$activity     = $activity_mapping[ count( $specialities ) ? $specialities[0] : '' ];
		
		if ( ! $activity ) {
			$activity = 11;
		}
		
		$post_data = [
			'input_12'         => $artisan->prenom_artisan,
			'input_13'         => $artisan->nom_artisan,
			'input_2'          => $artisan->raison_sociale,
			'input_5'          => $artisan->code_postal,
			'input_10'         => $artisan->getTelephone_fixe( true ),
			'input_11'         => $artisan->getTelephone_portable( true ),
			'input_8'          => $artisan->email_artisan,
			'input_9'          => $artisan->horaireRDV,
			'input_3'          => $activity,
			'input_14'         => $artisan->login,
			'input_15'         => $pass,
			'input_15_2'       => $pass,
			'posted_from_curl' => 1,
			'is_submit_90'     => 1,
			'gform_submit'     => 90,
		];
		
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FAKE)';
		
		
		$ch = curl_init( $remote_url );
		
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $ch, CURLOPT_POSTREDIR, 3 );
		curl_setopt( $ch, CURLOPT_USERAGENT, $agent );
		
		curl_exec( $ch );
	}
	
	
}

