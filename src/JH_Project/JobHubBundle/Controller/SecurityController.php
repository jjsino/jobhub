<?php

namespace JH_Project\JobHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use JH_Project\JobHubBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;

/**
 * Security controller.
 *
 */
class SecurityController extends Controller
{

   /**
	* @var Utilisateur
	*/
	protected  $loggedUser;
	
   /**
	*  return Utilisateur $loggedUser
	*/
	public function getLoggedUser()
	{
		$this->loggedUser = $this->get('security.context')->getToken()->getUser() ;
		
		return $this->loggedUser;
	}
	
    /**
     * Authentification.
     *
     *
     */
    public function loginAction()
    {
        //si le visiteur est déjà authentifié
		if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
			$usr=$this->getLoggedUser();
			if($usr->hasRole('ROLE_CANDIDAT')){
			return $this->redirect($this->generateUrl('job_hub_candidat'));
			}
		  	return $this->redirect($this->generateUrl('job_hub_entreprise_show'));
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
		if ($error){
		return $this->render('JobHubBundle:Security:login.html.twig', array(
			//valeur du précédent nom d'utilisateur entré par l'internaute
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error' => $error,
			));
		} else {
			return $this->render('JobHubBundle:_forms:form_login.html.twig', array(
			//valeur du précédent nom d'utilisateur entré par l'internaute
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error' => null,
			));
		}
    }
    
    public function motdepassOubliAction()
    {
    	$request = $this->getRequest();
    	
    }
    public function passOubliAction()
    {		
		 $message = \Swift_Message::newInstance() // we create a new instance of the Swift_Message class
			->setSubject('Hello Email') // we configure the title
			->setFrom('jasminj@126.com') // we configure the sender
			->setTo('jinji6@yahoo.fr') // we configure the recipient
			->setBody($this->renderView('JobHubBundle:_common:hello.html.twig', array('name' => 'jj')))
			->setContentType('text/html')
			;
			$this->get('mailer')->send($message); // then we send the message
			$this->get('session')->getFlashBag()->add(
            'notice',
            'A mail has been sent to you'
        );
		 return $this->redirect($this->generateUrl('job_hub_index'));
		//return new Response('A mail has been sent to you');
    }
   
}
