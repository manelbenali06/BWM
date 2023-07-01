<?php
namespace App\DataFixtures;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
    
class CategoryFixtures extends Fixture
    { 
        public function load(ObjectManager $manager)
        {
            $categories=[
                1=> [
                'name' => 'Levre',
                ],
                2 => [
                'name' => 'Visage',
                ],
                3 => [
                'name' => 'Onglerie',
                ],
                4 => [
                'name' => 'Sourcils',
                ],
            ];

            //dans chaque categorie reccupere moi la valeur
            foreach($categories as $key => $value) 
            {
                $products = new Category();
                $products->setName($value['name']);
                $manager->persist($products);  
                $this->addReference('products.' . $key, $products);

            }
            $manager->flush();
        } 
}   