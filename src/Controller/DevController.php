<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Entity\Service;
use App\Entity\Message;
use App\Entity\ListePrestation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DevController extends AbstractController
{
    /**
     * @Route("/dev", name="dev")
     */
    public function getUsers(UserRepository $userRepository, SerializerInterface $serializer)
    {
        // On récupère tous les users, ce sont des objets User classiques
        $usersList = $userRepository->findAll();

        // On demande au Serializer de normaliser nos users
        $arrayUsers = $serializer->normalize($usersList, 'json');
        // dd($arrayUsers);
        return $this->json($arrayUsers);
    }
}
