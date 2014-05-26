<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Entreprise;
use JH_Project\JobHubBundle\Form\BackEnd\EntrepriseType;

/**
 * Entreprise controller.
 *
 * @Route("/administration/entreprise")
 */
class EntrepriseController extends Controller
{

    /**
     * Lists all Entreprise entities.
     *
     * @Route("/", name="administration_entreprise")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Entreprise')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Entreprise entity.
     *
     * @Route("/", name="administration_entreprise_create")
     * @Method("POST")
     * @Template("JobHubBundle:Entreprise:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Entreprise();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_entreprise_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
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
            'action' => $this->generateUrl('administration_entreprise_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Entreprise entity.
     *
     * @Route("/new", name="administration_entreprise_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Entreprise();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Entreprise entity.
     *
     * @Route("/{id}", name="administration_entreprise_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Entreprise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entreprise entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Entreprise entity.
     *
     * @Route("/{id}/edit", name="administration_entreprise_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Entreprise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entreprise entity.');
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
    * Creates a form to edit a Entreprise entity.
    *
    * @param Entreprise $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Entreprise $entity)
    {
        $form = $this->createForm(new EntrepriseType(), $entity, array(
            'action' => $this->generateUrl('administration_entreprise_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Entreprise entity.
     *
     * @Route("/{id}", name="administration_entreprise_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Entreprise:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Entreprise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entreprise entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_entreprise_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Entreprise entity.
     *
     * @Route("/{id}", name="administration_entreprise_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Entreprise')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Entreprise entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_entreprise'));
    }

    /**
     * Creates a form to delete a Entreprise entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_entreprise_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
