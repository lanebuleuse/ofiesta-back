<?php

namespace App\Controller\Api\V1;

use App\Entity\Company;
use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1", name="api_v1_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/secure/users/profile", name="users_read", methods={"GET"})
     */
    public function userRead(SerializerInterface $serializer)
    {

        $user = $this->getUser();

        $arrayUser = $serializer->normalize($user, null, ['groups' => 'user_read']);

        return $this->json($arrayUser);
    }

    /**
    * @Route("/secure/users/profile", name="user_delete", methods={"DELETE"})
    */
    public function userDelete()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->json('Votre profil à bien été supprimé.');
    }

    /**
    * @Route("/secure/users/profile/edit", name="user_edit", methods={"PUT"})
    */
    public function userEdit(Request $request, SerializerInterface $serializer, UserPasswordEncoderInterface $encoder)
    {
        // On crée un nouvel objet à partir du JSON reçu
        $jsonData = json_decode($request->getContent());

        $user = $this->getUser();
        // On attribue les valeurs :
        $user->setEmail($jsonData->email);
        $user->setName($jsonData->name);
        $user->setPassword($encoder->encodePassword($user, $jsonData->password));
        $user->setFirstName($jsonData->firstName);
        $user->setPhone($jsonData->phone);
        $user->setAddress($jsonData->address);
        $user->setPostalCode($jsonData->postalCode);
        $user->setCity($jsonData->city);
        $user->setUpdatedAt(new DateTime('NOW'));
        $user->setRoles(['ROLE_USER']);


        // On persiste
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json(
            // On sérialise l'objet qui vient d'être créé
            $serializer->normalize(
                $user,
                null,
                ['groups' => 'user_read']
            ),
            201 // On précise le code de status de réponse pour confirmer que le service est ajouté
        );
    }

    /**
     * @Route("/secure/pro/profile", name="pro_read", methods={"GET"})
     */
    public function proRead(SerializerInterface $serializer)
    {
        $user = $this->getUser();

        $arrayUser[] = $serializer->normalize($user, null, ['groups' => 'pro_read']);


        return $this->json($arrayUser);
    }

    // /**
    // * @Route("/pro/users/{id}", name="pro_delete", methods={"DELETE"}, requirements={"id": "\d+"})
    // */
    // public function proDelete(User $user)
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     $em->remove($user);
    // }

    // /**
    // * @Route("/pro/users/{id}/edit", name="pro_edit", methods={"PUT"}, requirements={"id": "\d+"})
    // */
    // public function proEdit(Request $request, User $user, SerializerInterface $serializer)
    // {
    //     // On crée un nouvel objet à partir du JSON reçu
    //     $jsonData = json_decode($request->getContent());

    //     $user = $this->getUser();
    //     // On attribue les valeurs :
    //     $user->setEmail($jsonData->email);
    //     $user->setName($jsonData->name);
    //     $user->setFirstName($jsonData->firstName);
    //     $user->setPhone($jsonData->phone);
    //     $user->setAddress($jsonData->address);
    //     $user->setPostalCode($jsonData->postalCode);
    //     $user->setCity($jsonData->city);
    //     $user->setUpdatedAt(new DateTime('NOW'));
    //     $user->setRoles(['ROLE_USER']);


    //     // On periste
    //     $em = $this->getDoctrine()->getManager();
    //     $em->persist($user);
    //     $em->flush();

    //     return $this->json(
    //         // On sérialise l'objet qui vient d'être créé
    //         $serializer->normalize(
    //             $user,
    //             null,
    //             ['groups' => 'user_read']
    //         ),
    //         201 // On précise le code de status de réponse pour confirmer que le service est ajouté
    //     );
    // }

}