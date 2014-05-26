<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Candidature;
use JH_Project\JobHubBundle\Form\BackEnd\CandidatureType;

/**
 * Candidature controller.
 *
 * @Route("/administration/candidature")
 */
class CandidatureController extends Controller
{

    /**
     * Lists all Candidature entities.
     *
     * @Route("/", name="administration_candidature")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Candidature')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Candidature entity.
     *
     * @Route("/", name="administration_candidature_create")
     * @Method("POST")
     * @Template("JobHubBundle:Candidature:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Candidature();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_candidature_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Candidature entity.
    *
    * @param Candidature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Candidature $entity)
    {
        $form = $this->createForm(new CandidatureType(), $entity, array(
            'action' => $this->generateUrl('administration_candidature_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Candidature entity.
     *
     * @Route("/new", name="administration_candidature_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Candidature();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Candidature entity.
     *
     * @Route("/{id}", name="administration_candidature_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidature entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Candidature entity.
     *
     * @Route("/{id}/edit", name="administration_candidature_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidature entity.');
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
    * Creates a form to edit a Candidature entity.
    *
    * @param Candidature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Candidature $entity)
    {
        $form = $this->createForm(new CandidatureType(), $entity, array(
            'action' => $this->generateUrl('administration_candidature_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Candidature entity.
     *
     * @Route("/{id}", name="administration_candidature_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Candidature:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidature')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidature entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_candidature_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Candidature entity.
     *
     * @Route("/{id}", name="administration_candidature_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Candidature')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Candidature entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_candidature'));
    }

    /**
     * Creates a form to delete a Candidature entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_candidature_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
