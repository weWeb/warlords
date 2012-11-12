<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class ProfileController extends Controller{
    public function profileAction(){
        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);


        if (!$playerstats) {
        	throw $this->createNotFoundException('Unable to find player.');
    	}
    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();
    	
    	$attk = $soldiers + $knights*2 + $calvary*4;
    	$defn = $soldiers + $knights*3 + $calvary*3;
    	
        
        return $this->render('WarlordsGameBundle:Page:profile.html.twig', array(
                                'playerstats' => $playerstats,
                                'attack' => $attk,
                                'defense' => $defn,
                                'info'=>NULL));
    }
    
    public function profile_getAction($target_id){
        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($target_id);
        $selfstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);


        if (!$playerstats) {
        	throw $this->createNotFoundException('Unable to find player.');
    	}
    	if (!$selfstats) {
        	throw $this->createNotFoundException('Unable to find target player.');
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
                                'target_id' => $target_id,
                                'info'=>NULL));
    }
    
    public function attackAction($target_id){
        //Inform player how resource and army gained and lost after fight.
        $info="";

        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);
        

        if (!$playerstats) {
        	throw $this->createNotFoundException('Unable to find you.');
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
        	throw $this->createNotFoundException('Unable to find target player.');
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
        $soldiers =$soldiers*$loss_ratio;
        $knights = $knights*$loss_ratio;
        $calvary = $calvary*$loss_ratio;
        
        $playerstats->setInfantry($soldiers);
        $playerstats->setKnights($knights);
        $playerstats->setCalvary($calvary);
        
        $soldiers2 = $soldiers2*$loss_ratio;
        $knights2 = $knights2*$loss_ratio;
        $calvary2 = $calvary2*$loss_ratio;
        
        $targetstats->setInfantry($soldiers2);
        $targetstats->setKnights($knights2);
        $targetstats->setCalvary($calvary2);
        
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
            $targetstats->setGold($gold-$diff);
            
            $gold = $playerstats->getGold();
            $playerstats->setGold($gold+$diff);
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
}
?>
