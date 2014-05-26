<?php

namespace JH_Project\JobHubBundle\Form\BackEnd;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntrepriseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('password')
            ->add('nom')
            ->add('raisonSociale')
            ->add('contactEmail')
            ->add('adresse')
            ->add('telephone')
            ->add('fax')
            ->add('codePostal')
            ->add('siteWeb')
            ->add('logo')
            ->add('compteUser')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JH_Project\JobHubBundle\Entity\Entreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jh_project_jobhubbundle_entreprise';
    }
}
