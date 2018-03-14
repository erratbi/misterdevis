<?php


class Auth_Controller_Helper_MyPdf extends tcpdf_TCPDF {

  public function Header() {


    // Logo
    $image_file = realpath(APPLICATION_PATH . '/../public/resources_fo_ehcg/img/company_logo.jpg');
    $this->Image($image_file, 5, 10, 72, '', 'JPG', '', 'M', false, 300, '', false, false, 0, false, false, false);

    $date = date('d/m/Y');

    $this->writeHTMLCell(0, 10, 178, 14, $date, 0, 0, 0, 0, 'T', false);
    $this->SetTopMargin(38);
    $this->SetAutoPageBreak(true, 50);

  }


  public function Footer() {

    $footer = <<<EOD
<table align="center" width="100%">
<tr>
<td colspan="4">
<h3>DIGITAL IMMOBILIER</h3>
<div style="line-height: 2px;">&nbsp;</div>
</td>
</tr>
<tr>
<td width="49%" align="right">478 Avenue de l'industrie<br>66000 Perpignan - France<br>R.C.S 829 376 987 Perpignan</td>
<td width="1%" style="border-right: 1px solid #CCC;" align="center">&nbsp;</td>
<td width="1%" style="border-left: 1px solid #CCC;" align="center">&nbsp;</td>
<td width="49%" align="left">09 88 77 27 07<br>contact@mister-devis.com<br>www.mister-devis.com</td>
</tr>
</table>
EOD;


    $this->setY(-45);
    $this->writeHTML($footer);
  }
}
