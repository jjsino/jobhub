<?php

namespace JH_Project\JobHubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CandidatType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sex','choice', 
            	array('choices' => array(
					'F' => 'Femme', 
					'H' => 'Homme', )))
            ->add('birthday','date', array('format' => 'yyyy-MM-dd'))
            ->add('telephone')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('sitePerso')
            /*->add('niveauEtudes', 'choice', 
            	array('choices' => array(
    			'< Bac' => '< Bac', 
    			'Bac' => 'Bac', 
    			'Bac+1' => 'Bac+1', 
    			'Bac+2' => 'Bac+2', 
    			'Bac+3' => 'Bac+3', 
    			'Bac+4' => 'Bac+4', 
    			'Bac+5' => 'Bac+5', 
    			'> Bac+5' => '> Bac+5')))*/
    			->add('photoProfil', 'file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Candidat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_candidat';
    }
}
