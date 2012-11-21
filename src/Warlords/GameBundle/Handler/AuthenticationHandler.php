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
            $referer = $this->modifyRedirectURL($referer);  
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
            $referer = $this->modifyRedirectURL($referer);  
            $request->getSession()->setFlash('error', $exception->getMessage());
            return new RedirectResponse($referer);
        }
    }
    public function onLogoutSuccess(Request $request) 
    {
        $referer = $request->headers->get('referer');
        $referer = $this->modifyRedirectURL($referer);
        return new RedirectResponse($referer);
    }

    public function modifyRedirectURL($url) {
        if (substr_compare($url, "/login", -strlen("/login"), strlen("/login")) === 0) {
           return str_replace("/login", "/profile", $url);
        } else if (substr_compare($url, "register/check-email", -strlen("register/check-email"), 
                strlen("register/check-email")) === 0) {
           return str_replace("register/check-email", "", $url);
        } else if (substr_compare($url, "resetting/send-email", -strlen("resetting/send-email"), 
                strlen("resetting/send-email")) === 0) {
           return str_replace("resetting/send-email", "resetting/request", $url);
        } else if (substr_compare($url, "resend/send-email", -strlen("resend/send-email"), 
                strlen("resend/send-email")) === 0) {
           return str_replace("resend/send-email", "resend/request", $url);
        } else {
            return $url;
        }
    }
}

?>
