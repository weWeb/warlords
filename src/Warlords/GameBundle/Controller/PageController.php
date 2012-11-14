<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\User;
use Warlords\GameBundle\Entity\Ally;
use Warlords\GameBundle\Form\UserType;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('WarlordsGameBundle:Page:index.html.twig');
    }
    
    public function playerAction()
    {
    	return $this->render('WarlordsGameBundle:Page:player.html.twig');
    }
    
    public function registrationAction()
    {
		$em = $this->getDoctrine()->getEntityManager();
		$form = $this->createForm(new UserType(), new User());
        $message = null;
		$request = $this->getRequest();
		if ($request->getMethod() == 'POST') {
		    $form->bindRequest($request);

		    if ($form->isValid()) {
				$user = $form->getData();
				$user->setIsActive(true); 
       			$em->persist($user);
        		$em->flush();
                $notice = 'A confirmation email has been sent to "' . $user->getEmail() . '"<br/>Click the verify email link in the email to complete registration.';
       			$this->get('session')->setFlash('registration-notice', $notice);
		        return $this->redirect($this->generateUrl('WarlordsGameBundle_registration'));
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
		}
    	return $this->render('WarlordsGameBundle:Page:registration.html.twig', array('form' => $form->createView(), 'errors' => $message));
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
}
