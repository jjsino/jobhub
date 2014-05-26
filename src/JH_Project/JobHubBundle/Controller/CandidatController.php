<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Candidat;
use JH_Project\JobHubBundle\Entity\Ville;
use JH_Project\JobHubBundle\Entity\Offre;
use JH_Project\JobHubBundle\Entity\OffreRepository;
use JH_Project\JobHubBundle\Form\CandidatType;

use JH_Project\JobHubBundle\Entity\Utilisateur;
use JH_Project\JobHubBundle\Controller\SecurityController;
use JH_Project\JobHubBundle\Controller\FormationController;


/**
 * Candidat controller.
 *
 * @Route("/candidat")
 */
class CandidatController extends SecurityController
{

   /**
	* @var Candidat
	*/
	protected $currentCandidat;
	
	
   /**
	* Get connected Entity Candidat 
	*
	* return Candidat $currentCandidat
	*
	*/
	public function getCurrentCandidat()
	{
		$em = $this->getDoctrine()->getManager();
		
		$loggedUser = parent::getLoggedUser();
		$this->currentCandidat = $em->getRepository('JobHubBundle:Candidat')->findOneBy(array('compteUser' => $loggedUser));		
		return $this->currentCandidat;
	}
	
    /**
     * page index de candidat
     *
     * @Route("/", name="job_hub_candidat")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    	$candidat = $this->getCurrentCandidat();
    	if ($candidat->check_info_base()){
			$ville = $candidat->getVille()->getNom();
			$repository = $this->getDoctrine()
		                               ->getManager()
		                               ->getRepository('JobHubBundle:Offre');
		                               
			$offres = $repository->searchOffre( '', $ville );
			return $this->render('JobHubBundle:Candidat:index.html.twig', array(
		                'offres' => $offres,
		                'candidat' => $candidat
		            ));
        }
        return $this->redirect($this->generateUrl('job_hub_candidat_show'));
    }
    
 
    /**
     * Finds and displays a Candidat entity.
     *
     * @Route("/profile", name="job_hub_candidat_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction()
    {
    	$candidat = $this -> getCurrentCandidat();
        if (!$candidat) {
            return $this -> redirect($this -> generateUrl('login'));
        }
        if(!$candidat->check_info_base()){
        	$form = $this->createEditForm($candidat)->createView();
        } else {
        	$form = null;
        }
        return array(
            'entity'      => $candidat,
            'edit_form'=> $form,
        );
        
    }

    /**
     * Displays a form to edit an existing Candidat entity.
     *
     * @Route("/profile/edit", name="job_hub_candidat_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction()
    {
        $candidat = $this -> getCurrentCandidat();
        if (!$candidat) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $editForm = $this->createEditForm($candidat);

        return array(
            'entity'      => $candidat,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Candidat entity.
    *
    * @param Candidat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Candidat $entity)
    {
        $form = $this->createForm(new CandidatType(), $entity, array(
            'action' => $this->generateUrl('job_hub_candidat_update'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }
    /**
     * Edits an existing Candidat entity.
     *
     * @Route("/profile/update", name="job_hub_candidat_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Candidat:edit.html.twig")
     */
    public function updateAction()
    {	
    	$candidat=$this->getCurrentCandidat();
        if (!$candidat) {
            return $this->redirect($this->generateUrl('login'));
        }
        	
		$editForm = $this->createEditForm($candidat);
		$request = $this->container->get('request');
        $editForm->handleRequest($request);
        //$errorList = $this->get('validator')->validate($candidat->photoProfil);
        
        if ($editForm->isValid()) {
        	$em = $this->getDoctrine()->getManager();
			$candidat->removePhotoProfil();
			$candidat->uploadPhotoProfil();	
			//TODO update niveau d'études
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_candidat_show'));
        }

        return array(
            'entity'      => $candidat,
            'edit_form'   => $editForm->createView(),
        );
    }
	

}
