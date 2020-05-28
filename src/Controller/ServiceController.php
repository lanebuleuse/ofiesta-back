<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ServiceController extends AbstractController
{
    /**
     * @Route("/services", name="services", methods={"GET"})
     */
    public function getServices(ServiceRepository $serviceRepository, SerializerInterface $serializer)
    {
        // On récupère tous les users, ce sont des objets User classiques
        $services = $serviceRepository->findAll();

        // On demande au Serializer de normaliser nos users
        $arrayServices = $serializer->normalize($services, null, ['groups' => 'services']);
        // dd($arrayUsers);
        return $this->json($arrayServices);
    }

}
