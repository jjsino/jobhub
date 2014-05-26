<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Activite;
use JH_Project\JobHubBundle\Form\BackEnd\ActiviteType;

/**
 * Activite controller.
 *
 * @Route("/administration/activite")
 */
class ActiviteController extends Controller
{

    /**
     * Lists all Activite entities.
     *
     * @Route("/", name="administration_activite")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Activite')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Activite entity.
     *
     * @Route("/", name="administration_activite_create")
     * @Method("POST")
     * @Template("JobHubBundle:Activite:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Activite();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_activite_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Activite entity.
    *
    * @param Activite $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Activite $entity)
    {
        $form = $this->createForm(new ActiviteType(), $entity, array(
            'action' => $this->generateUrl('administration_activite_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Activite entity.
     *
     * @Route("/new", name="administration_activite_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Activite();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Activite entity.
     *
     * @Route("/{id}", name="administration_activite_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Activite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Activite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Activite entity.
     *
     * @Route("/{id}/edit", name="administration_activite_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Activite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Activite entity.');
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
    * Creates a form to edit a Activite entity.
    *
    * @param Activite $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Activite $entity)
    {
        $form = $this->createForm(new ActiviteType(), $entity, array(
            'action' => $this->generateUrl('administration_activite_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Activite entity.
     *
     * @Route("/{id}", name="administration_activite_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Activite:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Activite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Activite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_activite_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Activite entity.
     *
     * @Route("/{id}", name="administration_activite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Activite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Activite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_activite'));
    }

    /**
     * Creates a form to delete a Activite entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_activite_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
