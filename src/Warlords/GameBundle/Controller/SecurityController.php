<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends BaseController
{
     public function loginAction($embedded = false)
    {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session */

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');
        
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') && $embedded)
        {
            $usr = $this->container->get('security.context')->getToken()->getUser();        
            $em = $this->container->get('doctrine')->getEntityManager();
            $handle = $this;
            $template = sprintf('WarlordsGameBundle:Page:profile_embedded.html.twig');
            return $this->container->get('templating')->renderResponse($template, ProfileController::getUserProfile($usr, $em, $handle));           
        } 

        // For AJAX; figure out later
        // $return=json_encode(array("responseCode"=>200,  "greeting"=>"ello"));
        // return new Response($return,200,array('Content-Type'=>'application/json'));
        
        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
            'embedded' => $embedded,
        ));
    }

    protected function renderLogin(array $data)
    {  
        if ($data['embedded']) {
            $template = sprintf('FOSUserBundle:Security:login_embedded.html.%s', $this->container->getParameter('fos_user.template.engine'));
                
        } else { 
            $template = sprintf('FOSUserBundle:Security:login.html.%s', $this->container->getParameter('fos_user.template.engine'));
        }
        
        return $this->container->get('templating')->renderResponse($template, $data);
    }
}
