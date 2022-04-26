<?php

/* acp_users_prefs.html */
class __TwigTemplate_590fe90ab895256262d49f3e6bf246c83b60178e870c9bfab4eaeaa1dd6efaae extends Twig_Template
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
        echo "<script type=\"text/javascript\">
// <![CDATA[
\tvar default_dateformat = '";
        // line 3
        echo ($context["A_DEFAULT_DATEFORMAT"] ?? null);
        echo "';
// ]]>
</script>

\t<form id=\"user_prefs\" method=\"post\" action=\"";
        // line 7
        echo ($context["U_ACTION"] ?? null);
        echo "\">
\t";
        // line 8
        // line 9
        echo "\t<fieldset>
\t\t<legend>";
        // line 10
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UCP_PREFS_PERSONAL");
        echo "</legend>
\t";
        // line 11
        // line 12
        echo "\t<dl> 
\t\t<dt><label for=\"viewemail\">";
        // line 13
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SHOW_EMAIL");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"viewemail\" value=\"1\"";
        // line 14
        if (($context["VIEW_EMAIL"] ?? null)) {
            echo " id=\"viewemail\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"viewemail\" value=\"0\"";
        // line 15
        if ( !($context["VIEW_EMAIL"] ?? null)) {
            echo " id=\"viewemail\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"massemail\">";
        // line 18
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADMIN_EMAIL");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"massemail\" value=\"1\"";
        // line 19
        if (($context["MASS_EMAIL"] ?? null)) {
            echo " id=\"massemail\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"massemail\" value=\"0\"";
        // line 20
        if ( !($context["MASS_EMAIL"] ?? null)) {
            echo " id=\"massemail\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"allowpm\">";
        // line 23
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOW_PM");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOW_PM_EXPLAIN");
        echo "</span></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"allowpm\" value=\"1\"";
        // line 24
        if (($context["ALLOW_PM"] ?? null)) {
            echo " id=\"allowpm\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"allowpm\" value=\"0\"";
        // line 25
        if ( !($context["ALLOW_PM"] ?? null)) {
            echo " id=\"allowpm\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"hideonline\">";
        // line 28
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("HIDE_ONLINE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"hideonline\" value=\"1\"";
        // line 29
        if (($context["HIDE_ONLINE"] ?? null)) {
            echo " id=\"hideonline\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"hideonline\" value=\"0\"";
        // line 30
        if ( !($context["HIDE_ONLINE"] ?? null)) {
            echo " id=\"hideonline\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"notifymethod\">";
        // line 33
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_METHOD");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_METHOD_EXPLAIN");
        echo "</span></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"notifymethod\" value=\"0\"";
        // line 34
        if (($context["NOTIFY_EMAIL"] ?? null)) {
            echo " id=\"notifymethod\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_METHOD_EMAIL");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"notifymethod\" value=\"1\"";
        // line 35
        if (($context["NOTIFY_IM"] ?? null)) {
            echo " id=\"notifymethod\" checked=\"checked\"";
        }
        if (($context["S_JABBER_DISABLED"] ?? null)) {
            echo " disabled=\"disabled\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_METHOD_IM");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"notifymethod\" value=\"2\"";
        // line 36
        if (($context["NOTIFY_BOTH"] ?? null)) {
            echo " id=\"notifymethod\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_METHOD_BOTH");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"notifypm\">";
        // line 39
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY_ON_PM");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"notifypm\" value=\"1\"";
        // line 40
        if (($context["NOTIFY_PM"] ?? null)) {
            echo " id=\"notifypm\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"notifypm\" value=\"0\"";
        // line 41
        if ( !($context["NOTIFY_PM"] ?? null)) {
            echo " id=\"notifypm\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"lang\">";
        // line 44
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BOARD_LANGUAGE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><select id=\"lang\" name=\"lang\">";
        // line 45
        echo ($context["S_LANG_OPTIONS"] ?? null);
        echo "</select></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"style\">";
        // line 48
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BOARD_STYLE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><select id=\"style\" name=\"style\">";
        // line 49
        echo ($context["S_STYLE_OPTIONS"] ?? null);
        echo "</select></dd>
\t</dl>
\t";
        // line 51
        $location = "timezone_option.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("timezone_option.html", "acp_users_prefs.html", 51)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 52
        echo "\t<dl> 
\t\t<dt><label for=\"dateoptions\">";
        // line 53
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BOARD_DATE_FORMAT");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BOARD_DATE_FORMAT_EXPLAIN");
        echo "</span></dt>
\t\t<dd><select name=\"dateoptions\" id=\"dateoptions\" onchange=\"if(this.value=='custom'){phpbb.toggleDisplay('custom_date',1);}else{phpbb.toggleDisplay('custom_date',-1);} if (this.value == 'custom') { document.getElementById('dateformat').value = default_dateformat; } else { document.getElementById('dateformat').value = this.value; }\">";
        // line 54
        echo ($context["S_DATEFORMAT_OPTIONS"] ?? null);
        echo "</select></dd>
\t\t<dd><div id=\"custom_date\"";
        // line 55
        if ( !($context["S_CUSTOM_DATEFORMAT"] ?? null)) {
            echo " style=\"display:none;\"";
        }
        echo "><input type=\"text\" name=\"dateformat\" id=\"dateformat\" value=\"";
        echo ($context["DATE_FORMAT"] ?? null);
        echo "\" maxlength=\"64\" /></div></dd>
\t</dl>
\t";
        // line 57
        // line 58
        echo "\t</fieldset>

\t<fieldset>
\t\t<legend>";
        // line 61
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UCP_PREFS_POST");
        echo "</legend>
\t";
        // line 62
        // line 63
        echo "\t<dl> 
\t\t<dt><label for=\"bbcode\">";
        // line 64
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DEFAULT_BBCODE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"bbcode\" value=\"1\"";
        // line 65
        if (($context["BBCODE"] ?? null)) {
            echo " id=\"bbcode\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"bbcode\" value=\"0\"";
        // line 66
        if ( !($context["BBCODE"] ?? null)) {
            echo " id=\"bbcode\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"smilies\">";
        // line 69
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DEFAULT_SMILIES");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"smilies\" value=\"1\"";
        // line 70
        if (($context["SMILIES"] ?? null)) {
            echo " id=\"smilies\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"smilies\" value=\"0\"";
        // line 71
        if ( !($context["SMILIES"] ?? null)) {
            echo " id=\"smilies\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"sig\">";
        // line 74
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DEFAULT_ADD_SIG");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"sig\" value=\"1\"";
        // line 75
        if (($context["ATTACH_SIG"] ?? null)) {
            echo " id=\"sig\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"sig\" value=\"0\"";
        // line 76
        if ( !($context["ATTACH_SIG"] ?? null)) {
            echo " id=\"sig\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"notify\">";
        // line 79
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DEFAULT_NOTIFY");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"notify\" value=\"1\"";
        // line 80
        if (($context["NOTIFY"] ?? null)) {
            echo " id=\"notify\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"notify\" value=\"0\"";
        // line 81
        if ( !($context["NOTIFY"] ?? null)) {
            echo " id=\"notify\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t";
        // line 83
        // line 84
        echo "\t</fieldset>

\t<fieldset>
\t\t<legend>";
        // line 87
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UCP_PREFS_VIEW");
        echo "</legend>
\t";
        // line 88
        // line 89
        echo "\t<dl> 
\t\t<dt><label for=\"view_images\">";
        // line 90
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_IMAGES");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_images\" value=\"1\"";
        // line 91
        if (($context["VIEW_IMAGES"] ?? null)) {
            echo " id=\"view_images\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_images\" value=\"0\"";
        // line 92
        if ( !($context["VIEW_IMAGES"] ?? null)) {
            echo " id=\"view_images\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"view_flash\">";
        // line 95
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_FLASH");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_flash\" value=\"1\"";
        // line 96
        if (($context["VIEW_FLASH"] ?? null)) {
            echo " id=\"view_flash\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_flash\" value=\"0\"";
        // line 97
        if ( !($context["VIEW_FLASH"] ?? null)) {
            echo " id=\"view_flash\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"view_smilies\">";
        // line 100
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_SMILIES");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_smilies\" value=\"1\"";
        // line 101
        if (($context["VIEW_SMILIES"] ?? null)) {
            echo " id=\"view_smilies\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_smilies\" value=\"0\"";
        // line 102
        if ( !($context["VIEW_SMILIES"] ?? null)) {
            echo " id=\"view_smilies\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"view_sigs\">";
        // line 105
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_SIGS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_sigs\" value=\"1\"";
        // line 106
        if (($context["VIEW_SIGS"] ?? null)) {
            echo " id=\"view_sigs\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_sigs\" value=\"0\"";
        // line 107
        if ( !($context["VIEW_SIGS"] ?? null)) {
            echo " id=\"view_sigss\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"view_avatars\">";
        // line 110
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_AVATARS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_avatars\" value=\"1\"";
        // line 111
        if (($context["VIEW_AVATARS"] ?? null)) {
            echo " id=\"view_avatars\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_avatars\" value=\"0\"";
        // line 112
        if ( !($context["VIEW_AVATARS"] ?? null)) {
            echo " id=\"view_avatars\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label for=\"view_wordcensor\">";
        // line 115
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DISABLE_CENSORS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"view_wordcensor\" value=\"1\"";
        // line 116
        if (($context["VIEW_WORDCENSOR"] ?? null)) {
            echo " id=\"view_wordcensor\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"view_wordcensor\" value=\"0\"";
        // line 117
        if ( !($context["VIEW_WORDCENSOR"] ?? null)) {
            echo " id=\"view_wordcensor\" checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 120
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_TOPICS_DAYS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 121
        echo ($context["S_TOPIC_SORT_DAYS"] ?? null);
        echo "</dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 124
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_TOPICS_KEY");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 125
        echo ($context["S_TOPIC_SORT_KEY"] ?? null);
        echo "</dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 128
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_TOPICS_DIR");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 129
        echo ($context["S_TOPIC_SORT_DIR"] ?? null);
        echo "</dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 132
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_POSTS_DAYS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 133
        echo ($context["S_POST_SORT_DAYS"] ?? null);
        echo "</dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 136
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_POSTS_KEY");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 137
        echo ($context["S_POST_SORT_KEY"] ?? null);
        echo "</dd>
\t</dl>
\t<dl> 
\t\t<dt><label>";
        // line 140
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_POSTS_DIR");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 141
        echo ($context["S_POST_SORT_DIR"] ?? null);
        echo "</dd>
\t</dl>
\t";
        // line 143
        // line 144
        echo "\t</fieldset>
\t";
        // line 145
        // line 146
        echo "\t<fieldset class=\"quick\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
        // line 147
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" />
\t\t";
        // line 148
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>

\t</form>
";
    }

    public function getTemplateName()
    {
        return "acp_users_prefs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  589 => 148,  585 => 147,  582 => 146,  581 => 145,  578 => 144,  577 => 143,  572 => 141,  567 => 140,  561 => 137,  556 => 136,  550 => 133,  545 => 132,  539 => 129,  534 => 128,  528 => 125,  523 => 124,  517 => 121,  512 => 120,  502 => 117,  494 => 116,  489 => 115,  479 => 112,  471 => 111,  466 => 110,  456 => 107,  448 => 106,  443 => 105,  433 => 102,  425 => 101,  420 => 100,  410 => 97,  402 => 96,  397 => 95,  387 => 92,  379 => 91,  374 => 90,  371 => 89,  370 => 88,  366 => 87,  361 => 84,  360 => 83,  351 => 81,  343 => 80,  338 => 79,  328 => 76,  320 => 75,  315 => 74,  305 => 71,  297 => 70,  292 => 69,  282 => 66,  274 => 65,  269 => 64,  266 => 63,  265 => 62,  261 => 61,  256 => 58,  255 => 57,  246 => 55,  242 => 54,  235 => 53,  232 => 52,  220 => 51,  215 => 49,  210 => 48,  204 => 45,  199 => 44,  189 => 41,  181 => 40,  176 => 39,  166 => 36,  155 => 35,  147 => 34,  140 => 33,  130 => 30,  122 => 29,  117 => 28,  107 => 25,  99 => 24,  92 => 23,  82 => 20,  74 => 19,  69 => 18,  59 => 15,  51 => 14,  46 => 13,  43 => 12,  42 => 11,  38 => 10,  35 => 9,  34 => 8,  30 => 7,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_users_prefs.html", "");
    }
}
