<?php

namespace App\EventListener;

use Doctrine\ORM\EntityManager;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSuccessListener
{

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        // $data = $event->getData();
        // $user = $event->getUser();

        // if (!$user instanceof UserInterface) {
        //     return;
        // }

        // $data['data'] = array(
        //     'roles' => $user->getRoles(),
        //     'username' => $user->getUsername(),
        // );

        // $event->setData($data);

        
        $data = $event->getData();
        $username = $event->getUser() ? $event->getUser()->getUsername() : '';
        $userManager = $this->em->getRepository('UserBundle:User');
        $user = $userManager->findOneBy(['username' => $username]);

        $data['user'] = array(
            'id'    => $user->getId(),
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'firstname' => $user->getFirstname(),
        );

        $event->setData($data);
    }
}