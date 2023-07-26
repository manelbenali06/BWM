<?php
namespace App\Tests\Unit;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
class ProductTest extends KernelTestCase
{
    public function getEntity():Product
    {
        //La méthode getEntity->définit les valeurs des propriétés :name, description, price et image
        //->renvoie l'entité créée.
        
        return (new Product())-> setName( 'Product #1')
            ->setDescription('Description #1')
            ->setPrice(10.99)
            ->setImage('image.jpg');
    }
    public function testEntityIsValid(): void
    {
        //On verifie l'entité si elle est valide en appellant le service validator
        //d'abord on reccupere le kernel
        self::bootKernel();
        //Je créer le container avec getContainer
        $container = static:: getContainer();
        $product = $this->getEntity();
        //On reccupere les erreurs potentiels via le validator et on lui demande de valider notre entité
        //si ya des erreurs elles vont etre contenu dans $errors
        $errors = $container->get('validator')->validate($product);
        //demander que les erreurs = 0
        $this->assertCount(0, $errors);
    }
}