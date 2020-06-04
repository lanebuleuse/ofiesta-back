<?php

namespace App\Controller\Api\V1;

use App\Entity\ServiceList;
use App\Repository\ServiceListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1/public/servicelist", name="api_v1_serviceList_")
 */
class ServiceListController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function Browse(serviceListRepository $serviceListRepository, SerializerInterface $serializer)
    {
        $serviceList = $serviceListRepository->findAll();

        // On demande au Serializer de normaliser nos services
        $arrayServiceList = $serializer->normalize($serviceList, null, ['groups' => 'services_list']);
        // dd($arrayServices);
        return $this->json($arrayServiceList);
    }
}