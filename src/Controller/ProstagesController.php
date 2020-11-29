<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index() // La vue index.html.twig affiche le message d'accueil  
    { 
        return $this->render('prostages/index.html.twig');
    }
	/**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises() // La vue entreprises.html.twig affichera la liste des entreprises
    {
        return $this->render('prostages/entreprises.html.twig');
    }
	/**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations() // La vue formations.html.twig affichera la liste des formations
    {
        return $this->render('prostages/formations.html.twig');
    }
	/**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages($id) // La vue stages.html.twig affichera la liste des stages
    {
        return $this->render('prostages/stages.html.twig',
		[ 'id_stages' => $id]);
	}
}
