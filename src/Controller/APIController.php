<?php

namespace App\Controller;

use App\Entity\LocationAvecChauffeur;
use App\Entity\LocationSansChauffeur;
use App\Entity\Modele;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/api/modele/{id}', methods: ['GET'])]
    public function apiModele(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        //on retourne le modèle de voiture correspondant à l'id dans un tableau Json
        $modele = $doctrine->getRepository(Modele::class)->find($id);
        $tab = [
            'id' => $modele->getId(),
            'marque' => $modele->getMarque(),
            'nom' => $modele->getNom(),
            'carburant' => $modele->getCarburant(),
            'boiteVitesse' => $modele->getBoiteVitesse(),
            'image' => $modele->getImage(),
            'prixBase' => $modele->getPrixBase(),
            'cheveaux' => $modele->getCheveaux(),
            'ZeroCent' => $modele->getZeroCent(),
        ];
        return new JsonResponse($tab);
    }
    #[Route('/api/locationsanschauffeur', name: 'app_api_location_sanschauffeur', methods: ['POST'])]
    public function apilocationsanschauffeur(Request $request, ManagerRegistry $doctrine)
    {
        $content = $request->getContent();
        if (!empty($content))
        {
            $postlocation = json_decode($content, true);
            $location = new LocationSansChauffeur();
            $client = $doctrine->getRepository(Client::class)->find($postlocation['idClient']);
            $location->setIdClient($client);
            $voiture = $doctrine->getRepository(Vehicule::class)->find($postlocation['idVehicule']);
            $location->setIdVehicule($voiture);
            $datedepart = new \DateTime($postlocation['dateDepart']);
            $location->setDateDepart($datedepart);
            $dateretour = new \DateTime($postlocation['dateRetour']);
            $location->setDateRetour($dateretour);
            $nbKmsRetour = $postlocation['nbKmsRetour'];
            $location->setNbKmsRetour($nbKmsRetour);
            $nbKmsDepart = $postlocation['nbKmsDepart'];
            $location->setNbKmsDepart($nbKmsDepart);
            $formule = $postlocation['idFormule'];
            $location->setIdFormule($formule);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($location);
            $entityManager->flush();
        }
        return new JsonResponse(Response::HTTP_CREATED);
    }
}
