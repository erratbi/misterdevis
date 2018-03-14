<?php


class Auth_Controller_Helper_MyPdf2 extends tcpdf_TCPDF {
  
  public function Header() {
    
    
    // Logo
    $image_file = realpath( APPLICATION_PATH . '/../public/resources_fo_ehcg/img/company_logo.jpg' );
    $this->Image( $image_file, 5, 10, 72, '', 'JPG', '', 'M', false, 300, '', false, false, 0, false, false, false );
    
    $this->SetTopMargin( 38 );
    $this->SetAutoPageBreak( true, 50 );
    
  }
  
  
  public function Footer() {
    
    $footer = <<<EOD
    <div style="text-align: center;">
    
<h3>DIGITAL IMMOBILIER</h3>
<p>478 Avenue de l'industrie<br>66000 Perpignan - France
<br><br>R.C.S 829 376 987 Perpignan&nbsp;-&nbsp;SIRET 829 376 987&nbsp;-&nbsp;TVA Intercommunautaire</p>
</div>
EOD;
    
    
    $this->setY( - 45 );
    $this->writeHTML( $footer );
  }
}
