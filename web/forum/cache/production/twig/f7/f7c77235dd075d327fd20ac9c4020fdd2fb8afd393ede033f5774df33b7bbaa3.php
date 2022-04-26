<?php

/* mcp_ban.html */
class __TwigTemplate_027d71aba3feeb9b652f965567712e9a7f4c4985e2cd9f65b3bb0e55daa78f60 extends Twig_Template
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
        $this->loadTemplate("mcp_header.html", "mcp_ban.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<script>
\tvar ban_length = new Array();
\t\tban_length[-1] = '';
\tvar ban_reason = new Array();
\t\tban_reason[-1] = '';
\tvar ban_give_reason = new Array();
\t\tban_give_reason[-1] = '';

\t";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "bans", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["bans"]) {
            // line 12
            echo "\t\tban_length['";
            echo $this->getAttribute($context["bans"], "BAN_ID", array());
            echo "'] = '";
            echo $this->getAttribute($context["bans"], "A_LENGTH", array());
            echo "';
\t\t";
            // line 13
            if ($this->getAttribute($context["bans"], "A_REASON", array())) {
                // line 14
                echo "\t\t\tban_reason['";
                echo $this->getAttribute($context["bans"], "BAN_ID", array());
                echo "'] = '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["bans"], "A_REASON", array()), "js");
                echo "';
\t\t";
            }
            // line 16
            echo "\t\t";
            if ($this->getAttribute($context["bans"], "A_GIVE_REASON", array())) {
                // line 17
                echo "\t\t\tban_give_reason['";
                echo $this->getAttribute($context["bans"], "BAN_ID", array());
                echo "'] = '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["bans"], "A_GIVE_REASON", array()), "js");
                echo "';
\t\t";
            }
            // line 19
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bans'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
\tfunction display_details(option)
\t{
\t\tdocument.getElementById('unbanlength').innerHTML = ban_length[option];
\t\tif (option in ban_reason) {
\t\t\tdocument.getElementById('unbanreason').innerHTML = ban_reason[option];
\t\t} else {
\t\t\tdocument.getElementById('unbanreason').innerHTML = '';
\t\t}
\t\tif (option in ban_give_reason) {
\t\t\tdocument.getElementById('unbangivereason').innerHTML = ban_give_reason[option];
\t\t} else {
\t\t\tdocument.getElementById('unbangivereason').innerHTML = '';
\t\t}
\t}
</script>

<form id=\"mcp_ban\" method=\"post\" action=\"";
        // line 37
        echo ($context["U_ACTION"] ?? null);
        echo "\">

<h2>";
        // line 39
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 44
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h3>
\t<p>";
        // line 45
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXPLAIN");
        echo "</p>

\t<fieldset>
\t";
        // line 48
        // line 49
        echo "\t<dl>
\t\t<dt><label for=\"ban\">";
        // line 50
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_CELL");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label for=\"ban\"><textarea name=\"ban\" id=\"ban\" class=\"inputbox\" cols=\"40\" rows=\"3\">";
        // line 51
        echo ($context["BAN_QUANTIFIER"] ?? null);
        echo "</textarea></label></dd>
\t\t";
        // line 52
        if (($context["S_USERNAME_BAN"] ?? null)) {
            echo "<dd><strong><a href=\"";
            echo ($context["U_FIND_USERNAME"] ?? null);
            echo "\" onclick=\"find_username(this.href); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FIND_USERNAME");
            echo "</a></strong></dd>";
        }
        // line 53
        echo "\t</dl>
\t<dl>
\t\t<dt><label for=\"banlength\">";
        // line 55
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label for=\"banlength\"><select name=\"banlength\" id=\"banlength\" onchange=\"if(this.value==-1){document.getElementById('banlengthother').style.display = 'block';}else{document.getElementById('banlengthother').style.display='none';}\">";
        // line 56
        echo ($context["S_BAN_END_OPTIONS"] ?? null);
        echo "</select></label></dd>
\t\t<dd id=\"banlengthother\" style=\"display: none;\"><label><input type=\"text\" name=\"banlengthother\" class=\"inputbox\" /><br /><span>";
        // line 57
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YEAR_MONTH_DAY");
        echo "</span></label></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"banreason\">";
        // line 60
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_REASON");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><input name=\"banreason\" id=\"banreason\" type=\"text\" class=\"inputbox\" maxlength=\"255\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"bangivereason\">";
        // line 64
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_GIVE_REASON");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><input name=\"bangivereason\" id=\"bangivereason\" type=\"text\" class=\"inputbox\" maxlength=\"255\" /></dd>
\t</dl>

\t<hr />

\t<dl>
\t\t<dt><label for=\"banexclude0\">";
        // line 71
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_EXCLUDE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_EXCLUDE_EXPLAIN");
        echo "</span></dt>
\t\t<dd>
\t\t\t<label for=\"banexclude1\"><input type=\"radio\" name=\"banexclude\" id=\"banexclude1\" value=\"1\" /> ";
        // line 73
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label for=\"banexclude0\"><input type=\"radio\" name=\"banexclude\" id=\"banexclude0\" value=\"0\" checked=\"checked\" /> ";
        // line 74
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t</dd>
\t</dl>
\t";
        // line 77
        // line 78
        echo "\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 84
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"reset\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"bansubmit\" value=\"";
        // line 85
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 86
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>

<div class=\"panel\">
\t<div class=\"inner\">

\t<h3>";
        // line 92
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNBAN_TITLE");
        echo "</h3>
\t<p>";
        // line 93
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNBAN_EXPLAIN");
        echo "</p>

\t";
        // line 95
        if (($context["S_BANNED_OPTIONS"] ?? null)) {
            // line 96
            echo "\t\t<fieldset>
\t\t";
            // line 97
            // line 98
            echo "\t\t<dl>
\t\t\t<dt><label for=\"unban\">";
            // line 99
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_CELL");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><select name=\"unban[]\" id=\"unban\" multiple=\"multiple\" size=\"5\" onchange=\"if (this.selectedIndex != -1) {display_details(this.options[this.selectedIndex].value);}\">";
            // line 100
            echo ($context["BANNED_OPTIONS"] ?? null);
            echo "</select></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt>";
            // line 103
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</dt>
\t\t\t<dd><strong id=\"unbanlength\"></strong></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt>";
            // line 107
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_REASON");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</dt>
\t\t\t<dd><strong id=\"unbanreason\"></strong></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt>";
            // line 111
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_GIVE_REASON");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</dt>
\t\t\t<dd><strong id=\"unbangivereason\"></strong></dd>
\t\t</dl>
\t\t";
            // line 114
            // line 115
            echo "\t\t</fieldset>

\t\t</div>
\t</div>

\t<fieldset class=\"submit-buttons\">
\t\t";
            // line 121
            echo ($context["S_HIDDEN_FIELDS"] ?? null);
            echo "<input type=\"reset\" value=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
            echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t\t<input type=\"submit\" name=\"unbansubmit\" value=\"";
            // line 122
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t</fieldset>

\t";
        } else {
            // line 126
            echo "
\t\t<p><strong>";
            // line 127
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_BAN_CELL");
            echo "</strong></p>

\t\t</div>
\t</div>

\t";
        }
        // line 133
        echo "</form>

";
        // line 135
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_ban.html", 135)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_ban.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 135,  313 => 133,  304 => 127,  301 => 126,  294 => 122,  288 => 121,  280 => 115,  279 => 114,  272 => 111,  264 => 107,  256 => 103,  250 => 100,  245 => 99,  242 => 98,  241 => 97,  238 => 96,  236 => 95,  231 => 93,  227 => 92,  218 => 86,  214 => 85,  208 => 84,  200 => 78,  199 => 77,  193 => 74,  189 => 73,  181 => 71,  170 => 64,  162 => 60,  156 => 57,  152 => 56,  147 => 55,  143 => 53,  135 => 52,  131 => 51,  126 => 50,  123 => 49,  122 => 48,  116 => 45,  112 => 44,  104 => 39,  99 => 37,  80 => 20,  74 => 19,  66 => 17,  63 => 16,  55 => 14,  53 => 13,  46 => 12,  42 => 11,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mcp_ban.html", "");
    }
}
