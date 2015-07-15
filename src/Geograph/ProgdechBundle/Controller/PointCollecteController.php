<?php

namespace Geograph\ProgdechBundle\Controller;

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
        
        $marker = $this->get('geometrie_marker')
                ->setMarker("pointcollecte");
        $markeractif = $this->get('geometrie_marker')
			->setMarkerActif($marker);
        $markerinactif = $this->get('geometrie_marker')
			->setMarkerInactif($marker);

        $pointcollecte = $this->getDoctrine()
                ->getRepository('GeographProgdechBundle:PointCollecte')
                ->findOneById($pointcollecte_id);
        $pointcollecte->getBacs();
        $commune = $pointcollecte->getCommune();
        $user = $pointcollecte->getUser();
        
        return array(
                        'carte' => $carte,
                        'topolayer' => $topolayer,
                        'aeriallayer' => $aeriallayer,
                        'markeractif' => $markeractif,
                        'markerinactif' => $markerinactif,
                        'pointcollecte' => $pointcollecte,
                        'commune' => $commune,
                        'user' => $user
                    );
    }
}
