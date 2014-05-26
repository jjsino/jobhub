<?php

namespace JH_Project\JobHubBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Offre;
use JH_Project\JobHubBundle\Entity\Entreprise;
use JH_Project\JobHubBundle\Form\OffreType;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Offre controller.
 *
 * @Route("/offre")
 */
class OffreController extends Controller
{
    /**
     * Lists all Offre entities.
     *
     * @Route("/", name="job_hub_offre")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    	
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Offre')->findBy(array('enabled'=>true));

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Offre entity.
     *
     * @Route("/", name="job_hub_offre_create")
     * @Method("POST")
     * @Template("JobHubBundle:Offre:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Offre();
        $entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
        $entity->setEntreprise($entreprise);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_offre_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    public function disableAction($id)
    {
    	$entreprise =$this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
    	$em = $this->getDoctrine()->getManager();
    	$offre = $em->getRepository('JobHubBundle:Offre')->findOneBy(array('entreprise' => $entreprise, 'id' => $id));
    	
    	if(!$offre) 
    	{
    		return $this->createNotFoundException('Unable to find CV entity.');
    	}
    	
    	$offre->setEnabled(false);
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl('job_hub_entreprise_show'));	
    }

    public function enableAction($id)
    {
    	$entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
    	$em = $this->getDoctrine()->getManager();
    	$offre = $em->getRepository('JobHubBundle:Offre')->findOneBy(array('entreprise' => $entreprise, 'id' => $id));
    	
    	if(!$offre) 
    	{
    		return $this->createNotFoundException('Unable to find CV entity.');
    	}
    	
    	$offre->setEnabled(true);
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl('job_hub_entreprise_show'));	
    }
    
    /**
    * Creates a form to create a Offre entity.
    *
    * @param Offre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Offre $entity)
    {
        $form = $this->createForm(new OffreType(), $entity, array(
            'action' => $this->generateUrl('job_hub_offre_create'),
            'method' => 'POST',
        ));

        $form->add('btn-info', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Offre entity.
     *
     * @Route("/new", name="job_hub_offre_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Offre();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Offre entity.
     *
     * @Route("/{id}", name="job_hub_offre_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
    	$entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        return array(
            'entity'      => $entity,
            'entreprise'=>$entreprise
        );
    }

    /**
     * Displays a form to edit an existing Offre entity.
     *
     * @Route("/{id}/edit", name="job_hub_offre_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Offre entity.
    *
    * @param Offre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Offre $entity)
    {
        $form = $this->createForm(new OffreType(), $entity, array(
            'action' => $this->generateUrl('job_hub_offre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }
    /**
     * Edits an existing Offre entity.
     *
     * @Route("/{id}", name="job_hub_offre_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Offre:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
        	$entity->setMaj(new \DateTime ('now'));
            $em->flush();

            return $this->redirect($this->generateUrl('job_hub_offre_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
