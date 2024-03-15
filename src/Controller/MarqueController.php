<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MarqueController extends AbstractController
{

    // CRUD //


    #[Route('/marque', name: 'marque_index', methods: ['GET'])]
    public function index(): Response
    {
        
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
            'marques'=>
        ]);
    }

    #[Route('/marque/{id}', name: 'marque_show', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show(): Response
    {
        dd(__METHOD__ );
    }

    #[Route('/marque/create', name: 'marque_create', priority: 0, methods: ['GET', 'POST'])]
    public function create(): Response
    {
        dd(__METHOD__ );
    }

    #[Route('/marque/{id}/edit', name: 'marque_edit', methods: ['GET', 'POST'], requirements: ['id'=>'\d+'])]
    public function update(): Response
    {
        dd(__METHOD__ );
    }

    #[Route('/marque/{id}/delete', name: 'marque_delete', methods: ['GET'], requirements: ['id'=>'\d+'])]
    public function delete(): Response
    {
        dd(__METHOD__ );
    }
}
