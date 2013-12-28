<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),),
        '_profiler_import' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:importAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/import',    ),  ),  4 =>   array (  ),),
        '_profiler_export' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:exportAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.txt',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler/export',    ),  ),  4 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),),
        'job_hub_homepage' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),),
        'job_hub_accueil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/index',    ),  ),  4 =>   array (  ),),
        'job_hub_session' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::sessionAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/session',    ),  ),  4 =>   array (  ),),
        'job_hub_candidat' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::candidatAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/candidat',    ),  ),  4 =>   array (  ),),
        'job_hub_entreprise' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::entrepriseAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/entreprise',    ),  ),  4 =>   array (  ),),
        'job_hub_cv' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::cvAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/cv',    ),  ),  4 =>   array (  ),),
        'job_hub_offre' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::offreAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/offre',    ),  ),  4 =>   array (  ),),
        'job_hub_recherche' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::rechercheAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/recherche',    ),  ),  4 =>   array (  ),),
        'job_hub_conseil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::conseilAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/conseil',    ),  ),  4 =>   array (  ),),
        'job_hub_actu' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::actuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/actu',    ),  ),  4 =>   array (  ),),
        'job_hub_plan' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::planAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/plan',    ),  ),  4 =>   array (  ),),
        'job_hub_faq' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::faqAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/faq',    ),  ),  4 =>   array (  ),),
        'job_hub_admin_connect' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_connectAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin_connect',    ),  ),  4 =>   array (  ),),
        'admin_entreprise' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin_entreprise',    ),  ),  4 =>   array (  ),),
        'admin_entreprise_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin_entreprise_new',    ),  ),  4 =>   array (  ),),
        'admin_entreprise_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin_entreprise_create',    ),  ),  4 =>   array (  ),),
        'admin_entreprise_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin_entreprise_edit',    ),  ),  4 =>   array (  ),),
        'admin_entreprise_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin_entreprise_show',    ),  ),  4 =>   array (  ),),
        'job_hub_admin_accueil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::adminAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),),
        'job_hub_admin_type_liste' => array (  0 =>   array (    0 => 'type',  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_type_listeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'type',    ),    1 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),),
        'job_hub_admin_type' => array (  0 =>   array (    0 => 'type',    1 => 'id',  ),  1 =>   array (    '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_typeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'type',    ),    2 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
