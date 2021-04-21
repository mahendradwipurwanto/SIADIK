<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        // $dompdf = new Dompdf\DOMPDF();
        $this->loadHtml($html);
        $this->set_paper($paper, $orientation);
        $this->render();
        if($download)
            $this->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $this->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>
