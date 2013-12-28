<?php

/* JobHubBundle::layout.html.twig */
class __TwigTemplate_286eefcf53a844483aec895c974e24ec5c9896cc6f59892484b7d887165b5390 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        echo "
<!DOCTYPE html>
<html lang=\"fr\">
  <head>
    <meta charset=\"utf-8\">   
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/css/test.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/css/font.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/css/typography.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/js/jquery-1.10.2.min.js"), "html", null, true);
        echo "\"></script>
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <script src=\"Bootstrap/js/jquery-1.10.2.min.js\"></script>
  </head>
  
  
  <body>
   ";
        // line 21
        $this->displayBlock('body', $context, $blocks);
        // line 88
        echo "\t
     
</div>    
</body>
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "JobHub";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        echo " 
  <nav class=\"navbar navbar-inverse\" role=\"navigation\">
  
  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
      <span class=\"sr-only\">Toggle navigation</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>
    <a class=\"navbar-brand\" href=\"#\">JobHub</a>
  </div>
  <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
    <ul class=\"nav navbar-nav\">
     <li class=\"dropdown active\">
       <a href=\"href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("job_hub_cv");
        echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">CV <b class=\"caret\"></b>
        <ul class=\"dropdown-menu\">
          <li><a href=\"#\">Publier CV</a></li>
          <li><a href=\"#\">Consulter CV</a></li>
          <li><a href=\"#\">Cr�er lettre de motivation</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">Separated link</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">One more separated link</a></li>
        </ul>
      </li>
      <li> <a href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("job_hub_offre");
        echo "\">Offre</a></li>
       <li> <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("job_hub_conseil");
        echo "\">Conseils</a></li>
       <li> <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("job_hub_entreprise");
        echo "\">Entreprise</a></li>
       <li> <a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("job_hub_entreprise");
        echo "\">S'inscrire</a></li>
    </ul>
    <form class=\"navbar-form-inline navbar-right\" role=\"search id=\"formconnexion\">
                    <div class=\"form-group\">
                           <input type=\"text\" class=\"input-small\" placeholder=\"Email\">
                           <input type=\"password\" class=\"input-small\" placeholder=\"Password\">
                           <button type=\"submit midlle\" class=\"btn\">Se connecter</button>
                            <input type=\"checkbox\" value=\"remember-me\"> Remember me
                            
                     </div>      
                         
     </form>
    </ul>
  </div>
</nav>         
 
<div class=\"row\">
<div class=\"span7  span-left\">
<img src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jobhub/images/logo_JobHub.png"), "html", null, true);
        echo "\" class=\"img-rounded\">
</div>
<div class=\"span5 span-right \">
<h1>testtestetestettesttets</h1>
<p> hhhhfsdddddhdffffffffffffffffff</p>
</div>

</div>
               
           

       
           
           
           
           
";
        // line 84
        $this->displayBlock('footer', $context, $blocks);
        // line 87
        echo "     
";
    }

    // line 84
    public function block_footer($context, array $blocks = array())
    {
        // line 85
        echo "<footer>   <p>&copy; JubHub 2013</p> </footer>
";
    }

    public function getTemplateName()
    {
        return "JobHubBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 85,  171 => 84,  166 => 87,  164 => 84,  145 => 68,  124 => 50,  120 => 49,  116 => 48,  112 => 47,  98 => 36,  79 => 21,  73 => 8,  65 => 88,  63 => 21,  54 => 15,  46 => 13,  42 => 12,  38 => 11,  34 => 10,  29 => 8,  22 => 3,  50 => 14,  47 => 19,  40 => 14,  37 => 13,  30 => 7,);
    }
}
