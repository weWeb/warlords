<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Controller\ChangePasswordController as BaseController;

class ChangePasswordController extends BaseController
{
    public function changePasswordAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.change_password.form');
        $formHandler = $this->container->get('fos_user.change_password.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('fos_user_success', 'change_password.flash.success');
            $url = $this->container->get('router')->generate("fos_user_change_password");
            $response = new RedirectResponse($url);
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

        return $this->container->get('templating')->renderResponse(
            'FOSUserBundle:ChangePassword:changePassword.html.'.$this->container->getParameter('fos_user.template.engine'),
            array('form' => $form->createView(), 'errors' => $message)
        );
    }
}
