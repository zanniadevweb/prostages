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
        // Récupérer le repositery de l'entité Stage
        $repositeryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les informations générales des stages enregistrés en BD
        $stages = $repositeryStage->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages ]);
    }


    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises() // La vue entreprises.html.twig affichera la liste des entreprises
    {
        // Récupérer le repositery de l'entité Entreprise
        $repositeryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les informations des entreprises enregistrées en BD
        $Entreprises = $repositeryEntreprise->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/entreprises.html.twig',
        [ 'entreprises' => $Entreprises ]);
    }


    /**
     * @Route("/entreprise/{id}/stages", name="prostages_entreprises_stage")
     */
    public function getByEntreprise($id) // La vue affichera la liste des stages proposés par une entreprise
    {
        // Récupérer le repositery de l'entité Entreprise
        $repositeryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les informations des stages enregistrés en BD
        $stages = $repositeryEntreprise->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages->getStages() ]);
    }


    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations() // La vue formations.html.twig affichera la liste des formations
    {
        // Récupérer le repositery de l'entité Formation
        $repositeryFormations = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les informations des formations enregistrées en BD
        $formations = $repositeryFormations->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/formations.html.twig',
        [ 'formations' => $formations ]);
    }


    /**
     * @Route("/formation/{id}/stages", name="prostages_formations_stage")
     */
    public function getByFormation($id) // La vue affichera la liste des stages proposés pour une formation
    {
        // Récupérer le repositery de l'entité Formation
        $repositeryFormation = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les informations des stages enregistrés en BD
        $stages = $repositeryFormation->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages->getStages() ]);
    }


    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages($id) // La vue stages.html.twig affichera la liste des stages
    {
        // Récupérer le repositery de l'entité Stage
        $repositeryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les informations détaillées des stages (par l'id) enregistrés en BD
        $stage = $repositeryStage->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/stages.html.twig',
        [ 'stage' => $stage ]);
    }
}