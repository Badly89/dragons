<?php

/* acp_posting_buttons.html */
class __TwigTemplate_e45099b82c885efeee7493bc1833d89859868a9e2e7881ab10003cddc485680a extends Twig_Template
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
        echo "<script type=\"text/javascript\">
// <![CDATA[

\t// Define the bbCode tags
\tvar bbcode = new Array();
\tvar bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]','[quote]','[/quote]','[code]','[/code]','[list]','[/list]','[list=]','[/list]','[img]','[/img]','[url]','[/url]','[flash=]', '[/flash]','[size=]','[/size]'";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
            echo ", ";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_NAME", array());
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ");

\t// Helpline messages
\tvar help_line = {
\t\tb: '";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_B_HELP"), "js");
        echo "',
\t\ti: '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_I_HELP"), "js");
        echo "',
\t\tu: '";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_U_HELP"), "js");
        echo "',
\t\tq: '";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Q_HELP"), "js");
        echo "',
\t\tc: '";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_C_HELP"), "js");
        echo "',
\t\tl: '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_L_HELP"), "js");
        echo "',
\t\to: '";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_O_HELP"), "js");
        echo "',
\t\tp: '";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_P_HELP"), "js");
        echo "',
\t\tw: '";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_W_HELP"), "js");
        echo "',
\t\ta: '";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_A_HELP"), "js");
        echo "',
\t\ts: '";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_S_HELP"), "js");
        echo "',
\t\tf: '";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_F_HELP"), "js");
        echo "',
\t\ty: '";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Y_HELP"), "js");
        echo "',
\t\td: '";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_D_HELP"), "js");
        echo "'
\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
            // line 25
            echo "\t\t\t,cb_";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", array());
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " '";
            echo $this->getAttribute($context["custom_tags"], "A_BBCODE_HELPLINE", array());
            echo "'
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t}

// ]]>
</script>

";
        // line 32
        $asset_file = (("" . ($context["T_ASSETS_PATH"] ?? null)) . "/javascript/editor.js");
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('6');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 33
        echo "
";
        // line 34
        // line 35
        echo "<div id=\"format-buttons\">
\t<input type=\"button\" class=\"button2\" accesskey=\"b\" name=\"addbbcode0\" value=\" B \" style=\"font-weight:bold; width: 30px\" onclick=\"bbstyle(0)\" title=\"";
        // line 36
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_B_HELP");
        echo "\" />
\t<input type=\"button\" class=\"button2\" accesskey=\"i\" name=\"addbbcode2\" value=\" i \" style=\"font-style:italic; width: 30px\" onclick=\"bbstyle(2)\" title=\"";
        // line 37
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_I_HELP");
        echo "\" />
\t<input type=\"button\" class=\"button2\" accesskey=\"u\" name=\"addbbcode4\" value=\" u \" style=\"text-decoration: underline; width: 30px\" onclick=\"bbstyle(4)\" title=\"";
        // line 38
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_U_HELP");
        echo "\" />
\t";
        // line 39
        if (($context["S_BBCODE_QUOTE"] ?? null)) {
            // line 40
            echo "\t\t<input type=\"button\" class=\"button2\" accesskey=\"q\" name=\"addbbcode6\" value=\"Quote\" style=\"width: 50px\" onclick=\"bbstyle(6)\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Q_HELP");
            echo "\" />
\t";
        }
        // line 42
        echo "\t<input type=\"button\" class=\"button2\" accesskey=\"c\" name=\"addbbcode8\" value=\"Code\" style=\"width: 40px\" onclick=\"bbstyle(8)\" title=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_C_HELP");
        echo "\" />
\t<input type=\"button\" class=\"button2\" accesskey=\"l\" name=\"addbbcode10\" value=\"List\" style=\"width: 40px\" onclick=\"bbstyle(10)\" title=\"";
        // line 43
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_L_HELP");
        echo "\" />
\t<input type=\"button\" class=\"button2\" accesskey=\"o\" name=\"addbbcode12\" value=\"List=\" style=\"width: 40px\" onclick=\"bbstyle(12)\" title=\"";
        // line 44
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_O_HELP");
        echo "\" />
\t<input type=\"button\" class=\"button2\" accesskey=\"y\" name=\"addlistitem\" value=\"[*]\" style=\"width: 40px\" onclick=\"bbstyle(-1)\" title=\"";
        // line 45
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_LISTITEM_HELP");
        echo "\" />
\t";
        // line 46
        if (($context["S_BBCODE_IMG"] ?? null)) {
            // line 47
            echo "\t\t<input type=\"button\" class=\"button2\" accesskey=\"p\" name=\"addbbcode14\" value=\"Img\" style=\"width: 40px\" onclick=\"bbstyle(14)\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_P_HELP");
            echo "\" />
\t";
        }
        // line 49
        echo "\t";
        if (($context["S_LINKS_ALLOWED"] ?? null)) {
            // line 50
            echo "\t\t<input type=\"button\" class=\"button2\" accesskey=\"w\" name=\"addbbcode16\" value=\"URL\" style=\"text-decoration: underline; width: 40px\" onclick=\"bbstyle(16)\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_W_HELP");
            echo "\" />
\t";
        }
        // line 52
        echo "\t";
        if (($context["S_BBCODE_FLASH"] ?? null)) {
            // line 53
            echo "\t\t<input type=\"button\" class=\"button2\" accesskey=\"d\" name=\"addbbcode18\" value=\"Flash\" onclick=\"bbstyle(18)\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_D_HELP");
            echo "\" />
\t";
        }
        // line 55
        echo "\t<select name=\"addbbcode20\" onchange=\"bbfontstyle('[size=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/size]');this.form.addbbcode20.selectedIndex = 2;\" title=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_F_HELP");
        echo "\">
\t\t<option value=\"50\">";
        // line 56
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_TINY");
        echo "</option>
\t\t<option value=\"85\">";
        // line 57
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_SMALL");
        echo "</option>
\t\t<option value=\"100\" selected=\"selected\">";
        // line 58
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_NORMAL");
        echo "</option>
\t\t";
        // line 59
        if (( !($context["MAX_FONT_SIZE"] ?? null) || (($context["MAX_FONT_SIZE"] ?? null) >= 150))) {
            // line 60
            echo "\t\t<option value=\"150\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_LARGE");
            echo "</option>
\t\t";
            // line 61
            if (( !($context["MAX_FONT_SIZE"] ?? null) || (($context["MAX_FONT_SIZE"] ?? null) >= 200))) {
                // line 62
                echo "\t\t<option value=\"200\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_HUGE");
                echo "</option>
\t\t";
            }
            // line 64
            echo "\t\t";
        }
        // line 65
        echo "\t</select>
\t";
        // line 66
        // line 67
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
            // line 68
            echo "\t<input type=\"button\" class=\"button2\" name=\"addbbcode";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", array());
            echo "\" value=\"";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_TAG", array());
            echo "\" onclick=\"bbstyle(";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", array());
            echo ")\" title=\"";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_HELPLINE", array());
            echo "\" />
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "</div>
";
        // line 71
    }

    public function getTemplateName()
    {
        return "acp_posting_buttons.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 71,  260 => 70,  245 => 68,  240 => 67,  239 => 66,  236 => 65,  233 => 64,  227 => 62,  225 => 61,  220 => 60,  218 => 59,  214 => 58,  210 => 57,  206 => 56,  201 => 55,  195 => 53,  192 => 52,  186 => 50,  183 => 49,  177 => 47,  175 => 46,  171 => 45,  167 => 44,  163 => 43,  158 => 42,  152 => 40,  150 => 39,  146 => 38,  142 => 37,  138 => 36,  135 => 35,  134 => 34,  131 => 33,  120 => 32,  113 => 27,  101 => 25,  97 => 24,  93 => 23,  89 => 22,  85 => 21,  81 => 20,  77 => 19,  73 => 18,  69 => 17,  65 => 16,  61 => 15,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  41 => 10,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_posting_buttons.html", "");
    }
}
