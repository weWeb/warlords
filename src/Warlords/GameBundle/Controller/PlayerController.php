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
   
	public function searchAction($player)
	{
		



            	
		return $this->render('WarlordsGameBundle:Player:search.html.twig',array(
			'player' => $player,)
		);

	}
	public function attackAction($target_id)
	{
		
		
        	$em = $this->getDoctrine()->getEntityManager();
		$player = $em->getRepository("WarlordsGameBundle:PlayerStats")->findOneByUser($target_id);
		$form = $this->createForm(new SelectPlayerType());

		$request = $this->getRequest();
    			if ($request->getMethod() == 'POST') {
        			$form->bindRequest($request);

        			if ($form->isValid()) {
            				

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

	public function allyAction($target_id)
	{
	
		/*print("What the heck");
		$user = $this->getUser();
        	$em = $this->getDoctrine()->getEntityManager();
		$player = $em->getRepository('WarlordsGameBundle:User')
			->findOneById($target_id);
		$user->addAlly($player);
		
		$em->persist($user);
		$em->persist($player);

		$em->flush();
		
		$errors = array();
		$players= $user->getAlliesWithMe();
		foreach ($players as $play){
		
			print($play->getId());
		}
		*/
		$em = $this->getDoctrine()->getEntityManager();
		$player = $em->getRepository("WarlordsGameBundle:PlayerStats")->findOneByUser($target_id);
		return $this->render('WarlordsGameBundle:Player:ally.html.twig', array(
			'player' => $player,)
		
		);
		
		
		
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
