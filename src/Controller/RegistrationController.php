<?php

namespace App\Controller;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/register", name="app_register", methods={"POST"})
 */
class RegistrationController extends AbstractController
{
    /**
     * @Route("/user", name="app_register", methods={"POST"})
     */
    public function add(Request $request, SerializerInterface $serializer, UserPasswordEncoderInterface $encoder)
    {
        // On crée un nouvel objet à partir du JSON reçu
        $jsonData = json_decode($request->getContent());

        // On crée un nouveau User
        $user = new User();        
        // On attribue les valeurs :
        $user->setEmail($jsonData->email);
        $user->setPassword($encoder->encodePassword($user, $jsonData->password));
        $user->setGenre($jsonData->genre);
        $user->setName($jsonData->name);
        $user->setFirstName($jsonData->firstName);
        $user->setPhone($jsonData->phone);
        $user->setAddress($jsonData->address);
        $user->setPostalCode($jsonData->postalCode);
        $user->setCity($jsonData->city);
        $user->setActif((bool) 1);
        $user->setCreatedAt(new DateTime('NOW'));
        $user->setRoles(['ROLE_USER']);

        // On periste
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
}
