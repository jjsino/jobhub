<?php

namespace JH_Project\JobHubBundle\Controller\BackEnd;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Offre;
use JH_Project\JobHubBundle\Form\BackEnd\OffreType;

/**
 * Offre controller.
 *
 * @Route("/administration/offre")
 */
class OffreController extends Controller
{

    /**
     * Lists all Offre entities.
     *
     * @Route("/", name="administration_offre_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JobHubBundle:Offre')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Offre entity.
     *
     * @Route("/", name="administration_offre_create")
     * @Method("POST")
     * @Template("JobHubBundle:BackEnd/Offre:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Offre();
        $entity->enabled = 1;
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administration_offre_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
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
            'action' => $this->generateUrl('administration_offre_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Offre entity.
     *
     * @Route("/new", name="administration_offre_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Offre();
        $entity->setMaj(getdate());
        $entity->enabled = 0;
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Offre entity.
     *
     * @Route("/{id}", name="administration_offre_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Offre entity.
     *
     * @Route("/{id}/edit", name="administration_offre_edit")
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
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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
            'action' => $this->generateUrl('administration_offre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Offre entity.
     *
     * @Route("/{id}", name="administration_offre_update")
     * @Method("PUT")
     * @Template("JobHubBundle:BackEnd/Offre:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administration_offre_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Offre entity.
     *
     * @Route("/{id}", name="administration_offre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JobHubBundle:Offre')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Offre entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administration_offre'));
    }

    /**
     * Creates a form to delete a Offre entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_offre_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
