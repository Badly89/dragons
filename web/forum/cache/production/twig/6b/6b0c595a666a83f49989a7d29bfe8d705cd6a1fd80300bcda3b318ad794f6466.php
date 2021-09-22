<?php

/* mcp_reports.html */
class __TwigTemplate_c6adcdc2ed595af87724e1220641c63ec14790408a927ec640caac6450099911 extends Twig_Template
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
        $this->loadTemplate("mcp_header.html", "mcp_reports.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form id=\"mcp\" method=\"post\" action=\"";
        // line 3
        echo ($context["S_MCP_ACTION"] ?? null);
        echo "\">

";
        // line 5
        if ( !($context["S_PM"] ?? null)) {
            // line 6
            echo "<fieldset class=\"forum-selection\">
\t<label for=\"fo\">";
            // line 7
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " <select name=\"f\" id=\"fo\">";
            echo ($context["S_FORUM_OPTIONS"] ?? null);
            echo "</select></label>
\t<input type=\"submit\" name=\"sort\" value=\"";
            // line 8
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GO");
            echo "\" class=\"button2\" />
\t";
            // line 9
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
</fieldset>
";
        }
        // line 12
        echo "
<h2>";
        // line 13
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<p>";
        // line 18
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXPLAIN");
        echo "</p>

\t";
        // line 20
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "postrow", array()))) {
            // line 21
            echo "\t\t<div class=\"action-bar bar-top\">
\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 23
            echo ($context["TOTAL_REPORTS"] ?? null);
            echo "
\t\t\t\t";
            // line 24
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                // line 25
                echo "\t\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "mcp_reports.html", 25)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 26
                echo "\t\t\t\t";
            } else {
                // line 27
                echo "\t\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t\t";
            }
            // line 29
            echo "\t\t\t</div>
\t\t</div>

\t\t<ul class=\"topiclist missing-column\">
\t\t\t<li class=\"header\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><div class=\"list-inner\">";
            // line 35
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_DETAILS");
            echo "</div></dt>
\t\t\t\t\t<dd class=\"moderation\"><span>";
            // line 36
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORTER");
            if ( !($context["S_PM"] ?? null)) {
                echo " &amp; ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
            }
            echo "</span></dd>
\t\t\t\t\t<dd class=\"mark\">";
            // line 37
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
            echo "</dd>
\t\t\t\t</dl>
\t\t\t</li>
\t\t</ul>
\t\t<ul class=\"topiclist cplist missing-column\">

\t\t";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "postrow", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["postrow"]) {
                // line 44
                echo "\t\t\t<li class=\"row";
                if (($this->getAttribute($context["postrow"], "S_ROW_COUNT", array()) % 2 == 1)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t";
                // line 46
                if (($context["S_PM"] ?? null)) {
                    // line 47
                    echo "\t\t\t\t\t<dt>
\t\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t\t<a href=\"";
                    // line 49
                    echo $this->getAttribute($context["postrow"], "U_VIEW_DETAILS", array());
                    echo "\" class=\"topictitle\">";
                    echo $this->getAttribute($context["postrow"], "PM_SUBJECT", array());
                    echo "</a> <i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> <br />
\t\t\t\t\t\t\t<span>";
                    // line 50
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MESSAGE_BY_AUTHOR");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "PM_AUTHOR_FULL", array());
                    echo " &raquo; ";
                    echo $this->getAttribute($context["postrow"], "PM_TIME", array());
                    echo "</span><br />
\t\t\t\t\t\t\t<span>";
                    // line 51
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MESSAGE_TO");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "RECIPIENTS", array());
                    echo "</span>
\t\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t\t";
                    // line 53
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORTER");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "REPORTER_FULL", array());
                    echo " &laquo; ";
                    echo $this->getAttribute($context["postrow"], "REPORT_TIME", array());
                    echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</dt>
\t\t\t\t\t<dd class=\"moderation\">
\t\t\t\t\t\t<span>";
                    // line 58
                    echo $this->getAttribute($context["postrow"], "REPORTER_FULL", array());
                    echo " &laquo; ";
                    echo $this->getAttribute($context["postrow"], "REPORT_TIME", array());
                    echo "</span>
\t\t\t\t\t</dd>
\t\t\t\t\t";
                } else {
                    // line 61
                    echo "\t\t\t\t\t<dt>
\t\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t\t<a href=\"";
                    // line 63
                    echo $this->getAttribute($context["postrow"], "U_VIEW_DETAILS", array());
                    echo "\" class=\"topictitle\">";
                    echo $this->getAttribute($context["postrow"], "POST_SUBJECT", array());
                    echo "</a><i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> <br />
\t\t\t\t\t\t\t<span>";
                    // line 64
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTED");
                    echo " ";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", array());
                    echo " &raquo; ";
                    echo $this->getAttribute($context["postrow"], "POST_TIME", array());
                    echo "</span>
\t\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t\t";
                    // line 66
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORTER");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "REPORTER_FULL", array());
                    echo " &laquo; ";
                    echo $this->getAttribute($context["postrow"], "REPORT_TIME", array());
                    echo "<br />
\t\t\t\t\t\t\t\t";
                    // line 67
                    if ($this->getAttribute($context["postrow"], "U_VIEWFORUM", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <a href=\"";
                        echo $this->getAttribute($context["postrow"], "U_VIEWFORUM", array());
                        echo "\">";
                        echo $this->getAttribute($context["postrow"], "FORUM_NAME", array());
                        echo "</a>";
                    } else {
                        echo $this->getAttribute($context["postrow"], "FORUM_NAME", array());
                    }
                    // line 68
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</dt>
\t\t\t\t\t<dd class=\"moderation\">
\t\t\t\t\t\t<span>";
                    // line 72
                    echo $this->getAttribute($context["postrow"], "REPORTER_FULL", array());
                    echo " &laquo; ";
                    echo $this->getAttribute($context["postrow"], "REPORT_TIME", array());
                    echo "<br />
\t\t\t\t\t\t";
                    // line 73
                    if ($this->getAttribute($context["postrow"], "U_VIEWFORUM", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <a href=\"";
                        echo $this->getAttribute($context["postrow"], "U_VIEWFORUM", array());
                        echo "\">";
                        echo $this->getAttribute($context["postrow"], "FORUM_NAME", array());
                        echo "</a>";
                    } else {
                        echo $this->getAttribute($context["postrow"], "FORUM_NAME", array());
                    }
                    echo "</span>
\t\t\t\t\t</dd>
\t\t\t\t\t";
                }
                // line 76
                echo "\t\t\t\t\t<dd class=\"mark\"><input type=\"checkbox\" name=\"report_id_list[]\" value=\"";
                echo $this->getAttribute($context["postrow"], "REPORT_ID", array());
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postrow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "\t\t</ul>

\t\t<div class=\"action-bar bottom\">
\t\t\t";
            // line 83
            $location = "display_options.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("display_options.html", "mcp_reports.html", 83)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 84
            echo "\t\t\t";
            if (($context["TOPIC_ID"] ?? null)) {
                echo "<label><input type=\"checkbox\" class=\"radio\" name=\"t\" value=\"";
                echo ($context["TOPIC_ID"] ?? null);
                echo "\" checked=\"checked\" onClick=\"document.getElementById('mcp').submit()\" /> <strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLY_TOPIC");
                echo "</strong></label>";
            }
            // line 85
            echo "
\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 87
            echo ($context["TOTAL_REPORTS"] ?? null);
            echo "
\t\t\t\t";
            // line 88
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                // line 89
                echo "\t\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "mcp_reports.html", 89)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 90
                echo "\t\t\t\t";
            } else {
                // line 91
                echo "\t\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t\t";
            }
            // line 93
            echo "\t\t\t</div>
\t\t</div>

\t";
        } else {
            // line 97
            echo "\t\t<p><strong>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_REPORTS");
            echo "</strong></p>
\t";
        }
        // line 99
        echo "
\t</div>
</div>

";
        // line 103
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "postrow", array()))) {
            // line 104
            echo "\t<fieldset class=\"display-actions\">
\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 105
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_REPORTS");
            echo "\" name=\"action[delete]\" />
\t\t";
            // line 106
            if ( !($context["S_CLOSED"] ?? null)) {
                echo "&nbsp;<input class=\"button1\" type=\"submit\" name=\"action[close]\" value=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CLOSE_REPORTS");
                echo "\" />";
            }
            // line 107
            echo "\t\t<div><a href=\"#\" onclick=\"marklist('mcp', 'report_id_list', true); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
            echo "</a> :: <a href=\"#\" onclick=\"marklist('mcp', 'report_id_list', false); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
            echo "</a></div>
\t</fieldset>
";
        }
        // line 110
        echo "</form>

";
        // line 112
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_reports.html", 112)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_reports.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  387 => 112,  383 => 110,  374 => 107,  368 => 106,  364 => 105,  361 => 104,  359 => 103,  353 => 99,  347 => 97,  341 => 93,  335 => 91,  332 => 90,  319 => 89,  317 => 88,  313 => 87,  309 => 85,  300 => 84,  288 => 83,  283 => 80,  272 => 76,  256 => 73,  250 => 72,  244 => 68,  232 => 67,  223 => 66,  212 => 64,  206 => 63,  202 => 61,  194 => 58,  181 => 53,  174 => 51,  166 => 50,  160 => 49,  156 => 47,  154 => 46,  144 => 44,  140 => 43,  131 => 37,  123 => 36,  119 => 35,  111 => 29,  105 => 27,  102 => 26,  89 => 25,  87 => 24,  83 => 23,  79 => 21,  77 => 20,  72 => 18,  64 => 13,  61 => 12,  55 => 9,  51 => 8,  44 => 7,  41 => 6,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mcp_reports.html", "");
    }
}
