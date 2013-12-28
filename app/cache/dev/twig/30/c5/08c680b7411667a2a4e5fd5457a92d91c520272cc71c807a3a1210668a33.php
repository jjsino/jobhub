<?php

/* JobHubBundle:Site_JobHub:index.html.twig */
class __TwigTemplate_30c508c680b7411667a2a4e5fd5457a92d91c520272cc71c807a3a1210668a33 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("JobHubBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JobHubBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Accueil";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
";
    }

    // line 19
    public function block_footer($context, array $blocks = array())
    {
        // line 20
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
    
";
    }

    public function getTemplateName()
    {
        return "JobHubBundle:Site_JobHub:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 20,  47 => 19,  40 => 14,  37 => 13,  30 => 7,);
    }
}
