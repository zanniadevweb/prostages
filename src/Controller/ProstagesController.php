<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index() // La vue index.html.twig affiche le message d'accueil  
    { 
        $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages ]);
    }
    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises() // La vue entreprises.html.twig affichera la liste des entreprises
    {
        $entreprises = $this->getDoctrine()->getRepository(Entreprise::class)->findAll();
        return $this->render('prostages/entreprises.html.twig',
        [ 'entreprises' => $entreprises ]);
    }
    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations() // La vue formations.html.twig affichera la liste des formations
    {
        $formations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        return $this->render('prostages/formations.html.twig',
        [ 'formations' => $formations ]);
    }
    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages($id) // La vue stages.html.twig affichera la liste des stages
    {
        $stage = $this->getDoctrine()->getRepository(Stage::class)->find($id);
        return $this->render('prostages/stages.html.twig',
        [ 'stage' => $stage ]);
    }
}