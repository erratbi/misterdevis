<?php


class Auth_IndexController extends Zend_Controller_Action {

  public function citiesAction() {

    $em = $this->getRequest()->_em;

    $this->_helper->layout()->disableLayout();
    $this->_helper->viewRenderer->setNoRender(true);

    $this->getResponse()->setHeader('Content-Type', 'application/json');

    $q = $this->getRequest()->getParam('q');

    $data = $em->getRepository('Auth_Model_Zone')->getSuggessions($q);


    echo json_encode($data);
  }

  public function exportAction()
    {
       	
    	$em = $this->getRequest()->_em;

     	$this->_helper->layout->setLayout( 'layout_fo_ehcg' );
    
    	$form = new Zend_Form();

    	$form->addSubForms( [
      		'form_index'     => new Auth_Form_Index,
  
   		 ] );

    	$artisans    = $em->getRepository( 'Auth_Model_Artisan' )->getMultiOptions();

    	$form->form_index->artisans->setMultiOptions( $artisans );
    
    	$this->view->form = $form;

    	// Proccess the posted data;
    	if ( $this->getRequest()->isPost() ) {
      
      		$data = $this->getRequest()->getPost();

      		if(empty($data['Index']['artisans']) || empty($data['Index']['mois']) || empty($data['Index']['annee']))
      			return;

      		$result = $em->getRepository( 'Auth_Model_Acheter' )->getData($data['Index']['artisans'],$data['Index']['mois'],$data['Index']['annee']);

      		if(!empty($result)){

	      		$dataTable=[];

	      		foreach ($result as $row) {

	      			$demande = $em->getRepository( 'Auth_Model_Demandedevis' )->find($row["id_demande"]);

	      			$ref = $demande->getRef();

	      			 $dataTable[] = [
	        				'ref' => $ref,
	        				'date' => date( 'd/m/Y', strtotime( $row["date_achat"] ) ),
	        				'prix' => number_format((float) $row["prix_mise_en_ligne"] * 1.2,2,',',' '),
	        				'mode_paiement' => $row['mode_paiement']
	      				];
	      		}

	      		$this->exportXls($dataTable);

	      	}else{

	      		echo "Pas de données disponible";
	      	}

      	}

    }

    public function exportXls($data){


    	set_time_limit( 0 );
        
        $filename = APPLICATION_PATH . "/tmp/excel-" . date( "m-d-Y" ) . ".xls";

        $realPath = realpath( $filename );

        if ( false === $realPath )
        {
            touch( $filename );
            chmod( $filename, 0777 );
        }

        $filename = realpath( $filename );

        $handle = fopen( $filename, "w" );

        $finalData = array();

        $finalData[] = array(
                utf8_decode("REF"), // For chars with accents.
                utf8_decode( "DATE ACHAT" ),
                utf8_decode( "PRIX TTC"),
                utf8_decode( "MODE DE PAIEMENT"),
            );
        
        foreach ( $data AS $row )
        {
            $finalData[] = array(
                utf8_decode( $row["ref"] ), // For chars with accents.
                utf8_decode( $row["date"] ),
                utf8_decode( $row["prix"] ),
                utf8_decode( $row["mode_paiement"] ),
            );
        }
        foreach ( $finalData AS $finalRow )
        {
            fputcsv( $handle, $finalRow, "\t" );
        }
        fclose( $handle );
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $this->getResponse()->setRawHeader( "Content-Type: application/vnd.ms-excel; charset=UTF-8" )
            ->setRawHeader( "Content-Disposition: attachment; filename=achat-export.xls" )
            ->setRawHeader( "Content-Transfer-Encoding: binary" )
            ->setRawHeader( "Expires: 0" )
            ->setRawHeader( "Cache-Control: must-revalidate, post-check=0, pre-check=0" )
            ->setRawHeader( "Pragma: public" )
            ->setRawHeader( "Content-Length: " . filesize( $filename ) )
            ->sendResponse();

        readfile( $filename ); 

        unlink($filename);

        exit();

    }
}
