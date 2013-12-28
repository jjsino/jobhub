<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // job_hub_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_hub_homepage')), array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\DefaultController::indexAction',));
        }

        // job_hub_accueil
        if ($pathinfo === '/index') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::indexAction',  '_route' => 'job_hub_accueil',);
        }

        // job_hub_session
        if ($pathinfo === '/session') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::sessionAction',  '_route' => 'job_hub_session',);
        }

        // job_hub_candidat
        if ($pathinfo === '/candidat') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::candidatAction',  '_route' => 'job_hub_candidat',);
        }

        // job_hub_entreprise
        if ($pathinfo === '/entreprise') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::entrepriseAction',  '_route' => 'job_hub_entreprise',);
        }

        // job_hub_cv
        if ($pathinfo === '/cv') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::cvAction',  '_route' => 'job_hub_cv',);
        }

        // job_hub_offre
        if ($pathinfo === '/offre') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::offreAction',  '_route' => 'job_hub_offre',);
        }

        // job_hub_recherche
        if ($pathinfo === '/recherche') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::rechercheAction',  '_route' => 'job_hub_recherche',);
        }

        // job_hub_conseil
        if ($pathinfo === '/conseil') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::conseilAction',  '_route' => 'job_hub_conseil',);
        }

        // job_hub_actu
        if ($pathinfo === '/actu') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::actuAction',  '_route' => 'job_hub_actu',);
        }

        // job_hub_plan
        if ($pathinfo === '/plan') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::planAction',  '_route' => 'job_hub_plan',);
        }

        // job_hub_faq
        if ($pathinfo === '/faq') {
            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::faqAction',  '_route' => 'job_hub_faq',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin_')) {
                // job_hub_admin_connect
                if ($pathinfo === '/admin_connect') {
                    return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_connectAction',  '_route' => 'job_hub_admin_connect',);
                }

                if (0 === strpos($pathinfo, '/admin_entreprise')) {
                    // admin_entreprise
                    if ($pathinfo === '/admin_entreprise') {
                        return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::indexAction',  '_route' => 'admin_entreprise',);
                    }

                    if (0 === strpos($pathinfo, '/admin_entreprise_')) {
                        // admin_entreprise_new
                        if ($pathinfo === '/admin_entreprise_new') {
                            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::newAction',  '_route' => 'admin_entreprise_new',);
                        }

                        // admin_entreprise_create
                        if ($pathinfo === '/admin_entreprise_create') {
                            return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::createAction',  '_route' => 'admin_entreprise_create',);
                        }

                        // admin_entreprise_edit
                        if (0 === strpos($pathinfo, '/admin_entreprise_edit') && preg_match('#^/admin_entreprise_edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_entreprise_edit')), array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::editAction',));
                        }

                        // admin_entreprise_show
                        if (0 === strpos($pathinfo, '/admin_entreprise_show') && preg_match('#^/admin_entreprise_show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_entreprise_show')), array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\EntrepriseController::showAction',));
                        }

                    }

                }

            }

            // job_hub_admin_accueil
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::adminAction',  '_route' => 'job_hub_admin_accueil',);
            }

            // job_hub_admin_type_liste
            if (preg_match('#^/admin/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_hub_admin_type_liste')), array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_type_listeAction',));
            }

            // job_hub_admin_type
            if (preg_match('#^/admin/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'job_hub_admin_type')), array (  '_controller' => 'JH_Project\\JobHubBundle\\Controller\\JobHubController::admin_typeAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
