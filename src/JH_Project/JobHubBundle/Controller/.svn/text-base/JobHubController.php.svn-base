<?php
// jin/Symfony/src/JH_Project/JobHubBundle/Controller/JobHubController.php
namespace JH_Project\JobHubBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class JobHubController extends Controller
{
  public function indexAction()
  {
    return $this->render('JobHubBundle:Site_JobHub:index.html.twig');
    // ------------------------ Site_JobHub => nom dossier sous views --------
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

/*************************************************************************************************/
/************************************** Partie Admin *********************************************/
/*************************************************************************************************/

// Page d'accueil de l'administration
public function adminAction(){
	return $this->render('JobHubBundle:Site_JobHub:admin.html.twig');
}

// Page de connexion de l'administration
public function admin_connectAction(){
  	return $this->render('JobHubBundle:Site_JobHub:admin_connexion.html.twig');
}

// Gestion des Administrateurs, Candidats, Entreprises, CV, Offres => Type
// Lister un truc du Type
public function admin_type_listeAction($type){
  	return $this->render('JobHubBundle:Site_JobHub:admin_type_liste.html.twig',array('type'=>$type));
}

// Visualiser les informations sur un truc du Type
public function admin_typeAction($type, $id){
  	return $this->render('JobHubBundle:Site_JobHub:admin_type.html.twig',array('type'=>$type,'id'=>$id));
}

// Gestion des Contenus du site: Articles, Images, Vidéos
}
?>