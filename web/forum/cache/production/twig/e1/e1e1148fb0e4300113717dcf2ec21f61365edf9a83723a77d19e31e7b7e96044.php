<?php

/* posting_smilies.html */
class __TwigTemplate_4170a302e0d64bad94d791a9c6ba10c9a3ff5dd37683d98a53db4a0499f219b6 extends Twig_Template
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
        $location = "simple_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("simple_header.html", "posting_smilies.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<script>
\tvar form_name = opener.form_name;
\tvar text_name = opener.text_name;
</script>
";
        // line 7
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
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 8
        echo "
<h2>";
        // line 9
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SMILIES");
        echo "</h2>
<div class=\"panel\">
\t<div class=\"inner\">
\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "smiley", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["smiley"]) {
            // line 13
            echo "\t\t\t<a href=\"#\" onclick=\"initInsertions(); insert_text('";
            echo $this->getAttribute($context["smiley"], "A_SMILEY_CODE", array());
            echo "', true, true); return false;\"><img src=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_IMG", array());
            echo "\" width=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_WIDTH", array());
            echo "\" height=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_HEIGHT", array());
            echo "\" alt=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_CODE", array());
            echo "\" title=\"";
            echo $this->getAttribute($context["smiley"], "SMILEY_DESC", array());
            echo "\" /></a>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['smiley'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
\t</div>
</div>
";
        // line 18
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 19
            echo "\t<div class=\"pagination\">
\t\t";
            // line 20
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "posting_smilies.html", 20)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 21
            echo "\t</div>
";
        }
        // line 23
        echo "<a href=\"#\" onclick=\"window.close(); return false;\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CLOSE_WINDOW");
        echo "</a>

";
        // line 25
        $location = "simple_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("simple_footer.html", "posting_smilies.html", 25)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "posting_smilies.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 25,  107 => 23,  103 => 21,  91 => 20,  88 => 19,  86 => 18,  81 => 15,  62 => 13,  58 => 12,  52 => 9,  49 => 8,  38 => 7,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "posting_smilies.html", "");
    }
}
