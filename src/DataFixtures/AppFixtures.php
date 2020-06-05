<?php

namespace App\DataFixtures;

use App\DataFixtures\Providers\RolesAndServiceListProvider;
use App\Entity\Company;
// use App\Entity\Message;
use App\Entity\Service;
use App\Entity\ServiceList;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // On ajoute notre propre fournisseur de données
        $faker->addProvider(new RolesAndServiceListProvider($faker));

        // Pour associer les objets entre eux, on crée des tableaux
        // On les initialise vides
        $users = [];
        $companies = [];
        $services = [];
        $serviceLists = [];
        // $messages = [];

        //user test
        $user = new User();
        $user->setName('test');
        $user->setFirstName('test');
        $user->setPhone($faker->phoneNumber());
        $user->setEmail('test@test.test');
        // Password: 147258
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$G1rz1HbBsJlng+WXyKU3Wg$1iMXtf8THk5+3+m8btiA2g4OBJt8zn82hOXPUKZfllM');
        $user->setAddress($faker->streetAddress());
        $user->setPostalCode('75000');
        $user->setCity($faker->city());
        $user->setRoles(['ROLE_ADMIN']);
        $user->setActif(1);
        $user->setCreatedAt($faker->datetime());
        $manager->persist($user);
        $users[] = $user;

        $serviceList = new ServiceList();
        $serviceList->setName('DJ');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Traiteur');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Location de salle');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Photographe');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Vidéaste');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Location de voiture');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Pâtissier');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $serviceList = new ServiceList();
        $serviceList->setName('Décorateur');
        $manager->persist($serviceList);
        $serviceLists[] = $serviceList;

        $manager->flush();

        for ($i = 0; $i < 30; $i++) {
            $user = new User();
            $user->setName($faker->lastName());
            $user->setFirstName($faker->firstName());
            $user->setPhone($faker->phoneNumber());
            $user->setEmail($faker->email());
            // Password: 147258
            $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$G1rz1HbBsJlng+WXyKU3Wg$1iMXtf8THk5+3+m8btiA2g4OBJt8zn82hOXPUKZfllM');
            $user->setAddress($faker->streetAddress());
            $user->setPostalCode('75000');
            $user->setCity($faker->city());
            $user->setRoles([$faker->userRole()]);
            $user->setActif($faker->numberBetween(0, 1));
            $user->setCreatedAt($faker->datetime());


            $company = new Company();
            $company->setBusinessName($faker->company());
            $company->setUser($user);
            $company->setSiret($faker->siret());
            $company->setCreatedAt($faker->datetime());
             

            $service = new Service();
            $service->setCompany($company);
            $service->setServiceList($serviceLists[$faker->numberBetween(0, 7)]);
            $service->setTitle($faker->company());
            $service->setAddress($faker->streetAddress());
            $service->setPostalCode('75000');
            $service->setCity('Paris');
            $service->setDepartment('75');
            $service->setPrice($faker->numberBetween(200, 700));
            $service->setNote($faker->numberBetween(0, 5));
            $service->setMaxGuest('300');
            $service->setMinGuest('20');
            $service->setDescription($faker->text($maxNbChars = 300));
            $service->setCreatedAt($faker->datetime());


            // $message = new Message();
            // $message->setUser($user);
            // $message->setCompany($company);
            // $message->setTitle($faker->sentence($nbWords = 5, $variableNbWords = true));
            // $message->setDate('08/05/2020');
            // $message->setContent($faker->text($maxNbChars = 300));
            // $message->setNotRead($faker->boolean());
            // $message->setArchived($faker->boolean());


            $user->addFavorite($service);


            $manager->persist($user);
            $users[] = $user;

            $manager->persist($service);
            $services[] = $service;

            // $manager->persist($message);
            // $messages[] = $message;

            $manager->persist($company);
            $companies[] = $company;
        }

        $manager->flush();
    }
}

