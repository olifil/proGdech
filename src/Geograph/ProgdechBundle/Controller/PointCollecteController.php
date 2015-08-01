<?php

namespace Geograph\ProgdechBundle\Controller;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PointCollecteController extends Controller
{

    /**
     * PointCollecte home page controller.
     *
     * @Route("/admin/pointcollecte/{pointcollecte_id}", requirements={"pointcollecte_id" = "\d+"}, name="pointcollecte")
     * @Template("GeographProgdechBundle:Backend:pointcollecte.html.twig");
     */
    
    public function pointcollecteAction($pointcollecte_id) {
	$carte = $this->get('geometrie_carte')
                ->setMap();
        $topolayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(1);
        $aeriallayer = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:FondCarte')
                ->findOneById(4);
        
        $pointCollecte = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:PointCollecte')
                ->findOneById($pointcollecte_id);
        
        
        
        $commune = $pointCollecte->getCommune();
        $pointsCollecte = $commune->getPointsCollecte();
        
        $repository = $this->getDoctrine()->getRepository('GeographProgdechBundle:Typeflux');
        $types = $repository->getTypeFluxDistinctPointcollecte($pointcollecte_id);
        $pointCollecte->setTypesBacs($types);        
        
        
        $this->get('geograph_progdech')
                ->setPointCollecte($pointCollecte);
        
        $markerDao = $this->get('geometrie_marker');
        
        $markerDao->assignMarkerToPointsCollecte($pointsCollecte);
        
        $pointCollecte->marker->setActif(true);
        return array(
            'carte' => $carte,
            'topolayer' => $topolayer,
            'aeriallayer' => $aeriallayer,
            'actif_pointcollecte' => $pointCollecte,
            'commune' =>$commune
        );
    }
}
