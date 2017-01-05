<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    session_start();
	ob_start();
	/*echo '<pre>';
	print_r($_SESSION);
	die;*/
    include(dirname(__FILE__).'/pdf/sellsheet.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
		$width_in_mm = 8.5 * 25.4; 
		$height_in_mm = 11 * 25.4;
        $html2pdf = new HTML2PDF('P', array($width_in_mm,$height_in_mm), 'en', true, 'UTF-8', array(0, 0, 0, 0), 'A4', 'fr');
		$html2pdf->setDefaultFont("CenturyGothic");
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($_SESSION['pname'].'.pdf', 'D');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
