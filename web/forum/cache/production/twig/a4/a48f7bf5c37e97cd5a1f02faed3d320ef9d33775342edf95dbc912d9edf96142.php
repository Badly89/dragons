<?php

/* ucp_remind.html */
class __TwigTemplate_3857cb8dca0be7618321a66c285cc5dc9db8835772b1cf8160fc703ea2734d5e extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "ucp_remind.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form action=\"";
        // line 3
        echo ($context["S_PROFILE_ACTION"] ?? null);
        echo "\" method=\"post\" id=\"remind\">

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"content\">
\t\t<h2>";
        // line 9
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEND_PASSWORD");
        echo "</h2>

\t\t<fieldset>
\t\t\t";
        // line 12
        if (($context["USERNAME_REQUIRED"] ?? null)) {
            // line 13
            echo "\t\t\t\t<p class=\"error\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EMAIL_NOT_UNIQUE");
            echo "</p>
\t\t\t";
        }
        // line 15
        echo "\t\t<dl>
\t\t\t<dt><label for=\"email\">";
        // line 16
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EMAIL_ADDRESS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EMAIL_REMIND");
        echo "</span></dt>
\t\t\t<dd><input class=\"inputbox narrow\" type=\"email\" name=\"email\" id=\"email\" size=\"25\" maxlength=\"100\" value=\"";
        // line 17
        echo ($context["EMAIL"] ?? null);
        echo "\" autofocus /></dd>
\t\t</dl>
\t\t";
        // line 19
        if (($context["USERNAME_REQUIRED"] ?? null)) {
            // line 20
            echo "\t\t<dl>
\t\t\t<dt><label for=\"username\">";
            // line 21
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t<dd><input class=\"inputbox narrow\" type=\"text\" name=\"username\" id=\"username\" size=\"25\" /></dd>
\t\t</dl>
\t\t";
        }
        // line 25
        echo "\t\t<dl>
\t\t\t<dt>&nbsp;</dt>
\t\t\t<dd>";
        // line 27
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"submit\" name=\"submit\" id=\"submit\" class=\"button1\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" tabindex=\"2\" />&nbsp; <input type=\"reset\" value=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" /></dd>
\t\t</dl>
\t\t";
        // line 29
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t\t</fieldset>
\t</div>

\t</div>
</div>
</form>

";
        // line 37
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "ucp_remind.html", 37)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_remind.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 37,  98 => 29,  89 => 27,  85 => 25,  77 => 21,  74 => 20,  72 => 19,  67 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  43 => 9,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ucp_remind.html", "");
    }
}
