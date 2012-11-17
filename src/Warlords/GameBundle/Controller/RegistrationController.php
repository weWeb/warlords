<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Warlords\GameBundle\Entity\PlayerStats;

class RegistrationController extends BaseController
{
    public function registerAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();
            
            // Set up stats
            $em = $this->container->get('doctrine')->getEntityManager();
            $stats = new Playerstats();
		    $stats->setLevel(1);
            $stats->setExp(0);
            $stats->setSp(0);
		    $stats->setFame(0);
		    $stats->setLand(100);
		    $stats->setGold(100);
		    $stats->setInfantry(100);
		    $stats->setKnights(100);
		    $stats->setCalvary(100);
		    $stats->setUser($user); 
            $em->persist($stats);
            $em->flush();

            $authUser = false;
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        } else {
            $message = array();
        	foreach ($form->getErrors() as $error) {
                $message[] = $error->getMessage();
        	}
            $children = $form->getChildren();

            foreach ($children as $child) {
                if ($child->hasErrors()) {
                    foreach ($child->getErrors() as $error) {
                        $message[] = $error->getMessage();
                    }
                }
            }
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),'errors' => $message, 
        ));
    }

    public function checkUniqueAction() {
        $request = $this->container->get('request');  
        $checkField = $request->request->get("checkField");
        $checkValue = $request->request->get("checkValue");
        if (strcmp( $checkField, "username" ) == 0) { 
            $result = $this->container->get('doctrine')
            ->getEntityManager()
            ->getRepository('WarlordsGameBundle:User')
            ->findOneByUsername($checkValue);
        } else if (strcmp( $checkField, "email" ) == 0) {
            $result = $this->container->get('doctrine')
            ->getEntityManager()
            ->getRepository('WarlordsGameBundle:User')
            ->findOneByEmail($checkValue);
        } else {
            $result = null;
        }

        if (!$result) {
            $return = array("exist"=>0);
        } else {
            $return = array("exist"=>1);
        }
        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}
