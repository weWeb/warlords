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

        <div id=\"container\">
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
        // line 37
        echo "                </div>
            </header>

\t\t\t<div id=\"content\">
\t\t\t\t<aside class=\"sidebar\">
\t\t            ";
        // line 42
        $this->displayBlock('sidebar', $context, $blocks);
        // line 43
        echo "\t\t        </aside>

\t\t        <section class=\"main-col\">
\t\t            ";
        // line 46
        $this->displayBlock('body', $context, $blocks);
        // line 47
        echo "\t\t        </section>
\t\t\t</div>

            <div id=\"footer\">
                ";
        // line 51
        $this->displayBlock('footer', $context, $blocks);
        // line 54
        echo "            </div>
        </div>

        ";
        // line 57
        $this->displayBlock('javascripts', $context, $blocks);
        // line 58
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
\t\t\t\t\t\t\t\t<li><a href=\"#\">Guide</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Ranking</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Player</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Guild</a></li>
                                <li><a href=\"#\">Contact</a></li>
                            </ul>
                        </nav>
                    ";
    }

    // line 42
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
    }

    // line 51
    public function block_footer($context, array $blocks = array())
    {
        // line 52
        echo "                    Warlords: The Final Allegiance - © 2012 WeWeb
                ";
    }

    // line 57
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
        return array (  138 => 42,  113 => 20,  91 => 58,  84 => 54,  76 => 47,  58 => 23,  52 => 20,  453 => 145,  447 => 144,  442 => 141,  434 => 138,  430 => 136,  426 => 134,  416 => 132,  409 => 131,  406 => 130,  401 => 129,  395 => 127,  392 => 126,  387 => 125,  377 => 117,  373 => 115,  370 => 114,  364 => 113,  359 => 112,  354 => 109,  348 => 105,  345 => 104,  341 => 103,  338 => 102,  333 => 99,  327 => 95,  324 => 94,  320 => 93,  317 => 92,  312 => 89,  298 => 88,  294 => 86,  279 => 84,  269 => 82,  266 => 81,  260 => 79,  255 => 78,  247 => 75,  241 => 72,  237 => 71,  220 => 69,  186 => 61,  183 => 60,  159 => 58,  152 => 55,  144 => 51,  141 => 50,  132 => 43,  129 => 42,  120 => 37,  74 => 46,  70 => 15,  49 => 13,  169 => 58,  161 => 55,  157 => 53,  150 => 50,  136 => 44,  121 => 42,  115 => 36,  109 => 32,  99 => 34,  96 => 33,  81 => 24,  73 => 20,  69 => 43,  62 => 16,  41 => 13,  102 => 19,  78 => 23,  61 => 13,  56 => 10,  38 => 6,  22 => 4,  34 => 6,  248 => 96,  238 => 90,  234 => 88,  227 => 84,  223 => 70,  218 => 80,  216 => 79,  213 => 67,  210 => 77,  207 => 76,  198 => 71,  192 => 65,  177 => 59,  174 => 60,  171 => 59,  164 => 55,  160 => 54,  155 => 56,  153 => 51,  149 => 48,  146 => 47,  143 => 46,  137 => 45,  126 => 43,  112 => 20,  107 => 31,  85 => 28,  82 => 51,  63 => 14,  32 => 6,  25 => 1,  92 => 39,  86 => 6,  77 => 26,  46 => 7,  37 => 7,  33 => 5,  29 => 5,  24 => 6,  19 => 1,  44 => 12,  30 => 4,  27 => 3,  55 => 9,  48 => 7,  36 => 6,  123 => 24,  116 => 36,  108 => 20,  95 => 18,  90 => 25,  87 => 28,  83 => 14,  67 => 42,  45 => 6,  26 => 4,  23 => 3,  20 => 2,  17 => 1,  201 => 72,  195 => 66,  187 => 62,  181 => 63,  178 => 57,  172 => 56,  168 => 54,  165 => 53,  156 => 57,  151 => 52,  148 => 51,  145 => 43,  142 => 42,  134 => 37,  131 => 44,  128 => 35,  122 => 24,  119 => 23,  111 => 21,  106 => 11,  103 => 10,  100 => 28,  97 => 6,  93 => 24,  89 => 57,  79 => 40,  68 => 15,  64 => 13,  60 => 37,  57 => 15,  54 => 12,  50 => 10,  47 => 9,  43 => 6,  39 => 10,  35 => 5,  31 => 4,  28 => 3,);
    }
}
