<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;

class ResendConfirmationController extends ContainerAware
{
    const SESSION_EMAIL = 'WarlordsGameBundle_ResendConfirmation/email';

    /**
     * Request resend user email: show form
     */
    public function requestAction()
    {
        return $this->container->get('templating')->renderResponse('WarlordsGameBundle:Resend:request.html.'.$this->getEngine());
    }

    /**
     * Request resend user email: submit form and send email
     */
    public function sendEmailAction()
    {
        $email = $this->container->get('request')->request->get('email');

        /** @var $user UserInterface */
        $user = $this->container->get('fos_user.user_manager')->findUserByEmail($email);

        if (null === $user) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resend:request.html.'.$this->getEngine(), array('invalid_email' => $email));
        }

        if ($user->isEnabled()) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resend:request.html.'.$this->getEngine(), array('invalid_resend' => $email));
        }

        $tokenGenerator = $this->container->get('fos_user.util.token_generator');
        $user->setConfirmationToken($tokenGenerator->generateToken());
        $this->container->get('session')->set(static::SESSION_EMAIL, $this->getObfuscatedEmail($user));
        $this->container->get('fos_user.mailer')->sendConfirmationEmailMessage($user);
        $this->container->get('fos_user.user_manager')->updateUser($user);

        return new RedirectResponse($this->container->get('router')->generate('WarlordsGameBundle_CheckEmail'));
    }

    /**
     * Tell the user to check his email provider
     */
    public function checkEmailAction()
    {
        $session = $this->container->get('session');
        $email = $session->get(static::SESSION_EMAIL);
        $session->remove(static::SESSION_EMAIL);

        if (empty($email)) {
            // the user does not come from the sendEmail action
            return new RedirectResponse($this->container->get('router')->generate('WarlordsGameBundle_RequestResendConfirmation'));
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Resend:checkEmail.html.'.$this->getEngine(), array(
            'email' => $email,
        ));
    }

    protected function getObfuscatedEmail(UserInterface $user)
    {
        $email = $user->getEmail();
        if (false !== $pos = strpos($email, '@')) {
            $email = '...' . substr($email, $pos);
        }

        return $email;
    }

    protected function getEngine()
    {
        return $this->container->getParameter('fos_user.template.engine');
    }
}
