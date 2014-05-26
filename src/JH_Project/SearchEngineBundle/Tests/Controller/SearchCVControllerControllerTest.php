<?php

namespace JH_Project\SearchEngineBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchCVControllerControllerTest extends WebTestCase
{
    public function testSearch()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'search_cv');
    }

    public function testResult()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/search_cv_result');
    }

}
