<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use App\Repository\StageRepository;


class ProstagesController extends AbstractController
{

    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(StageRepository $repositoryStage) // La vue index.html.twig affiche le message d'accueil  
    { 
        // Récupérer les informations générales des stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages ]);
    }


    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises(EntrepriseRepository $repositoryEntreprise) // La vue entreprises.html.twig affichera la liste des entreprises
    {
        // Récupérer les informations des entreprises enregistrées en BD
        $Entreprises = $repositoryEntreprise->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/entreprises.html.twig',
        [ 'entreprises' => $Entreprises ]);
    }


    /**
     * @Route("/entreprise/{id}/stages", name="prostages_entreprises_stage")
     */
    public function getByEntreprise(EntrepriseRepository $repositoryEntreprise, $id) // La vue affichera la liste des stages proposés par une entreprise
    {
        // Récupérer les informations des stages enregistrés en BD
        $stages = $repositoryEntreprise->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages->getStages() ]);
    }


    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations(FormationRepository $repositoryFormation) // La vue formations.html.twig affichera la liste des formations
    {
        // Récupérer les informations des formations enregistrées en BD
        $formations = $repositoryFormation->findAll();

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/formations.html.twig',
        [ 'formations' => $formations ]);
    }


    /**
     * @Route("/formation/{id}/stages", name="prostages_formations_stage")
     */
    public function getByFormation(FormationRepository $repositoryFormation, $id) // La vue affichera la liste des stages proposés pour une formation
    {
        // Récupérer les informations des stages enregistrés en BD
        $stages = $repositoryFormation->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig',
        [ 'stages' => $stages->getStages() ]);
    }


    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages(StageRepository $repositoryStage, $id) // La vue stages.html.twig affichera la liste des stages
    {
        // Récupérer les informations détaillées des stages (par l'id) enregistrés en BD
        $stage = $repositoryStage->find($id);

        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/stages.html.twig',
        [ 'stage' => $stage ]);
    }
}