<?php

/* acp_reasons.html */
class __TwigTemplate_7e6fab0ed8224b9e4bdfdc81357ca7bb921eb24259ef6dfd66ea3ba7821f9e9a extends Twig_Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "acp_reasons.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if (($context["S_EDIT_REASON"] ?? null)) {
            // line 6
            echo "
\t<a href=\"";
            // line 7
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK");
            echo "</a>

\t<h1>";
            // line 9
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
            echo "</h1>

\t<p>";
            // line 11
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON_EDIT_EXPLAIN");
            echo "</p>

\t";
            // line 13
            if (($context["S_ERROR"] ?? null)) {
                // line 14
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 15
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 16
                echo ($context["ERROR_MSG"] ?? null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 19
            echo "
\t";
            // line 20
            if ( !($context["S_TRANSLATED"] ?? null)) {
                // line 21
                echo "\t\t<h3>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AVAILABLE_TITLES");
                echo "</h3>

\t\t<p>";
                // line 23
                echo ($context["S_AVAILABLE_TITLES"] ?? null);
                echo "</p>
\t";
            }
            // line 25
            echo "
\t<form id=\"acp_reasons\" method=\"post\" action=\"";
            // line 26
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
            echo "</legend>
\t\t<p>";
            // line 30
            if (($context["S_TRANSLATED"] ?? null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IS_TRANSLATED_EXPLAIN");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IS_NOT_TRANSLATED_EXPLAIN");
            }
            echo "</p>
\t<dl>
\t\t<dt><label for=\"reason_title\">";
            // line 32
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON_TITLE");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t<dd><input name=\"reason_title\" type=\"text\" id=\"reason_title\" value=\"";
            // line 33
            echo ($context["REASON_TITLE"] ?? null);
            echo "\" maxlength=\"255\" /></dd>
\t</dl>
\t";
            // line 35
            if (($context["S_TRANSLATED"] ?? null)) {
                // line 36
                echo "\t<dl>
\t\t<dt>";
                // line 37
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON_TITLE_TRANSLATED");
                echo "</dt>
\t\t<dd>";
                // line 38
                echo ($context["TRANSLATED_TITLE"] ?? null);
                echo "</dd>
\t</dl>
\t";
            }
            // line 41
            echo "\t<dl>
\t\t<dt><label for=\"reason_description\">";
            // line 42
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON_DESCRIPTION");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t<dd><textarea name=\"reason_description\" id=\"reason_description\" rows=\"8\" cols=\"80\">";
            // line 43
            echo ($context["REASON_DESCRIPTION"] ?? null);
            echo "</textarea></dd>
\t</dl>
\t";
            // line 45
            if (($context["S_TRANSLATED"] ?? null)) {
                // line 46
                echo "\t<dl>
\t\t<dt>";
                // line 47
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON_DESC_TRANSLATED");
                echo "</dt>
\t\t<dd>";
                // line 48
                echo ($context["TRANSLATED_DESCRIPTION"] ?? null);
                echo "</dd>
\t</dl>
\t";
            }
            // line 51
            echo "
\t<p class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
            // line 53
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 54
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
            echo "\" />
\t\t";
            // line 55
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</p>
\t</fieldset>
\t</form>

";
        } else {
            // line 61
            echo "
\t<h1>";
            // line 62
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_REASONS");
            echo "</h1>

\t<p>";
            // line 64
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_REASONS_EXPLAIN");
            echo "</p>

\t<form id=\"reasons\" method=\"post\" action=\"";
            // line 66
            echo ($context["U_ACTION"] ?? null);
            echo "\">
\t<fieldset class=\"tabulated\">
\t<legend>";
            // line 68
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_REASONS");
            echo "</legend>

\t";
            // line 70
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "reasons", array()))) {
                // line 71
                echo "\t\t<table class=\"table1\">
\t\t\t<col class=\"row1\" /><col class=\"row1\" /><col class=\"row2\" />
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 75
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON");
                echo "</th>
\t\t\t<th>";
                // line 76
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USED_IN_REPORTS");
                echo "</th>
\t\t\t<th>";
                // line 77
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("OPTIONS");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 81
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "reasons", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["reasons"]) {
                    // line 82
                    echo "\t\t\t<tr>
\t\t\t\t<td>
\t\t\t\t\t<i style=\"float: ";
                    // line 84
                    echo ($context["S_CONTENT_FLOW_END"] ?? null);
                    echo "; font-size: .9em;\">";
                    if ($this->getAttribute($context["reasons"], "S_TRANSLATED", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IS_TRANSLATED");
                    } else {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IS_NOT_TRANSLATED");
                    }
                    echo "</i>
\t\t\t\t\t<strong>";
                    // line 85
                    echo $this->getAttribute($context["reasons"], "REASON_TITLE", array());
                    if ($this->getAttribute($context["reasons"], "S_OTHER_REASON", array())) {
                        echo " *";
                    }
                    echo "</strong>
\t\t\t\t\t<br /><span>";
                    // line 86
                    echo $this->getAttribute($context["reasons"], "REASON_DESCRIPTION", array());
                    echo "</span>
\t\t\t\t</td>
\t\t\t\t<td style=\"width: 100px;\">";
                    // line 88
                    echo $this->getAttribute($context["reasons"], "REASON_COUNT", array());
                    echo "</td>
\t\t\t\t<td class=\"actions\" style=\"width: 80px;\">
\t\t\t\t\t<span class=\"up-disabled\" style=\"display:none;\">";
                    // line 90
                    echo ($context["ICON_MOVE_UP_DISABLED"] ?? null);
                    echo "</span>
\t\t\t\t\t<span class=\"up\"><a href=\"";
                    // line 91
                    echo $this->getAttribute($context["reasons"], "U_MOVE_UP", array());
                    echo "\" data-ajax=\"row_up\">";
                    echo ($context["ICON_MOVE_UP"] ?? null);
                    echo "</a></span>
\t\t\t\t\t<span class=\"down-disabled\" style=\"display:none;\">";
                    // line 92
                    echo ($context["ICON_MOVE_DOWN_DISABLED"] ?? null);
                    echo "</span>
\t\t\t\t\t<span class=\"down\"><a href=\"";
                    // line 93
                    echo $this->getAttribute($context["reasons"], "U_MOVE_DOWN", array());
                    echo "\" data-ajax=\"row_down\">";
                    echo ($context["ICON_MOVE_DOWN"] ?? null);
                    echo "</a></span>
\t\t\t\t\t<a href=\"";
                    // line 94
                    echo $this->getAttribute($context["reasons"], "U_EDIT", array());
                    echo "\">";
                    echo ($context["ICON_EDIT"] ?? null);
                    echo "</a> 
\t\t\t\t\t";
                    // line 95
                    if ($this->getAttribute($context["reasons"], "U_DELETE", array())) {
                        // line 96
                        echo "\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["reasons"], "U_DELETE", array());
                        echo "\" data-ajax=\"row_delete\">";
                        echo ($context["ICON_DELETE"] ?? null);
                        echo "</a>
\t\t\t\t\t";
                    } else {
                        // line 98
                        echo "\t\t\t\t\t\t";
                        echo ($context["ICON_DELETE_DISABLED"] ?? null);
                        echo "
\t\t\t\t\t";
                    }
                    // line 100
                    echo "\t\t\t\t</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reasons'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "\t\t</tbody>
\t\t</table>

\t";
            }
            // line 107
            echo "
\t<p class=\"quick\">
\t\t<input type=\"hidden\" name=\"action\" value=\"add\" />

\t\t<input type=\"text\" name=\"reason_title\" /> 
\t\t<input class=\"button2\" name=\"addreason\" type=\"submit\" value=\"";
            // line 112
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_NEW_REASON");
            echo "\" />
\t\t";
            // line 113
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</p>
\t</fieldset>
\t
\t</form>

";
        }
        // line 120
        echo "
";
        // line 121
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_reasons.html", 121)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_reasons.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  348 => 121,  345 => 120,  335 => 113,  331 => 112,  324 => 107,  318 => 103,  310 => 100,  304 => 98,  296 => 96,  294 => 95,  288 => 94,  282 => 93,  278 => 92,  272 => 91,  268 => 90,  263 => 88,  258 => 86,  251 => 85,  241 => 84,  237 => 82,  233 => 81,  226 => 77,  222 => 76,  218 => 75,  212 => 71,  210 => 70,  205 => 68,  200 => 66,  195 => 64,  190 => 62,  187 => 61,  178 => 55,  174 => 54,  170 => 53,  166 => 51,  160 => 48,  156 => 47,  153 => 46,  151 => 45,  146 => 43,  141 => 42,  138 => 41,  132 => 38,  128 => 37,  125 => 36,  123 => 35,  118 => 33,  113 => 32,  104 => 30,  100 => 29,  94 => 26,  91 => 25,  86 => 23,  80 => 21,  78 => 20,  75 => 19,  69 => 16,  65 => 15,  62 => 14,  60 => 13,  55 => 11,  50 => 9,  41 => 7,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_reasons.html", "");
    }
}
