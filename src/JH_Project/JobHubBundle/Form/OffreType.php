<?php

namespace JH_Project\JobHubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OffreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    /*1: CDI; 2: CDD; 3: Stage; 4:Apprentissage; 5:Temps Partiel; 6: Freelance*/
    	//* 1: SMIC; 2: 1500-2000; 3:2000-2500; 4:2500-3000; 5:3000-3500; 6:>3500
        $builder
            ->add('intitule','text',array('label' => 'Intitulé'))
            ->add('ville')
            ->add('typeContrat','choice', array(
    			'choices' => array(
    			'0' => '', 
    			'1' => 'CDI', 
    			'2' => 'CDD', 
    			'3' => 'Stage', 
    			'4' => 'Apprentissage', 
    			'5' => 'Temps Partiel', 
    			'6' => 'Freelance')))
            ->add('salaire','choice', array(
    			'choices' => array(
    			'0' => '', 
    			'1' => 'SMIC',
    			'2' => '1500€-2000€', 
    			'3' => '2000€-2500€', 
    			'4' => '2500€-3000€', 
    			'5' => '3000€-3500€', 
    			'6' => '>3500€')))
            ->add('activite')
            ->add('domaine')
            ->add('fonctionPoste','text',array('label' => 'Fonction'))
            ->add('description','textarea',array('label' => 'Description'))
        ;

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Offre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_offre';
    }
}
