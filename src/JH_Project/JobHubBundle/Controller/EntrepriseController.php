<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Entreprise;
use JH_Project\JobHubBundle\Form\EntrepriseType;

use JH_Project\JobHubBundle\Entity\Utilisateur;
use JH_Project\JobHubBundle\Controller\SecurityController;
/**
 * Entreprise controller.
 *
 * @Route("/entreprise")
 */
class EntrepriseController extends SecurityController
{
	/**
	 * @var Entreprise
	 */
	protected $currentEntreprise;
	
	/**
	 * Get connected Entity Entreprise
	 *
	 * @return Entreprise $currentEntreprise
	 *
	 */
	public function getCurrentEntreprise()
	{
		$em = $this->getDoctrine()->getManager();
		
		$loggedUser = parent::getLoggedUser();
		
		$this->currentEntreprise = $em->getRepository('JobHubBundle:Entreprise')->findOneBy(array('compteUser' => $loggedUser));
	
		return $this->currentEntreprise;
	}
	
    /**
    * Creates a form to create a Entreprise entity.
    *
    * @param Entreprise $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Entreprise $entity)
    {
        $form = $this->createForm(new EntrepriseType(), $entity, array(
            'action' => $this->generateUrl('job_hub_entreprise_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Finds and displays a Entreprise entity.
     *
     * @Route("/profile", name="job_hub_entreprise_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction()
    {   
    	$entreprise = $this->getCurrentEntreprise();
    	if (!$entreprise) {
    		return $this->redirect($this->generateUrl('login'));
    	}
    	
    	if(!$entreprise->check_info_base()){
        	$form = $this->createEditForm($entreprise)->createView();
        } else {
        	$form = null;
        }
        if(count($entreprise -> getOffres())==0){
        	$disabled_offers = null;
        	$enabled_offers = null;
        } else {
        	$disabled_offers = $this->getDoctrine()->getEntityManager()->getRepository('JobHubBundle:Offre')
        		->findBy(array('entreprise' => $entreprise, 'enabled' => false));
        	$enabled_offers = $this->getDoctrine()->getEntityManager()->getRepository('JobHubBundle:Offre')
        		->findBy(array('entreprise' => $entreprise, 'enabled' => true));
        }
        $offres = array(
        		'disabled_offers'=>$disabled_offers,
        		'enabled_offers'=>$enabled_offers);
    	return array(
    			'entity' => $entreprise,
    			'edit_form' => $form,
    			'enabled_offers'=>$enabled_offers,
    			'disabled_offers'=>$disabled_offers,
    			//'offres' => $offres
    	);
    }

    /**
     * Displays a form to edit an existing Entreprise entity.
     *
     * @Route("/profile/edit", name="job_hub_entreprise_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction()
    {
    	$entreprise = $this->getCurrentEntreprise(); 
    	if (!$entreprise) {
    		throw $this->createNotFoundException('Unable to find Entreprise entity.');
    	}
    	$editForm = $this->createEditForm($entreprise);
    	return array(
    			'entity'      => $entreprise,
    			'edit_form'   => $editForm->createView(),
    	);
    }

    
    
    
    /**
    * Creates a form to edit a Entreprise entity.
    *
    * @param Entreprise $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Entreprise $entity)
    {
        $form = $this->createForm(new EntrepriseType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Sauvegarder les modifications'));

        return $form;
    }
    /**
     * Edits an existing Entreprise entity.
     *
     * @Route("/profile/update", name="job_hub_entreprise_update")
     * @Method("POST")
     * @Template("JobHubBundle:Entreprise:edit.html.twig")
     */
    public function updateAction()
    {            
            
    	$entreprise=$this->getCurrentEntreprise();
    	if (!$entreprise) {
    		return $this->redirect($this->generateUrl('login'));
    	}
        	
    	$editForm = $this->createEditForm($entreprise);
    	$request = $this->container->get('request');
    	$editForm->handleRequest($request);
    
    	if ($editForm->isValid()) {
    		$em = $this->getDoctrine()->getManager();
			$entreprise->removeLogo();
			$entreprise->uploadLogo();	
    		$em->flush();    
    		return $this->redirect($this->generateUrl('job_hub_entreprise_show'));
    	}
    
    	return array(
    			'entity'      => $entity,
    			'edit_form'   => $editForm->createView(),
    	);
    }
    
}
