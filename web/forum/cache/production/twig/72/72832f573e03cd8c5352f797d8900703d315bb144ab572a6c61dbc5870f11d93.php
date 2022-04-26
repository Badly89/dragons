<?php

/* drafts.html */
class __TwigTemplate_8313af7697049df84c294e0b8b88f12fedcf8cd8e522ce492df3567a2632b0cf extends Twig_Template
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
        echo "

";
        // line 3
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "draftrow", array()))) {
            // line 4
            echo "<div class=\"panel\">
\t<div class=\"inner\">

\t<h3 class=\"draft-title\">";
            // line 7
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOAD_DRAFT");
            echo "</h3>
\t<p>";
            // line 8
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOAD_DRAFT_EXPLAIN");
            echo "</p>

\t</div>
</div>

<div class=\"";
            // line 13
            if ( !($context["S_PRIVMSGS"] ?? null)) {
                echo "forumbg";
            } else {
                echo "panel";
            }
            echo "\">
\t<div class=\"inner\">

\t<ul class=\"topiclist two-long-columns\">
\t\t<li class=\"header\">
\t\t\t<dl>
\t\t\t\t<dt>";
            // line 19
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOAD_DRAFT");
            echo "</dt>
\t\t\t\t<dd class=\"info\">";
            // line 20
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SAVE_DATE");
            echo "</dd>
\t\t\t</dl>
\t\t</li>
\t</ul>
\t<ul class=\"topiclist two-long-columns";
            // line 24
            if ( !($context["S_PRIVMSGS"] ?? null)) {
                echo " topics";
            } else {
                echo " cplist";
            }
            echo "\">

\t";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "draftrow", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["draftrow"]) {
                // line 27
                echo "\t<li class=\"row";
                if (($this->getAttribute($context["draftrow"], "S_ROW_COUNT", array()) % 2 == 0)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                echo "\">
\t\t<dl>
\t\t\t<dt>
\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t<a href=\"";
                // line 31
                echo $this->getAttribute($context["draftrow"], "U_INSERT", array());
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOAD_DRAFT");
                echo "\" class=\"topictitle\">";
                echo $this->getAttribute($context["draftrow"], "DRAFT_SUBJECT", array());
                echo "</a><br />
\t\t\t\t\t";
                // line 32
                if ( !($context["S_PRIVMSGS"] ?? null)) {
                    if ($this->getAttribute($context["draftrow"], "S_LINK_TOPIC", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <a href=\"";
                        echo $this->getAttribute($context["draftrow"], "U_VIEW", array());
                        echo "\">";
                        echo $this->getAttribute($context["draftrow"], "TITLE", array());
                        echo "</a>
\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 33
$context["draftrow"], "S_LINK_FORUM", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <a href=\"";
                        echo $this->getAttribute($context["draftrow"], "U_VIEW", array());
                        echo "\">";
                        echo $this->getAttribute($context["draftrow"], "TITLE", array());
                        echo "</a>
\t\t\t\t\t";
                    } else {
                        // line 34
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_TOPIC_FORUM");
                    }
                }
                // line 35
                echo "\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t";
                // line 36
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SAVE_DATE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <strong>";
                echo $this->getAttribute($context["draftrow"], "DATE", array());
                echo "</strong>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</dt>
\t\t\t<dd class=\"info\"><span>";
                // line 40
                echo $this->getAttribute($context["draftrow"], "DATE", array());
                echo "</span></dd>
\t\t</dl>
\t</li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['draftrow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "
\t</ul>

\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "drafts.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 44,  138 => 40,  128 => 36,  125 => 35,  121 => 34,  110 => 33,  99 => 32,  91 => 31,  79 => 27,  75 => 26,  66 => 24,  59 => 20,  55 => 19,  42 => 13,  34 => 8,  30 => 7,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "drafts.html", "");
    }
}
