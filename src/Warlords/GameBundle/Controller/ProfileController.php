<?php
namespace Warlords\GameBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Warlords\GameBundle\Form\BuySoldierType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;

class ProfileController extends BaseController{
    public function profileAction(){
        $usr = $this->container->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->container->get('doctrine')->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);


        if (!$playerstats) {
        	throw new NotFoundHttpException('Unable to find player.');
    	}
    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();
    	
    	$attk = $soldiers + $knights*2 + $calvary*4;
    	$defn = $soldiers + $knights*3 + $calvary*3;
    	
    	//Create the form
    	$form = $this->createForm(new BuySoldierType(), NULL);
    	
        return $this->render('WarlordsGameBundle:Page:profile.html.twig', array(
                                'playerstats' => $playerstats,
                                'attack' => $attk,
                                'defense' => $defn,
                                'info'=>NULL,
                                'form' => $form->createView()
                                ));
    }
    
    public function profile_getAction($target_id){
        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($target_id);
        $selfstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);


        if (!$playerstats) {
        	throw new NotFoundHttpException('Unable to find player.');
    	}
    	if (!$selfstats) {
            throw new NotFoundHttpException('Unable to find target player.');
    	}
    	
    	$soldiers = $selfstats->getInfantry();
    	$knights = $selfstats->getKnights();
    	$calvary = $selfstats->getCalvary();
    	
    	$attk = $soldiers + $knights*2 + $calvary*4;
    	$defn = $soldiers + $knights*3 + $calvary*3;
        
        return $this->render('WarlordsGameBundle:Page:profile_get.html.twig', array(
                                'playerstats' => $playerstats,
                                'selfstats' => $selfstats,
                                'attack' => $attk,
                                'defense' => $defn,
                                'target_id' => $target_id
                                ));
    }
    
    public function attackAction($target_id){
        //Inform player how resource and army gained and lost after fight.
        $info="";

        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);
        

        if (!$playerstats) {
            throw new NotFoundHttpException('Unable to find you.');
    	}

        //player    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();
    	
    	$playerattk = $soldiers + $knights*2 + $calvary*4;
    	$playerdefn = $soldiers + $knights*3 + $calvary*3;
    	
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
    	
    	$targetattk = $soldiers2 + $knights2*2 + $calvary2*4;
    	$targetdefn = $soldiers2 + $knights2*3 + $calvary2*3;
    	
        //Combat
        $rand_percent = rand(1,5)/100;
        $loss_ratio = 1-$rand_percent;
        
        //Everyone loses soldiers
        (int)$soldiers =$soldiers*$loss_ratio;
        (int)$knights = $knights*$loss_ratio;
        (int)$calvary = $calvary*$loss_ratio;
        
        $playerstats->setInfantry((int)$soldiers);
        $playerstats->setKnights((int)$knights);
        $playerstats->setCalvary((int)$calvary);
        
        (int)$soldiers2 = $soldiers2*$loss_ratio;
        (int)$knights2 = $knights2*$loss_ratio;
        (int)$calvary2 = $calvary2*$loss_ratio;
        
        $targetstats->setInfantry((int)$soldiers2);
        $targetstats->setKnights((int)$knights2);
        $targetstats->setCalvary((int)$calvary2);
        
        if($playerattk > $targetdefn)
        {
            $info = "Attack is successful!";
            //Land gain
            $land = $targetstats->getLand();
            $diff = $land*$rand_percent;
            $targetstats->setLand($land-$diff);
            
            $land = $playerstats->getLand();
            $playerstats->setLand($land+$diff);
            
            //Gold gain
            (int)$gold = $targetstats->getGold();
            (int)$diff = $gold*$rand_percent;
            $targetstats->setGold((int)($gold-$diff));
            
            $gold = $playerstats->getGold();
            $playerstats->setGold((int)($gold+$diff));
        }
        else
        {
            $info = "Attack has failed !";
            //Nothing is lost except army
        }
        
        //Save everything to DB
        
        $em->persist($playerstats);
        $em->persist($targetstats);
        $em->flush();
        
        $playerattk = $soldiers + $knights*2 + $calvary*4;
    	$playerdefn = $soldiers + $knights*3 + $calvary*3;
        
        return $this->render('WarlordsGameBundle:Page:profile.html.twig', array(
                                'playerstats' => $playerstats,
                                'attack' => (int)$playerattk,
                                'defense' => (int)$playerdefn,
                                'info' => $info));
    }
    public function buyAction(){
        $form = $this->createForm(new BuySoldierType(), NULL);
        $request = $this->getRequest();
        
        if ($request->isMethod('POST')) {
            
            $form->bind($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database
                $usr = $this->get('security.context')->getToken()->getUser();
                $id = $usr->getID();
                
                $em = $this->getDoctrine()->getEntityManager();

                $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);
                
                if (!$playerstats) {
                    throw new NotFoundHttpException('Unable to find you.');
            	}
            	
            	$buys = $form["soldiers"]->getData();
            	$buyk = $form["knights"]->getData();
            	$buyc = $form["calvary"]->getData();
            	
            	//Check Gold
            	$gold = $playerstats->getGold();
            	
            	$cost = $buys*50 + $buyk*200 + $buyc*500;
            	
            	if($cost > $gold)
            	{
            	    $info = "Insufficient gold !";
            	    return $this->redirect($this->generateUrl('WarlordsGameBundle_profile'));
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

            }
        }
        return $this->redirect($this->generateUrl('WarlordsGameBundle_profile'));
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
