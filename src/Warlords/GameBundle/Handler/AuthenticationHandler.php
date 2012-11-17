<?php
namespace Warlords\GameBundle\Handler;

// Taken from: http://stackoverflow.com/questions/9057745/symfony2-how-to-go-back-to-referer-after-login-failure

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface, LogoutSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {       
        if ($request->isXmlHttpRequest()) {
            $result = array('success' => true);
            return new Response(json_encode($result));
        } else {
            // $referer = $request->headers->get('referer');  
            $referer = $request->getSession()->get('LAST_URI'); 
              
            if (substr_compare($referer, "/login", -strlen("/login"), strlen("/login")) === 0) {
               $referer = str_replace("/login", "/profile", $referer);
            }

            if (substr_compare($referer, "register/check-email", -strlen("register/check-email"), strlen("register/check-email")) === 0) {
               $referer = str_replace("register/check-email", "", $referer);
            }
            return new RedirectResponse($referer);
        }
    }
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {     
        if ($request->isXmlHttpRequest()) {
            $result = array('success' => false);
            return new Response(json_encode($result));
        } else {
            $referer = $request->headers->get('referer');  
            if (substr_compare($referer, "register/check-email", -strlen("register/check-email"), strlen("register/check-email")) === 0) {
               $referer = str_replace("register/check-email", "", $referer);
            }     
            $request->getSession()->setFlash('error', $exception->getMessage());
            return new RedirectResponse($referer);
        }
    }
    public function onLogoutSuccess(Request $request) 
    {
        $referer = $request->headers->get('referer');
       
        return new RedirectResponse($referer);
    }
}

?>
