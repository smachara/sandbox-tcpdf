<?php

namespace PdfBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PdfControllerTest extends WebTestCase
{
    public function testPreview()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/preview');
    }

    public function testPrint()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/print');
    }

}
