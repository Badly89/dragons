<?php

/* mcp_forum.html */
class __TwigTemplate_5abc443311387aa12a762e2242fc1a468a8dff15306034702e0d8ad3b7557ec2 extends Twig_Template
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
        $this->loadTemplate("mcp_header.html", "mcp_forum.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        $value = "forum-selection2";
        $context['definition']->set('CUSTOM_FIELDSET_CLASS', $value);
        // line 4
        $location = "jumpbox.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("jumpbox.html", "mcp_forum.html", 4)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 5
        echo "
<h2><a href=\"";
        // line 6
        echo ($context["U_VIEW_FORUM"] ?? null);
        echo "\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo " ";
        echo ($context["FORUM_NAME"] ?? null);
        echo "</a></h2>

<form method=\"post\" id=\"mcp\" action=\"";
        // line 8
        echo ($context["S_MCP_ACTION"] ?? null);
        echo "\">

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"action-bar bar-top\">
\t\t<div class=\"pagination\">
\t\t\t";
        // line 15
        echo ($context["TOTAL_TOPICS"] ?? null);
        echo "
\t\t\t";
        // line 16
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 17
            echo "\t\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "mcp_forum.html", 17)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 18
            echo "\t\t\t";
        } else {
            // line 19
            echo "\t\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t\t";
        }
        // line 21
        echo "\t\t</div>
\t</div>

\t";
        // line 24
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "topicrow", array()))) {
            // line 25
            echo "\t\t<ul class=\"topiclist";
            if (($context["S_MERGE_SELECT"] ?? null)) {
                echo " missing-column";
            }
            echo "\">
\t\t\t<li class=\"header\">
\t\t\t\t<dl class=\"row-item\">
\t\t\t\t\t<dt><div class=\"list-inner\">";
            // line 28
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
            echo "</div></dt>
\t\t\t\t\t<dd class=\"posts\">";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLIES");
            echo "</dd>
\t\t\t\t\t<dd class=\"lastpost\"><span>";
            // line 30
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
            echo "</span></dd>
\t\t\t\t\t";
            // line 31
            if ( !($context["S_MERGE_SELECT"] ?? null)) {
                echo "<dd class=\"mark\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
                echo "</dd>";
            }
            // line 32
            echo "\t\t\t\t</dl>
\t\t\t</li>
\t\t</ul>
\t\t<ul class=\"topiclist cplist";
            // line 35
            if (($context["S_MERGE_SELECT"] ?? null)) {
                echo " missing-column";
            }
            echo "\">

\t\t";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "topicrow", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["topicrow"]) {
                // line 38
                echo "\t\t<li class=\"row";
                if (($this->getAttribute($context["topicrow"], "S_ROW_COUNT", array()) % 2 == 1)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                if ($this->getAttribute($context["topicrow"], "S_TOPIC_REPORTED", array())) {
                    echo " reported";
                }
                echo "\">
\t\t\t<dl class=\"row-item ";
                // line 39
                echo $this->getAttribute($context["topicrow"], "TOPIC_IMG_STYLE", array());
                echo "\">
\t\t\t\t<dt ";
                // line 40
                if ($this->getAttribute($context["topicrow"], "TOPIC_ICON_IMG", array())) {
                    echo "style=\"background-image: url(";
                    echo ($context["T_ICONS_PATH"] ?? null);
                    echo $this->getAttribute($context["topicrow"], "TOPIC_ICON_IMG", array());
                    echo "); background-repeat: no-repeat;\"";
                }
                echo ">
\t\t\t\t\t";
                // line 41
                if ($this->getAttribute($context["topicrow"], "S_UNREAD_TOPIC", array())) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_NEWEST_POST", array());
                    echo "\" class=\"row-item-link\"></a>";
                }
                // line 42
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t";
                // line 43
                // line 44
                echo "\t\t\t\t\t";
                if ($this->getAttribute($context["topicrow"], "S_SELECT_TOPIC", array())) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_SELECT_TOPIC", array());
                    echo "\" class=\"topictitle\">[ ";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_MERGE");
                    echo " ]</a>&nbsp;&nbsp; ";
                }
                // line 45
                echo "\t\t\t\t\t";
                // line 46
                echo "\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["topicrow"], "U_VIEW_TOPIC", array());
                echo "\" class=\"topictitle\">";
                echo $this->getAttribute($context["topicrow"], "TOPIC_TITLE", array());
                echo "</a>
\t\t\t\t\t";
                // line 47
                // line 48
                echo "\t\t\t\t\t";
                if (($this->getAttribute($context["topicrow"], "S_TOPIC_UNAPPROVED", array()) || $this->getAttribute($context["topicrow"], "S_POSTS_UNAPPROVED", array()))) {
                    // line 49
                    echo "\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_MCP_QUEUE", array());
                    echo "\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_UNAPPROVED");
                    echo "\">
\t\t\t\t\t\t\t<i class=\"icon fa-question fa-fw icon-blue\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 50
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_UNAPPROVED");
                    echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t";
                }
                // line 53
                echo "\t\t\t\t\t";
                if (($this->getAttribute($context["topicrow"], "S_TOPIC_DELETED", array()) || $this->getAttribute($context["topicrow"], "S_POSTS_DELETED", array()))) {
                    // line 54
                    echo "\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_MCP_QUEUE", array());
                    echo "\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_DELETED");
                    echo "\">
\t\t\t\t\t\t\t<i class=\"icon fa-recycle fa-fw icon-green\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 55
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_DELETED");
                    echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t";
                }
                // line 58
                echo "\t\t\t\t\t";
                if ($this->getAttribute($context["topicrow"], "S_TOPIC_REPORTED", array())) {
                    // line 59
                    echo "\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_MCP_REPORT", array());
                    echo "\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_REPORTED");
                    echo "\">
\t\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw icon-red\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 60
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_REPORTED");
                    echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t";
                }
                // line 63
                echo "\t\t\t\t\t";
                if (($this->getAttribute($context["topicrow"], "S_MOVED_TOPIC", array()) && ($context["S_CAN_DELETE"] ?? null))) {
                    echo "&nbsp;<a href=\"";
                    echo $this->getAttribute($context["topicrow"], "U_DELETE_TOPIC", array());
                    echo "\" class=\"topictitle\">[ ";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_SHADOW_TOPIC");
                    echo " ]</a>";
                }
                // line 64
                echo "\t\t\t\t\t<br />
\t\t\t\t\t";
                // line 65
                // line 66
                echo "\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t";
                // line 67
                if ($this->getAttribute($context["topicrow"], "ATTACH_ICON_IMG", array())) {
                    echo "<i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> ";
                }
                // line 68
                echo "\t\t\t\t\t\t";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                echo " ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                echo " ";
                echo $this->getAttribute($context["topicrow"], "LAST_POST_AUTHOR_FULL", array());
                echo " &laquo; ";
                echo $this->getAttribute($context["topicrow"], "LAST_POST_TIME", array());
                echo "<br />
\t\t\t\t\t</div>
\t\t\t\t\t<span class=\"responsive-show left-box\" style=\"display: none;\">";
                // line 70
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLIES");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <strong>";
                echo $this->getAttribute($context["topicrow"], "REPLIES", array());
                echo "</strong></span>

\t\t\t\t\t";
                // line 72
                if (twig_length_filter($this->env, $this->getAttribute($context["topicrow"], "pagination", array()))) {
                    // line 73
                    echo "\t\t\t\t\t<div class=\"pagination\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t";
                    // line 75
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["topicrow"], "pagination", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["pagination"]) {
                        // line 76
                        echo "\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["pagination"], "S_IS_PREV", array())) {
                            // line 77
                            echo "\t\t\t\t\t\t\t";
                        } elseif ($this->getAttribute($context["pagination"], "S_IS_CURRENT", array())) {
                            echo "<li class=\"active\"><span>";
                            echo $this->getAttribute($context["pagination"], "PAGE_NUMBER", array());
                            echo "</span></li>
\t\t\t\t\t\t\t";
                        } elseif ($this->getAttribute(                        // line 78
$context["pagination"], "S_IS_ELLIPSIS", array())) {
                            echo "<li class=\"ellipsis\"><span>";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ELLIPSIS");
                            echo "</span></li>
\t\t\t\t\t\t\t";
                        } elseif ($this->getAttribute(                        // line 79
$context["pagination"], "S_IS_NEXT", array())) {
                            // line 80
                            echo "\t\t\t\t\t\t\t";
                        } else {
                            echo "<li><a href=\"";
                            echo $this->getAttribute($context["pagination"], "PAGE_URL", array());
                            echo "\">";
                            echo $this->getAttribute($context["pagination"], "PAGE_NUMBER", array());
                            echo "</a></li>
\t\t\t\t\t\t\t";
                        }
                        // line 82
                        echo "\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagination'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 83
                    echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 86
                echo "
\t\t\t\t\t<div class=\"responsive-hide\">
\t\t\t\t\t\t";
                // line 88
                if ($this->getAttribute($context["topicrow"], "ATTACH_ICON_IMG", array())) {
                    echo "<i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> ";
                }
                // line 89
                echo "\t\t\t\t\t\t";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                echo " ";
                echo $this->getAttribute($context["topicrow"], "TOPIC_AUTHOR_FULL", array());
                echo " &raquo; ";
                echo $this->getAttribute($context["topicrow"], "FIRST_POST_TIME", array());
                echo "
\t\t\t\t\t</div>
\t\t\t\t\t";
                // line 91
                // line 92
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t<dd class=\"posts\">";
                // line 94
                echo $this->getAttribute($context["topicrow"], "REPLIES", array());
                echo " <dfn>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLIES");
                echo "</dfn></dd>
\t\t\t\t<dd class=\"lastpost\"><span><dfn>";
                // line 95
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                echo " </dfn>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                echo " ";
                echo $this->getAttribute($context["topicrow"], "LAST_POST_AUTHOR_FULL", array());
                echo "<br />";
                echo $this->getAttribute($context["topicrow"], "LAST_POST_TIME", array());
                echo "</span></dd>
\t\t\t\t";
                // line 96
                if ( !($context["S_MERGE_SELECT"] ?? null)) {
                    // line 97
                    echo "\t\t\t\t<dd class=\"mark\">
\t\t\t\t\t";
                    // line 98
                    if ( !$this->getAttribute($context["topicrow"], "S_MOVED_TOPIC", array())) {
                        echo "<input type=\"checkbox\" name=\"topic_id_list[]\" value=\"";
                        echo $this->getAttribute($context["topicrow"], "TOPIC_ID", array());
                        echo "\"";
                        if ($this->getAttribute($context["topicrow"], "S_TOPIC_CHECKED", array())) {
                            echo " checked=\"checked\"";
                        }
                        echo " />";
                    } else {
                        echo "&nbsp;";
                    }
                    // line 99
                    echo "\t\t\t\t</dd>
\t\t\t\t";
                }
                // line 101
                echo "\t\t\t</dl>
\t\t</li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topicrow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "\t\t</ul>
\t";
        } else {
            // line 106
            echo "\t\t<ul class=\"topiclist\">
\t\t\t<li><p class=\"notopics\">";
            // line 107
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_TOPICS");
            echo "</p></li>
\t\t</ul>
\t";
        }
        // line 110
        echo "
\t<div class=\"action-bar bottom\">
\t\t";
        // line 112
        $location = "display_options.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("display_options.html", "mcp_forum.html", 112)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 113
        echo "
\t\t<div class=\"pagination\">
\t\t\t";
        // line 115
        echo ($context["TOTAL_TOPICS"] ?? null);
        echo "
\t\t\t";
        // line 116
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
            // line 117
            echo "\t\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "mcp_forum.html", 117)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 118
            echo "\t\t\t";
        } else {
            // line 119
            echo "\t\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t\t";
        }
        // line 121
        echo "\t\t</div>
\t</div>

\t</div>
</div>

";
        // line 127
        // line 128
        echo "<fieldset class=\"display-actions\">
\t";
        // line 129
        if ( !($context["S_MERGE_SELECT"] ?? null)) {
            // line 130
            echo "\t<select name=\"action\">
\t\t<option value=\"\" selected=\"selected\">";
            // line 131
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SELECT_ACTION");
            echo "</option>
\t\t";
            // line 132
            if (($context["S_CAN_DELETE"] ?? null)) {
                echo "<option value=\"delete_topic\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE");
                echo "</option>";
            }
            // line 133
            echo "\t\t";
            if (($context["S_CAN_RESTORE"] ?? null)) {
                echo "<option value=\"restore_topic\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESTORE");
                echo "</option>";
            }
            // line 134
            echo "\t\t";
            if (($context["S_CAN_MERGE"] ?? null)) {
                echo "<option value=\"merge_topics\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MERGE");
                echo "</option>";
            }
            // line 135
            echo "\t\t";
            if (($context["S_CAN_MOVE"] ?? null)) {
                echo "<option value=\"move\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MOVE");
                echo "</option>";
            }
            // line 136
            echo "\t\t";
            if (($context["S_CAN_FORK"] ?? null)) {
                echo "<option value=\"fork\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORK");
                echo "</option>";
            }
            // line 137
            echo "\t\t";
            if (($context["S_CAN_LOCK"] ?? null)) {
                echo "<option value=\"lock\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOCK");
                echo "</option><option value=\"unlock\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNLOCK");
                echo "</option>";
            }
            // line 138
            echo "\t\t";
            if (($context["S_CAN_SYNC"] ?? null)) {
                echo "<option value=\"resync\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESYNC");
                echo "</option>";
            }
            // line 139
            echo "\t\t";
            if (($context["S_CAN_MAKE_NORMAL"] ?? null)) {
                echo "<option value=\"make_normal\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAKE_NORMAL");
                echo "</option>";
            }
            // line 140
            echo "\t\t";
            if (($context["S_CAN_MAKE_STICKY"] ?? null)) {
                echo "<option value=\"make_sticky\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAKE_STICKY");
                echo "</option>";
            }
            // line 141
            echo "\t\t";
            if (($context["S_CAN_MAKE_ANNOUNCE"] ?? null)) {
                echo "<option value=\"make_announce\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAKE_ANNOUNCE");
                echo "</option>";
            }
            // line 142
            echo "\t\t";
            if (($context["S_CAN_MAKE_ANNOUNCE_GLOBAL"] ?? null)) {
                echo "<option value=\"make_global\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAKE_GLOBAL");
                echo "</option>";
            }
            // line 143
            echo "\t\t";
            // line 144
            echo "\t</select>
\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 145
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />
\t<div><a href=\"#\" onclick=\"marklist('mcp', 'topic_id_list', true); return false;\">";
            // line 146
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
            echo "</a> :: <a href=\"#\" onclick=\"marklist('mcp', 'topic_id_list', false); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
            echo "</a></div>
\t";
        }
        // line 148
        echo "\t";
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>
";
        // line 150
        // line 151
        echo "</form>

";
        // line 153
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_forum.html", 153)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_forum.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  596 => 153,  592 => 151,  591 => 150,  585 => 148,  578 => 146,  574 => 145,  571 => 144,  569 => 143,  562 => 142,  555 => 141,  548 => 140,  541 => 139,  534 => 138,  525 => 137,  518 => 136,  511 => 135,  504 => 134,  497 => 133,  491 => 132,  487 => 131,  484 => 130,  482 => 129,  479 => 128,  478 => 127,  470 => 121,  464 => 119,  461 => 118,  448 => 117,  446 => 116,  442 => 115,  438 => 113,  426 => 112,  422 => 110,  416 => 107,  413 => 106,  409 => 104,  401 => 101,  397 => 99,  385 => 98,  382 => 97,  380 => 96,  370 => 95,  364 => 94,  360 => 92,  359 => 91,  349 => 89,  345 => 88,  341 => 86,  336 => 83,  330 => 82,  320 => 80,  318 => 79,  312 => 78,  305 => 77,  302 => 76,  298 => 75,  294 => 73,  292 => 72,  284 => 70,  272 => 68,  268 => 67,  265 => 66,  264 => 65,  261 => 64,  252 => 63,  246 => 60,  239 => 59,  236 => 58,  230 => 55,  223 => 54,  220 => 53,  214 => 50,  207 => 49,  204 => 48,  203 => 47,  196 => 46,  194 => 45,  185 => 44,  184 => 43,  181 => 42,  175 => 41,  166 => 40,  162 => 39,  150 => 38,  146 => 37,  139 => 35,  134 => 32,  128 => 31,  124 => 30,  120 => 29,  116 => 28,  107 => 25,  105 => 24,  100 => 21,  94 => 19,  91 => 18,  78 => 17,  76 => 16,  72 => 15,  62 => 8,  52 => 6,  49 => 5,  37 => 4,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "mcp_forum.html", "");
    }
}
