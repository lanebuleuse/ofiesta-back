<?php

namespace App\Controller\Api\V1;

use App\Entity\Company;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1", name="api_v1_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/secure/users/{id}", name="users_read", methods={"GET"}, requirements={"id": "\d+"})
     */
    public function userRead(User $user, SerializerInterface $serializer)
    {
        $arrayUser = $serializer->normalize($user, null, ['groups' => 'user_read']);

        return $this->json($arrayUser);
    }

    /**
     * @Route("/pro/users/{id}", name="pro_read", methods={"GET"}, requirements={"id": "\d+"})
     */
    public function proRead(User $user, Company $company, SerializerInterface $serializer)
    {
        $arrayUser[] = $serializer->normalize($user, null, ['groups' => 'pro_read']);
        $arrayUser[] = $serializer->normalize($company, null, ['groups' => 'company_read']);

        return $this->json($arrayUser);
    }

}