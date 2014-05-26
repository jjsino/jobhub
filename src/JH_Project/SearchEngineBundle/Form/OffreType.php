<?php

namespace JH_Project\SearchEngineBundle\Form;

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
    {
        $builder
            ->add('mot_cle','text',array('label' => 'Mot-clé'))
            ->add('lieu','text',array('label'=>'Lieu'))
        ;
    }
    
    /**
     * @param array $options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Offre',
            'intention' => 'search',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'validation_groups' => array('search_field')
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_searchenginebundle_offre';
    }
}
