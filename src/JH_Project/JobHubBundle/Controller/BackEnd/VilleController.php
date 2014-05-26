<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Ville;
use JH_Project\JobHubBundle\Form\BackEnd\VilleType;

/**
 * Ville controller.
 *
 * @Route("/administration/ville")
 */
class VilleController extends Controller
{

    /**
     * Lists all Ville entities.
     *
     * @Route("/", name="administration_ville")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Ville')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Ville entity.
     *
     * @Route("/", name="administration_ville_create")
     * @Method("POST")
     * @Template("JobHubBundle:Ville:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Ville();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_ville_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Ville entity.
    *
    * @param Ville $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Ville $entity)
    {
        $form = $this->createForm(new VilleType(), $entity, array(
            'action' => $this->generateUrl('administration_ville_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ville entity.
     *
     * @Route("/new", name="administration_ville_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ville();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Ville entity.
     *
     * @Route("/{id}", name="administration_ville_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Ville')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ville entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Ville entity.
     *
     * @Route("/{id}/edit", name="administration_ville_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Ville')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ville entity.');
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
    * Creates a form to edit a Ville entity.
    *
    * @param Ville $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ville $entity)
    {
        $form = $this->createForm(new VilleType(), $entity, array(
            'action' => $this->generateUrl('administration_ville_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ville entity.
     *
     * @Route("/{id}", name="administration_ville_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Ville:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Ville')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ville entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_ville_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Ville entity.
     *
     * @Route("/{id}", name="administration_ville_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Ville')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ville entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_ville'));
    }

    /**
     * Creates a form to delete a Ville entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_ville_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
