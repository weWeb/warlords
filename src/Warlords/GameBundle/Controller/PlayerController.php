<?php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SelectPlayerType;
use Warlords\GameBundle\Form\BuySoldierType;
use DateTime;

/**
 * Search Player controller.
 */
class PlayerController extends Controller
{
   
	public function searchAction($player)
	{	
		
		$status = null;


            	
		return $this->render('WarlordsGameBundle:Player:search.html.twig',array(
			'player' => $player,
			'status' => $status, )
		);

	}
	
	/**
	 * Attack function from search page
	 * Redirect to actual attack page
	 * The form no fields yet. Might add skill choice later.
	 */
	 
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
	
	/**
	 * Render Result page function
	 */
	 
	public function resultAction()
	{
		return $this->render('WarlordsGameBundle:Player:result.html.twig');
	}

	/**
	 * Ally function that Add target into ally List
	 *
	 */
	public function allyAction($target_id)
	{
	
		
	    	$form = $this->createForm(new BuySoldierType(), NULL);
		$user = $this->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$requesting_ally = $em->getRepository('WarlordsGameBundle:User')
			->find($target_id);
			
		$myAllies = $user->getMyAllies();
        	foreach ( $myAllies as $ally){
        		if ($ally->getId() == $requesting_ally->getId()){
        		
				$serrors[] = $requesting_ally ." is already your Ally or waiting for approval.";
			    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
		    	        $returnArray['form'] = $form->createView();
			    	$returnArray += array(

				'target_id' => $target_id,
				'ally' => $requesting_ally,
				'serrors' => $serrors,
				);
			        return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
        		}
        	}
		$user->addAlly($requesting_ally);
	
		$em->persist($user);



		$em->flush();
	
	
		
		$serrors[] = "Request is sent to ".$requesting_ally . ".";
	    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
    	        $returnArray['form'] = $form->createView();
	    	$returnArray += array(

		'target_id' => $target_id,
		'ally' => $requesting_ally,
		'serrors' => $serrors,
		);
        	return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
		
		
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
