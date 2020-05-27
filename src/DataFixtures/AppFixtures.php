<?php

namespace App\DataFixtures;

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

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setGenre($faker->title());
            $user->setNom($faker->lastName());
            $user->setPrenom($faker->firstName());
            $user->setTelephone($faker->phoneNumber());
            $user->setEmail($faker->email());
            // Password: 147258
            $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$G1rz1HbBsJlng+WXyKU3Wg$1iMXtf8THk5+3+m8btiA2g4OBJt8zn82hOXPUKZfllM');
            // $encoded = $encoder->encodePassword($user, $password);
            $user->setAdresse($faker->streetAddress());
            $user->setCP('75000');
            $user->setVille($faker->city());
            $user->setRoles(['ROLE_ADMIN']);
            $user->setActif($faker->numberBetween(0, 1));
            $user->setCreatedAt($faker->datetime());
            $manager->persist($user);
            $users[] = $user;
        }

        $manager->flush();
    }
}

