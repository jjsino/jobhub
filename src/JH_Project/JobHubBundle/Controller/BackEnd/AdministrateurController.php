<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Administrateur;
use JH_Project\JobHubBundle\Form\BackEnd\AdministrateurType;

/**
 * Administrateur controller.
 *
 * @Route("/administration/administrateur")
 */
class AdministrateurController extends Controller
{
    /**
     * Lists all Administrateur entities.
     *
     * @Route("/", name="administration_administrateur")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Administrateur')->findAll();

        return $this->render(
	    'JobHubBundle:BackEnd/Administrateur:index.html.twig',
	    array('entities' => $entities)
	);

    }
    /**
     * Creates a new Administrateur entity.
     *
     * @Route("/", name="administration_administrateur_create")
     * @Method("POST")
     * @Template("JobHubBundle:BackEnd/Administrateur:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Administrateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_administrateur_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Administrateur entity.
    *
    * @param Administrateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Administrateur $entity)
    {
        $form = $this->createForm(new AdministrateurType(), $entity, array(
            'action' => $this->generateUrl('administration_administrateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Administrateur entity.
     *
     * @Route("/new", name="adminitration_administrateur_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Administrateur();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Administrateur entity.
     *
    * @Route("/{id}", name="administration_administrateur_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Administrateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Administrateur entity.
     *
     * @Route("/{id}/edit", name="administration_administrateur_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Administrateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Administrateur entity.
    *
    * @param Administrateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Administrateur $entity)
    {
        $form = $this->createForm(new AdministrateurType(), $entity, array(
            'action' => $this->generateUrl('administration_administrateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Administrateur entity.
     *
     * @Route("/{id}", name="administration_administrateur_update")
     * @Method("PUT")
     * @Template("JobHubBundle:BackEnd/Administrateur:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Administrateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Administrateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_administrtrateur_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Administrateur entity.
     *
     * @Route("/{id}", name="administration_administrtrateur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Administrateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Administrateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_administrateur'));
    }

    /**
     * Creates a form to delete a Administrateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_administrateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
