<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Pays;
use JH_Project\JobHubBundle\Form\BackEnd\PaysType;

/**
 * Pays controller.
 *
 * @Route("/administration/pays")
 */
class PaysController extends Controller
{

    /**
     * Lists all Pays entities.
     *
     * @Route("/", name="administration_pays")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Pays')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pays entity.
     *
     * @Route("/", name="administration_pays_create")
     * @Method("POST")
     * @Template("JobHubBundle:Pays:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pays();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_pays_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Pays entity.
    *
    * @param Pays $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pays $entity)
    {
        $form = $this->createForm(new PaysType(), $entity, array(
            'action' => $this->generateUrl('administration_pays_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pays entity.
     *
     * @Route("/new", name="administration_pays_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pays();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pays entity.
     *
     * @Route("/{id}", name="administration_pays_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pays entity.
     *
     * @Route("/{id}/edit", name="administration_pays_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
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
    * Creates a form to edit a Pays entity.
    *
    * @param Pays $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pays $entity)
    {
        $form = $this->createForm(new PaysType(), $entity, array(
            'action' => $this->generateUrl('administration_pays_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pays entity.
     *
     * @Route("/{id}", name="administration_pays_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Pays:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_pays_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pays entity.
     *
     * @Route("/{id}", name="administration_pays_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Pays')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pays entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_pays'));
    }

    /**
     * Creates a form to delete a Pays entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_pays_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
