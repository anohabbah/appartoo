<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FriendControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/friends');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/friends/new');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/friends/{id}/remove');
    }

}
