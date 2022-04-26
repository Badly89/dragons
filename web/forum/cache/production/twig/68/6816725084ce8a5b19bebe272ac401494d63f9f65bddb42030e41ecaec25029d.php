<?php

/* mcp_notes_user.html */
class __TwigTemplate_519656a4371748fad061e17f09ad5d1e49879db6182de457ec0ebb373dad4ac5 extends Twig_Template
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
        $this->loadTemplate("mcp_header.html", "mcp_notes_user.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form method=\"post\" id=\"mcp\" action=\"";
        // line 3
        echo ($context["U_POST_ACTION"] ?? null);
        echo "\">

<h2>";
        // line 5
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 10
        echo ($context["USERNAME_FULL"] ?? null);
        echo "</h3>

\t<div>
\t\t<div class=\"column1\">
\t\t\t";
        // line 14
        if (($context["AVATAR_IMG"] ?? null)) {
            echo "<div>";
            echo ($context["AVATAR_IMG"] ?? null);
            echo "</div>";
        }
        // line 15
        echo "\t\t</div>

\t\t<div class=\"column2\">
\t\t\t<dl class=\"details\">
\t\t\t\t";
        // line 19
        if (($context["RANK_TITLE"] ?? null)) {
            echo "<dt>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RANK");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</dt><dd>";
            echo ($context["RANK_TITLE"] ?? null);
            echo "</dd>";
        }
        // line 20
        echo "\t\t\t\t";
        if (($context["RANK_IMG"] ?? null)) {
            echo "<dt>";
            if (($context["RANK_TITLE"] ?? null)) {
                echo "&nbsp;";
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RANK");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            }
            echo "</dt><dd>";
            echo ($context["RANK_IMG"] ?? null);
            echo "</dd>";
        }
        // line 21
        echo "\t\t\t\t<dt>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("JOINED");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</dt><dd>";
        echo ($context["JOINED"] ?? null);
        echo "</dd>
\t\t\t\t<dt>";
        // line 22
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_POSTS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</dt><dd>";
        echo ($context["POSTS"] ?? null);
        echo "</dd>
\t\t\t\t<dt>";
        // line 23
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARNINGS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo " </dt><dd>";
        echo ($context["WARNINGS"] ?? null);
        echo "</dd>
\t\t\t</dl>
\t\t</div>
\t</div>

\t</div>
</div>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 34
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_FEEDBACK");
        echo "</h3>
\t<p>";
        // line 35
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_FEEDBACK_EXPLAIN");
        echo "</p>

\t<fieldset>
\t\t<textarea name=\"usernote\" id=\"usernote\" class=\"inputbox\" cols=\"40\" rows=\"3\"></textarea>
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 45
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"reset\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"action[add_feedback]\" value=\"";
        // line 46
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 47
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"action-bar bar-top\">
\t\t";
        // line 54
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_KEYWORDS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo " <input type=\"search\" class=\"inputbox autowidth\" name=\"keywords\" value=\"";
        echo ($context["S_KEYWORDS"] ?? null);
        echo "\" />&nbsp;<input type=\"submit\" class=\"button2\" name=\"filter\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
        echo "\" />
\t\t<div class=\"pagination\">
\t\t\t";
        // line 56
        echo ($context["TOTAL_REPORTS"] ?? null);
        echo "
\t\t\t";
        // line 57
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 58
            echo "\t\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "mcp_notes_user.html", 58)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 59
            echo "\t\t\t";
        } else {
            // line 60
            echo "\t\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t\t";
        }
        // line 62
        echo "\t\t</div>
\t</div>

\t<table class=\"table1\">
\t<thead>
\t<tr>
\t\t<th class=\"name reportby\">";
        // line 68
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORT_BY");
        echo "</th>
\t\t<th class=\"center\">";
        // line 69
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP");
        echo "</th>
\t\t<th class=\"center\">";
        // line 70
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIME");
        echo "</th>
\t\t<th>";
        // line 71
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACTION_NOTE");
        echo "</th>
\t\t";
        // line 72
        if (($context["S_CLEAR_ALLOWED"] ?? null)) {
            echo "<th>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
            echo "</th>";
        }
        // line 73
        echo "\t</tr>
\t</thead>
\t<tbody>
\t";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "usernotes", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["usernotes"]) {
            // line 77
            echo "\t";
            if (($this->getAttribute($context["usernotes"], "S_ROW_COUNT", array()) % 2 == 0)) {
                echo "<tr class=\"bg1\">";
            } else {
                echo "<tr class=\"bg2\">";
            }
            // line 78
            echo "\t\t<td>";
            echo $this->getAttribute($context["usernotes"], "REPORT_BY", array());
            echo "</td>
\t\t<td class=\"center\">";
            // line 79
            echo $this->getAttribute($context["usernotes"], "IP", array());
            echo "</td>
\t\t<td class=\"center\">";
            // line 80
            echo $this->getAttribute($context["usernotes"], "REPORT_AT", array());
            echo "</td>
\t\t<td>";
            // line 81
            echo $this->getAttribute($context["usernotes"], "ACTION", array());
            echo "</td>

\t\t";
            // line 83
            if (($context["S_CLEAR_ALLOWED"] ?? null)) {
                echo "<td class=\"center\" style=\"width: 5%;\"><input type=\"checkbox\" name=\"marknote[]\" id=\"note-";
                echo $this->getAttribute($context["usernotes"], "ID", array());
                echo "\" value=\"";
                echo $this->getAttribute($context["usernotes"], "ID", array());
                echo "\" /></td>";
            }
            // line 84
            echo "\t</tr>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 86
            echo "\t<tr>
\t\t<td class=\"bg1\" colspan=\"";
            // line 87
            if (($context["S_CLEAR_ALLOWED"] ?? null)) {
                echo "5";
            } else {
                echo "4";
            }
            echo "\" align=\"center\"><span class=\"gen\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_ENTRIES");
            echo "</span></td>
\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usernotes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "\t</tbody>
\t</table>

\t<div class=\"action-bar bottom\">
\t\t";
        // line 94
        $location = "display_options.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("display_options.html", "mcp_notes_user.html", 94)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 95
        echo "
\t\t<div class=\"pagination\">
\t\t\t";
        // line 97
        echo ($context["TOTAL_REPORTS"] ?? null);
        echo "
\t\t\t";
        // line 98
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 99
            echo "\t\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "mcp_notes_user.html", 99)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 100
            echo "\t\t\t";
        } else {
            // line 101
            echo "\t\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t\t";
        }
        // line 103
        echo "\t\t</div>
\t</div>

\t</div>
</div>

";
        // line 109
        if (($context["S_CLEAR_ALLOWED"] ?? null)) {
            // line 110
            echo "<fieldset class=\"display-actions\">
\t<input class=\"button2\" type=\"submit\" name=\"action[del_all]\" value=\"";
            // line 111
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_ALL");
            echo "\" />
\t&nbsp;<input class=\"button1\" type=\"submit\" name=\"action[del_marked]\" value=\"";
            // line 112
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_MARKED");
            echo "\" />
</fieldset>

<fieldset class=\"display-actions\">
\t<div><a href=\"#\" onclick=\"marklist('mcp', 'marknote', true); return false;\">";
            // line 116
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('mcp', 'marknote', false); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
            echo "</a></div>
</fieldset>
";
        }
        // line 119
        echo "</form>

";
        // line 121
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_notes_user.html", 121)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_notes_user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  379 => 121,  375 => 119,  367 => 116,  360 => 112,  356 => 111,  353 => 110,  351 => 109,  343 => 103,  337 => 101,  334 => 100,  321 => 99,  319 => 98,  315 => 97,  311 => 95,  299 => 94,  293 => 90,  278 => 87,  275 => 86,  269 => 84,  261 => 83,  256 => 81,  252 => 80,  248 => 79,  243 => 78,  236 => 77,  231 => 76,  226 => 73,  220 => 72,  216 => 71,  212 => 70,  208 => 69,  204 => 68,  196 => 62,  190 => 60,  187 => 59,  174 => 58,  172 => 57,  168 => 56,  158 => 54,  148 => 47,  144 => 46,  138 => 45,  125 => 35,  121 => 34,  104 => 23,  97 => 22,  89 => 21,  75 => 20,  66 => 19,  60 => 15,  54 => 14,  47 => 10,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mcp_notes_user.html", "");
    }
}
