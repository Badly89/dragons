<?php

/* acp_avatar_options_local.html */
class __TwigTemplate_01176903b41c024ed5ba67fb54d4bf73b18149a8e7aca80fd02f6659a2892de6 extends Twig_Template
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
        echo "<dl>
\t<dt><label for=\"category\">";
        // line 2
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AVATAR_CATEGORY");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t<dd><select name=\"avatar_local_cat\" id=\"category\">
\t\t";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "avatar_local_cats", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["avatar_local_cats"]) {
            // line 5
            echo "\t\t<option value=\"";
            echo $this->getAttribute($context["avatar_local_cats"], "NAME", array());
            echo "\"";
            if ($this->getAttribute($context["avatar_local_cats"], "SELECTED", array())) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo $this->getAttribute($context["avatar_local_cats"], "NAME", array());
            echo "</option>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_local_cats'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "\t</select>&nbsp;<input type=\"submit\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GO");
        echo "\" name=\"avatar_local_go\" class=\"button2\" /></dd>
</dl>
\t";
        // line 9
        if (($context["AVATAR_LOCAL_SHOW"] ?? null)) {
            // line 10
            echo "\t<ul id=\"gallery\">
\t";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "avatar_local_row", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["avatar_local_row"]) {
                // line 12
                echo "\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["avatar_local_row"], "avatar_local_col", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["avatar_local_col"]) {
                    // line 13
                    echo "\t\t<li>
\t\t\t<label for=\"av-";
                    // line 14
                    echo $this->getAttribute($context["avatar_local_row"], "S_ROW_COUNT", array());
                    echo "-";
                    echo $this->getAttribute($context["avatar_local_col"], "S_ROW_COUNT", array());
                    echo "\"><img src=\"";
                    echo $this->getAttribute($context["avatar_local_col"], "AVATAR_IMAGE", array());
                    echo "\" alt=\"\" /><br />
\t\t\t<input type=\"radio\" name=\"avatar_local_file\" id=\"av-";
                    // line 15
                    echo $this->getAttribute($context["avatar_local_row"], "S_ROW_COUNT", array());
                    echo "-";
                    echo $this->getAttribute($context["avatar_local_col"], "S_ROW_COUNT", array());
                    echo "\" value=\"";
                    echo $this->getAttribute($context["avatar_local_col"], "AVATAR_FILE", array());
                    echo "\"";
                    if ($this->getAttribute($context["avatar_local_col"], "CHECKED", array())) {
                        echo "checked=\"checked\"";
                    }
                    echo " /></label>
\t\t</li>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_local_col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_local_row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "\t</ul>
\t";
        }
    }

    public function getTemplateName()
    {
        return "acp_avatar_options_local.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 19,  95 => 18,  78 => 15,  70 => 14,  67 => 13,  62 => 12,  58 => 11,  55 => 10,  53 => 9,  47 => 7,  32 => 5,  28 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_avatar_options_local.html", "");
    }
}
