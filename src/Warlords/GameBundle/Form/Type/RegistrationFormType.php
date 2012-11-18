<?php

namespace Warlords\GameBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends BaseType
{
      public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('username', null, array('label' => 'form.username', 
                    'translation_domain' => 'FOSUserBundle', 'error_bubbling' => true))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle', 'error_bubbling' => true),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => "The passwords don't match.",
            ))
            ->add('email', 'repeated', array(
                'type' => 'email',
                'options' => array('translation_domain' => 'FOSUserBundle', 'error_bubbling' => true),
                'first_options' => array('label' => 'form.email'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => "The email addresses don't match.",
            ))
            ->add('captcha', 'genemu_captcha',  array('property_path' => false));
    }

    public function getName()
    {
        return 'warlords_user_registration';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
   		$resolver->setDefaults(array('data_class' => 'Warlords\GameBundle\Entity\User'));
	}
}
