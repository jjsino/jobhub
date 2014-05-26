<?php
// src/JH_Project/JobHubBundle/Controller/BackEndController.php
namespace JH_Project\JobHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;

class BackEndController extends Controller
{
  // ----- Index
  public function indexAction()
  {
    return $this->render('JobHubBundle:BackEnd:index.html.twig');
  }
  
  // --------------- Fichier Test ------ A supprimer ------------
  public function sessionAction()
  {
  	return $this->render('JobHubBundle:BackEnd:index.html.twig');
  }

    // ----- Login
    public function loginAction()
    {
        //si le visiteur est déjà authentifié, on le redirige vers l'accueil
	if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
	  return $this->redirect($this->generateUrl('job_hub_administration_index'));
	}

	$request = $this->getRequest();
	$session = $request->getSession();

	// On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
	if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)){
	  $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
	} else {
	  $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
	  $session ->remove(SecurityContext::AUTHENTICATION_ERROR);
	}

        return $this->render('JobHubBundle:BackEnd:login.html.twig',array(
		//valeur du précédent nom d'utilisateur entré par l'internaute
		'last_username' => $session->get(SecurityContext::LAST_USERNAME),
		'error' => $error,
		));
    }
}
?>
