<?php

namespace Rac\RacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class AssistanceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('observations')
            ->add('status')
            ->add('gcsa', 'entity', array(
                'class' => 'RacRacBundle:GcaBundle',
                'query_builder' => function (EntityRepository $er) {
                 return $er->createQueryBuilder('u')
                   ->where('u.active = :only')
                   ->setParameter('only', '1');
                },
                'choice_label' => 'firstname'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rac\RacBundle\Entity\Assistance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'assistance';
    }
}
