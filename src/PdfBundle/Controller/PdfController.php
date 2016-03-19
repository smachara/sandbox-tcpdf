<?php

namespace PdfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\TCPDFBundle as TCPDF;
use TCPDF2DBarcode;

class PdfController extends Controller
{
    /**
     * @Route("/preview", name= "pdf_preview")
     */
    public function previewAction()
    {
        $barcodeobj = new TCPDF2DBarcode('http://l.sandbox.com/app_dev.php/print-form', 'QRCODE,H');
        $qr = $barcodeobj->getBarcodeSVGcode( 3, 3, 'black');

        return $this->render('PdfBundle:Pdf:content.html.twig', array( 'preview' => true, 'qr' => $qr));
    }

    /**
     * @Route("/print", name= "pdf_print")
     */
    public function printAction()
    {
        $pdf = $this->get("white_october.tcpdf")->create();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

        $barcodeobj = new TCPDF2DBarcode('http://l.sandbox.com/app_dev.php/print-form', 'QRCODE,H');
        $qr = $barcodeobj->getBarcodeSVGcode( 3, 3, 'black');
        $pdf->AddPage();
        $html = $this->renderView('PdfBundle:Pdf:content.html.twig', array( 'preview' => false, 'qr' => $qr));
        $pdf->writeHTML($html, true, false, true, false, '');
        //$pdf->Output('test.pdf', 'I');
        $response = new Response($pdf->Output('test.pdf','D'));
        $response->headers->set('Content-Type', 'application/pdf');
        return $response;
    }

}
