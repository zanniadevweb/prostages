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
        return $this->render('prostages/index.html.twig');
    }
	/**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function entreprises()
    {
        return $this->render('prostages/entreprises.html.twig');
    }
	/**
     * @Route("/formations", name="prostages_formations")
     */
    public function formations()
    {
        return new Response('<html><body><h1>Cette page affichera la liste des formations de l\'IUT</h1></body></html>');
    }
	/**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function stages($id)
    {
        return new Response("<html><body><h1>Cette page affichera le descriptif du stage ayant pour identifiant $id</h1></body></html>");
	}
}
