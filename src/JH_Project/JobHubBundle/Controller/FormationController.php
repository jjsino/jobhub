<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Formation;
use JH_Project\JobHubBundle\Form\FormationType;

use JH_Project\JobHubBundle\Entity\Utilisateur;
use JH_Project\JobHubBundle\Controller\SecurityController;
/**
 * Formation controller.
 *
 * @Route("/candidat/profile/formation")
 */
class FormationController extends SecurityController
{
 /**
	* @var Candidat
	*/
	private $currentCandidat;
	
	
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
     * Lists all Formation entities.
     *
     * @Route("/", name="candidat_profile_formation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
        $entities = $em->getRepository('JobHubBundle:Formation')->findBy(array('candidat' => $this->getCurrentCandidat()));
        
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Formation entity.
     *
     * @Route("/", name="candidat_profile_formation_create")
     * @Method("POST")
     * @Template("JobHubBundle:Formation:new.html.twig")
     */
    public function createAction()
    {
    	$request = $this->getRequest();
        $entity = new Formation();
        $entity->setCandidat($this->getCurrentCandidat());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_candidat_show'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Formation entity.
    *
    * @param Formation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Formation $entity)
    {
        $form = $this->createForm(new FormationType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Formation entity.
     *
     * @Route("/new", name="candidat_profile_formation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Formation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Formation entity.
     *
     * @Route("/{id}", name="candidat_profile_formation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Formation')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' => $id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Formation entity.
     *
     * @Route("/{id}/edit", name="candidat_profile_formation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Formation')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' =>$id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Formation entity.
    *
    * @param Formation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Formation $entity)
    {
        $form = $this->createForm(new FormationType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }
    /**
     * Edits an existing Formation entity.
     *
     * @Route("/{id}", name="candidat_profile_formation_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Formation:edit.html.twig")
     */
    public function updateAction($id)
    {
        $request = $this -> getRequest();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JobHubBundle:Formation')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' =>$id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_candidat_show'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Formation entity.
     *
     * @Route("/{id}", name="candidat_profile_formation_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {	
    
        $em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('JobHubBundle:Formation');
		$repository->removeFormation($id);
        $em->flush();
    

        return $this->redirect($this->generateUrl('job_hub_candidat_show'));
    }
}
