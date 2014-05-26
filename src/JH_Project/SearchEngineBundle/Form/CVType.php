<?php

namespace JH_Project\SearchEngineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CVType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
        ;
    }
    
 /**
     * @param array $options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\CV',
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
        return 'jh_project_searchenginebbundle_cv';
    }
}
