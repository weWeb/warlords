<?php

/* ::base.html.twig */
class __TwigTemplate_0cfd36d52e94e412b6d7205751714667 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navigation' => array($this, 'block_navigation'),
            'login' => array($this, 'block_login'),
            'sidebar' => array($this, 'block_sidebar'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- app/Resources/views/base.html.twig -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html\"; charset=utf-8\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " | Warlords</title>
        <!--[if lt IE 9]>
            <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>

        <div id=\"container\"><div id=\"innercontainer\">
            <header id=\"header\">
               
\t\t\t\t<div class=\"top\">
                    ";
        // line 21
        $this->displayBlock('navigation', $context, $blocks);
        // line 41
        echo "                </div>
            </header>

\t\t\t<div id=\"content\">
\t\t\t\t<aside class=\"sidebar\">
    \t\t\t\t<div class=\"login\">
\t\t\t\t    ";
        // line 47
        $this->displayBlock('login', $context, $blocks);
        // line 48
        echo "\t\t\t\t    </div>
\t\t            ";
        // line 49
        $this->displayBlock('sidebar', $context, $blocks);
        // line 50
        echo "\t\t        </aside>

\t\t        <section class=\"main-col\">
\t\t            ";
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "\t\t        </section>
\t\t\t</div>

            <div id=\"footer\">
                ";
        // line 58
        $this->displayBlock('footer', $context, $blocks);
        // line 61
        echo "            </div>
        </div></div>

        ";
        // line 64
        $this->displayBlock('javascripts', $context, $blocks);
        // line 65
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "The Final Allegiance";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 21
    public function block_navigation($context, array $blocks = array())
    {
        // line 22
        echo "                        <nav>
                            <ul class=\"navigation\">
                                <li><a href=\"#\">Home</a></li>
                                <li><a href=\"#\">About</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Guide</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Ranking</a>
\t\t\t\t\t\t\t\t\t<ul>
           \t\t\t\t \t\t\t\t<li><a href=”#”>Wealth</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=”#”>Test</a></li>
            \t\t\t\t\t\t\t<li><a href=”#”>Fame</a></li>
        \t\t\t\t\t\t\t</ul>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WarlordsGameBundle_profile"), "html", null, true);
        echo "\">Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WarlordsGameBundle_player"), "html", null, true);
        echo "\">Player</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Guild</a></li>
                                <li><a href=\"#\">Contact</a></li>
                            </ul>
                        </nav>
                    ";
    }

    // line 47
    public function block_login($context, array $blocks = array())
    {
    }

    // line 49
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 53
    public function block_body($context, array $blocks = array())
    {
    }

    // line 58
    public function block_footer($context, array $blocks = array())
    {
        // line 59
        echo "                    Warlords: The Final Allegiance - © 2012 WeWeb
                ";
    }

    // line 64
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 64,  165 => 59,  162 => 58,  157 => 53,  152 => 49,  147 => 47,  137 => 35,  133 => 34,  119 => 22,  116 => 21,  109 => 11,  106 => 10,  100 => 6,  94 => 65,  92 => 64,  87 => 61,  85 => 58,  79 => 54,  77 => 53,  72 => 50,  70 => 49,  67 => 48,  65 => 47,  57 => 41,  55 => 21,  43 => 13,  41 => 10,  34 => 6,  27 => 1,);
    }
}
