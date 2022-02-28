<?php

/* timezone_option.html */
class __TwigTemplate_1ae72a8af0cf3c595a962a20e7ed07f1c7c1b54861de8272df1f4a61be13bed0 extends Twig_Template
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
\t<dt><label for=\"timezone\">";
        // line 2
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BOARD_TIMEZONE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t";
        // line 3
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "timezone_date", array()))) {
            // line 4
            echo "\t<dd id=\"tz_select_date\" style=\"display: none;\">
\t\t<select name=\"tz_date\" id=\"tz_date\" class=\"autowidth tz_select\">
\t\t\t<option value=\"\">";
            // line 6
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_CURRENT_TIME");
            echo "</option>
\t\t\t";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "timezone_date", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["timezone_date"]) {
                // line 8
                echo "\t\t\t<option value=\"";
                echo $this->getAttribute($context["timezone_date"], "VALUE", array());
                echo "\"";
                if ($this->getAttribute($context["timezone_date"], "SELECTED", array())) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["timezone_date"], "TITLE", array());
                echo "</option>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone_date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "\t\t</select>
\t</dd>
\t";
        }
        // line 13
        echo "\t<dd>
\t\t<select name=\"tz\" id=\"timezone\" class=\"autowidth tz_select\">
\t\t\t<option value=\"\">";
        // line 15
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_TIMEZONE");
        echo "</option>
\t\t\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "timezone_select", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["timezone_select"]) {
            // line 17
            echo "\t\t\t<optgroup label=\"";
            echo $this->getAttribute($context["timezone_select"], "LABEL", array());
            echo "\" data-tz-value=\"";
            echo $this->getAttribute($context["timezone_select"], "VALUE", array());
            echo "\">
\t\t\t\t";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["timezone_select"], "timezone_options", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["timezone_options"]) {
                // line 19
                echo "\t\t\t\t<option title=\"";
                echo $this->getAttribute($context["timezone_options"], "TITLE", array());
                echo "\" value=\"";
                echo $this->getAttribute($context["timezone_options"], "VALUE", array());
                echo "\"";
                if ($this->getAttribute($context["timezone_options"], "SELECTED", array())) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["timezone_options"], "LABEL", array());
                echo "</option>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone_options'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "\t\t\t</optgroup>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone_select'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t</select>

\t\t";
        // line 25
        $asset_file = "timezone.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('6');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 26
        echo "\t</dd>
</dl>
";
    }

    public function getTemplateName()
    {
        return "timezone_option.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 26,  112 => 25,  108 => 23,  101 => 21,  84 => 19,  80 => 18,  73 => 17,  69 => 16,  65 => 15,  61 => 13,  56 => 10,  41 => 8,  37 => 7,  33 => 6,  29 => 4,  27 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "timezone_option.html", "");
    }
}
