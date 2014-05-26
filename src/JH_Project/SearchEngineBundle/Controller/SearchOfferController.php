<?php

namespace JH_Project\SearchEngineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JH_Project\JobHubBundle\Entity\Offre;
use JH_Project\SearchEngineBundle\Form\OffreType;
use JH_Project\SearchEngineBundle\Form\Handler;

include_once 'BDDManager.inc';

class SearchOfferController extends Controller
{

	/*
	 * To change this template, choose Tools | Templates
	 * and open the template in the editor.
	 */

/*
	function getCity($latitude, $longitude) {
		$bdd = new BDDManager();
		if (!$bdd->isConnected()) {
		    $bdd->connectBDD();
		}
		$ville = 'erreurNotFound';
		$sql = "SELECT * FROM `villes` \n"
		        . "WHERE `longitude`<( $longitude + 0.0001) AND `longitude`>( $longitude - 0.0001)\n"
		        . "ORDER BY ABS( `latitude` - $latitude ), ABS(`longitude` - $longitude )";
		$result = $bdd->query($sql);
		if ($result = mysql_fetch_row($result)) {
		    $ville = $result[4];
		}
		return $ville;
	}*/
    /**
     * @Route("/search_offer")
     * @Template()
     */
    public function searchAction()
    {
	
    	$form = $this -> container -> get('form.factory') -> createBuilder(new OffreType()) -> getForm();
    	/*
    	if (isset($_REQUEST['latitude']) && isset($_REQUEST['longitude'])) {
			$lat = $_REQUEST['latitude'];
			$long = $_REQUEST['longitude'];
			echo getCity($lat, $long);
		} else {
			echo 'erreurCall';
		}*/
    	
    	return $this->render('SearchEngineBundle:SearchOffer:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/search_offer_result")
     * @Template()
     */
    public function resultAction()
    {
        $request = $this->container->get('request');
 
        $form = $this->container->get('form.factory')->createBuilder(new OffreType())->getForm();
 
        $formHandler = new Handler($form, $request, $this->getDoctrine()->getManager());
         
        if ($formHandler->process()) {
 
                $mc = $form['mot_cle']->getData();
                $lieu = $form['lieu']->getData();
 
                $repository = $this->getDoctrine()
                                   ->getManager()
                                   ->getRepository('JobHubBundle:Offre');
 
                $offer_list = $repository->searchOffre( $mc, $lieu );
 
                return $this->render('SearchEngineBundle:SearchOffer:result.html.twig', array(
                    'offres' => $offer_list
                ));
        }
 
        return $this->redirect($this->generateUrl('job_hub_index'));
    }
    
    public function getAjaxResultsAction()
    {
        $request = $this->container->get('request');
 
        if($request->isXmlHttpRequest())
        {
            // get title sent ($_GET)
 			$mc = $request->query->get('mot_cle');
            $lieu = $request->query->get('lieu');
                
            $repository = $this->getDoctrine()
                               ->getManager()
                               ->getRepository('JobHubBundle:Offre');
            $offer_list = $repository->searchFilm( $mc, $lieu );
 
            $offer_intitules = array();
            $offer_villes = array();
            foreach($offer_list as $offer) {
            	$offer_intitules[] = $offer->getIntitule();
            	$offer_villes[] = $offer->getVille()->getNom();
            }
            return new JsonResponse(array('intitules'=>$offer_intitules, 'villes'=>$offer_villes));
        }
    }

}
