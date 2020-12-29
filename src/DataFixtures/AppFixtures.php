<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un générateur de données Faker en 'français'
         $faker = \Faker\Factory::create('fr_FR');


         // Génération de 15 lignes de données de test pour chaque entité
        for ($i = 0; $i < 15; $i++) 
        {
             $formation = new Formation();
             $formation->setIntitule($faker->randomElement($array = array ('DUT Informatique','DUT Techniques de commercialisation','DUT Génie industriel et Maintenance', 'LP Métiers du Numérique', 'LP Programmation Avancée', 'Master Informatique', 'Master Humanités Numériques', 'Master Développement Web')));
             // Génére une ville de formation
             $villeFormation = $faker->city;
             $typeEtablissementAccueil = $faker->randomElement($array = array ('IUT de ', 'Université de '));
             $formation->setEtablissementAccueil($typeEtablissementAccueil.$villeFormation);
             // Génére un numéro de niveau compris entre 2 et 5.
             $numeroNiveau = $faker->numberBetween($min = 1, $max = 5);
             $formation->setNiveau($faker->regexify('BAC\+'.$numeroNiveau));
             $formation->setVilleFormation($villeFormation);


             $entreprise = new Entreprise();
             $entreprise->setNom($faker->company);
             $entreprise->setActivite($faker->randomElement($array = array ('Aéronautique','Humanités Numériques','Banque / Assurance', 'Agroalimentaire', 'Electronique / Electricité', 'Industrie pharmaceutique', 'Transport/Logistique', 'Commerce')));
             $entreprise->setAdresse($faker->address);
             $entreprise->setTelephone($faker->phoneNumber);
             $entreprise->setUrl($faker->url);


             $stage = new Stage();
             $stage->setEntreprise($entreprise);
             $stage->addFormation($formation);
             $stage->setTitre($faker->jobTitle);
             $stage->setDomaine($faker->randomElement($array = array ('Programmation web','Réseaux','Maintenance informatique', 'Design web', 'Assembleur', 'Programmation bas-niveau', 'Génie Logiciel', 'Maquettage web')));
             $stage->setDescription($faker->realText($maxNbChars = 40, $indexSize = 2));
             //$dateDebut = new \Datetime ('30-11-2020'); // Variable qui permet de tester la différence avec la date de fin pour donner la valeur de la durée 
             //$dateFin = new \Datetime ('11-12-2020'); // Variable qui permet de tester la différence avec la date de début pour donne la valeur de la durée 
             //$dureeStage = $dateFin-$dateDebut; // Variable donnant la valeur de la différence entre dateDebut et dateFin
             //$stage->setDuree($dureeStage); 
             $stage->setDateDebut($faker->dateTime($max = 'now'));
             $stage->setDateFin($faker->dateTime($max = 'now'));
             $stage->setEmail($faker->companyEmail);
             

             // Enregistrement de la formation créée
             $manager->persist($formation);
             // Enregistrement de l'entreprise créée
             $manager->persist($entreprise);    
             // Enregistrement du stage créé
             $manager->persist($stage);
        }


         // Envoyer les données en base de données
        $manager->flush();
    }
}
