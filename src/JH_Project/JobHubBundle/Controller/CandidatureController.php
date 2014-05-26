<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Candidature;
use JH_Project\JobHubBundle\Entity\Entreprise;
use JH_Project\JobHubBundle\Form\CandidatureType;
use JH_Project\JobHubBundle\Controller\CandidatController;

/**
 * Candidature controller.
 *
 * @Route("/candidature")
 */
class CandidatureController extends Controller
{
    /**
     * Lists Candidature entities for Candidat
     *
     * @Route("/", name="candidat_profile_candidature")
     * @Method("GET")
     * @Template()
     */
    public function index_candidatAction()
    {
    $candidat = $this->get('job_hub.candidat.controller')->getCurrentCandidat();
    $candidatures = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidature')
    			->findBy(array('candidat'=>$candidat));
    return $this -> render('JobHubBundle:Candidature:index_candidat.html.twig', array(
            'candidatures' => $candidatures,
            'candidat'   => $candidat
        ));
    }
    
    /**
     * Lists Candidature entities for Entreprise
     *
     * @Route("/", name="entreprise_profile_candidature")
     * @Method("GET")
     * @Template()
     */
    public function index_entrepriseAction()
    {
    $entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
    $repository = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidature');
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $candidatures = $repository->candidaturesEntreprise($entreprise->getId());
    return $this -> render('JobHubBundle:Candidature:index_entreprise.html.twig', array(
            'candidatures' => $candidatures,
            'entreprise'   => $entreprise
        ));
    }
    
    /**
     * Lists Candidature entities for Entreprise to a certain offer
     *
     * @Route("/", name="entreprise_profile_candidature")
     * @Method("GET")
     * @Template()
     */
    public function index_entreprise_offreAction($id_offre)
    {
    $entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
    $repository = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidature');
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $offre = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Offre')->find($id_offre);
    $candidatures = $repository->findBy(array('offre'=>$offre));
    return $this -> render('JobHubBundle:Candidature:index_entreprise_offre.html.twig', array(
            'candidatures' => $candidatures,
            'entreprise'   => $entreprise
        ));
    }
    /**
     * Lists Candidature entities for Candidat
     *
     * @Route("/{id}", name="candidat_profile_candidature_id")
     * @Method("GET")
     * @Template()
     */
    public function show_candidatAction($id)
    {
    $candidat = $this->get('job_hub.candidat.controller')->getCurrentCandidat();
    $candidature = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidature')
    			->findOneBy(array('candidat'=>$candidat,'id'=>$id));
    return $this -> render('JobHubBundle:Candidature:show_candidat.html.twig', array(
            'candidature' => $candidature
        ));
    }
    
    /**
     * Lists Candidature entities for entreprise
     *
     * @Route("/{id}", name="entreprise_profile_candidature_id")
     * @Method("GET")
     * @Template()
     */
    public function show_entrepriseAction($id)
    {
    $entreprise = $this->get('job_hub.entreprise.controller')->getCurrentEntreprise();
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $candidature = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidature')
    			->find($id);
    return $this -> render('JobHubBundle:Candidature:show_entreprise.html.twig', array(
            'candidature' => $candidature
        ));
    }

	//entreprise ignores the candidature
    public function ignoreAction($id)
    {
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $em = $this->getDoctrine()->getManager();
    $candidature = $em->getRepository('JobHubBundle:Candidature')
    			->find($id);
    $candidature -> setEtat(0);
    $em ->flush();
    return $this -> redirect($this->generateUrl('entreprise_profile_candidature'));
    }
 
	//entreprise save the candidature
    public function saveAction($id)
    {
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $em = $this->getDoctrine()->getManager();
    $candidature = $em->getRepository('JobHubBundle:Candidature')
    			->find($id);
    $candidature -> setEtat(2);
    $em ->flush();
    return $this -> redirect($this->generateUrl('entreprise_profile_candidature'));
    }       

	//entreprise save the candidature
    public function unsaveAction($id)
    {
    $candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    $em = $this->getDoctrine()->getManager();
    $candidature = $em->getRepository('JobHubBundle:Candidature')
    			->find($id);
    $candidature -> setEtat(1);
    $em ->flush();
    return $this -> redirect($this->generateUrl('entreprise_profile_candidature'));
    }      
    /**
     * Creates a new Candidature entity.
     *
     * @Route("/", name="candidature_create")
     * @Method("POST")
     * @Template("JobHubBundle:Candidature:new.html.twig")
     */
    public function createAction(Request $request,$id)
    {
        $entity = new Candidature();
        $form = $this->createCreateForm($entity, $id);
        
		$offre = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Offre')
    			->find($id);
    	$candidat = $this->get('job_hub.candidat.controller')->getCurrentCandidat();
    	
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity -> setOffre($offre);
            $entity -> setCandidat($candidat);
            $cv = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:CV')
    			->find($_POST['_cv']);
            $entity -> setCV($cv);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('candidat_profile_candidature'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'offre' => $offre
        );
    }

    /**
    * Creates a form to create a Candidature entity.
    *
    * @param Candidature $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Candidature $entity, $id)
    {
        $form = $this->createForm(new CandidatureType(), $entity, array(
            'action' => $this->generateUrl('job_hub_candidature_create', array('id' => $id)),
            'method' => 'POST',
        ));
		
        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new Candidature entity.
     *
     * @Route("/new", name="job_hub_offre_postuler")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {    	
    	//if logged Candidate
        $candidat = $this->get('job_hub.candidat.controller')->getCurrentCandidat();
    	$loggedUser = $this->get('job_hub.security.controller')->getLoggedUser();
    	if (!($candidat || $loggedUser)) 
    	{
    		//TODO Please sign in
    		return $this->redirect($this->generateUrl('job_hub_index'));
    	}
    	//if already candidated => redirect
        $entity = new Candidature();
        $list_cv = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:CV')
    			->findBy(array('candidat'=>$candidat, 'enabled'=>true));
        $form   = $this->createCreateForm($entity, $id);
		$offre = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Offre')
    			->find($id);
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'offre' => $offre,
            'candidat' => $candidat,
            'resumes' => $list_cv
        );
    }

    /**
     * Finds and displays a Candidature entity.
     *
     * @Route("/{id}", name="candidature_show")
     * @Method("GET")
     * @Template()
     */
   /* public function showAction($id)
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
    }*/
  
    /**
     * Deletes a Candidature entity.
     *
     * @Route("/{id}", name="candidature_delete")
     * @Method("DELETE")
     */
    /*public function deleteAction(Request $request, $id)
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

        return $this->redirect($this->generateUrl('candidature'));
    }*/

    /**
     * Creates a form to delete a Candidature entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    /*private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('candidature_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }*/
}
