<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

     #[Route('/service/{name}', name: 'app_service')]
    public function showService(string $name): Response
    {
        return new Response("Service demandé : " . $name);
    }
     #[Route('/goto', name: 'app_goto')]
    public function goToIndex(): Response
    {
        // Redirige vers la route de la méthode index()
        return $this->redirectToRoute('app_home');
    }

}