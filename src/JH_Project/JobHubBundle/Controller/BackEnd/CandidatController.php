<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Candidat;
use JH_Project\JobHubBundle\Form\BackEnd\CandidatType;

/**
 * Candidat controller.
 *
 * @Route("/administration/candidat")
 */
class CandidatController extends Controller
{

    /**
     * Lists all Candidat entities.
     *
     * @Route("/", name="administration_candidat")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Candidat')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Candidat entity.
     *
     * @Route("/", name="administration_candidat_create")
     * @Method("POST")
     * @Template("JobHubBundle:Candidat:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Candidat();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_candidat_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Candidat entity.
    *
    * @param Candidat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Candidat $entity)
    {
        $form = $this->createForm(new CandidatType(), $entity, array(
            'action' => $this->generateUrl('administration_candidat_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Candidat entity.
     *
     * @Route("/new", name="administration_candidat_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Candidat();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Candidat entity.
     *
     * @Route("/{id}", name="administration_candidat_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Candidat entity.
     *
     * @Route("/{id}/edit", name="administration_candidat_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidat entity.');
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
    * Creates a form to edit a Candidat entity.
    *
    * @param Candidat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Candidat $entity)
    {
        $form = $this->createForm(new CandidatType(), $entity, array(
            'action' => $this->generateUrl('administration_candidat_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Candidat entity.
     *
     * @Route("/{id}", name="administration_candidat_update")
     * @Method("PUT")
     * @Template("JobHubBundle:Candidat:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Candidat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_candidat_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Candidat entity.
     *
     * @Route("/{id}", name="administration_candidat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Candidat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Candidat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_candidat'));
    }

    /**
     * Creates a form to delete a Candidat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_candidat_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
