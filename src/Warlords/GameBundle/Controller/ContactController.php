<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\Contact;
use Warlords\GameBundle\Form\Type\ContactFormType;

class ContactController extends Controller
{
    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactFormType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact from Warlords')
                    ->setFrom('contact@warlords.com')
                    ->setTo($this->container->getParameter('warlords.emails.contact_email'))
                    ->setBody($this->renderView('WarlordsGameBundle:Page:contactEmail.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('contact-successful', 'The email was successfully sent. Thank you for contacting us. <br>The Warlords team will get back to you as soon as possible.');
                
                return $this->redirect($this->generateUrl('WarlordsGameBundle_contact'));
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
            return $this->render('WarlordsGameBundle:Page:contact.html.twig', array(
            'form' => $form->createView(),'errors' => $message));
        }

        return $this->render('WarlordsGameBundle:Page:contact.html.twig', array(
            'form' => $form->createView(), 'errors' => null
        ));
    }
}
