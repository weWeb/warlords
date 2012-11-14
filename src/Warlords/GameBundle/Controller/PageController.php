<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SearchType;
use Warlords\GameBundle\Entity\User;
use Warlords\GameBundle\Form\UserType;

class PageController extends Controller
{
    	public function indexAction()
    	{
       	 		return $this->render('WarlordsGameBundle:Page:index.html.twig');
    	}
    
    	public function playerAction()
    	{

		$players = NULL; 
		//$search = NULL;  		
        	$em = $this->getDoctrine()->getEntityManager();

		$form = $this->createForm(new SearchType());

		$request = $this->getRequest();
    			if ($request->getMethod() == 'POST') {
        			$form->bindRequest($request);

        			if ($form->isValid()) {
            				$postData = $request->request->get('warlords_gamebundle_searchtype');
            				$type = $postData['search_by'];
            				$value = $postData['value'];
            				switch($type) {
            					case 'level':
            						$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByLevel($value);
				    			break;
            					case 'fame':
            						$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByFame($value);
					  		break;
					  	case 'gold':
					  		$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByGold($value);
					  		break;
					  	default:
					  		break;
            				}
            				
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
    
    
    public function registrationAction()
    {
		$em = $this->getDoctrine()->getEntityManager();
		$form = $this->createForm(new UserType(), new User());

		$request = $this->getRequest();
		if ($request->getMethod() == 'POST') {
		    $form->bindRequest($request);

		    if ($form->isValid()) {
				$user = $form->getData();
				$user->setIsActive(true); 
       			$em->persist($user);
        		$em->flush();

       			$this->get('session')->setFlash('registration-notice', 'Registration Completed. You will automatically be logged in!');
		        return $this->redirect($this->generateUrl('WarlordsGameBundle_registration'));
		    }
		}
    	return $this->render('WarlordsGameBundle:Page:registration.html.twig', array('form' => $form->createView()));
    }
}
