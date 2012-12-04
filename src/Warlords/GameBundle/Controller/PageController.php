<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\PlayerStats;
use Warlords\GameBundle\Form\SearchType;
use Warlords\GameBundle\Entity\User;
use Warlords\GameBundle\Form\RegistrationFormType;
use DateTime;

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
            						if (is_numeric($value) && is_int($value + 0)){
            							$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  					->getPlayerByLevel($value);
							}else{
								$errors[] = "The value must be integer";
							}
				    			break;
            					case 'fame':
            						if (is_numeric($value) && is_int($value + 0)){
            							$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByFame($value);
					  		}else{
					  			$errors[] = "The value must be integer";
					  		}
					  		break;
				  		case 'land':
            						if (is_numeric($value)){
            							$players = $em->getRepository('WarlordsGameBundle:PlayerStats')
					  				->getPlayerByLand($value);
					  		}else{
					  			$errors[] = "The value must be numeric values";
					  		}
					  		break;
					  	case 'gold':
            						if (is_numeric($value) && is_int($value + 0)){
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


							$lastAccess = $player->getUser()->getLastAccess();


							// Update online status
							if ($lastAccess){
								$now = new DateTime();
								$diff = ($now->format('U') - $lastAccess->format('U'));

								if ($diff <= 300){
			
									$player->getUser()->setIsActive(true);
								
								}else {
									$player->getUser()->setIsActive(false);
								}

								
							}else{
								$player->getUser()->setIsActive(false);
							}
							$em->persist($player);
							$em->flush();
							
							// Exclude current user from the result
            						if ($player->getUser()->getId() == $user->getId()){
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
        $players = NULL;
        $em = $this->getDoctrine()->getEntityManager();
        $numresults = $this->container->getParameter('warlords.wealthboard.top');
        $repository = $em->getRepository('WarlordsGameBundle:PlayerStats');
        $query = $repository->createQueryBuilder('p')
            ->orderBy('p.gold', 'DESC')
            ->setMaxResults($numresults)
            ->getQuery();
            
        $players = $query->getResult();
        return $this->render('WarlordsGameBundle:Page:wealth.html.twig', array('players' => $players));
    }

    public function fameAction() {
        $players = NULL;
        $em = $this->getDoctrine()->getEntityManager();
        $numresults = $this->container->getParameter('warlords.fameboard.top');
        $repository = $em->getRepository('WarlordsGameBundle:PlayerStats');
        $query = $repository->createQueryBuilder('p')
            ->orderBy('p.fame', 'DESC')
            ->setMaxResults($numresults)
            ->getQuery();
            
        $players = $query->getResult();
        return $this->render('WarlordsGameBundle:Page:fame.html.twig', array('players' => $players));
    }

    public function eventsAction($quantity = 3) {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            $usr = $this->getUser();
            $em = $this->getDoctrine()->getEntityManager();

            $showmore = true;
            
            if($quantity > 3)
            {
                $showmore = false;
            }
            
            //Since this requires a join, SQL is used to select joined tables
            $query = 'SELECT user.username, events.user2_id, events.eventType, events.eventTime, events.message
            FROM user JOIN events ON
            (user.id = events.user2_id) OR (user.guild_id = events.guild_id) WHERE
            events.user_id = :userId OR events.guild_id=:guildId
            ORDER BY events.eventTime DESC LIMIT 0,' . $quantity .
            ';';

            $statement = $em->getConnection()->prepare($query);

            $statement->bindValue('userId', $usr->getId());
            $guild = $usr->getGuild();
            if($guild != null)
            {
                $statement->bindValue('guildId', $usr->getGuild()->getId());
            }else
            {
                $statement->bindValue('guildId', null);
            }
            $statement->execute();

            $results = $statement->fetchAll();
            return $this->render('WarlordsGameBundle:Page:events.html.twig', array(
            'events' => $results,
            'showmore' => $showmore
            ));
        }
        return $this->render('WarlordsGameBundle:Page:events.html.twig', array('events' => "", 'showmore' => false));
    }
}
