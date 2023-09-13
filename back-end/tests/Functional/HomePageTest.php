<?php
namespace App\Tests\Functional;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageTest extends WebTestCase
{
    public function testHomePageContent(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', 'Brows with Manel -Studio de beauté');
        $this->assertSelectorTextContains('h1', 'Retrouvez nos techniques professionnelles');
        $buttonLink = $crawler->filter('a.btn[href="/products"]');
        $this->assertCount(1, $buttonLink);
        $carouselImages = $crawler->filter('.carroussel .carousel-item img');
        $this->assertGreaterThan(0, $carouselImages->count());
    }
}