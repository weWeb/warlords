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
            'blog_title' => array($this, 'block_blog_title'),
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
                <hgroup>
                    <h2>";
        // line 20
        $this->displayBlock('blog_title', $context, $blocks);
        echo "</h2>
                </hgroup>
\t\t\t\t<div class=\"top\">
                    ";
        // line 23
        $this->displayBlock('navigation', $context, $blocks);
        // line 44
        echo "                </div>
            </header>

\t\t\t<div id=\"content\">
\t\t\t\t<aside class=\"sidebar\">
    \t\t\t\t<div class=\"login\">
\t\t\t\t    ";
        // line 50
        $this->displayBlock('login', $context, $blocks);
        // line 51
        echo "\t\t\t\t    </div>
\t\t            ";
        // line 52
        $this->displayBlock('sidebar', $context, $blocks);
        // line 53
        echo "\t\t        </aside>

\t\t        <section class=\"main-col\">
\t\t            ";
        // line 56
        $this->displayBlock('body', $context, $blocks);
        // line 57
        echo "\t\t        </section>
\t\t\t</div>

            <div id=\"footer\">
                ";
        // line 61
        $this->displayBlock('footer', $context, $blocks);
        // line 64
        echo "            </div>
        </div></div>

        ";
        // line 67
        $this->displayBlock('javascripts', $context, $blocks);
        // line 68
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

    // line 20
    public function block_blog_title($context, array $blocks = array())
    {
        echo "<a href=\"#\">Warlords: The Final Allegiance</a>";
    }

    // line 23
    public function block_navigation($context, array $blocks = array())
    {
        // line 24
        echo "                        <nav>
                            <ul class=\"navigation\">
                                <li><a href=\"#\">Home</a></li>
                                <li><a href=\"#\">About</a></li>
\t\t\t\t<li><a href=\"#\">Guide</a></li>

\t\t\t\t<li><a href=\"#\">Ranking</a>
\t\t\t\t\t<ul>
           \t\t\t\t\t<li><a href=”#”>Wealth</a></li>
            \t\t\t\t\t<li><a href=”#”>Fame</a></li>
        \t\t\t\t</ul>\t\t\t\t\t\t\t\t\t
\t\t\t\t</li>

\t\t\t\t<li><a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WarlordsGameBundle_profile"), "html", null, true);
        echo "\">Profile</a></li>
\t\t\t\t<li><a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WarlordsGameBundle_player"), "html", null, true);
        echo "\">Player</a></li>
\t\t\t\t<li><a href=\"#\">Guild</a></li>
                                <li><a href=\"#\">Contact</a></li>
                            </ul>
                        </nav>
                    ";
    }

    // line 50
    public function block_login($context, array $blocks = array())
    {
    }

    // line 52
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 56
    public function block_body($context, array $blocks = array())
    {
    }

    // line 61
    public function block_footer($context, array $blocks = array())
    {
        // line 62
        echo "                    Warlords: The Final Allegiance - © 2012 WeWeb
                ";
    }

    // line 67
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
        return array (  183 => 67,  178 => 62,  175 => 61,  170 => 56,  165 => 52,  160 => 50,  150 => 38,  146 => 37,  131 => 24,  128 => 23,  122 => 20,  115 => 11,  112 => 10,  106 => 6,  100 => 68,  98 => 67,  93 => 64,  91 => 61,  85 => 57,  83 => 56,  78 => 53,  76 => 52,  73 => 51,  71 => 50,  63 => 44,  61 => 23,  55 => 20,  44 => 13,  42 => 10,  35 => 6,  31 => 5,  28 => 1,);
    }
}
