<?php
namespace App\Tests\Functional;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testUserLogin()
    {
        $client = static::createClient();

        // Accédez à la page de connexion
        $crawler = $client->request('GET', '/login'); // Remplacez '/login' par l'URL correcte si nécessaire

        // Vérifier que la page s'affiche correctement
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Veuillez vous connecter', $crawler->filter('h5.login-card-title')->text()); 

        // Sélectionnez le formulaire et définissez certaines valeurs
        $form = $crawler->selectButton("S'identifier")->form();

        $form['email'] = 'test_user@email.com'; // Remplacez par un utilisateur de test réel dans votre BD
        $form['password'] = 'test_password'; // Remplacez par le mot de passe réel de cet utilisateur de test

        // Soumettez le formulaire
        $client->submit($form);

        // Assurez-vous que vous êtes bien redirigé après la connexion réussie
        $this->assertTrue($client->getResponse()->isRedirect());

        $crawler = $client->followRedirect();

        // Vérifiez que vous êtes bien connecté en recherchant un élément spécifique de la page
        // Par exemple, vous pourriez vérifier que le nom de l'utilisateur est affiché
        $this->assertContains('Vous êtes connecté en tant que', $crawler->filter('body')->text());
    }
}