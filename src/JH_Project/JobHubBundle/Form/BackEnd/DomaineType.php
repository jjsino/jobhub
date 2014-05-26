<?php

namespace JH_Project\JobHubBundle\Form\BackEnd;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DomaineType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Domaine'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_domaine';
    }
}
