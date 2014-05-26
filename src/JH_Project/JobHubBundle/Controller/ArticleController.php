<?php

namespace JH_Project\JobHubBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JH_Project\JobHubBundle\Entity\Article;

/**
 * Article controller.
 *
 * @Route("/")
 */
class ArticleController extends Controller
{

    /**
     * Lists all Article entities of a category.
     *
     * @Route("/{nom_rubrique}", name="job_hub_article")
     * @Method("GET")
     * @Template()
     *
     * param string $nom_rubrique
     */
    public function indexAction($nom_rubrique)
    {
    	$rubrique = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Rubrique')->findOneBy(array('nom'=>$nom_rubrique));
        $entities = $this->getDoctrine()->getManager()->getRepository('JobHubBundle:Article')->findBy(array('rubrique'=>$rubrique));

        return array(
            'entities' => $entities,'rubrique'=>$nom_rubrique
        );
    }

    /**
     * Finds and displays a Article entity.
     *
     * @Route("/{id}", name="article_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JobHubBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
