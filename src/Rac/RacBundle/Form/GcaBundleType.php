<?php

namespace Rac\RacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GcaBundleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('identificationcard')
            ->add('mail', 'email')
            ->add('address')
            ->add('phone')
            ->add('photo', 'file')
            ->add('birthdate')
            ->add('annexed')
            ->add('eps')
            ->add('vehicle')
            ->add('commune')
            ->add('active')
            ->add('save', 'submit', array('label' => 'Register User'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rac\RacBundle\Entity\GcaBundle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gcabundle';
    }
}
