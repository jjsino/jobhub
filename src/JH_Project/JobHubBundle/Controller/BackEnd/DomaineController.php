<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Domaine;
use JH_Project\JobHubBundle\Form\BackEnd\DomaineType;

/**
 * Domaine controller.
 *
 * @Route("/administration/domaine")
 */
class DomaineController extends Controller
{

    /**
     * Lists all Domaine entities.
     *
     * @Route("/", name="administration_domaine")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Domaine')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Domaine entity.
     *
     * @Route("/", name="administration_domaine_create")
     * @Method("POST")
     * @Template("JobHubBundle:Domaine:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Domaine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_domaine_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Domaine entity.
    *
    * @param Domaine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Domaine $entity)
    {
        $form = $this->createForm(new DomaineType(), $entity, array(
            'action' => $this->generateUrl('administration_domaine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Domaine entity.
     *
     * @Route("/new", name="administration_domaine_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Domaine();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Domaine entity.
     *
     * @Route("/{id}", name="administration_domaine_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Domaine entity.
     *
     * @Route("/{id}/edit", name="administration_domaine_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
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
    * Creates a form to edit a Domaine entity.
    *
    * @param Domaine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Domaine $entity)
    {
        $form = $this->createForm(new DomaineType(), $entity, array(
            'action' => $this->generateUrl('administration_domaine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Domaine entity.
     *
     * @Route("/{id}", name="administration_domaine_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Domaine:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Domaine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_domaine_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Domaine entity.
     *
     * @Route("/{id}", name="administration_domaine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Domaine')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Domaine entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_domaine'));
    }

    /**
     * Creates a form to delete a Domaine entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_domaine_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
