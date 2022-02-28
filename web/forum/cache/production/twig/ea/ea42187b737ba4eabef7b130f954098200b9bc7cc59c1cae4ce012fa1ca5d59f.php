<?php

/* acp_ext_details.html */
class __TwigTemplate_f908cc51557670cc7587000a4d86a0f8285432dab8ca8b9e18957cd06a566aab extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "acp_ext_details.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

\t<a href=\"";
        // line 5
        echo ($context["U_BACK"] ?? null);
        echo "\" style=\"float: ";
        echo ($context["S_CONTENT_FLOW_END"] ?? null);
        echo ";\">&laquo; ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK");
        echo "</a>

\t<h1>";
        // line 7
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSIONS_ADMIN");
        echo "</h1>

\t";
        // line 9
        if (($context["S_VERSIONCHECK"] ?? null)) {
            // line 10
            echo "\t\t";
            if (($context["S_VERSIONCHECK_FAIL"] ?? null)) {
                // line 11
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 12
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VERSIONCHECK_FAIL");
                echo "</p>
\t\t\t<p>";
                // line 13
                echo ($context["VERSIONCHECK_FAIL_REASON"] ?? null);
                echo "</p>
\t\t\t<p><a href=\"";
                // line 14
                echo ($context["U_VERSIONCHECK_FORCE"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a></p>
\t\t</div>
\t\t";
            } else {
                // line 17
                echo "\t\t<div class=\"";
                if (($context["S_UP_TO_DATE"] ?? null)) {
                    echo "successbox";
                } else {
                    echo "errorbox";
                }
                echo "\">
\t\t\t<p>";
                // line 18
                echo ($context["UP_TO_DATE_MSG"] ?? null);
                echo " - <a href=\"";
                echo ($context["U_VERSIONCHECK_FORCE"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a></p>
\t\t</div>
\t\t";
            }
            // line 21
            echo "\t";
        }
        // line 22
        // line 23
        echo "
\t<fieldset>
\t\t<legend>";
        // line 25
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXT_DETAILS");
        echo "</legend>
\t\t";
        // line 26
        if (($context["META_DISPLAY_NAME"] ?? null)) {
            // line 27
            echo "\t\t<dl>
\t\t\t<dt><label>";
            // line 28
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DISPLAY_NAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><strong id=\"meta_display_name\">";
            // line 29
            echo ($context["META_DISPLAY_NAME"] ?? null);
            echo "</strong></dd>
\t\t</dl>
\t\t";
        }
        // line 32
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 33
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CLEAN_NAME");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd><strong id=\"meta_name\">";
        // line 34
        echo ($context["META_NAME"] ?? null);
        echo "</strong></dd>
\t\t</dl>
\t\t";
        // line 36
        if (($context["META_DESCRIPTION"] ?? null)) {
            // line 37
            echo "\t\t<dl>
\t\t\t<dt><label>";
            // line 38
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DESCRIPTION");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><span id=\"meta_description\">";
            // line 39
            echo ($context["META_DESCRIPTION"] ?? null);
            echo "</span></dd>
\t\t</dl>
\t\t";
        }
        // line 42
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 43
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VERSION");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd><span id=\"meta_version\">";
        // line 44
        echo ($context["META_VERSION"] ?? null);
        echo "</span></dd>
\t\t</dl>
\t\t";
        // line 46
        if (($context["META_HOMEPAGE"] ?? null)) {
            // line 47
            echo "\t\t<dl>
\t\t\t<dt><label>";
            // line 48
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("HOMEPAGE");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><strong id=\"meta_homepage\"><a href=\"";
            // line 49
            echo ($context["META_HOMEPAGE"] ?? null);
            echo "\">";
            echo ($context["META_HOMEPAGE"] ?? null);
            echo "</a></strong></dd>
\t\t</dl>
\t\t";
        }
        // line 52
        echo "\t\t";
        if (($context["META_TIME"] ?? null)) {
            // line 53
            echo "\t\t<dl>
\t\t\t<dt><label>";
            // line 54
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><span id=\"meta_time\">";
            // line 55
            echo ($context["META_TIME"] ?? null);
            echo "</span></dd>
\t\t</dl>
\t\t";
        }
        // line 58
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 59
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LICENSE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd><span id=\"meta_license\">";
        // line 60
        echo ($context["META_LICENSE"] ?? null);
        echo "</span></dd>
\t\t</dl>
\t</fieldset>

\t";
        // line 64
        if ((($context["S_VERSIONCHECK"] ?? null) &&  !($context["S_UP_TO_DATE"] ?? null))) {
            // line 65
            echo "\t<fieldset>
\t\t<legend>";
            // line 66
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LATEST_VERSION");
            echo "</legend>
\t\t";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "updates_available", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["updates_available"]) {
                // line 68
                echo "\t\t<fieldset>
\t\t\t<dl>
\t\t\t\t<dt><label>";
                // line 70
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VERSION");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><strong>";
                // line 71
                echo $this->getAttribute($context["updates_available"], "current", array());
                echo "</strong></dd>
\t\t\t</dl>
\t\t\t";
                // line 73
                if ($this->getAttribute($context["updates_available"], "download", array())) {
                    // line 74
                    echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                    // line 75
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD_LATEST");
                    echo "</label></dt>
\t\t\t\t<dd><strong><a href=\"";
                    // line 76
                    echo $this->getAttribute($context["updates_available"], "download", array());
                    echo "\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD");
                    echo " ";
                    echo ($context["META_NAME"] ?? null);
                    echo " ";
                    echo ($context["LATEST_VERSION"] ?? null);
                    echo "</a></strong></dd>
\t\t\t</dl>
\t\t\t";
                }
                // line 79
                echo "\t\t\t";
                if ($this->getAttribute($context["updates_available"], "announcement", array())) {
                    // line 80
                    echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                    // line 81
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ANNOUNCEMENT_TOPIC");
                    echo "</label></dt>
\t\t\t\t<dd><strong><a href=\"";
                    // line 82
                    echo $this->getAttribute($context["updates_available"], "announcement", array());
                    echo "\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RELEASE_ANNOUNCEMENT");
                    echo "</a></strong></dd>
\t\t\t</dl>
\t\t\t";
                }
                // line 85
                echo "\t\t</fieldset>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['updates_available'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "\t</fieldset>
\t";
        }
        // line 89
        echo "
\t";
        // line 90
        if ((($context["META_REQUIRE_PHPBB"] ?? null) || ($context["META_REQUIRE_PHP"] ?? null))) {
            // line 91
            echo "\t<fieldset>
\t\t<legend>";
            // line 92
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REQUIREMENTS");
            echo "</legend>
\t\t";
            // line 93
            if (($context["META_REQUIRE_PHPBB"] ?? null)) {
                // line 94
                echo "\t\t<dl";
                if (($context["META_REQUIRE_PHPBB_FAIL"] ?? null)) {
                    echo " class=\"requirements_not_met\"";
                }
                echo ">
\t\t\t<dt><label>";
                // line 95
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PHPBB_VERSION");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><span id=\"require_phpbb\">";
                // line 96
                echo ($context["META_REQUIRE_PHPBB"] ?? null);
                echo "</span></dd>
\t\t</dl>
\t\t";
            }
            // line 99
            echo "\t\t";
            if (($context["META_REQUIRE_PHP"] ?? null)) {
                // line 100
                echo "\t\t<dl";
                if (($context["META_REQUIRE_PHP_FAIL"] ?? null)) {
                    echo " class=\"requirements_not_met\"";
                }
                echo ">
\t\t\t<dt><label>";
                // line 101
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PHP_VERSION");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><span id=\"require_php\">";
                // line 102
                echo ($context["META_REQUIRE_PHP"] ?? null);
                echo "</span></dd>
\t\t</dl>
\t\t";
            }
            // line 105
            echo "\t</fieldset>
\t";
        }
        // line 107
        echo "
\t<fieldset>
\t\t<legend>";
        // line 109
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AUTHOR_INFORMATION");
        echo "</legend>
\t\t";
        // line 110
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "meta_authors", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["meta_authors"]) {
            // line 111
            echo "\t\t<fieldset>
\t\t\t<dl>
\t\t\t\t<dt><label>";
            // line 113
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AUTHOR_NAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd><strong>";
            // line 114
            echo $this->getAttribute($context["meta_authors"], "AUTHOR_NAME", array());
            echo "</strong></dd>
\t\t\t</dl>
\t\t\t";
            // line 116
            if ($this->getAttribute($context["meta_authors"], "AUTHOR_EMAIL", array())) {
                // line 117
                echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                // line 118
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AUTHOR_EMAIL");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><strong><a href=\"mailto:";
                // line 119
                echo $this->getAttribute($context["meta_authors"], "AUTHOR_EMAIL", array());
                echo "\">";
                echo $this->getAttribute($context["meta_authors"], "AUTHOR_EMAIL", array());
                echo "</a></strong></dd>
\t\t\t</dl>
\t\t\t";
            }
            // line 122
            echo "\t\t\t";
            if ($this->getAttribute($context["meta_authors"], "AUTHOR_HOMEPAGE", array())) {
                // line 123
                echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                // line 124
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AUTHOR_HOMEPAGE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><strong><a href=\"";
                // line 125
                echo $this->getAttribute($context["meta_authors"], "AUTHOR_HOMEPAGE", array());
                echo "\">";
                echo $this->getAttribute($context["meta_authors"], "AUTHOR_HOMEPAGE", array());
                echo "</a></strong></dd>
\t\t\t</dl>
\t\t\t";
            }
            // line 128
            echo "\t\t\t";
            if ($this->getAttribute($context["meta_authors"], "AUTHOR_ROLE", array())) {
                // line 129
                echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                // line 130
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AUTHOR_ROLE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t<dd><strong>";
                // line 131
                echo $this->getAttribute($context["meta_authors"], "AUTHOR_ROLE", array());
                echo "</strong></dd>
\t\t\t</dl>
\t\t\t";
            }
            // line 134
            echo "\t\t</fieldset>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meta_authors'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 136
        echo "\t</fieldset>

\t";
        // line 138
        // line 139
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_ext_details.html", 139)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_ext_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  439 => 139,  438 => 138,  434 => 136,  427 => 134,  421 => 131,  416 => 130,  413 => 129,  410 => 128,  402 => 125,  397 => 124,  394 => 123,  391 => 122,  383 => 119,  378 => 118,  375 => 117,  373 => 116,  368 => 114,  363 => 113,  359 => 111,  355 => 110,  351 => 109,  347 => 107,  343 => 105,  337 => 102,  332 => 101,  325 => 100,  322 => 99,  316 => 96,  311 => 95,  304 => 94,  302 => 93,  298 => 92,  295 => 91,  293 => 90,  290 => 89,  286 => 87,  279 => 85,  271 => 82,  267 => 81,  264 => 80,  261 => 79,  249 => 76,  245 => 75,  242 => 74,  240 => 73,  235 => 71,  230 => 70,  226 => 68,  222 => 67,  218 => 66,  215 => 65,  213 => 64,  206 => 60,  201 => 59,  198 => 58,  192 => 55,  187 => 54,  184 => 53,  181 => 52,  173 => 49,  168 => 48,  165 => 47,  163 => 46,  158 => 44,  153 => 43,  150 => 42,  144 => 39,  139 => 38,  136 => 37,  134 => 36,  129 => 34,  124 => 33,  121 => 32,  115 => 29,  110 => 28,  107 => 27,  105 => 26,  101 => 25,  97 => 23,  96 => 22,  93 => 21,  83 => 18,  74 => 17,  66 => 14,  62 => 13,  58 => 12,  55 => 11,  52 => 10,  50 => 9,  45 => 7,  36 => 5,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_ext_details.html", "");
    }
}
