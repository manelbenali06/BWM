<?php
namespace App\DataFixtures;
use Faker;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
    
class ContactFixtures extends Fixture
{ 
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
       
            for ( $i= 0; $i < 5; $i++) 
            {
                $contact = new Contact();
                $contact->setLastname($this->faker->name())
                ->setEmail($this->faker->email())
                ->setMessage($this->faker->text());
                $manager->persist($contact);
            }
                            
            $manager->flush();
        }        
    }