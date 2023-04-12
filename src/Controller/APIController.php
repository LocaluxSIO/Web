<?php

namespace App\Controller;

use App\Entity\Modele;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);
    }
    #[Route('/api/modeles', methods: ['GET'])]
    public function apiModeles(ManagerRegistry $doctrine): JsonResponse
    {
        //on retourne tous les modèles de voiture dans un tableau Json
        $modeles = $doctrine->getRepository(Modele::class)->findAll();
        $tab = [];
        foreach ($modeles as $unmodele) {
            $tab[] = [
                'id' => $unmodele->getId(),
                'marque' => $unmodele->getMarque(),
                'nom' => $unmodele->getNom(),
                'carburant' => $unmodele->getCarburant(),
                'boiteVitesse' => $unmodele->getBoiteVitesse(),
                'image' => $unmodele->getImage(),
                'prixBase' => $unmodele->getPrixBase(),
                'cheveaux' => $unmodele->getCheveaux(),
                'ZeroCent' => $unmodele->getZeroCent(),
            ];
        }
        return new JsonResponse($tab);
    }
}
