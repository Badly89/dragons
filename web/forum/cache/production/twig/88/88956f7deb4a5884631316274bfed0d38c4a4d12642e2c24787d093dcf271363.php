<?php

/* acp_groups_position.html */
class __TwigTemplate_a3831fea616fc1853551407a050eb3a343c9aec845e61e7a0a7df1a9c20a24c1 extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "acp_groups_position.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

\t<h1>";
        // line 5
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MANAGE_LEGEND");
        echo "</h1>

\t<form id=\"legend_settings\" method=\"post\" action=\"";
        // line 7
        echo ($context["U_ACTION"] ?? null);
        echo "\"";
        if (($context["S_CAN_UPLOAD"] ?? null)) {
            echo " enctype=\"multipart/form-data\"";
        }
        echo ">

\t<fieldset>
\t\t<legend>";
        // line 10
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND_SETTINGS");
        echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"legend_sort_groupname\">";
        // line 12
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND_SORT_GROUPNAME");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND_SORT_GROUPNAME_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" name=\"legend_sort_groupname\" class=\"radio\" value=\"1\"";
        // line 14
        if (($context["LEGEND_SORT_GROUPNAME"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t\t<label><input type=\"radio\" name=\"legend_sort_groupname\" class=\"radio\" value=\"0\"";
        // line 15
        if ( !($context["LEGEND_SORT_GROUPNAME"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>

\t<p class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
        // line 20
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" name=\"reset\" value=\"";
        // line 21
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" />
\t\t<input type=\"hidden\" name=\"action\" value=\"set_config_legend\" />
\t\t";
        // line 23
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</p>
\t</fieldset>
\t</form>

\t<p>";
        // line 28
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND_EXPLAIN");
        echo "</p>

\t<table class=\"table1\">
\t\t<col class=\"col1\" /><col class=\"col2\" /><col class=\"col2\" />
\t<thead>
\t<tr>
\t\t<th style=\"width: 50%\">";
        // line 34
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP");
        echo "</th>
\t\t<th>";
        // line 35
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP_TYPE");
        echo "</th>
\t\t<th>";
        // line 36
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACTION");
        echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "legend", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["legend"]) {
            // line 41
            echo "\t\t<tr>
\t\t\t<td><strong";
            // line 42
            if ($this->getAttribute($context["legend"], "GROUP_COLOUR", array())) {
                echo " style=\"color: ";
                echo $this->getAttribute($context["legend"], "GROUP_COLOUR", array());
                echo "\"";
            }
            echo ">";
            echo $this->getAttribute($context["legend"], "GROUP_NAME", array());
            echo "</strong></td>
\t\t\t<td style=\"text-align: center;\">";
            // line 43
            echo $this->getAttribute($context["legend"], "GROUP_TYPE", array());
            echo "</td>
\t\t\t<td class=\"actions\">
\t\t\t\t<span class=\"up-disabled\" style=\"display: none;\">";
            // line 45
            echo ($context["ICON_MOVE_UP_DISABLED"] ?? null);
            echo "</span>
\t\t\t\t<span class=\"up\"><a href=\"";
            // line 46
            echo $this->getAttribute($context["legend"], "U_MOVE_UP", array());
            echo "\" data-ajax=\"row_up\">";
            echo ($context["ICON_MOVE_UP"] ?? null);
            echo "</a></span>
\t\t\t\t<span class=\"down-disabled\" style=\"display:none;\">";
            // line 47
            echo ($context["ICON_MOVE_DOWN_DISABLED"] ?? null);
            echo "</span>
\t\t\t\t<span class=\"down\"><a href=\"";
            // line 48
            echo $this->getAttribute($context["legend"], "U_MOVE_DOWN", array());
            echo "\" data-ajax=\"row_down\">";
            echo ($context["ICON_MOVE_DOWN"] ?? null);
            echo "</a></span>
\t\t\t\t<a href=\"";
            // line 49
            echo $this->getAttribute($context["legend"], "U_DELETE", array());
            echo "\">";
            echo ($context["ICON_DELETE"] ?? null);
            echo "</a>
\t\t\t</td>
\t\t</tr>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 53
            echo "\t\t<tr>
\t\t\t<td colspan=\"3\" class=\"row3\">";
            // line 54
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_GROUPS_ADDED");
            echo "</td>
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['legend'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "\t</tbody>
\t</table>

\t<form id=\"legend_add_group\" method=\"post\" action=\"";
        // line 60
        echo ($context["U_ACTION_LEGEND"] ?? null);
        echo "\">
\t\t<fieldset class=\"quick\">
\t\t\t<select name=\"g\">
\t\t\t\t<option value=\"0\">";
        // line 63
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_GROUP");
        echo "</option>
\t\t\t\t";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "add_legend", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["add_legend"]) {
            // line 65
            echo "\t\t\t\t\t<option";
            if ($this->getAttribute($context["add_legend"], "GROUP_SPECIAL", array())) {
                echo " class=\"sep\"";
            }
            echo " value=\"";
            echo $this->getAttribute($context["add_legend"], "GROUP_ID", array());
            echo "\">";
            echo $this->getAttribute($context["add_legend"], "GROUP_NAME", array());
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['add_legend'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "\t\t\t</select>
\t\t\t";
        // line 68
        // line 69
        echo "\t\t\t<input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD");
        echo "\" />
\t\t\t<input type=\"hidden\" name=\"action\" value=\"add\" />
\t\t\t";
        // line 71
        // line 72
        echo "\t\t\t";
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t\t</fieldset>
\t</form>

\t<h1>";
        // line 76
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MANAGE_TEAMPAGE");
        echo "</h1>

\t<form id=\"teampage_settings\" method=\"post\" action=\"";
        // line 78
        echo ($context["U_ACTION"] ?? null);
        echo "\"";
        if (($context["S_CAN_UPLOAD"] ?? null)) {
            echo " enctype=\"multipart/form-data\"";
        }
        echo ">

\t<fieldset>
\t\t<legend>";
        // line 81
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_SETTINGS");
        echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"teampage_memberships\">";
        // line 83
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_MEMBERSHIPS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" name=\"teampage_memberships\" class=\"radio\" value=\"0\"";
        // line 85
        if ((($context["DISPLAY_MEMBERSHIPS"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_DISP_FIRST");
        echo "</label><br />
\t\t\t\t<label><input type=\"radio\" name=\"teampage_memberships\" class=\"radio\" value=\"1\"";
        // line 86
        if ((($context["DISPLAY_MEMBERSHIPS"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_DISP_DEFAULT");
        echo "</label><br />
\t\t\t\t<label><input type=\"radio\" name=\"teampage_memberships\" class=\"radio\" value=\"2\"";
        // line 87
        if ((($context["DISPLAY_MEMBERSHIPS"] ?? null) == 2)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_DISP_ALL");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"teampage_forums\">";
        // line 91
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_FORUMS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_FORUMS_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" name=\"teampage_forums\" class=\"radio\" value=\"1\"";
        // line 93
        if (($context["DISPLAY_FORUMS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t\t<label><input type=\"radio\" name=\"teampage_forums\" class=\"radio\" value=\"0\"";
        // line 94
        if ( !($context["DISPLAY_FORUMS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>

\t<p class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
        // line 99
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" name=\"reset\" value=\"";
        // line 100
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" />
\t\t<input type=\"hidden\" name=\"action\" value=\"set_config_teampage\" />
\t\t";
        // line 102
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</p>
\t</fieldset>
\t</form>

\t<p>";
        // line 107
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE_EXPLAIN");
        echo "</p>

\t";
        // line 109
        if ((($context["S_TEAMPAGE_CATEGORY"] ?? null) && ($context["CURRENT_CATEGORY_NAME"] ?? null))) {
            echo "<p><strong><a href=\"";
            echo ($context["U_ACTION"] ?? null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TEAMPAGE");
            echo "</a> &raquo; ";
            echo ($context["CURRENT_CATEGORY_NAME"] ?? null);
            echo "</strong></p>";
        }
        // line 110
        echo "
\t<table class=\"table1\">
\t\t<col class=\"col1\" /><col class=\"col2\" /><col class=\"col2\" />
\t<thead>
\t<tr>
\t\t<th style=\"width: 50%\">";
        // line 115
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP");
        echo "</th>
\t\t<th>";
        // line 116
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP_TYPE");
        echo "</th>
\t\t<th>";
        // line 117
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACTION");
        echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "teampage", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["teampage"]) {
            // line 122
            echo "\t\t<tr>
\t\t\t<td>
\t\t\t\t";
            // line 124
            if ($this->getAttribute($context["teampage"], "U_CATEGORY", array())) {
                // line 125
                echo "\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["teampage"], "U_CATEGORY", array());
                echo "\">";
                echo $this->getAttribute($context["teampage"], "GROUP_NAME", array());
                echo "</a>
\t\t\t\t";
            } else {
                // line 127
                echo "\t\t\t\t\t<strong";
                if ($this->getAttribute($context["teampage"], "GROUP_COLOUR", array())) {
                    echo " style=\"color: ";
                    echo $this->getAttribute($context["teampage"], "GROUP_COLOUR", array());
                    echo "\"";
                }
                echo ">";
                echo $this->getAttribute($context["teampage"], "GROUP_NAME", array());
                echo "</strong>
\t\t\t\t";
            }
            // line 129
            echo "\t\t\t</td>
\t\t\t<td style=\"text-align: center;\">";
            // line 130
            if ($this->getAttribute($context["teampage"], "GROUP_TYPE", array())) {
                echo $this->getAttribute($context["teampage"], "GROUP_TYPE", array());
            } else {
                echo "-";
            }
            // line 131
            echo "\t\t\t</td></td>
\t\t\t<td class=\"actions\">
\t\t\t\t<span class=\"up-disabled\" style=\"display: none;\">";
            // line 133
            echo ($context["ICON_MOVE_UP_DISABLED"] ?? null);
            echo "</span>
\t\t\t\t<span class=\"up\"><a href=\"";
            // line 134
            echo $this->getAttribute($context["teampage"], "U_MOVE_UP", array());
            echo "\" data-ajax=\"row_up\">";
            echo ($context["ICON_MOVE_UP"] ?? null);
            echo "</a></span>
\t\t\t\t<span class=\"down-disabled\" style=\"display:none;\">";
            // line 135
            echo ($context["ICON_MOVE_DOWN_DISABLED"] ?? null);
            echo "</span>
\t\t\t\t<span class=\"down\"><a href=\"";
            // line 136
            echo $this->getAttribute($context["teampage"], "U_MOVE_DOWN", array());
            echo "\" data-ajax=\"row_down\">";
            echo ($context["ICON_MOVE_DOWN"] ?? null);
            echo "</a></span>
\t\t\t\t<a href=\"";
            // line 137
            echo $this->getAttribute($context["teampage"], "U_DELETE", array());
            echo "\">";
            echo ($context["ICON_DELETE"] ?? null);
            echo "</a>
\t\t\t</td>
\t\t</tr>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 141
            echo "\t\t<tr>
\t\t\t<td colspan=\"3\" class=\"row3\">";
            // line 142
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_GROUPS_ADDED");
            echo "</td>
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['teampage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "\t</tbody>
\t</table>

\t";
        // line 148
        if ( !($context["S_TEAMPAGE_CATEGORY"] ?? null)) {
            // line 149
            echo "\t<form id=\"teampage_add_category\" method=\"post\" action=\"";
            echo ($context["U_ACTION_TEAMPAGE"] ?? null);
            echo "\">
\t\t<fieldset class=\"quick\">
\t\t\t<input class=\"inputbox autowidth\" type=\"text\" maxlength=\"255\" name=\"category_name\" placeholder=\"";
            // line 151
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP_CATEGORY_NAME");
            echo "\" />
\t\t\t<input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
            // line 152
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_GROUP_CATEGORY");
            echo "\" />
\t\t\t<input type=\"hidden\" name=\"action\" value=\"add_category\" />
\t\t\t";
            // line 154
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t\t</fieldset>
\t</form>
\t";
        }
        // line 158
        echo "
\t<form id=\"teampage_add_group\" method=\"post\" action=\"";
        // line 159
        echo ($context["U_ACTION_TEAMPAGE"] ?? null);
        echo "\">
\t\t<fieldset class=\"quick\">
\t\t\t<select name=\"g\">
\t\t\t\t<option value=\"0\">";
        // line 162
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_GROUP");
        echo "</option>
\t\t\t\t";
        // line 163
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "add_teampage", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["add_teampage"]) {
            // line 164
            echo "\t\t\t\t\t<option";
            if ($this->getAttribute($context["add_teampage"], "GROUP_SPECIAL", array())) {
                echo " class=\"sep\"";
            }
            echo " value=\"";
            echo $this->getAttribute($context["add_teampage"], "GROUP_ID", array());
            echo "\">";
            echo $this->getAttribute($context["add_teampage"], "GROUP_NAME", array());
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['add_teampage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 166
        echo "\t\t\t</select>
\t\t\t";
        // line 167
        // line 168
        echo "\t\t\t<input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD");
        echo "\" />
\t\t\t<input type=\"hidden\" name=\"action\" value=\"add\" />
\t\t\t";
        // line 170
        // line 171
        echo "\t\t\t";
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t\t</fieldset>
\t</form>

";
        // line 175
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_groups_position.html", 175)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_groups_position.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  546 => 175,  538 => 171,  537 => 170,  531 => 168,  530 => 167,  527 => 166,  512 => 164,  508 => 163,  504 => 162,  498 => 159,  495 => 158,  488 => 154,  483 => 152,  479 => 151,  473 => 149,  471 => 148,  466 => 145,  457 => 142,  454 => 141,  443 => 137,  437 => 136,  433 => 135,  427 => 134,  423 => 133,  419 => 131,  413 => 130,  410 => 129,  398 => 127,  390 => 125,  388 => 124,  384 => 122,  379 => 121,  372 => 117,  368 => 116,  364 => 115,  357 => 110,  347 => 109,  342 => 107,  334 => 102,  329 => 100,  325 => 99,  313 => 94,  305 => 93,  297 => 91,  286 => 87,  278 => 86,  270 => 85,  264 => 83,  259 => 81,  249 => 78,  244 => 76,  236 => 72,  235 => 71,  229 => 69,  228 => 68,  225 => 67,  210 => 65,  206 => 64,  202 => 63,  196 => 60,  191 => 57,  182 => 54,  179 => 53,  168 => 49,  162 => 48,  158 => 47,  152 => 46,  148 => 45,  143 => 43,  133 => 42,  130 => 41,  125 => 40,  118 => 36,  114 => 35,  110 => 34,  101 => 28,  93 => 23,  88 => 21,  84 => 20,  72 => 15,  64 => 14,  56 => 12,  51 => 10,  41 => 7,  36 => 5,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_groups_position.html", "");
    }
}
