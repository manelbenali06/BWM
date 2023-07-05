<?php
namespace App\DataFixtures;

use Faker;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
class ProductFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
   
        for ($i=0; $i <50 ; $i++) { 
            $products = $this->getReference('products.' . $faker->numberBetween(1, 3));
            $product =new Product();
            $product-> setName($faker->words(4,true))
            ->setDescription($faker->realText(1800))
            ->setPrice($faker->randomFloat(2))
            ->setImage($faker->ImageUrl());
            $manager->persist($product);
        }
      
        $manager->flush();
    }
   
}