<?php

/* acp_avatar_options_remote.html */
class __TwigTemplate_9b80d83dd42030c818ce59bbc284304cc4adf5c08c1411994f760e97195f9e8d extends Twig_Template
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
\t<dt><label for=\"avatar_remote_url\">";
        // line 2
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LINK_REMOTE_AVATAR");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LINK_REMOTE_AVATAR_EXPLAIN");
        echo "</span></dt>
\t<dd><input type=\"url\" name=\"avatar_remote_url\" id=\"avatar_remote_url\" value=\"";
        // line 3
        echo ($context["AVATAR_REMOTE_URL"] ?? null);
        echo "\" class=\"inputbox\" /></dd>
</dl>
<dl>
\t<dt><label for=\"avatar_remote_width\">";
        // line 6
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LINK_REMOTE_SIZE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LINK_REMOTE_SIZE_EXPLAIN");
        echo "</span></dt>
\t<dd>
\t\t<input type=\"number\" name=\"avatar_remote_width\" id=\"avatar_remote_width\" min=\"";
        // line 8
        echo ($context["AVATAR_MIN_WIDTH"] ?? null);
        echo "\" max=\"";
        echo ($context["AVATAR_MAX_WIDTH"] ?? null);
        echo "\" value=\"";
        echo ($context["AVATAR_REMOTE_WIDTH"] ?? null);
        echo "\" class=\"inputbox autowidth\" /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PIXEL");
        echo " &times;&nbsp;
\t\t<input type=\"number\" name=\"avatar_remote_height\" id=\"avatar_remote_height\" min=\"";
        // line 9
        echo ($context["AVATAR_MIN_HEIGHT"] ?? null);
        echo "\" max=\"";
        echo ($context["AVATAR_MAX_HEIGHT"] ?? null);
        echo "\" value=\"";
        echo ($context["AVATAR_REMOTE_HEIGHT"] ?? null);
        echo "\" class=\"inputbox autowidth\" /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PIXEL");
        echo "
\t</dd>
</dl>
";
    }

    public function getTemplateName()
    {
        return "acp_avatar_options_remote.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 9,  43 => 8,  35 => 6,  29 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_avatar_options_remote.html", "");
    }
}
