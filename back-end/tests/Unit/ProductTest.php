<?php
namespace App\Tests\Unit;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
class ProductTest extends KernelTestCase
{
    public function getEntity():Product
    {
        return (new Product())-> setName( 'Product #1')
            ->setDescription('Description #1')
            ->setPrice(10.99)
            ->setImage('image.jpg');
    }
    public function testEntityIsValid(): void
    {
        self::bootKernel();
        $container = static:: getContainer();
        $product = $this->getEntity();
        $errors = $container->get('validator')->validate($product);
        $this->assertCount(0, $errors);
    }
}