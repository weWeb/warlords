<?php

/* WebProfilerBundle:Collector:exception.html.twig */
class __TwigTemplate_2d94fff1c9ef7cae010bb6bfa6e3fa1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" />
    ";
        // line 5
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/exception.png"), "html", null, true);
        echo "\" alt=\"Exception\" /></span>
    <strong>Exception</strong>
    <span class=\"count\">
        ";
        // line 13
        if ($this->getAttribute($this->getContext($context, "collector"), "hasexception")) {
            // line 14
            echo "            <span>1</span>
        ";
        }
        // line 16
        echo "    </span>
</span>
";
    }

    // line 20
    public function block_panel($context, array $blocks = array())
    {
        // line 21
        echo "    <h2>Exception</h2>

    ";
        // line 23
        if ((!$this->getAttribute($this->getContext($context, "collector"), "hasexception"))) {
            // line 24
            echo "        <p>
            <em>No exception was thrown and uncaught during the request.</em>
        </p>
    ";
        } else {
            // line 28
            echo "        ";
            echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Exception:show", array("exception" => $this->getAttribute($this->getContext($context, "collector"), "exception"), "format" => "html"), array());
            // line 29
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 163,  345 => 160,  341 => 159,  333 => 157,  331 => 156,  321 => 149,  314 => 145,  307 => 141,  300 => 137,  286 => 129,  279 => 125,  272 => 121,  257 => 109,  250 => 105,  243 => 101,  226 => 89,  212 => 82,  209 => 81,  204 => 78,  201 => 77,  196 => 74,  190 => 72,  180 => 69,  146 => 52,  108 => 39,  21 => 3,  47 => 13,  274 => 248,  260 => 236,  258 => 235,  255 => 234,  238 => 219,  236 => 97,  54 => 13,  18 => 1,  111 => 40,  85 => 33,  75 => 24,  63 => 22,  51 => 38,  38 => 8,  156 => 56,  148 => 51,  138 => 49,  122 => 24,  97 => 6,  84 => 29,  67 => 20,  60 => 16,  405 => 145,  399 => 144,  394 => 141,  386 => 138,  382 => 136,  378 => 134,  369 => 132,  365 => 131,  362 => 130,  360 => 129,  355 => 127,  352 => 126,  348 => 125,  338 => 158,  334 => 115,  332 => 114,  327 => 113,  323 => 150,  318 => 109,  312 => 105,  309 => 104,  306 => 103,  304 => 102,  299 => 99,  293 => 133,  290 => 94,  287 => 93,  285 => 92,  280 => 89,  266 => 88,  262 => 86,  247 => 84,  239 => 82,  237 => 81,  232 => 79,  228 => 78,  221 => 75,  215 => 83,  211 => 71,  202 => 70,  200 => 69,  177 => 66,  174 => 65,  168 => 61,  166 => 60,  144 => 58,  140 => 56,  126 => 45,  123 => 44,  105 => 36,  36 => 5,  142 => 53,  139 => 51,  133 => 47,  124 => 45,  107 => 41,  101 => 37,  65 => 21,  59 => 18,  45 => 9,  89 => 28,  82 => 23,  26 => 3,  223 => 88,  214 => 90,  210 => 88,  203 => 84,  199 => 83,  194 => 67,  192 => 79,  189 => 78,  187 => 77,  184 => 76,  178 => 72,  170 => 64,  157 => 61,  152 => 54,  145 => 55,  130 => 48,  125 => 46,  119 => 23,  116 => 44,  112 => 42,  102 => 36,  98 => 35,  76 => 26,  73 => 23,  69 => 21,  32 => 5,  92 => 39,  86 => 6,  57 => 21,  24 => 3,  19 => 2,  42 => 8,  29 => 4,  23 => 3,  103 => 10,  91 => 31,  77 => 39,  74 => 46,  70 => 22,  66 => 20,  56 => 14,  25 => 4,  22 => 3,  17 => 1,  68 => 13,  61 => 21,  44 => 12,  20 => 2,  161 => 59,  153 => 58,  150 => 49,  147 => 48,  143 => 46,  137 => 55,  129 => 46,  121 => 41,  118 => 40,  113 => 20,  104 => 36,  99 => 33,  94 => 35,  81 => 28,  78 => 24,  72 => 25,  64 => 19,  53 => 15,  50 => 14,  48 => 10,  41 => 13,  39 => 8,  35 => 6,  33 => 6,  30 => 4,  27 => 6,  182 => 70,  176 => 71,  169 => 62,  163 => 60,  160 => 57,  155 => 60,  151 => 52,  149 => 53,  141 => 54,  136 => 51,  134 => 50,  131 => 43,  128 => 47,  120 => 43,  117 => 43,  114 => 41,  109 => 37,  106 => 11,  100 => 30,  96 => 31,  93 => 30,  90 => 33,  87 => 29,  83 => 25,  79 => 40,  71 => 23,  62 => 11,  58 => 16,  55 => 16,  52 => 13,  49 => 13,  46 => 11,  43 => 13,  40 => 8,  37 => 10,  34 => 9,  31 => 4,  28 => 3,);
    }
}
