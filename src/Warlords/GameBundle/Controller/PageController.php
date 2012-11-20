<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SearchType;
use Warlords\GameBundle\Entity\User;
use Warlords\GameBundle\Form\RegistrationFormType;

class PageController extends Controller
{
    	public function indexAction()
    	{
       	 		return $this->render('WarlordsGameBundle:Page:index.html.twig');
    	}
    
    	public function playerAction()
    	{

		$user = $this->getUser();
		$players = NULL; 
		$errors = NULL;
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
            						if (is_numeric($value) && is_int((int)$value)){
            							$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  					->getPlayerByLevel($value);
							}else{
								$errors[] = "The value must be integer";
							}
				    			break;
            					case 'fame':
            						if (is_numeric($value) && is_int((int)$value)){
            							$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByFame($value);
					  		}else{
					  			$errors[] = "The value must be integer";
					  		}
					  		break;
					  	case 'gold':
            						if (is_numeric($value) && is_int((int)$value)){
					  			$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByGold($value);
					  		}else{
					  			$errors[] = "The value must be integer";
					  		}
					  		break;
					  	case 'username':
					  	
					  		if (is_string($value)){
					  			if ($value == $user->getUsername()) {
					  				$errors[] = "You are searching yourself. You can view your stats in profile.";
					  			}else{
					  				$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  					->getPlayerByUsername($value);
					  			}
					  		}else{
					  			$errors[] = "The value must be string";
					  		}
					  		break;
					  	default:
					  		break;
            				}

            				if (!empty($players)){
            					foreach ($players as $key=>$player){
            						if ($player->getId() == $user->getId()){
            							unset($players[$key]);
            						}
            					}
            				}

           				$this->render('WarlordsGameBundle:Page:player.html.twig', array('form' => $form->createView(),
						'players' => $players,
						'errors' => $errors,
					));
        			}
   	 	}

            	
		return $this->render('WarlordsGameBundle:Page:player.html.twig', array('form' => $form->createView(),
			'players' => $players,
			'errors' => $errors,
		));

    	}

    private function getFormErrors($children) {
        foreach ($children as $child) {
            if ($child->hasErrors()) {
                $errors = $child->getErrors();
                foreach ($errors as $error) {
                    $this->allErrors[$vars["name"]][] = $this->convertFormErrorObjToString($error);
                    
                }
            }

            if ($child->hasChildren()) {
                $this->getAllErrors($child);
            }
        }
    }

    public function aboutAction() {
        return $this->render('WarlordsGameBundle:Page:about.html.twig');
    }

    public function guideAction() {
        return $this->render('WarlordsGameBundle:Page:guide.html.twig');
    }

    public function contactAction() {
        return $this->render('WarlordsGameBundle:Page:contact.html.twig');
    }

    public function wealthAction() {
        return $this->render('WarlordsGameBundle:Page:wealth.html.twig');
    }

    public function fameAction() {
        return $this->render('WarlordsGameBundle:Page:fame.html.twig');
    }
}
