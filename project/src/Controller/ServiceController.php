<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;


class ServiceController extends AbstractController
{
    /**
     * @Route("/api/service", name="api_service" , methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository ): Response
    {
        $service = $serviceRepository->findAll();
        return $this->json($service,200,[],['groups' => 'service']);
    }
    /**
     * @Route("/api/service-user/{id}", name="api_service_user" , methods={"GET"})
     */
    public function getServiceByUser(ServiceRepository $serviceRepository,$id): Response
    {

        $service = $serviceRepository->getServiceByUser($id);
        return $this->json($service,200,[],['groups' => 'service']);

    }
}
