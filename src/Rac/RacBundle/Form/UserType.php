<?php

namespace Rac\RacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fristname')
            ->add('lastname')
            ->add('username')
            ->add('mail', 'email')
            ->add('password', 'password')
            ->add('role', 'choice', array('choices' => array('ROLE_ADMIN' => 'Administrator', 'ROLE_USER' => 'User'), 'placeholder' => 'Select a Role' ))
            ->add('active', 'checkbox')
            ->add('save', 'submit', array('label' => 'save User'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rac\RacBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}