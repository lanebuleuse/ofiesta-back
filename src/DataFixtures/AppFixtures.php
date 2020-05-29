<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Service;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // Pour associer les objets entre eux, on crée des tableaux
        // On les initialise vides
        $users = [];
        // $companies = [];
        // $services = [];

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setGenre($faker->title());
            $user->setName($faker->lastName());
            $user->setFirstName($faker->firstName());
            $user->setPhone($faker->phoneNumber());
            $user->setEmail($faker->email());
            // Password: 147258
            $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$G1rz1HbBsJlng+WXyKU3Wg$1iMXtf8THk5+3+m8btiA2g4OBJt8zn82hOXPUKZfllM');
            // $encoded = $encoder->encodePassword($user, $password);
            $user->setAddress($faker->streetAddress());
            $user->setPostalCode('75000');
            $user->setCity($faker->city());
            $user->setRoles(['ROLE_ADMIN']);
            $user->setActif($faker->numberBetween(0, 1));
            $user->setCreatedAt($faker->datetime());

            $manager->persist($user);
            $users[] = $user;
        }

        // for ($i = 0; $i < 10; $i++) {
        //     $company = new Company();
        //     $company->setBusinessName($faker->company());
        //     $company->setSiret($faker->siret());
        //     $company->setCreatedAt($faker->datetime());


        //     $manager->persist($company);
        //     $companies[] = $company;
        // }

        // for ($i = 0; $i < 10; $i++) {
        //     $service = new Service();
        //     $service->setGenre($faker->title());
        //     $service->setName($faker->lastName());
        //     $service->setFirstName($faker->firstName());
        //     $service->setPhone($faker->phoneNumber());
        //     $service->setEmail($faker->email());
        //     $service->setAddress($faker->streetAddress());
        //     $service->setPostalCode('75000');
        //     $service->setCity($faker->city());
        //     $service->setRoles(['ROLE_ADMIN']);
        //     $service->setActif($faker->numberBetween(0, 1));
        //     $service->setCreatedAt($faker->datetime());

        //     $manager->persist($service);
        //     $service[] = $service;
        // }

        $manager->flush();
    }
}

