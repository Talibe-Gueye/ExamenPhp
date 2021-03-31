<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(Request $request): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->flush();
            return $this->redirectToRoute('app_cv');

        }
        $form = $this->createForm(CvType::class, $cv);
        $data['form'] = $form->createView();
        return $this->render('cv/index.html.twig',$data);
    }
}
