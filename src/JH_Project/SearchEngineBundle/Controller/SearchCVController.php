<?php

namespace JH_Project\SearchEngineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JH_Project\JobHubBundle\Entity\CV;
use JH_Project\SearchEngineBundle\Form\CVType;
use JH_Project\SearchEngineBundle\Form\Handler;


class SearchCVController extends Controller
{
    /**
     * @Route("/search_cv")
     * @Template()
     */
    public function searchAction()
    {
    	$form = $this -> container -> get('form.factory') -> createBuilder(new CVType()) -> getForm();
    	
    	return $this->render('SearchEngineBundle:SearchCV:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/search_cv_result")
     * @Template()
     */
    public function resultAction()
    {
    	$request = $this->container->get('request');
 
        $form = $this->container->get('form.factory')->createBuilder(new CVType())->getForm();
 
        $formHandler = new Handler($form, $request, $this->getDoctrine()->getManager());
         
        if ($formHandler->process()) {
 
                $titre = $form['titre']->getData();
 
                $repository = $this->getDoctrine()
                                   ->getManager()
                                   ->getRepository('JobHubBundle:CV');
 
                $offer_list = $repository->searchOffre( $titre );
 
                return $this->render('SearchEngineBundle:SearchCV:result.html.twig', array(
                    'entities' => $cv_list
                ));
        }
 
        return $this->render('SearchEngineBundle:SearchCV:index.html.twig', array(
            'form' => $form->createView(),
        ));
    
    }

}
