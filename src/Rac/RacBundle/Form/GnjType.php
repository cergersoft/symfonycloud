<?php

namespace Rac\RacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GnjType extends AbstractType
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
            ->add('birthdate')
            ->add('mail', 'email')
            ->add('address')
            ->add('phone')
            ->add('contactname')
            ->add('contactphone')
            ->add('annexed')
            ->add('eps')
            ->add('active')
            ->add('save', 'submit', array('label' => 'save Gnj'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rac\RacBundle\Entity\Gnj'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rac_racbundle_gnj';
    }
}
