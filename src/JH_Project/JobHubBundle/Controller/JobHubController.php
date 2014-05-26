<?php
// jin/Symfony/src/JH_Project/JobHubBundle/Controller/JobHubController.php
namespace JH_Project\JobHubBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JH_Project\JobHubBundle\Entity\Utilisateur;
use JH_Project\JobHubBundle\Entity\Candidat;
use JH_Project\JobHubBundle\Entity\Entreprise;
use JH_Project\JobHubBundle\Form\InscriptionType;

class JobHubController extends Controller
{
  public function indexAction()
  {
    return $this->render('JobHubBundle:Site_JobHub:index.html.twig');
    // ------------------------ Site_JobHub => nom dossier sous views --------
  }

  /*
  *
  * @param string $nom_rubrique
  *
  * afficher les titres des articles appartenant à un rubrique dans un bloc
  */
    public function blocAction($nom_rubrique)
  {
		$rubrique = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Rubrique')->findOneBy(array('nom'=>$nom_rubrique));
        $articles = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Article')->findBy(array('rubrique'=>$rubrique));
        return $this->render('JobHubBundle:_common:bloc.html.twig', array('articles' => $articles, 'rubrique'=>$nom_rubrique));
  }  

    public function inscription_checkAction()
    {
    	$request = $this->container->get('request');    	
        $entity = new Utilisateur();
        $form = $this->createForm(new InscriptionType(), $entity);
        $form->handleRequest($request);
        
        $error=null;
		$mdp = $form['plainPassword']->getData();
		$mdp_confirm = $_POST['_passwordconfirm'];
        if ($form->isValid()){
        	//si mdp valide
            if ($mdp == $mdp_confirm) {
            	try {
            		$em1 = $this->getDoctrine()->getManager();
            		$em1->persist($entity);
            		$role = $_POST['_role'];
            		$entity->setEnabled(true);
		        	$entity->addRole($role);
		        	$em1->flush();
		        	$em2 = $this->getDoctrine()->getManager();
		        	if ($role == 'ROLE_CANDIDAT') {//si new Candidat		        		
		        		$candidat = new Candidat();
		        		$candidat->setCompteUser($entity);
		        		$em2->persist($candidat);
		        		$em2->flush();
		        	} else {//si new Entreprise
		        		$entreprise = new Entreprise();
		        		$entreprise->setCompteUser($entity);
		        		$em2->persist($entreprise);
		        		$em2->flush();
		        	}
		        	return $this->redirect($this->generateUrl('job_hub_inscrit'));
            	} catch (\Exception $e) {
            		$error='login ou adresse mail existe déjà!';
            	}
		    } else {
		    	$error='Les deux mots de passe que vous avez saisis ne sont pas cohérents';
		    }
         }
        return $this->render('JobHubBundle:Site_JobHub:inscription.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'error'  => $error,
        ));
    }

    public function inscription_formAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createForm(new InscriptionType(), $entity);

        return $this->render('JobHubBundle:_forms:form_inscription.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'error'  => null
        ));
    }
    
    public function inscritAction()
    {
    	return $this->render('JobHubBundle:Site_JobHub:inscrit.html.twig');
    }
  // --------------- Fichier Test ------ A supprimer ------------
  public function sessionAction()
  {
  	return $this->render('JobHubBundle:Site_JobHub:session.html.twig');
  }
  
  public function candidatAction()
  {
  	return $this->render('JobHubBundle:Site_JobHub:candidat_account.html.twig',array('id'=>5));
  }
  
  public function entrepriseAction(){
  	return $this->render('JobHubBundle:Site_JobHub:entreprise.html.twig');
	}
	
public function cvAction(){
		return $this->render('JobHubBundle:Site_JobHub:cv.html.twig');
	}
	
public function offreAction(){
		return $this->render('JobHubBundle:Site_JobHub:offre.html.twig');
	}
public function rechercheAction(){
		return $this->render('JobHubBundle:Site_JobHub:recherche.html.twig');
	}
	
public function conseilAction(){
		return $this->render('JobHubBundle:Site_JobHub:conseil.html.twig');
	}	
	
public function actuAction(){
		return $this->render('JobHubBundle:Site_JobHub:actu.html.twig');
	}

public function planAction(){
		return $this->render('JobHubBundle:Site_JobHub:plan.html.twig');
	}	
}
?>
