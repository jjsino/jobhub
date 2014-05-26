<?php

namespace JH_Project\JobHubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anneeDebut','datetime', array(
    			'widget' => 'single_text',
    			'format' => 'yyyy'))
            ->add('anneeFin','datetime', array(
				'widget' => 'single_text',
				'format' => 'yyyy'))
            ->add('libelleDiplome')
            ->add('etablissement')
            ->add('niveauEtudes', 'choice', array(
    			'choices' => array(
    			'< Bac' => '< Bac', 
    			'Bac' => 'Bac', 
    			'Bac+1' => 'Bac+1', 
    			'Bac+2' => 'Bac+2', 
    			'Bac+3' => 'Bac+3', 
    			'Bac+4' => 'Bac+4', 
    			'Bac+5' => 'Bac+5', 
    			'> Bac+5' => '> Bac+5')))
            ->add('diplomeObtenu', 'choice', array(
    			'choices' => array(true => 'Oui',false => 'Non')))
            ->add('description')
        ;

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Formation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_formation';
    }
}
