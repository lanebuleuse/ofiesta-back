<?php

namespace App\Controller\Api\V1;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/als
 * pi/v1/public/users", name="api_v1_users_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id": "\d+"})
     */
    public function read(User $user, SerializerInterface $serializer)
    {
        $arrayUser = $serializer->normalize($user, null, ['groups' => 'user_read']);

        return $this->json($arrayUser);
    }
}