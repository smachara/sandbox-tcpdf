sandbox-tcpdf
=============

A Symfony project created on March 19, 2016, 8:23 pm.

This is a Example of how to use WhiteOctoberTCPDFBundle to implement a pdf print and html preview.

To make this example runs, follow this instruction

Installation
------------

### Step 1: Setup Bundle and dependencies

    ``` php composer.phar update ```

### Step 2: Set up your web server

    to point /sandbox-tcpdf/web/

### Step 3: Test your installation
    Access the www.your-page.local\app_dev.php\preview


Files to Observe
----------------
###App
    config.yml              ->  Personalize PDF template
    routing.yml             ->  Add access to route annotations in PdfBundle
    autoload.php            ->  Configure the autoloader, adding the WhiteOctober namespace
    appKernel.php           ->  Enable the PdfBundle and WhiteOctoberTCPDFBundle in the kernel
###PdfBundle
    Utils/MyTcPdf.php       ->  Extend the TCPDF class to create custom Header and Footer
    PdfBundle.php           ->  Define our TCPDF variables to be setup in config.yml

    PdfController.php       ->  Define Actions to Show a preview and print a HTML.
###Resources
    content.html.twig       ->  Define the content blocks to be used in the HTML or PDF output.
                                Extends from structure.pdf.html.twig
    structure.pdf.html.twig ->  Define the HTML and CSS blocks to generate the html and pdf independently of the content.
                                Extends from preview.html.twig or print.pdf.twig according to the preview flag.

    preview.html.twig       ->  Define the blocks and styles to generate the output html.
                                Extends from base.html.twig
    print.pdf.twig          ->  Define the blocks and styles to generate the output pdf.
                                TCPDF only needs the Style section and body section. It does not extend any twig template.


Notes:
------
       * TCPDF does not like blank space around image file name.
       * <div> positioning is not supported by TCPDF, among others CSS3 styles
       * The QR code is not supported when the pdf is generated from the HTML.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE