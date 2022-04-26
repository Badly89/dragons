<?php

/* mcp_reports.html */
class __TwigTemplate_f1e5aa05ebf0f3e76d753e4020f2ba5a2d211688e0d082765871f84bb5e64c7e extends Twig_Template
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
        echo (isset($context["S_MCP_ACTION"]) ? $context["S_MCP_ACTION"] : null);
        echo "\">

";
        // line 5
        if ( !(isset($context["S_PM"]) ? $context["S_PM"] : null)) {
            // line 6
            echo "<fieldset class=\"forum-selection\">
\t<label for=\"fo\">";
            // line 7
            echo $this->env->getExtension('phpbb')->lang("FORUM");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <select name=\"f\" id=\"fo\">";
            echo (isset($context["S_FORUM_OPTIONS"]) ? $context["S_FORUM_OPTIONS"] : null);
            echo "</select></label>
\t<input type=\"submit\" name=\"sort\" value=\"";
            // line 8
            echo $this->env->getExtension('phpbb')->lang("GO");
            echo "\" class=\"button2\" />
\t";
            // line 9
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
</fieldset>
";
        }
        // line 12
        echo "
<h2>";
        // line 13
        echo $this->env->getExtension('phpbb')->lang("TITLE");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<p>";
        // line 18
        echo $this->env->getExtension('phpbb')->lang("EXPLAIN");
        echo "</p>

\t";
        // line 20
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "postrow", array()))) {
            // line 21
            echo "\t\t<div class=\"action-bar top\">
\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 23
            echo (isset($context["TOTAL_REPORTS"]) ? $context["TOTAL_REPORTS"] : null);
            echo "
\t\t\t\t";
            // line 24
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", array()))) {
                echo " 
\t\t\t\t\t";
                // line 25
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
                echo " 
\t\t\t\t\t &bull; ";
                // line 27
                echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
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
            echo $this->env->getExtension('phpbb')->lang("VIEW_DETAILS");
            echo "</div></dt>
\t\t\t\t\t<dd class=\"moderation\"><span>";
            // line 36
            echo $this->env->getExtension('phpbb')->lang("REPORTER");
            if ( !(isset($context["S_PM"]) ? $context["S_PM"] : null)) {
                echo " &amp; ";
                echo $this->env->getExtension('phpbb')->lang("FORUM");
            }
            echo "</span></dd>
\t\t\t\t\t<dd class=\"mark\">";
            // line 37
            echo $this->env->getExtension('phpbb')->lang("MARK");
            echo "</dd>
\t\t\t\t</dl>
\t\t\t</li>
\t\t</ul>
\t\t<ul class=\"topiclist cplist missing-column\">

\t\t";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "postrow", array()));
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
                if ((isset($context["S_PM"]) ? $context["S_PM"] : null)) {
                    // line 47
                    echo "\t\t\t\t\t<dt>
\t\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t\t<a href=\"";
                    // line 49
                    echo $this->getAttribute($context["postrow"], "U_VIEW_DETAILS", array());
                    echo "\" class=\"topictitle\">";
                    echo $this->getAttribute($context["postrow"], "PM_SUBJECT", array());
                    echo "</a> ";
                    echo $this->getAttribute($context["postrow"], "ATTACH_ICON_IMG", array());
                    echo "<br />
\t\t\t\t\t\t\t<span>";
                    // line 50
                    echo $this->env->getExtension('phpbb')->lang("MESSAGE_BY_AUTHOR");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "PM_AUTHOR_FULL", array());
                    echo " &raquo; ";
                    echo $this->getAttribute($context["postrow"], "PM_TIME", array());
                    echo "</span><br />
\t\t\t\t\t\t\t<span>";
                    // line 51
                    echo $this->env->getExtension('phpbb')->lang("MESSAGE_TO");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "RECIPIENTS", array());
                    echo "</span>
\t\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t\t";
                    // line 53
                    echo $this->env->getExtension('phpbb')->lang("REPORTER");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
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
                    echo "</a> ";
                    echo $this->getAttribute($context["postrow"], "ATTACH_ICON_IMG", array());
                    echo "<br />
\t\t\t\t\t\t\t<span>";
                    // line 64
                    echo $this->env->getExtension('phpbb')->lang("POSTED");
                    echo " ";
                    echo $this->env->getExtension('phpbb')->lang("POST_BY_AUTHOR");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", array());
                    echo " &raquo; ";
                    echo $this->getAttribute($context["postrow"], "POST_TIME", array());
                    echo "</span>
\t\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t\t";
                    // line 66
                    echo $this->env->getExtension('phpbb')->lang("REPORTER");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["postrow"], "REPORTER_FULL", array());
                    echo " &laquo; ";
                    echo $this->getAttribute($context["postrow"], "REPORT_TIME", array());
                    echo "<br />
\t\t\t\t\t\t\t\t";
                    // line 67
                    if ($this->getAttribute($context["postrow"], "U_VIEWFORUM", array())) {
                        echo $this->env->getExtension('phpbb')->lang("FORUM");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
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
                        echo $this->env->getExtension('phpbb')->lang("FORUM");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
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

\t\t<fieldset class=\"display-options\">
\t\t\t<label>";
            // line 83
            echo $this->env->getExtension('phpbb')->lang("DISPLAY_POSTS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " ";
            echo (isset($context["S_SELECT_SORT_DAYS"]) ? $context["S_SELECT_SORT_DAYS"] : null);
            echo "</label>
\t\t\t<label>";
            // line 84
            echo $this->env->getExtension('phpbb')->lang("SORT_BY");
            echo " ";
            echo (isset($context["S_SELECT_SORT_KEY"]) ? $context["S_SELECT_SORT_KEY"] : null);
            echo "</label><label>";
            echo (isset($context["S_SELECT_SORT_DIR"]) ? $context["S_SELECT_SORT_DIR"] : null);
            echo "</label>
\t\t\t";
            // line 85
            if ((isset($context["TOPIC_ID"]) ? $context["TOPIC_ID"] : null)) {
                echo "<label><input type=\"checkbox\" class=\"radio\" name=\"t\" value=\"";
                echo (isset($context["TOPIC_ID"]) ? $context["TOPIC_ID"] : null);
                echo "\" checked=\"checked\" />&nbsp; <strong>";
                echo $this->env->getExtension('phpbb')->lang("ONLY_TOPIC");
                echo "</strong></label>";
            }
            // line 86
            echo "\t\t\t<input type=\"submit\" name=\"sort\" value=\"";
            echo $this->env->getExtension('phpbb')->lang("GO");
            echo "\" class=\"button2\" />
\t\t</fieldset>

\t\t<hr />

\t\t<div class=\"action-bar bottom\">
\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 93
            echo (isset($context["TOTAL_REPORTS"]) ? $context["TOTAL_REPORTS"] : null);
            echo "
\t\t\t\t";
            // line 94
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", array()))) {
                echo " 
\t\t\t\t\t";
                // line 95
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "mcp_reports.html", 95)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 96
                echo "\t\t\t\t";
            } else {
                echo " 
\t\t\t\t\t &bull; ";
                // line 97
                echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
                echo "
\t\t\t\t";
            }
            // line 99
            echo "\t\t\t</div>
\t\t</div>

\t";
        } else {
            // line 103
            echo "\t\t<p><strong>";
            echo $this->env->getExtension('phpbb')->lang("NO_REPORTS");
            echo "</strong></p>
\t";
        }
        // line 105
        echo "
\t</div>
</div>

";
        // line 109
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "postrow", array()))) {
            // line 110
            echo "\t<fieldset class=\"display-actions\">
\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 111
            echo $this->env->getExtension('phpbb')->lang("DELETE_REPORTS");
            echo "\" name=\"action[delete]\" />
\t\t";
            // line 112
            if ( !(isset($context["S_CLOSED"]) ? $context["S_CLOSED"] : null)) {
                echo "&nbsp;<input class=\"button1\" type=\"submit\" name=\"action[close]\" value=\"";
                echo $this->env->getExtension('phpbb')->lang("CLOSE_REPORTS");
                echo "\" />";
            }
            // line 113
            echo "\t\t<div><a href=\"#\" onclick=\"marklist('mcp', 'report_id_list', true); return false;\">";
            echo $this->env->getExtension('phpbb')->lang("MARK_ALL");
            echo "</a> :: <a href=\"#\" onclick=\"marklist('mcp', 'report_id_list', false); return false;\">";
            echo $this->env->getExtension('phpbb')->lang("UNMARK_ALL");
            echo "</a></div>
\t</fieldset>
";
        }
        // line 116
        echo "</form>

";
        // line 118
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_reports.html", 118)->display($context);
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
        return array (  404 => 118,  400 => 116,  391 => 113,  385 => 112,  381 => 111,  378 => 110,  376 => 109,  370 => 105,  364 => 103,  358 => 99,  353 => 97,  348 => 96,  336 => 95,  332 => 94,  328 => 93,  317 => 86,  309 => 85,  301 => 84,  294 => 83,  289 => 80,  278 => 76,  262 => 73,  256 => 72,  250 => 68,  238 => 67,  229 => 66,  218 => 64,  210 => 63,  206 => 61,  198 => 58,  185 => 53,  178 => 51,  170 => 50,  162 => 49,  158 => 47,  156 => 46,  146 => 44,  142 => 43,  133 => 37,  125 => 36,  121 => 35,  113 => 29,  108 => 27,  103 => 26,  91 => 25,  87 => 24,  83 => 23,  79 => 21,  77 => 20,  72 => 18,  64 => 13,  61 => 12,  55 => 9,  51 => 8,  44 => 7,  41 => 6,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }
}
/* <!-- INCLUDE mcp_header.html -->*/
/* */
/* <form id="mcp" method="post" action="{S_MCP_ACTION}">*/
/* */
/* <!-- IF not S_PM -->*/
/* <fieldset class="forum-selection">*/
/* 	<label for="fo">{L_FORUM}{L_COLON} <select name="f" id="fo">{S_FORUM_OPTIONS}</select></label>*/
/* 	<input type="submit" name="sort" value="{L_GO}" class="button2" />*/
/* 	{S_FORM_TOKEN}*/
/* </fieldset>*/
/* <!-- ENDIF -->*/
/* */
/* <h2>{L_TITLE}</h2>*/
/* */
/* <div class="panel">*/
/* 	<div class="inner">*/
/* */
/* 	<p>{L_EXPLAIN}</p>*/
/* */
/* 	<!-- IF .postrow -->*/
/* 		<div class="action-bar top">*/
/* 			<div class="pagination">*/
/* 				{TOTAL_REPORTS}*/
/* 				<!-- IF .pagination --> */
/* 					<!-- INCLUDE pagination.html -->*/
/* 				<!-- ELSE --> */
/* 					 &bull; {PAGE_NUMBER}*/
/* 				<!-- ENDIF -->*/
/* 			</div>*/
/* 		</div>*/
/* */
/* 		<ul class="topiclist missing-column">*/
/* 			<li class="header">*/
/* 				<dl>*/
/* 					<dt><div class="list-inner">{L_VIEW_DETAILS}</div></dt>*/
/* 					<dd class="moderation"><span>{L_REPORTER}<!-- IF not S_PM --> &amp; {L_FORUM}<!-- ENDIF --></span></dd>*/
/* 					<dd class="mark">{L_MARK}</dd>*/
/* 				</dl>*/
/* 			</li>*/
/* 		</ul>*/
/* 		<ul class="topiclist cplist missing-column">*/
/* */
/* 		<!-- BEGIN postrow -->*/
/* 			<li class="row<!-- IF postrow.S_ROW_COUNT is odd --> bg1<!-- ELSE --> bg2<!-- ENDIF -->">*/
/* 				<dl>*/
/* 					<!-- IF S_PM -->*/
/* 					<dt>*/
/* 						<div class="list-inner">*/
/* 							<a href="{postrow.U_VIEW_DETAILS}" class="topictitle">{postrow.PM_SUBJECT}</a> {postrow.ATTACH_ICON_IMG}<br />*/
/* 							<span>{L_MESSAGE_BY_AUTHOR} {postrow.PM_AUTHOR_FULL} &raquo; {postrow.PM_TIME}</span><br />*/
/* 							<span>{L_MESSAGE_TO} {postrow.RECIPIENTS}</span>*/
/* 							<div class="responsive-show" style="display: none;">*/
/* 								{L_REPORTER}{L_COLON} {postrow.REPORTER_FULL} &laquo; {postrow.REPORT_TIME}*/
/* 							</div>*/
/* 						</div>*/
/* 					</dt>*/
/* 					<dd class="moderation">*/
/* 						<span>{postrow.REPORTER_FULL} &laquo; {postrow.REPORT_TIME}</span>*/
/* 					</dd>*/
/* 					<!-- ELSE -->*/
/* 					<dt>*/
/* 						<div class="list-inner">*/
/* 							<a href="{postrow.U_VIEW_DETAILS}" class="topictitle">{postrow.POST_SUBJECT}</a> {postrow.ATTACH_ICON_IMG}<br />*/
/* 							<span>{L_POSTED} {L_POST_BY_AUTHOR} {postrow.POST_AUTHOR_FULL} &raquo; {postrow.POST_TIME}</span>*/
/* 							<div class="responsive-show" style="display: none;">*/
/* 								{L_REPORTER}{L_COLON} {postrow.REPORTER_FULL} &laquo; {postrow.REPORT_TIME}<br />*/
/* 								<!-- IF postrow.U_VIEWFORUM -->{L_FORUM}{L_COLON} <a href="{postrow.U_VIEWFORUM}">{postrow.FORUM_NAME}</a><!-- ELSE -->{postrow.FORUM_NAME}<!-- ENDIF -->*/
/* 							</div>*/
/* 						</div>*/
/* 					</dt>*/
/* 					<dd class="moderation">*/
/* 						<span>{postrow.REPORTER_FULL} &laquo; {postrow.REPORT_TIME}<br />*/
/* 						<!-- IF postrow.U_VIEWFORUM -->{L_FORUM}{L_COLON} <a href="{postrow.U_VIEWFORUM}">{postrow.FORUM_NAME}</a><!-- ELSE -->{postrow.FORUM_NAME}<!-- ENDIF --></span>*/
/* 					</dd>*/
/* 					<!-- ENDIF -->*/
/* 					<dd class="mark"><input type="checkbox" name="report_id_list[]" value="{postrow.REPORT_ID}" /></dd>*/
/* 				</dl>*/
/* 			</li>*/
/* 		<!-- END postrow -->*/
/* 		</ul>*/
/* */
/* 		<fieldset class="display-options">*/
/* 			<label>{L_DISPLAY_POSTS}{L_COLON} {S_SELECT_SORT_DAYS}</label>*/
/* 			<label>{L_SORT_BY} {S_SELECT_SORT_KEY}</label><label>{S_SELECT_SORT_DIR}</label>*/
/* 			<!-- IF TOPIC_ID --><label><input type="checkbox" class="radio" name="t" value="{TOPIC_ID}" checked="checked" />&nbsp; <strong>{L_ONLY_TOPIC}</strong></label><!-- ENDIF -->*/
/* 			<input type="submit" name="sort" value="{L_GO}" class="button2" />*/
/* 		</fieldset>*/
/* */
/* 		<hr />*/
/* */
/* 		<div class="action-bar bottom">*/
/* 			<div class="pagination">*/
/* 				{TOTAL_REPORTS}*/
/* 				<!-- IF .pagination --> */
/* 					<!-- INCLUDE pagination.html -->*/
/* 				<!-- ELSE --> */
/* 					 &bull; {PAGE_NUMBER}*/
/* 				<!-- ENDIF -->*/
/* 			</div>*/
/* 		</div>*/
/* */
/* 	<!-- ELSE -->*/
/* 		<p><strong>{L_NO_REPORTS}</strong></p>*/
/* 	<!-- ENDIF -->*/
/* */
/* 	</div>*/
/* </div>*/
/* */
/* <!-- IF .postrow -->*/
/* 	<fieldset class="display-actions">*/
/* 		<input class="button2" type="submit" value="{L_DELETE_REPORTS}" name="action[delete]" />*/
/* 		<!-- IF not S_CLOSED -->&nbsp;<input class="button1" type="submit" name="action[close]" value="{L_CLOSE_REPORTS}" /><!-- ENDIF -->*/
/* 		<div><a href="#" onclick="marklist('mcp', 'report_id_list', true); return false;">{L_MARK_ALL}</a> :: <a href="#" onclick="marklist('mcp', 'report_id_list', false); return false;">{L_UNMARK_ALL}</a></div>*/
/* 	</fieldset>*/
/* <!-- ENDIF -->*/
/* </form>*/
/* */
/* <!-- INCLUDE mcp_footer.html -->*/
/* */
