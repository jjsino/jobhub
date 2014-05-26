<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Experience;
use JH_Project\JobHubBundle\Form\ExperienceType;

use JH_Project\JobHubBundle\Entity\Utilisateur;
use JH_Project\JobHubBundle\Controller\SecurityController;

/**
 * Experience controller.
 *
 * @Route("/candidat/profile/experience")
 */
class ExperienceController extends SecurityController
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
     * Lists all Experience entities.
     *
     * @Route("/", name="candidat_profile_experience")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
    	
        $entities = $em->getRepository('JobHubBundle:Experience')->findBy(array('candidat' => $this->getCurrentCandidat()));
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Experience entity.
     *
     * @Route("/", name="candidat_profile_experience_create")
     * @Method("POST")
     * @Template("JobHubBundle:Experience:new.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $entity = new Experience();
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
    * Creates a form to create a Experience entity.
    *
    * @param Experience $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Experience entity.
     *
     * @Route("/new", name="candidat_profile_experience_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Experience();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Experience entity.
     *
     * @Route("/{id}", name="candidat_profile_experience_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Experience')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' =>$id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Experience entity.
     *
     * @Route("/{id}/edit", name="candidat_profile_experience_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Experience')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' =>$id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Experience entity.
    *
    * @param Experience $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }
    /**
     * Edits an existing Experience entity.
     *
     * @Route("/{id}", name="candidat_profile_experience_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Experience:edit.html.twig")
     */
    public function updateAction($id)
    {
    	$request = $this -> getRequest();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JobHubBundle:Experience')->findOneBy(array('candidat' => $this->getCurrentCandidat(), 'id' =>$id));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_candidat_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Experience entity.
     *
     * @Route("/{id}", name="candidat_profile_experience_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('JobHubBundle:Experience');	
            $repository->removeExperience($id);
            $em->flush();
        

        return $this->redirect($this->generateUrl('job_hub_candidat_show'));
    }
}
