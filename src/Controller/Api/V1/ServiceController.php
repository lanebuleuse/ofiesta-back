<?php

namespace App\Controller\Api\V1;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1/services", name="api_v1_services_")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function getServices(ServiceRepository $serviceRepository, SerializerInterface $serializer)
    {
        // On récupère tous les users, ce sont des objets Service classiques
        $services = $serviceRepository->findAll();

        // On demande au Serializer de normaliser nos services
        $arrayServices = $serializer->normalize($services, null, ['groups' => 'services']);
        // dd($arrayServices);
        return $this->json($arrayServices);
    }

}
