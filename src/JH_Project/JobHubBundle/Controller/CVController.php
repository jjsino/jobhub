<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\CV;
use JH_Project\JobHubBundle\Form\CVType;

/**
 * CV controller.
 *
 * @Route("/cv")
 */
class CVController extends CandidatController
{

    /**
     * Lists all CV entities belonging to a candidat.
     *
     * @Route("/", name="candidat_cv")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {	
    	
        $em = $this->getDoctrine()->getManager();
        $candidat=parent::getCurrentCandidat();
        $entities = $em->getRepository('JobHubBundle:CV')->findBy(array('candidat' => $candidat, 'enabled'=>true));

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CV entity.
     *
     * @Route("/", name="job_hub_cv_create")
     * @Method("POST")
     * @Template("JobHubBundle:CV:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CV();        
        $entity->setCandidat(parent::getCurrentCandidat());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
    	$errorList = $this->get('validator')->validate($entity->file);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
			$entity->upload();			
            $em->flush();
            return $this->redirect($this->generateUrl('candidat_cv'));
        } else {
			// $form -> getErrorMessage?
			$errorMessage = 'Veuillez sélectionner un fichier du type "PDF"';
		}


        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'error' => $errorMessage,
        );
    }

    /**
    * Creates a form to create a CV entity.
    *
    * @param CV $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CV $entity)
    {
        $form = $this->createForm(new CVType(), $entity, array(
            'action' => $this->generateUrl('candidat_cv_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CV entity.
     *
     * @Route("/new", name="job_hub_cv_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CV();
        $form = $this->createForm(new CVType(), $entity);
        $form->add('submit', 'submit', array('label' => 'Create'));
        $form   = $this->createCreateForm($entity);
	
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'error' => null
        );
        

    }
	
    /**
     * Disable CV 
     *
     * @Route("/{id}", name="candidat_cv_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {    	
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('JobHubBundle:CV');
        $candidat=parent::getCurrentCandidat();
        $entity = $repository->findOneBy(array('candidat' => $candidat,'id' =>$id));
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CV entity.');
        }
		$entity->setEnabled(false);
		$em->flush();        

        return $this->redirect($this->generateUrl('candidat_cv'));
    }
    



   
   /* public function listAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('JobHubBundle:CV')->findAll();
    	$entity = new CV();
    	$entity->addAscendingOrderByColumn('rand()');
    	$results = TotoPeer::doSelect($entity);
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find CV entity.');
    	}
    	
    	return array(
    			'entity'      => $entity, 'results'    =>$results
    	);   
    } */

    

    /**
     * Finds and displays a Offre entity.
     *
     * @Route("/list", name="candidat_cv_list")
     * @Method("GET")
     * @Template()
     */
    public function listAction()
    {
    	$candidats = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Candidat')->findAll();
    	$em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('JobHubBundle:CV')
    	->findAllOrderedByDate();
    	
       // $em = $this->getDoctrine()->getManager();    	
    	//$entities = $em->getRepository('JobHubBundle:CV')->findAll()->getCVFromDate(new \DateTime('now'));
  
    	return $this->render('JobHubBundle:CV:list.html.twig', array('entities' => $entity));
    	 
    	
    }
}
