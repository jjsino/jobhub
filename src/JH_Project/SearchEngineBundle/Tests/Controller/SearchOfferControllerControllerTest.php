<?php

namespace JH_Project\SearchEngineBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchOfferControllerControllerTest extends WebTestCase
{
    public function testSearch()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/search_offer');
    }

    public function testResult()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/search_offer_result');
    }

}
