<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SelectPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            	/*->add('Skills',  'choice', array(
            		'choice' => array(
            			
            		),
            		'property_path' => false)
            	)*/
        
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Warlords\GameBundle\Entity\PlayerStats'
        ));
    }

    public function getName()
    {
        return 'warlords_gamebundle_selectplayertype';
    }
}
