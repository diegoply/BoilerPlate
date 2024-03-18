<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Form\ModeleType;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ModeleController extends AbstractController
{
    #[Route('/modele', name: 'modele_index')]
    public function index(ModeleRepository $repo): Response
    {
        return $this->render('modele/index.html.twig', [
            'modeles' => $repo->findAll(),
        ]);
    }

    #[Route('/modele/{id}', name: 'modele_show', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show( Modele $modele): Response
    {

        return $this->render('modele/show.html.twig', [
            'modele' => $modele,
        ]);
    }

    #[Route('/modele/create', name: 'modele_create', priority: 0, methods: ['GET', 'POST'])]
    public function create(Request $request, ModeleRepository $repo): Response
    {

        $modele = new Modele();

        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $repo->save($modele, true);
            $this->addFlash('success', 'Le modèle a bien été ajouté.');
            return $this->redirectToRoute('modele_index');
        }

        return $this->render('modele/create.html.twig', [
            'formView' => $form->createView(),
        ]);


    }

}
