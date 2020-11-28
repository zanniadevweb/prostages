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
    public function index()
    {
        return new Response('<html><body><h1>Bienvenue sur la page d\'accueil de Prostages</h1></body></html>');
    }
	/**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises()
    {
        return new Response('<html><body><h1>Cette page affichera la liste des entreprises proposant un stage</h1></body></html>');
    }
}
