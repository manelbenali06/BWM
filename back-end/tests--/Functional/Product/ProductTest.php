<?php
namespace App\Tests\Functional\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostTest extends WebTestCase
{
    public function testProductPageWorks() : void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/');
        
        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        
        $this->assertSelectorExists('h5');
        $this->assertSelectorTextContains('h5', 'brows with manel');
    }
}