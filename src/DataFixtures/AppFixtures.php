<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $formation = new Formation();
         $formation->setIntitule("DUT Informatique");
         $formation->setEtablissementAccueil("IUT de Bayonne et du Pays Basque");
         $formation->setNiveau("BAC+2");

         $entreprise = new Entreprise();
         $entreprise->setNom("Price Induction");
         $entreprise->setActivite("Aéronautique");
         $entreprise->setAdresse("Esplanade de l'Europe, 64600 Anglet");
         $entreprise->setTelephone("08.92.97.62.21");
         $entreprise->setUrl("https://www.societe.com/societe/price-induction-325131167.html");

         $stage = new Stage();
         $stage->setEntreprise($entreprise);
         $stage->addFormation($formation);
         $stage->setTitre("Refonte et mise à jour du site web de ProStage");
         $stage->setDomaine("web");
         $stage->setDescription("Etude du site existant - Prise en compte des mises à jour à effectuer");
         //$refonteProStage->setDuree("");
         $stage->setDateDebut("11-30-2020");
         $stage->setDateFin("12-11-2020");
         $stage->setEmail("john.doe@johndoe.com");
         

         $manager->persist($formation);
         $manager->persist($entreprise);    
         $manager->persist($stage);



        $manager->flush();
    }
}
