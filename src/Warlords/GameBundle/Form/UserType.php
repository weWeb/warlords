<?php
namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array('error_bubbling' => true));
		$builder->add('password', 'repeated', array(
           'first_name' => 'password',
           'second_name' => 'confirm',
           'type' => 'password', 
           'invalid_message' => "The passwords don't match.",
           'options' => array('error_bubbling' => true)));
        $builder->add('email', 'repeated', array(
           'first_name' => 'email',
           'second_name' => 'confirm',
           'type' => 'email',
           'invalid_message' => "The email addresses don't match.",
           'options' => array('error_bubbling' => true)));
    }

    public function getName()
    {
        return 'username';
    }

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
   		$resolver->setDefaults(array('validation_groups' => array('registration')));
	}
}
