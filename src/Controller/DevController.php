<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DevController extends AbstractController
{
    /**
     * @Route("/users", name="users", methods={"GET"})
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

    /**
     * @Route("/users/{id}", name="user", methods={"GET"}, requirements={"id": "\d+"})
     */
    public function read(User $user, SerializerInterface $serializer)
    {
        $arrayUser = $serializer->normalize($user, 'json');

        return $this->json($arrayUser);
    }
}
