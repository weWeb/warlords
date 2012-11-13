<?php
namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array('label' => 'overview.marker.new.given_taken_email',
       'required' => true,));
		$builder->add('password', 'repeated', array(
           'first_name' => 'password',
           'second_name' => 'confirm',
           'type' => 'password'));
        $builder->add('email', 'repeated', array(
           'first_name' => 'email',
           'second_name' => 'confirm',
           'type' => 'email'));
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
