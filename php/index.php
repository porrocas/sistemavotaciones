<?php 
    //Incluimos la librería
    require_once dirname(__FILE__).'/../vendor/autoload.php';
     
    
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8');
    $html2pdf->pdf->SetDisplayMode('fullpage');

    ob_start();
    include './print-view.php';
    $content = ob_get_clean();

    $html2pdf->writeHTML($content);
    $html2pdf->pdf->SetProtection(array('print', 'copy'), 'comiteautonomias', null, 0, null);
    $html2pdf->output('reporte-votaciones.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>