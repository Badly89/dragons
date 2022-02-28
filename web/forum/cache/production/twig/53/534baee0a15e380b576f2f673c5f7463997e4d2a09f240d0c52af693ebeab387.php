<?php

/* posting_pm_header.html */
class __TwigTemplate_700bed02cfe9198606ce3bd5a7a07d2b112159131ea3c9a2e50b12df94932d8b extends Twig_Template
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
        echo "<fieldset class=\"fields1\">
\t";
        // line 2
        if ( !($context["S_SHOW_DRAFTS"] ?? null)) {
            // line 3
            echo "
\t\t";
            // line 4
            if (($context["S_GROUP_OPTIONS"] ?? null)) {
                // line 5
                echo "\t\t\t<div class=\"column2\">
\t\t\t\t<label for=\"group_list\"><strong>";
                // line 6
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TO_ADD_GROUPS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong></label><br />
\t\t\t\t<select name=\"group_list[]\" id=\"group_list\" multiple=\"multiple\" size=\"3\" class=\"inputbox\">";
                // line 7
                echo ($context["S_GROUP_OPTIONS"] ?? null);
                echo "</select><br />
\t\t\t</div>
\t\t";
            }
            // line 10
            echo "\t\t";
            if (($context["S_ALLOW_MASS_PM"] ?? null)) {
                // line 11
                echo "\t\t<div class=\"column1\">
\t\t\t";
                // line 12
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    // line 13
                    echo "\t\t\t<dl class=\"pmlist\">
\t\t\t\t<dt><label><strong>";
                    // line 14
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TO_ADD_MASS");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong><textarea id=\"username_list\" name=\"username_list\" class=\"inputbox\" cols=\"50\" rows=\"2\" tabindex=\"1\"></textarea></label></dt>
\t\t\t\t<dd class=\"recipients\">
\t\t\t\t<input type=\"submit\" name=\"add_to\" value=\"";
                    // line 16
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD");
                    echo "\" class=\"button2\" tabindex=\"1\" />
\t\t\t\t<input type=\"submit\" name=\"add_bcc\" value=\"";
                    // line 17
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_BCC");
                    echo "\" class=\"button2\" tabindex=\"1\" />
\t\t\t\t";
                    // line 18
                    // line 19
                    echo "\t\t\t\t<span><a href=\"";
                    echo ($context["U_FIND_USERNAME"] ?? null);
                    echo "\" onclick=\"find_username(this.href); return false;\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FIND_USERNAME");
                    echo "</a></span>
\t\t\t\t";
                    // line 20
                    // line 21
                    echo "\t\t\t\t</dd>
\t\t\t</dl>
\t\t\t";
                }
                // line 24
                echo "\t\t</div>
\t\t";
                // line 25
                if ((twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "to_recipient", array())) || twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "bcc_recipient", array())))) {
                    echo "<hr />";
                }
                // line 26
                echo "\t\t<div class=\"column1\">
\t\t\t";
                // line 27
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "to_recipient", array()))) {
                    // line 28
                    echo "\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
                    // line 29
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TO_MASS");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</label></dt>
\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t";
                    // line 32
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "to_recipient", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["to_recipient"]) {
                        // line 33
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                        // line 34
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo $this->getAttribute($context["to_recipient"], "TYPE", array());
                            echo "[";
                            echo $this->getAttribute($context["to_recipient"], "UG_ID", array());
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 35
                        echo "\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["to_recipient"], "IS_GROUP", array())) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["to_recipient"], "U_VIEW", array());
                            echo "\" style=\"color: ";
                            echo $this->getAttribute($context["to_recipient"], "COLOUR", array());
                            echo "\"><strong>";
                            echo $this->getAttribute($context["to_recipient"], "NAME", array());
                            echo "</strong></a>";
                        } else {
                            echo $this->getAttribute($context["to_recipient"], "NAME_FULL", array());
                        }
                        // line 36
                        echo "\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['to_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    echo "\t\t\t\t\t</ul>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t";
                }
                // line 42
                echo "\t\t</div>
\t\t\t";
                // line 43
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "bcc_recipient", array()))) {
                    // line 44
                    echo "\t\t\t<div class=\"column2\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
                    // line 46
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BCC");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</label></dt>
\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t";
                    // line 49
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "bcc_recipient", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["bcc_recipient"]) {
                        // line 50
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                        // line 51
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo $this->getAttribute($context["bcc_recipient"], "TYPE", array());
                            echo "[";
                            echo $this->getAttribute($context["bcc_recipient"], "UG_ID", array());
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 52
                        echo "\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["bcc_recipient"], "IS_GROUP", array())) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["bcc_recipient"], "U_VIEW", array());
                            echo "\" style=\"color: ";
                            echo $this->getAttribute($context["bcc_recipient"], "COLOUR", array());
                            echo "\"><strong>";
                            echo $this->getAttribute($context["bcc_recipient"], "NAME", array());
                            echo "</strong></a>";
                        } else {
                            echo $this->getAttribute($context["bcc_recipient"], "NAME_FULL", array());
                        }
                        // line 53
                        echo "\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bcc_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 55
                    echo "\t\t\t\t\t</ul>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t</div>
\t\t\t";
                }
                // line 60
                echo "\t\t";
            } else {
                // line 61
                echo "\t\t<div class=\"column1\">
\t\t\t<dl>
\t\t\t\t<dt><label for=\"username_list\">";
                // line 63
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TO_ADD");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label>";
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    echo "<br /><span><a href=\"";
                    echo ($context["U_FIND_USERNAME"] ?? null);
                    echo "\" onclick=\"find_username(this.href); return false\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FIND_USERNAME");
                    echo "</a></span>";
                }
                echo "</dt>
\t\t\t\t";
                // line 64
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    // line 65
                    echo "\t\t\t\t<dd><input class=\"inputbox\" type=\"text\" name=\"username_list\" id=\"username_list\" size=\"20\" value=\"\" /> <input type=\"submit\" name=\"add_to\" value=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD");
                    echo "\" class=\"button2\" /></dd>
\t\t\t\t";
                }
                // line 67
                echo "\t\t\t\t";
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "to_recipient", array()))) {
                    // line 68
                    echo "\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t";
                    // line 70
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "to_recipient", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["to_recipient"]) {
                        // line 71
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                        // line 72
                        if ($this->getAttribute($context["to_recipient"], "IS_GROUP", array())) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["to_recipient"], "U_VIEW", array());
                            echo "\"><strong>";
                            echo $this->getAttribute($context["to_recipient"], "NAME", array());
                            echo "</strong></a>";
                        } else {
                            echo $this->getAttribute($context["to_recipient"], "NAME_FULL", array());
                        }
                        echo "&nbsp;
\t\t\t\t\t\t\t";
                        // line 73
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo $this->getAttribute($context["to_recipient"], "TYPE", array());
                            echo "[";
                            echo $this->getAttribute($context["to_recipient"], "UG_ID", array());
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 74
                        echo "\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['to_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "\t\t\t\t\t</dd>
\t\t\t\t";
                }
                // line 78
                echo "\t\t\t</dl>
\t\t</div>
\t\t";
            }
            // line 81
            echo "
\t";
        }
        // line 83
        echo "\t</fieldset>
";
    }

    public function getTemplateName()
    {
        return "posting_pm_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 83,  281 => 81,  276 => 78,  272 => 76,  265 => 74,  257 => 73,  245 => 72,  242 => 71,  238 => 70,  234 => 68,  231 => 67,  225 => 65,  223 => 64,  210 => 63,  206 => 61,  203 => 60,  196 => 55,  189 => 53,  176 => 52,  168 => 51,  165 => 50,  161 => 49,  154 => 46,  150 => 44,  148 => 43,  145 => 42,  139 => 38,  132 => 36,  119 => 35,  111 => 34,  108 => 33,  104 => 32,  97 => 29,  94 => 28,  92 => 27,  89 => 26,  85 => 25,  82 => 24,  77 => 21,  76 => 20,  69 => 19,  68 => 18,  64 => 17,  60 => 16,  54 => 14,  51 => 13,  49 => 12,  46 => 11,  43 => 10,  37 => 7,  32 => 6,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "posting_pm_header.html", "");
    }
}
