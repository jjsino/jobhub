<?php

namespace JH_Project\JobHubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',array('label' => 'Login'))
            ->add('email','text',array('label' => 'Adresse E-mail'))
            ->add('plainPassword','password',array('label' => 'Mot de Passe'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Utilisateur'
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_inscription';
    }
}
