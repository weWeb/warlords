<?php

/* DoctrineBundle:Collector:explain.html.twig */
class __TwigTemplate_ddfbecb1c1b8e9acc1a255320c9e4b49 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<small><strong>Explanation</strong>:</small>

<table style=\"margin: 5px 0;\">
    <thead>
        <tr>
            ";
        // line 6
        if (isset($context["data"])) { $_data_ = $context["data"]; } else { $_data_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter($this->getAttribute($_data_, 0, array(), "array")));
        foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
            // line 7
            echo "                <th>";
            if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
            echo twig_escape_filter($this->env, $_label_, "html", null, true);
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 9
        echo "        </tr>
    </thead>
    <tbody>
        ";
        // line 12
        if (isset($context["data"])) { $_data_ = $context["data"]; } else { $_data_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_data_);
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 13
            echo "        <tr>
            ";
            // line 14
            if (isset($context["row"])) { $_row_ = $context["row"]; } else { $_row_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_row_);
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                echo "                <td>";
                if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
                echo twig_escape_filter($this->env, $_item_, "html", null, true);
                echo "</td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 17
            echo "        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "DoctrineBundle:Collector:explain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 14,  453 => 145,  447 => 144,  442 => 141,  434 => 138,  430 => 136,  426 => 134,  416 => 132,  409 => 131,  406 => 130,  401 => 129,  395 => 127,  392 => 126,  387 => 125,  377 => 117,  373 => 115,  370 => 114,  364 => 113,  359 => 112,  354 => 109,  348 => 105,  345 => 104,  341 => 103,  338 => 102,  333 => 99,  327 => 95,  324 => 94,  320 => 93,  317 => 92,  312 => 89,  298 => 88,  294 => 86,  279 => 84,  269 => 82,  266 => 81,  260 => 79,  255 => 78,  247 => 75,  241 => 72,  237 => 71,  220 => 69,  186 => 61,  183 => 60,  159 => 58,  152 => 55,  144 => 51,  141 => 50,  132 => 43,  129 => 42,  120 => 37,  74 => 19,  70 => 15,  49 => 13,  169 => 58,  161 => 55,  157 => 53,  150 => 50,  136 => 44,  121 => 42,  115 => 36,  109 => 32,  99 => 34,  96 => 33,  81 => 24,  73 => 20,  69 => 19,  62 => 16,  41 => 7,  102 => 19,  78 => 23,  61 => 13,  56 => 10,  38 => 6,  22 => 4,  34 => 6,  248 => 96,  238 => 90,  234 => 88,  227 => 84,  223 => 70,  218 => 80,  216 => 79,  213 => 67,  210 => 77,  207 => 76,  198 => 71,  192 => 65,  177 => 59,  174 => 60,  171 => 59,  164 => 55,  160 => 54,  155 => 56,  153 => 51,  149 => 48,  146 => 47,  143 => 46,  137 => 45,  126 => 43,  112 => 20,  107 => 31,  85 => 28,  82 => 21,  63 => 14,  32 => 5,  25 => 3,  92 => 39,  86 => 6,  77 => 26,  46 => 7,  37 => 7,  33 => 5,  29 => 7,  24 => 6,  19 => 1,  44 => 12,  30 => 4,  27 => 3,  55 => 9,  48 => 7,  36 => 6,  123 => 24,  116 => 36,  108 => 20,  95 => 18,  90 => 25,  87 => 28,  83 => 14,  67 => 17,  45 => 6,  26 => 4,  23 => 3,  20 => 2,  17 => 1,  201 => 72,  195 => 66,  187 => 62,  181 => 63,  178 => 57,  172 => 56,  168 => 54,  165 => 53,  156 => 48,  151 => 45,  148 => 44,  145 => 43,  142 => 42,  134 => 37,  131 => 44,  128 => 35,  122 => 32,  119 => 31,  111 => 21,  106 => 31,  103 => 19,  100 => 28,  97 => 26,  93 => 24,  89 => 16,  79 => 40,  68 => 15,  64 => 13,  60 => 11,  57 => 15,  54 => 12,  50 => 10,  47 => 9,  43 => 6,  39 => 9,  35 => 5,  31 => 4,  28 => 3,);
    }
}
