<?php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;

/**
 * Search Player controller.
 */
class PlayerController extends Controller
{
   

	
    	protected function getPlayer($id)
    	{
        	$em = $this->getDoctrine()
                    	->getEntityManager();

        	$player = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);

        	if (!$player) {
            		throw $this->createNotFoundException('No such player.');
        	}

        	return $player;
    	}

}
?>
