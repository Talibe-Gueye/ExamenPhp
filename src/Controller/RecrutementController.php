<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecrutementController extends AbstractController
{
    #[Route('/recrutement', name: 'app_recrutement')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $data['offres'] = $em->getRepository(Offre::class)->findAll();
        return $this->render('recrutement/index.html.twig', $data);
    }

    #[Route('/Candidats/liste', name: 'app_liste_candidat')]
    public function listeOffre(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $data['candidats'] = $em->getRepository(Cv::class)->findAll();
        return $this->render('recrutement/candidat.html.twig', $data);
    }
}
