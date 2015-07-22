<?php
// src/Geograph/ProgdechBundle/Progdech/Progdech.php

namespace Geograph\ProgdechBundle\Progdech;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Progdech
{
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    
    // Affectations d'atributs à un objet commune
    public function setCommune($commune) {
        
        // Population actuelle connue de la commune
        $commune->setPopulationActuelle($this->getPopulationActuelle($commune->getPopulations()));
        // Nombre de points de collecte pour la commune
        $commune->setNombrePointsCollecte($this->getNbrPointsCollecteCommune($commune));
        // Nombre de bacs pour la commune
        $commune->setNombreBacs($this->getNbrBacsPointsCollecte($commune->getPointscollecte()));
        $commune->setSuperficie($this->setSuperficie($commune));
        // Densité pour la commune
        $commune->setDensite($this->setDensiteCommune($commune));
        
    }
    
    
    public function setCommunes($communes) {
        
        // Définir chaque commune
        foreach ($communes as $commune)
        {
            $this->setCommune($commune);
        }
        
    }
    // Affectations d'atributs à un objet pointcollecte
    public function setPointCollecte($pointcollecte){
        
        // Nombre de bacs pour le point d'apport
        $pointcollecte->setEmplacementsAffectes($this->getNbrBacsPointCollecte($pointcollecte));
    }
    
    public function getNbrPointsCollecteCommune($commune){
        $pointscollectes = $commune->getPointsCollecte();
        
        return count($pointscollectes);
    }
    
    public function getNbrBacsPointCollecte($pointcollecte){
        $bacs = $pointcollecte->getBacs();
        
        return count($bacs);
    }
    
    public function getNbrBacsPointsCollecte($pointscollecte){
        $nbrbacspointscollecte = 0;
        foreach ($pointscollecte as $pointcollecte)
        {
            $nbrbacspointcollecte = $this->getNbrBacsPointCollecte($pointcollecte);
            $nbrbacspointscollecte += $nbrbacspointcollecte;
        }
        
        return $nbrbacspointscollecte;
    }
    
    
    // Retourne la population pour l'année la plus recente
    public function getPopulationActuelle($populations){
        $derniere_statistique = 0;
        foreach ($populations as $population){
            $annee = $population->getAnnee();
            if ($annee > $derniere_statistique){
                $derniere_statistique = $annee;
                $derniere_population = $population->getNbre();
            }
        }
        return $derniere_population;
    }
    
    // Retourne la superficie d'une commune en km²
    public function setSuperficie($commune){
        return ($commune->getSuperficie() / 1000);
    }
    
    // Retourne la densité d'une commune
    public function setDensiteCommune($commune){
        return $densite = number_format($commune->getPopulationActuelle() / ($commune->getSuperficie()),2);
    }
}