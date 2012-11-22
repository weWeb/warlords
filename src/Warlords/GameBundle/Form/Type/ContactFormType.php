<?php
namespace Warlords\GameBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', null, array('label' => 'form.contact_name', 'error_bubbling' => true) );
        $builder->add('email', 'email', array('label' => 'form.contact_email', 'error_bubbling' => true));
        $builder->add('subject', null, array('label' => 'form.subject', 'error_bubbling' => true));
        $builder->add('body', 'textarea', array('label' => 'form.body', 'error_bubbling' => true));
        $builder->add('captcha', 'genemu_captcha',  array('property_path' => false));
    }

    public function getName()
    {
        return 'warlords_contact_us';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Warlords\GameBundle\Entity\Contact',
            'validation_groups'  => 'Contact',
        ));
    }
}
