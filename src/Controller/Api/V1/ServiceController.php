<?php

namespace App\Controller\Api\V1;

use App\Entity\Service;
use App\Repository\ServiceRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1/public/services", name="api_v1_services_")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function Browse(ServiceRepository $serviceRepository, SerializerInterface $serializer)
    {
        // On récupère tous les users, ce sont des objets Service classiques
        $services = $serviceRepository->findAll();

        // On demande au Serializer de normaliser nos services
        $arrayServices = $serializer->normalize($services, null, ['groups' => 'services']);
        // dd($arrayServices);
        return $this->json($arrayServices);
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id": "\d+"})
     */
    public function read(Service $service, SerializerInterface $serializer)
    {
        $arrayService = $serializer->normalize($service, null, ['groups' => 'services']);

        return $this->json($arrayService);
    }

     /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request, SerializerInterface $serializer)
    {
        // On crée un nouvel objet à partir du JSON reçu
        $jsonData = json_decode($request->getContent());

        // On crée un nouveau Service
        $service = new Service();

        // On attribue les valeurs :
        $service->setCompany($jsonData->company);
        $service->setServiceList($jsonData->serviceList);
        $service->setTitle($jsonData->title);
        $service->setAddress($jsonData->address);
        $service->setPostalCode($jsonData->postalCode);
        $service->setCity($jsonData->city);
        $service->setDepartment($jsonData->department);
        $service->setPrice($jsonData->price);
        $service->setNote($jsonData->note);
        $service->setMaxGuest($jsonData->maxGuest);
        $service->setMinGuest($jsonData->minGuest);
        $service->setCreatedAt(new DateTime('NOW'));

        // On periste le Service
        $em = $this->getDoctrine()->getManager();
        $em->persist($service);
        $em->flush();

        return $this->json(
            // On sérialise l'objet qui vient d'être créé
            $serializer->normalize(
                $service,
                null,
                ['groups' => 'services']
            ),
            201 // On précise le code de status de réponse pour confirmer que le film est ajouté
        );
    }

}
