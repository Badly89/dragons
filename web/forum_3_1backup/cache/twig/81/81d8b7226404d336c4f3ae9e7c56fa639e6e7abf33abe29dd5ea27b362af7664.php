<?php

/* mcp_notes_front.html */
class __TwigTemplate_deab1a8babcc866061846834f525c6321646b852da45ecce7f3a8511705ce274 extends Twig_Template
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
        $this->loadTemplate("mcp_header.html", "mcp_notes_front.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form method=\"post\" id=\"mcp\" action=\"";
        // line 3
        echo (isset($context["U_POST_ACTION"]) ? $context["U_POST_ACTION"] : null);
        echo "\">

<h2>";
        // line 5
        echo $this->env->getExtension('phpbb')->lang("TITLE");
        echo "</h2>

<div class=\"panel\">
\t<div class=\"inner\">

\t<fieldset>
\t<dl>
\t\t<dt><label for=\"username\">";
        // line 12
        echo $this->env->getExtension('phpbb')->lang("SELECT_USER");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo "</label></dt>
\t\t<dd><input name=\"username\" id=\"username\" type=\"text\" class=\"inputbox\" /></dd>
\t\t<dd><strong><a href=\"";
        // line 14
        echo (isset($context["U_FIND_USERNAME"]) ? $context["U_FIND_USERNAME"] : null);
        echo "\" onclick=\"find_username(this.href); return false;\">";
        echo $this->env->getExtension('phpbb')->lang("FIND_USERNAME");
        echo "</a></strong></dd>
\t</dl>
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t<input type=\"reset\" value=\"";
        // line 22
        echo $this->env->getExtension('phpbb')->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp; 
\t<input type=\"submit\" name=\"submituser\" value=\"";
        // line 23
        echo $this->env->getExtension('phpbb')->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 24
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
</fieldset>
</form>

";
        // line 28
        $location = "mcp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("mcp_footer.html", "mcp_notes_front.html", 28)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "mcp_notes_front.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 28,  76 => 24,  72 => 23,  68 => 22,  55 => 14,  49 => 12,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }
}
/* <!-- INCLUDE mcp_header.html -->*/
/* */
/* <form method="post" id="mcp" action="{U_POST_ACTION}">*/
/* */
/* <h2>{L_TITLE}</h2>*/
/* */
/* <div class="panel">*/
/* 	<div class="inner">*/
/* */
/* 	<fieldset>*/
/* 	<dl>*/
/* 		<dt><label for="username">{L_SELECT_USER}{L_COLON}</label></dt>*/
/* 		<dd><input name="username" id="username" type="text" class="inputbox" /></dd>*/
/* 		<dd><strong><a href="{U_FIND_USERNAME}" onclick="find_username(this.href); return false;">{L_FIND_USERNAME}</a></strong></dd>*/
/* 	</dl>*/
/* 	</fieldset>*/
/* */
/* 	</div>*/
/* </div>*/
/* */
/* <fieldset class="submit-buttons">*/
/* 	<input type="reset" value="{L_RESET}" name="reset" class="button2" />&nbsp; */
/* 	<input type="submit" name="submituser" value="{L_SUBMIT}" class="button1" />*/
/* 	{S_FORM_TOKEN}*/
/* </fieldset>*/
/* </form>*/
/* */
/* <!-- INCLUDE mcp_footer.html -->*/
/* */
