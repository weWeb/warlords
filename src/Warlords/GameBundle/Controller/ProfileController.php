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
                                'attack' => $attk, 'defense' => $defn));
    }
    
    public function profile_getAction($target_id){
        $id=$target_id;
        
        $em = $this->getDoctrine()->getEntityManager();

        $playerstats = $em->getRepository('WarlordsGameBundle:PlayerStats')->findOneByUser($id);


        if (!$playerstats) {
        	throw $this->createNotFoundException('Unable to find player.');
    	}
    	
    	$soldiers = $playerstats->getInfantry();
    	$knights = $playerstats->getKnights();
    	$calvary = $playerstats->getCalvary();
        
        return $this->render('WarlordsGameBundle:Page:profile_get.html.twig', array(
                                'playerstats' => $playerstats));
    }
}
?>
