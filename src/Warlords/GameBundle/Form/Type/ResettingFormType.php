<?php

namespace Warlords\GameBundle\Form\Type;

use FOS\UserBundle\Form\Type\ResettingFormType as BaseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResettingFormType extends BaseType
{

     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FOS\UserBundle\Form\Model\ChangePassword',
            'intention'  => 'resetting',
        ));
    }

     public function getName()
    {
        return 'warlords_reset_password';
    }

}
