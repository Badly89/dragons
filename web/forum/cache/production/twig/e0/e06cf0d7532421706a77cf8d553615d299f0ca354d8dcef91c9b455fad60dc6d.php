<?php

/* mcp_logs.html */
class __TwigTemplate_98848aadf536f7fce7497b82ff21cf67b6314989dc1efbdedc191c98d6be7eed extends Twig_Template
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
        $location = "mcp_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_header.html", "mcp_logs.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<h2>";
        // line 3
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h2>

<form method=\"post\" id=\"mcp\" action=\"";
        // line 5
        echo ($context["U_POST_ACTION"] ?? null);
        echo "\">

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"action-bar bar-top\">
\t\t";
        // line 11
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_KEYWORDS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo " <input type=\"search\" class=\"inputbox autowidth\" name=\"keywords\" value=\"";
        echo ($context["S_KEYWORDS"] ?? null);
        echo "\" />&nbsp;<input type=\"submit\" class=\"button2\" name=\"filter\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
        echo "\" />
\t\t<div class=\"pagination\">
\t\t\t";
        // line 13
        echo ($context["TOTAL"] ?? null);
        echo "
\t\t\t";
        // line 14
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 15
            echo "\t\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "mcp_logs.html", 15)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 16
            echo "\t\t\t";
        } else {
            // line 17
            echo "\t\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t\t";
        }
        // line 19
        echo "\t\t</div>
\t</div>

\t<table class=\"table1\">
\t<thead>
\t<tr>
\t\t<th class=\"name\">";
        // line 25
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
        echo "</th>
\t\t<th class=\"center\">";
        // line 26
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP");
        echo "</th>
\t\t<th class=\"center\">";
        // line 27
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIME");
        echo "</th>
\t\t<th class=\"name\">";
        // line 28
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACTION");
        echo "</th>
\t\t";
        // line 29
        if (($context["S_CLEAR_ALLOWED"] ?? null)) {
            echo "<th>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
            echo "</th>";
        }
        // line 30
        echo "\t</tr>
\t</thead>
\t\t<tbody>
\t";
        // line 33
        if (($context["S_LOGS"] ?? null)) {
            // line 34
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "log", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 35
                echo "\t\t";
                if (($this->getAttribute($context["log"], "S_ROW_COUNT", array()) % 2 == 0)) {
                    echo "<tr class=\"bg1\">";
                } else {
                    echo "<tr class=\"bg2\">";
                }
                // line 36
                echo "\t\t\t<td>";
                echo $this->getAttribute($context["log"], "USERNAME", array());
                echo "</td>
\t\t\t<td class=\"center\">";
                // line 37
                echo $this->getAttribute($context["log"], "IP", array());
                echo "</td>
\t\t\t<td class=\"center\">";
                // line 38
                echo $this->getAttribute($context["log"], "DATE", array());
                echo "</td>
\t\t\t<td>";
                // line 39
                echo $this->getAttribute($context["log"], "ACTION", array());
                echo "<br />
\t\t\t";
                // line 40
                echo $this->getAttribute($context["log"], "DATA", array());
                echo "
\t\t</td>
\t\t\t";
                // line 42
                if (($context["S_CLEAR_ALLOWED"] ?? null)) {
                    echo "<td style=\"width: 5%\" align=\"center\"><input type=\"checkbox\" name=\"mark[]\" value=\"";
                    echo $this->getAttribute($context["log"], "ID", array());
                    echo "\" /></td>";
                }
                // line 43
                echo "\t\t</tr>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "\t";
        } else {
            // line 46
            echo "\t\t<tr>
\t\t\t<td class=\"bg1\" colspan=\"";
            // line 47
            if (($context["S_CLEAR_ALLOWED"] ?? null)) {
                echo "5";
            } else {
                echo "4";
            }
            echo "\" align=\"center\"><span class=\"gen\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_ENTRIES");
            echo "</span></td>
\t\t</tr>
\t";
        }
        // line 50
        echo "\t</tbody>
\t</table>

\t";
        // line 53
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "log", array()))) {
            // line 54
            echo "\t\t<div class=\"action-bar bottom\">
\t\t\t";
            // line 55
            $location = "display_options.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("display_options.html", "mcp_logs.html", 55)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 56
            echo "
\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 58
            echo ($context["TOTAL"] ?? null);
            echo "
\t\t\t\t";
            // line 59
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                // line 60
                echo "\t\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "mcp_logs.html", 60)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 61
                echo "\t\t\t\t";
            } else {
                // line 62
                echo "\t\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t\t";
            }
            // line 64
            echo "\t\t\t</div>
\t\t</div>

\t\t";
            // line 67
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t\t</div>
\t</div>

\t\t";
            // line 71
            if (($context["S_CLEAR_ALLOWED"] ?? null)) {
                // line 72
                echo "\t\t\t<fieldset class=\"display-actions\">
\t\t\t\t<input class=\"button2\" type=\"submit\" name=\"action[del_all]\" value=\"";
                // line 73
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_ALL");
                echo "\" />
\t\t\t\t&nbsp;<input class=\"button1\" type=\"submit\" value=\"";
                // line 74
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_MARKED");
                echo "\" name=\"action[del_marked]\" />

\t\t\t\t<div><a href=\"#\" onclick=\"marklist('mcp', 'mark', true); return false;\">";
                // line 76
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
                echo "</a> :: <a href=\"#\" onclick=\"marklist('mcp', 'mark', false); return false;\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
                echo "</a></div>
\t\t\t</fieldset>
\t\t";
            }
            // line 79
            echo "\t";
        } else {
            // line 80
            echo "\t\t\t";
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 84
        echo "</form>

<br />

";
        // line 88
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_logs.html", 88)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_logs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 88,  287 => 84,  279 => 80,  276 => 79,  268 => 76,  263 => 74,  259 => 73,  256 => 72,  254 => 71,  247 => 67,  242 => 64,  236 => 62,  233 => 61,  220 => 60,  218 => 59,  214 => 58,  210 => 56,  198 => 55,  195 => 54,  193 => 53,  188 => 50,  176 => 47,  173 => 46,  170 => 45,  163 => 43,  157 => 42,  152 => 40,  148 => 39,  144 => 38,  140 => 37,  135 => 36,  128 => 35,  123 => 34,  121 => 33,  116 => 30,  110 => 29,  106 => 28,  102 => 27,  98 => 26,  94 => 25,  86 => 19,  80 => 17,  77 => 16,  64 => 15,  62 => 14,  58 => 13,  48 => 11,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mcp_logs.html", "");
    }
}
