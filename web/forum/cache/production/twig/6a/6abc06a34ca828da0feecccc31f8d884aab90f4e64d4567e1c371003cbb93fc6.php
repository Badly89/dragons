<?php

/* acp_users_warnings.html */
class __TwigTemplate_418af042121ea5afc7b58b7b77067e0754571a8a6dac2b7ec0a56aca7ecd363a extends Twig_Template
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
        echo "\t<form id=\"list\" method=\"post\" action=\"";
        echo ($context["U_ACTION"] ?? null);
        echo "\">

\t";
        // line 3
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "warn", array()))) {
            // line 4
            echo "\t<table class=\"table1 zebra-table\">
\t<thead>
\t<tr>
\t\t<th>";
            // line 7
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORT_BY");
            echo "</th>
\t\t<th>";
            // line 8
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIME");
            echo "</th>
\t\t<th>";
            // line 9
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FEEDBACK");
            echo "</th>
\t\t<th>";
            // line 10
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "warn", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["warn"]) {
                // line 15
                echo "\t\t<tr>
\t\t\t<td>";
                // line 16
                echo $this->getAttribute($context["warn"], "USERNAME", array());
                echo "</td>
\t\t\t<td style=\"text-align: center; nowrap: nowrap;\">";
                // line 17
                echo $this->getAttribute($context["warn"], "DATE", array());
                echo "</td>
\t\t\t<td>";
                // line 18
                echo $this->getAttribute($context["warn"], "ACTION", array());
                echo "</td>
\t\t\t<td style=\"text-align: center;\"><input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
                // line 19
                echo $this->getAttribute($context["warn"], "ID", array());
                echo "\" /></td>
\t\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['warn'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t</tbody>
\t</table>
\t";
        } else {
            // line 25
            echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
            // line 26
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_WARNINGS");
            echo "</p>
\t\t</div>
\t";
        }
        // line 29
        echo "
\t<fieldset class=\"quick\">
\t\t<input class=\"button2\" type=\"submit\" name=\"delall\" value=\"";
        // line 31
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_ALL");
        echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"submit\" name=\"delmarked\" value=\"";
        // line 32
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_MARKED");
        echo "\" />
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('list', 'mark', true);\">";
        // line 33
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
        echo "</a> &bull; <a href=\"#\" onclick=\"marklist('list', 'mark', false);\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
        echo "</a></p>
\t</fieldset>
\t";
        // line 35
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</form>
";
    }

    public function getTemplateName()
    {
        return "acp_users_warnings.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 35,  105 => 33,  101 => 32,  97 => 31,  93 => 29,  87 => 26,  84 => 25,  79 => 22,  70 => 19,  66 => 18,  62 => 17,  58 => 16,  55 => 15,  51 => 14,  44 => 10,  40 => 9,  36 => 8,  32 => 7,  27 => 4,  25 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_users_warnings.html", "");
    }
}
