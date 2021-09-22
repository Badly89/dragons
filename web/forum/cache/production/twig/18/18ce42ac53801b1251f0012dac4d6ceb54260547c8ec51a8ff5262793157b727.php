<?php

/* acp_users_avatar.html */
class __TwigTemplate_27e9811f076e46c8d81989730fd2fb8b6fa7c910e66fd7d9e90c24bfa7a68aad extends Twig_Template
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
        echo "\t<form id=\"avatar_settings\" method=\"post\" action=\"";
        echo ($context["U_ACTION"] ?? null);
        echo "\" enctype=\"multipart/form-data\">

\t<fieldset>
\t\t<legend>";
        // line 4
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_USER_AVATAR");
        echo "</legend>
\t";
        // line 5
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 6
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 7
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CURRENT_IMAGE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AVATAR_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>";
        // line 8
        echo ($context["AVATAR"] ?? null);
        echo "</dd>
\t\t\t<dd><label for=\"avatar_delete\"><input type=\"checkbox\" name=\"avatar_delete\" id=\"avatar_delete\" /> ";
        // line 9
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_AVATAR");
        echo "</label></dd>
\t\t</dl>
\t</fieldset>
\t<fieldset>
\t\t<legend>";
        // line 13
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AVATAR_SELECT");
        echo "</legend>
\t\t<dl>
\t\t\t<dt><label>";
        // line 15
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AVATAR_TYPE");
        echo "</label></dt>
\t\t\t<dd><select name=\"avatar_driver\" id=\"avatar_driver\" data-togglable-settings=\"true\">
\t\t\t\t";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "avatar_drivers", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
            // line 18
            echo "\t\t\t\t<option value=\"";
            echo $this->getAttribute($context["avatar_drivers"], "DRIVER", array());
            echo "\"";
            if ($this->getAttribute($context["avatar_drivers"], "SELECTED", array())) {
                echo " selected=\"selected\"";
            }
            echo " data-toggle-setting=\"#avatar_option_";
            echo $this->getAttribute($context["avatar_drivers"], "DRIVER", array());
            echo "\">";
            echo $this->getAttribute($context["avatar_drivers"], "L_TITLE", array());
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "\t\t\t</select></dd>
\t\t</dl>
\t\t<div id=\"avatar_options\">
\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "avatar_drivers", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
            // line 24
            echo "\t\t\t<div id=\"avatar_option_";
            echo $this->getAttribute($context["avatar_drivers"], "DRIVER", array());
            echo "\">
\t\t\t\t<p>";
            // line 25
            echo $this->getAttribute($context["avatar_drivers"], "L_EXPLAIN", array());
            echo "</p>
\t\t\t\t";
            // line 26
            echo $this->getAttribute($context["avatar_drivers"], "OUTPUT", array());
            echo "
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t</div>
\t</fieldset>

\t<fieldset class=\"quick\">
\t\t<input type=\"submit\" name=\"update\" value=\"";
        // line 33
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 34
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>
\t</form>
";
    }

    public function getTemplateName()
    {
        return "acp_users_avatar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 34,  121 => 33,  115 => 29,  106 => 26,  102 => 25,  97 => 24,  93 => 23,  88 => 20,  71 => 18,  67 => 17,  62 => 15,  57 => 13,  50 => 9,  46 => 8,  39 => 7,  36 => 6,  30 => 5,  26 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_users_avatar.html", "");
    }
}
