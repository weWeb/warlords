<?php
namespace Warlords\GameBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Warlords\GameBundle\Form\BuySoldierType;
use Warlords\GameBundle\Form\SendSoldierType;
use Warlords\GameBundle\Entity\Events;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;

class ProfileController extends BaseController{
    public function profileAction(){  	
    	//Create the form
    	$form = $this->createForm(new BuySoldierType(), NULL);
        $usr = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->container->get('doctrine')->getEntityManager();
        $handle = $this;
    	$returnArray = ProfileController::getUserProfile($usr, $em, $handle);
        $returnArray['form'] = $form->createView();
        return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
    }

    public static function getUserProfile($usr, $em, $handle) {
        $id = $usr->getID();
        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);

        if (!$playerstats) {
        	throw new NotFoundHttpException('Unable to find player.');
    	}
    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();

        $soldiers_cost = $handle->container->getParameter('cost_infantry');
        $knights_cost = $handle->container->getParameter('cost_knight');
        $calvary_cost = $handle->container->getParameter('cost_calvary');
    	
    	$attk = $soldiers*($handle->container->getParameter('attack_infantry')) +
                        $knights*($handle->container->getParameter('attack_knight')) +
                        $calvary*($handle->container->getParameter('attack_calvary'));
        $defn = $soldiers*($handle->container->getParameter('defense_infantry')) +
                        $knights*($handle->container->getParameter('defense_knight')) +
                        $calvary*($handle->container->getParameter('defense_calvary'));
        $upkeep = $soldiers*($handle->container->getParameter('upkeep_infantry')) +
                        $knights*($handle->container->getParameter('upkeep_knight')) +
                        $calvary*($handle->container->getParameter('upkeep_calvary'));
        return array(   'playerstats' => $playerstats,
                        'attack' => $attk,
                        'defense' => $defn,
                        'upkeep' => $upkeep,
                        'soldiers_cost' => $soldiers_cost,
                        'knights_cost' => $knights_cost,
                        'calvary_cost' => $calvary_cost,
                        'info'=>NULL
                        );
    }
    
    //===============================
    //VIEW PROFILE function
    //===============================
    
    public function profile_getAction($target_id){
        //$usr = $this->container->get('security.context')->getToken()->getUser();
        //$id = $usr->getID();
        
        $em = $this->container->get('doctrine')->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($target_id);
        $target_user=$em->getRepository('WarlordsGameBundle:User')->findOneById($target_id);
        
        if (!$playerstats) {
        	return $this->render('WarlordsGameBundle:Page:profile_get.html.twig', array(
                                'error' => "Cannot find this player."
                                ));
    	}
    	
        $playername = $target_user->getUsername();
        
        return $this->render('WarlordsGameBundle:Page:profile_get.html.twig', array(
                                'playerstats' => $playerstats,
                                'target_id' => $target_id,
                                'playername' => $playername
                                ));
    }
    
    //===============================
    //ATTACK function
    //===============================
    
    public function attackAction($target_id){
        //Inform player how resource and army gained and lost after fight.
        $info="";

        $usr = $this->container->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->container->get('doctrine')->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);
        

        if (!$playerstats) {
            throw new NotFoundHttpException('Unable to find you.');
    	}

        //player    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();
    	
        $playerattk = $soldiers*($this->container->getParameter('attack_infantry')) +
                        $knights*($this->container->getParameter('attack_knight')) +
                        $calvary*($this->container->getParameter('attack_calvary'));
        $playerdefn = $soldiers*($this->container->getParameter('defense_infantry')) +
                        $knights*($this->container->getParameter('defense_knight')) +
                        $calvary*($this->container->getParameter('defense_calvary'));
    	
    	if($id == $target_id)
        {
            $info = "You cannot attack yourself !";
            return $this->render('WarlordsGameBundle:Page:profile.html.twig', array(
                                'playerstats' => $playerstats,
                                'attack' => $playerattk,
                                'defense' => $playerdefn,
                                'info' => $info));
        }
        
        //No point executing the query if the player is trying to attack himself.
        
        $targetstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($target_id);
        
        if (!$targetstats) {
            throw new NotFoundHttpException('Unable to find target player.');
    	}
    	
    	//target
    	$soldiers2 = $targetstats->getInfantry();
    	$knights2 = $targetstats->getKnights();
    	$calvary2 = $targetstats->getCalvary();
    	
        $targetattk = $soldiers2*($this->container->getParameter('attack_infantry')) +
                        $knights2*($this->container->getParameter('attack_knight')) +
                        $calvary2*($this->container->getParameter('attack_calvary'));
        $targetdefn = $soldiers2*($this->container->getParameter('defense_infantry')) +
                        $knights2*($this->container->getParameter('defense_knight')) +
                        $calvary2*($this->container->getParameter('defense_calvary'));
    	
        //Combat
        $rand_percent = rand(1,5)/100;  //0.01 to 0.05
        $loss_ratio = 1-$rand_percent;  //0.95 to 0.99

        //Everyone loses soldiers

        $new_soldiers = (int)($soldiers*$loss_ratio);
        $soldiers_lost = $soldiers - $new_soldiers;

        $new_knights = (int)($knights*$loss_ratio);
        $knights_lost = $knights - $new_knights;

        $new_calvary = (int)($calvary*$loss_ratio);
        $calvary_lost = $calvary - $new_calvary;

        $playerstats->setInfantry($new_soldiers);
        $playerstats->setKnights($new_knights);
        $playerstats->setCalvary($new_calvary);
        
        $soldiers2 = (int)($soldiers2*$loss_ratio);
        $knights2 = (int)($knights2*$loss_ratio);
        $calvary2 = (int)($calvary2*$loss_ratio);
        
        $targetstats->setInfantry((int)$soldiers2);
        $targetstats->setKnights((int)$knights2);
        $targetstats->setCalvary((int)$calvary2);
        
        //Create Events
        
        $selfEvent = new Events();
        $targetEvent = new Events();

        $level = $playerstats->getLevel();
        $targetLevel = $targetstats->getLevel();
        $fame = $playerstats->getFame();
        
        if($playerattk > $targetdefn)
        {
            $info = "Attack is successful!";
            //Land gain
            $land = $targetstats->getLand();
            $diff = (int)($land*$rand_percent);
            $targetstats->setLand($land-$diff);
            $land_gained = $diff;
            
            $land = $playerstats->getLand();
            $playerstats->setLand($land+$diff);
            
            //Exp gain
            $exp = $playerstats->getExp();
            $exp = $exp+10;
            if($exp%200 == 0 && $level < 30)
            {
                $level = $level+1;
                $playerstats->setLevel($level);
            }
            $playerstats->setExp($exp);

            //Fame gain
            if(($level - $targetLevel) > 5)
            {
                $playerstats->setFame($fame-1);
            }
            else if($targetLevel > $level)
            {
                $playerstats->setFame($fame+2);
            }
            else
            {
                $playerstats->setFame($fame+1);   
            }

            //Gold gain
            $gold = $targetstats->getGold();
            $diff = (int)($gold*$rand_percent);
            $targetstats->setGold((int)($gold-$diff));
            $gold_gained = $diff;
            
            $gold = $playerstats->getGold();
            $playerstats->setGold((int)($gold+$diff));
            
            $selfEvent->setMessage("Your attack was successful and gained " . $land_gained . " land");
            $targetEvent->setMessage("You failed to defend and lost " . $land_gained . " land");
        }
        else
        {
            $info = "Attack has failed !";
            //Nothing is lost except army
            $gold_gained=0;
            $land_gained=0;
            $selfEvent->setMessage("Your attack failed");
            $targetEvent->setMessage("You defended successfully");
        }

        //Set Events

        $targetUser = $em->getRepository('WarlordsGameBundle:User')->findOneById($target_id);
        $timenow = new \DateTime("now");
        if($timenow == NULL)
        {
            throw new NotFoundHttpException('Timenow is null');
        }
        
        //Type 1 means user attacked
        $selfEvent->setEventType(1);
        $selfEvent->setUser2($targetUser);
        $selfEvent->setUser($usr);
        $selfEvent->setEventTime($timenow);

        $targetEvent->setUser($targetUser);
        $targetEvent->setUser2($usr);
        $targetEvent->setEventTime($timenow);
        //Type 2 means target defended
        $targetEvent->setEventType(2);
        

        
        //Save everything to DB
        
        $em->persist($playerstats);
        $em->persist($targetstats);
        $em->persist($selfEvent);
        $em->persist($targetEvent);
        $em->flush();
        
        return $this->render('WarlordsGameBundle:Page:attackSummary.html.twig', array(
                                'info' => $info,
                                'gold' => $gold_gained,
                                'land' => $land_gained,
                                'soldiers' => $soldiers_lost,
                                'knights' => $knights_lost,
                                'calvary' => $calvary_lost,
                                'target_id' => $target_id));
    }
    
    //===============================
    //BUY function
    //===============================
    
    public function buyAction(){
    	
    	$buys = null;
    	$buyk = null;
    	$buyc = null;
    	$cost = null;
    	$info = null;
	$form = $this->createForm(new BuySoldierType());
	$request = $this->container->get('request');
	if ($request->getMethod() == 'POST') {
		$form->bindRequest($request);

		if ($form->isValid()) {
       	 	// perform some action, such as saving the task to the database
                $usr = $this->container->get('security.context')->getToken()->getUser();
                $id = $usr->getID();
                
                $em = $this->container->get('doctrine')->getEntityManager();

                $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);
                
                if (!$playerstats) {
                    throw new NotFoundHttpException('Unable to find you.');
            	}
            	
            	$buys = $form["soldiers"]->getData();
            	$buyk = $form["knights"]->getData();
            	$buyc = $form["calvary"]->getData();
            	
            	//If user enters negative numbers
            	if($buys < 0 | $buyk < 0 | $buyc < 0)
            	{
            	    return $this->render('WarlordsGameBundle:Page:buyConfirm.html.twig', array(
            	                'berror'=>"You cannot sell soldiers !"
                                ));
            	}
            	
            	//Check Gold
            	$gold = $playerstats->getGold();
            	
            	$cost = $buys*50 + $buyk*200 + $buyc*500;

                $cost = $buys*($this->container->getParameter('cost_infantry')) +
                        $buyk*($this->container->getParameter('cost_knight')) +
                        $buyc*($this->container->getParameter('cost_calvary'));
            	
            	//bad form, bought nothing.
            	if($cost == 0)
            	{
            	

	  	        return $this->render('WarlordsGameBundle:Page:buyConfirm.html.twig', array(
            	                'berror'=>"Nothing is purchased."
                                ));
            	}
            	
            	if($cost > $gold)
            	{

            	    	return $this->render('WarlordsGameBundle:Page:buyConfirm.html.twig', array(
            	                'berror'=>"Insufficient Gold"
                                ));
            	}
            	
            	//adjust gold and army
            	
            	$gold = $gold - $cost;
            	$playerstats->setGold($gold);
            	
            	$soldiers = $playerstats->getInfantry();
    	        $soldiers = $soldiers + $buys;
    	        
    	        $knights = $playerstats->getKnights();
    	        $knights = $knights + $buyk;
    	        
    	        $calvary = $playerstats->getCalvary();
    	        $calvary = $calvary + $buyc;
    	        
    	        $playerstats->setInfantry($soldiers);
    	        $playerstats->setKnights($knights);
    	        $playerstats->setCalvary($calvary);
    	        
    	        $em->persist($playerstats);
    	        $em->flush();
    	        $info = "Success";

            }
        }
        return $this->render('WarlordsGameBundle:Page:buyConfirm.html.twig', array(
            	                'info'=> $info,
            	                'soldiers' => $buys,
            	                'knights' => $buyk,
            	                'calvary' => $buyc,
            	                'gold'    => $cost,
                                ));
    }
    
    
    	/**
    	 *  Ally List that shows all ally with current user	
    	 *
    	 */
	public function allyListAction() 
	{
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$em = $this->container->get('doctrine')->getEntityManager();

		
                $current_allies_id = $em->getRepository('WarlordsGameBundle:User')->getAllyConfirmed($user->getId());
		$current_allies = array();
                $requesting_allies_id = $em->getRepository('WarlordsGameBundle:User')->getAllyrequesting($user->getId());
		$requesting_allies = array();
                $waiting_allies_id = $em->getRepository('WarlordsGameBundle:User')->getAllyWaiting($user->getId());
		$waiting_allies = array();
		
                foreach ($current_allies_id as $ally_id){
                	$current_allies[] = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($ally_id);
                }
                
                foreach ($requesting_allies_id as $ally_id){
                	$requesting_allies[] = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($ally_id);
                }
                
                foreach ($waiting_allies_id as $ally_id){
                	$waiting_allies[] = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($ally_id);
                }


		return $this->render('WarlordsGameBundle:Page:allyList.html.twig', array(
			'current_allies' => $current_allies,
			'requesting_allies' => $requesting_allies,
			'waiting_allies' => $waiting_allies,

			)
	
		);

	}
	
	
	/**
	 * Confirm ally function
	 *
	 */
	public function allyConfirmAction($target_id, $choice) {
		$user = $this->container->get('security.context')->getToken()->getUser();
        	$em = $this->container->get('doctrine')->getEntityManager();
        	$waiting_ally = $em->getRepository('WarlordsGameBundle:User')->find($target_id);
        	$myAllies = $user->getMyAllies();
	    	$form = $this->createForm(new BuySoldierType(), NULL);
	    	
	    	// Check if the ally is already allied
        	foreach ( $myAllies as $ally){
        		if ($ally->getId() == $waiting_ally->getId()){
				$serrors[] = $waiting_ally ."is already your Ally";
			    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
		    	        $returnArray['form'] = $form->createView();
			    	$returnArray += array(

				'target_id' => $target_id,
				'ally' => $waiting_ally,
				'serrors' => $serrors,
				);
        			return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
        		}
        	}//else do the following to add it into DB
        	
        	if (!$choice) {
        	

        			$serrors[] = "You have rejected " . $waiting_ally . " invitation";
			    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
		    	        $returnArray['form'] = $form->createView();
			    	$returnArray += array(

				'target_id' => $target_id,
				'ally' => $waiting_ally,
				'serrors' => $serrors,
				);
				// Remove rejected user from waiting list
		        	$waiting_ally = $em->getRepository('WarlordsGameBundle:User')->removeAlly($user->getId(), $target_id);
        			return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
        	
        	}
        	$user->addAlly($waiting_ally);
		$em->persist($user);
		
		$em->flush();

        	$serrors[] = $waiting_ally . " is now your ally.";
	    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
    	        $returnArray['form'] = $form->createView();
	    	$returnArray += array(

			'target_id' => $target_id,
			'ally' => $waiting_ally,
			'serrors' => $serrors,
		);
	        return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
		
	}
	
	/**
	  * Send Soldiers to allies
	  */

	public function sendSoldiersAction($target_id){
		$serrors = array();
		$sendSoldiers = null;
		$sendKnights = null;
		$sendCalvary = null;
		// Get ally info
		$em = $this->container->get('doctrine')->getEntityManager();
		$ally = $em->getRepository('WarlordsGameBundle:PlayerStats')
			->findOneByUser($target_id);
		$form = $this->createForm(new SendSoldierType());
        	$request = $this->container->get('request');
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				// Get current user
				$user = $this->container->get('security.context')->getToken()->getUser();
				//$id = $usr->getID();

				$userStats = $user->getStats();
			    	$buyform = $this->createForm(new BuySoldierType(), NULL);
		
				if (!$userStats) {
				    throw new NotFoundHttpException('Unable to find you.');
			    	}
	    	
				$sendSoldiers = $form["soldiers"]->getData();
				$sendKnights = $form["knights"]->getData();
				$sendCalvary = $form["calvary"]->getData();
				// Assign value if null
				if (is_null($sendSoldiers)){
					$sendSoldiers = 0;
				}
				if (is_null($sendKnights)){
					$sendKnights = 0;				
				}
				if (is_null($sendCalvary)){
					$sendCalvary = 0;
				}
				
				
				// Positive Integer checker
	    			if ((!is_numeric($sendSoldiers) || !is_numeric($sendKnights) || !is_numeric($sendCalvary))
	    				|| (!is_int($sendSoldiers + 0) || !is_int($sendKnights + 0) || !is_int($sendCalvary + 0))
	    				|| (($sendSoldiers + 0 )< 0 || ($sendKnights + 0) < 0) || (($sendCalvary + 0) < 0)) {
	    					$serrors[] = "Value must be positive integer.";
    					    	$returnArray = ProfileController::getUserProfile($user, $em, $this);
				    	        $returnArray['form'] = $buyform->createView();
    					    	$returnArray += array(

							'target_id' => $target_id,
							'ally' => $ally,
							'serrors' => $serrors,
			        		);
	    	    			        return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
		    		}			
		    		// Convert to integer
	    			$sendSoldiers += 0;
	    			$sendKnights += 0;
	    			$sendCalvary += 0;

			    	if($sendSoldiers == 0 && $sendKnights == 0 && $sendCalvary == 0) {
			    		$serrors[] = "Please enter some positive integer that you want to send.";
				    	$returnArray = ProfileController::getUserProfile($user, $em, $this);        
				    	$returnArray['form'] = $buyform->createView();
				    	$returnArray += array(

						'target_id' => $target_id,
						'ally' => $ally,
						'serrors' => $serrors,
		        		);
    	    			        return $this->render('WarlordsGameBundle:Page:profile.html.twig', $returnArray);
			    	}
			    	

			    	
			

				
				// Adjust remaining army after all validations are passed.
				    	
			    	
			    	$soldiers = $userStats->getInfantry();
			    	if (($soldiers -= $sendSoldiers) <= 0 ){
			    		$serrors[] = "Your only have " . $userStats->getInfantry() . " soldiers, but you are sending " . $sendSoldiers . ".";
			    	}else{
					$userStats->setInfantry($soldiers);
			    		$ally->setInfantry($ally->getInfantry() + $sendSoldiers);
			    	}
			    	
			    	$knights = $userStats->getKnights();
			    	if (($knights -= $sendKnights) <= 0 ){
			    		$serrors[] = "Your only have " . $userStats->getKnights() . " knights, but you are sending " . $sendKnights . ".";
			    	}else{
					$userStats->setKnights($knights);
			    		$ally->setKnights($ally->getKnights() + $sendKnights);
			    	}
		
				$calvary = $userStats->getCalvary();
			    	if (($calvary -= $sendCalvary) <= 0 ){
			    		$serrors[] = "Your only have " . $userStats->getCalvary() . " calvary, but you are sending " . $sendCalvary . ".";
			    	}else{
					$userStats->setCalvary($calvary);
			    		$ally->setCalvary($ally->getCalvary() + $sendCalvary);
			    	}
			    	

				if(!$serrors) {
					$em->persist($userStats);
					$em->persist($ally);
			
					$em->flush();
					
					return $this->render('WarlordsGameBundle:Page:sendConfirm.html.twig', array(
						'ally' => $ally,
			    	                'soldiers' => $sendSoldiers,
			    	                'knights' => $sendKnights,
			    	                'calvary' => $sendCalvary,
			    	                'serrors' => $serrors,
				        ));

				}

			    }
		}
		return $this->render('WarlordsGameBundle:Page:sendSoldiers.html.twig', array(
				'form' => $form->createView(),
				'target_id' => $target_id,
				'ally' => $ally,
				'serrors' => $serrors,

		        ));
}


    public function createForm($type, $data = null, array $options = array())
    {
        return $this->container->get('form.factory')->create($type, $data, $options);
    }

    public function renderView($view, array $parameters = array())
    {
        return $this->container->get('templating')->render($view, $parameters);
    }

     public function render($view, array $parameters = array(), Response $response = null)
    {
        return $this->container->get('templating')->renderResponse($view, $parameters, $response);
    }
}
?>
