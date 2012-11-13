<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SearchType;


class PageController extends Controller
{
    	public function indexAction()
    	{
        	return $this->render('WarlordsGameBundle:Page:index.html.twig');
    	}
    
    	public function playerAction()
    	{

		$players = NULL; 
		$search = NULL;  		
        	$em = $this->getDoctrine()->getEntityManager();

		$form = $this->createForm(new SearchType(), $search);

		$request = $this->getRequest();
    			if ($request->getMethod() == 'POST') {
        			$form->bindRequest($request);

        			if ($form->isValid()) {
            				$postData = $request->request->get('warlords_gamebundle_searchtype');
            				$type = $postData['search_player_type'];
            				$value = $postData['_'];
            				$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
                  				->getPlayerWithLevel($value);
            				print($type . ' ');
            				print($value);
            				
           				$this->render('WarlordsGameBundle:Page:player.html.twig', array('form' => $form->createView(),
						'players' => $players,
					));
        			}
   	 	}

            	
		return $this->render('WarlordsGameBundle:Page:player.html.twig', array('form' => $form->createView(),
			'players' => $players,
		));

    	}
    
    
}
