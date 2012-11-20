<?php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SelectPlayerType;

/**
 * Search Player controller.
 */
class PlayerController extends Controller
{
   

	public function attackAction($player)
	{
		

        	$em = $this->getDoctrine()->getEntityManager();

		$form = $this->createForm(new SelectPlayerType());

		$request = $this->getRequest();
    			if ($request->getMethod() == 'POST') {
        			$form->bindRequest($request);

        			if ($form->isValid()) {
            				
          				$target_id = $player->getUser()->getId();  				
           				return $this->render('WarlordsGameBundle:Player:result.html.twig', array('target_id' => $target_id,)
					);
        			}
   	 	}

            	
		return $this->render('WarlordsGameBundle:Player:attack.html.twig',array('form' => $form->createView(),
			'player' => $player,)
		);

	}
	
	
	public function resultAction()
	{
		return $this->render('WarlordsGameBundle:Player:result.html.twig');
	}

	
	
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
