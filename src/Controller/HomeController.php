<?php

namespace App\Controller;

use App\Entity\Modele;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    //Si l'utilisateur n'est pas connecté on le redirige vers le SessionController pour le connecter
    public function index(): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }
        //Si l'utilisateur est connecté depuis moins d'une heure, on le redirige vers le dashboard
        return $this->redirectToRoute('app_reservation',['id' => $this->getUser()]
        );
    }
    #[Route('/reservation', name: 'app_reservation')]
    public function reserver(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        //on récupère tous les modèles 
        $modeles = $doctrine->getRepository(Modele::class)->findAll();
        //on retourne la vue avec les modèles
        dump($modeles);
        return $this->render('home/reservation.html.twig', [
            'modeles' => $modeles,
        ]);
    }
}
