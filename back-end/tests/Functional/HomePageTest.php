<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageTest extends WebTestCase
{
    public function testHomePageContent(): void
    {
        // crée un objet client pour interagir avec l'application.
        $client = static::createClient();
        //effectue une requête GET vers l'URL racine ( /) de l'application
        //à l'aide du client créé à l'étape précédente.
        //La réponse est renvoyée en tant Crawler qu'objet,
        //ce qui nous permet de parcourir et d'interagir avec le contenu HTML.
        $crawler = $client->request('GET', '/');

        //Il s'agit d'une vérification de base pour s'assurer que la page est accessible.
        $this->assertResponseIsSuccessful();
        //Cette ligne affirme que le texte est présent dans le <title>.
        // Il vérifie que le titre de page correct est rendu.
        $this->assertSelectorTextContains('title', 'Brows with Manel -Studio de beauté');
        $this->assertSelectorTextContains('h1', 'Retrouvez nos techniques professionnelles');
        //vérifient la présence d'un lien avec la classe btn et un href attribut défini sur "/products".
        //La filter méthode est utilisée pour sélectionner des éléments avec le sélecteur CSS donné.
        //La assertCount méthode vérifie qu'il existe exactement un élément correspondant dans le DOM du robot. 
            
        $buttonLink = $crawler->filter('a.btn[href="/products"]');
        //count()fonction renvoie le nombre d'éléments sélectionnés.
        //Le test vérifie ensuite que le décompte est supérieur à zéro,
        $this->assertCount(1, $buttonLink);

        //Ces deux lignes sélectionnent toutes les images du carrousel dans le HTML à l'aide du sélecteur CSS
        //carroussel .carousel-item img. La $carouselImages-
        $carouselImages = $crawler->filter('.carroussel .carousel-item img');
        $this->assertGreaterThan(0, $carouselImages->count());
    }
}