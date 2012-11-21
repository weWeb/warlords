<?php

namespace Warlords\GameBundle\Form\Type;

use FOS\UserBundle\Form\Type\ChangePasswordFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraint\UserPassword;

class ChangePasswordFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('current_password', 'password', array(
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => new UserPassword(),
            'error_bubbling' => true
        ));
        $builder->add('new', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle', 'error_bubbling' => true),
            'first_options' => array('label' => 'form.new_password'),
            'second_options' => array('label' => 'form.new_password_confirmation'),
            'invalid_message' => "The passwords don't match.",
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FOS\UserBundle\Form\Model\ChangePassword',
            'intention'  => 'change_password',
        ));
    }

    public function getName()
    {
        return 'warlords_change_password';
    }


}
