<?php
namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");
        $user = new User();
        $user->setEmail('admin@mail.com')
            ->setFirstName($faker->name())
            ->setLastName($faker->name())
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->hashPassword($user, '123456'))
            ->setIsVerified(true)
            ->setAddress($faker->streetAddress())
            ->setZipcode($faker->postcode())
            ->setCity($faker->city());
        $manager->persist($user);

        for($i = 1; $i <= 30; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setFirstName($faker->name())
                ->setLastName($faker->name())
                ->setRoles(['ROLE_USER'])
                ->setPassword($this->encoder->hashPassword($user, '123456'))
                ->setIsVerified(true)
                ->setAddress($faker->streetAddress())
                ->setZipcode($faker->postcode())
                ->setCity($faker->city());
            $manager->persist($user);

            $this->addReference('user_' . $i, $user);
        }

        $manager->flush();
    }
}