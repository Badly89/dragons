<?php

/* acp_attachments.html */
class __TwigTemplate_5ee2a2a36f58dc29ccbb734d28584ceba22e043960ecaaccf0a931e63c1fe29e extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "acp_attachments.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if (($context["U_BACK"] ?? null)) {
            // line 6
            echo "\t<a href=\"";
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK");
            echo "</a>
";
        }
        // line 8
        echo "
<h1>";
        // line 9
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h1>

<p>";
        // line 11
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE_EXPLAIN");
        echo "</p>

";
        // line 13
        if (($context["S_WARNING"] ?? null)) {
            // line 14
            echo "\t<div class=\"errorbox\">
\t\t<h3>";
            // line 15
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARNING");
            echo "</h3>
\t\t<p>";
            // line 16
            echo ($context["WARNING_MSG"] ?? null);
            echo "</p>
\t</div>
";
        }
        // line 19
        echo "
";
        // line 20
        if (($context["S_NOTIFY"] ?? null)) {
            // line 21
            echo "\t<div class=\"successbox\">
\t\t<h3>";
            // line 22
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFY");
            echo "</h3>
\t\t<p>";
            // line 23
            echo ($context["NOTIFY_MSG"] ?? null);
            echo "</p>
\t</div>
";
        }
        // line 26
        echo "
";
        // line 27
        if (($context["S_UPLOADING_FILES"] ?? null)) {
            // line 28
            echo "\t<h2>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UPLOADING_FILES");
            echo "</h2>

\t";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "upload", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
                // line 31
                echo "\t\t:: ";
                echo $this->getAttribute($context["upload"], "FILE_INFO", array());
                echo "<br />
\t\t";
                // line 32
                if ($this->getAttribute($context["upload"], "S_DENIED", array())) {
                    echo "<span class=\"error\">";
                    echo $this->getAttribute($context["upload"], "DENIED", array());
                    echo "</span>";
                } elseif ($this->getAttribute($context["upload"], "ERROR_MSG", array())) {
                    echo "<span class=\"error\">";
                    echo $this->getAttribute($context["upload"], "ERROR_MSG", array());
                    echo "</span>";
                } else {
                    echo "<span class=\"success\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUCCESSFULLY_UPLOADED");
                    echo "</span>";
                }
                // line 33
                echo "\t\t<br /><br />
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "
";
        }
        // line 37
        echo "
";
        // line 38
        if (($context["S_ATTACHMENT_SETTINGS"] ?? null)) {
            // line 39
            echo "
\t<form id=\"attachsettings\" method=\"post\" action=\"";
            // line 40
            echo ($context["U_ACTION"] ?? null);
            echo "\">
\t";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "options", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["options"]) {
                // line 42
                echo "\t\t";
                if ($this->getAttribute($context["options"], "S_LEGEND", array())) {
                    // line 43
                    echo "\t\t\t";
                    if ( !$this->getAttribute($context["options"], "S_FIRST_ROW", array())) {
                        // line 44
                        echo "\t\t\t\t</fieldset>
\t\t\t";
                    }
                    // line 46
                    echo "\t\t\t<fieldset>
\t\t\t\t<legend>";
                    // line 47
                    echo $this->getAttribute($context["options"], "LEGEND", array());
                    echo "</legend>
\t\t";
                } else {
                    // line 49
                    echo "
\t\t\t<dl>
\t\t\t\t<dt><label for=\"";
                    // line 51
                    echo $this->getAttribute($context["options"], "KEY", array());
                    echo "\">";
                    echo $this->getAttribute($context["options"], "TITLE", array());
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</label>";
                    if ($this->getAttribute($context["options"], "S_EXPLAIN", array())) {
                        echo "<br /><span>";
                        echo $this->getAttribute($context["options"], "TITLE_EXPLAIN", array());
                        echo "</span>";
                    }
                    echo "</dt>
\t\t\t\t<dd>";
                    // line 52
                    echo $this->getAttribute($context["options"], "CONTENT", array());
                    echo "</dd>
\t\t\t</dl>

\t\t";
                }
                // line 56
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['options'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "\t</fieldset>

\t<fieldset class=\"submit-buttons\">
\t\t<legend>";
            // line 60
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "</legend>
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
            // line 61
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 62
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
            echo "\" />
\t</fieldset>

\t";
            // line 65
            if ( !($context["S_SECURE_DOWNLOADS"] ?? null)) {
                // line 66
                echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
                // line 67
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SECURE_DOWNLOAD_NOTICE");
                echo "</p>
\t\t</div>
\t";
            }
            // line 70
            echo "
\t<fieldset>
\t\t<legend>";
            // line 72
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SECURE_TITLE");
            echo "</legend>
\t\t<p>";
            // line 73
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD_ADD_IPS_EXPLAIN");
            echo "</p>
\t<dl>
\t\t<dt><label for=\"ip_hostname\">";
            // line 75
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP_HOSTNAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t<dd><textarea id=\"ip_hostname\" cols=\"40\" rows=\"3\" name=\"ips\"></textarea></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"exclude\">";
            // line 79
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP_EXCLUDE");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label><br /><span>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXCLUDE_ENTERED_IP");
            echo "</span></dt>
\t\t<dd><label><input type=\"radio\" id=\"exclude\" name=\"ipexclude\" value=\"1\" class=\"radio\" /> ";
            // line 80
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label>
\t\t\t<label><input type=\"radio\" name=\"ipexclude\" value=\"0\" checked=\"checked\" class=\"radio\" /> ";
            // line 81
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label></dd>
\t</dl>

\t<p class=\"quick\">
\t\t<input class=\"button1\" type=\"submit\" id=\"securesubmit\" name=\"securesubmit\" value=\"";
            // line 85
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />
\t</p>
\t</fieldset>

\t<fieldset>
\t\t<legend>";
            // line 90
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REMOVE_IPS");
            echo "</legend>
\t";
            // line 91
            if (($context["S_DEFINED_IPS"] ?? null)) {
                // line 92
                echo "\t\t\t<p>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD_REMOVE_IPS_EXPLAIN");
                echo "</p>
\t\t<dl>
\t\t\t<dt><label for=\"remove_ip_hostname\">";
                // line 94
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP_HOSTNAME");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><select name=\"unip[]\" id=\"remove_ip_hostname\" multiple=\"multiple\" size=\"10\">";
                // line 95
                echo ($context["DEFINED_IPS"] ?? null);
                echo "</select></dd>
\t\t</dl>

\t\t<p class=\"quick\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"unsecuresubmit\" name=\"unsecuresubmit\" value=\"";
                // line 99
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
                echo "\" />
\t\t</p>
\t\t</fieldset>

\t";
            } else {
                // line 104
                echo "\t\t<p>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_IPS_DEFINED");
                echo "</p>
\t";
            }
            // line 106
            echo "\t";
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 110
($context["S_EXTENSION_GROUPS"] ?? null)) {
            // line 111
            echo "
\t";
            // line 112
            if (($context["S_EDIT_GROUP"] ?? null)) {
                // line 113
                echo "\t\t<script type=\"text/javascript\" defer=\"defer\">
\t\t// <![CDATA[
\t\t\tfunction update_image(newimage)
\t\t\t{
\t\t\t\tif (newimage == 'no_image')
\t\t\t\t{
\t\t\t\t\tdocument.getElementById('image_upload_icon').src = \"";
                // line 119
                echo ($context["ROOT_PATH"] ?? null);
                echo "images/spacer.gif\";
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tdocument.getElementById('image_upload_icon').src = \"";
                // line 123
                echo ($context["ROOT_PATH"] ?? null);
                echo ($context["IMG_PATH"] ?? null);
                echo "/\" + newimage;
\t\t\t\t}
\t\t\t}

\t\t\tfunction show_extensions(elem)
\t\t\t{
\t\t\t\tvar str = '';

\t\t\t\tfor (i = 0; i < elem.length; i++)
\t\t\t\t{
\t\t\t\t\tvar element = elem.options[i];
\t\t\t\t\tif (element.selected)
\t\t\t\t\t{
\t\t\t\t\t\tif (str)
\t\t\t\t\t\t{
\t\t\t\t\t\t\tstr = str + ', ';
\t\t\t\t\t\t}

\t\t\t\t\t\tstr = str + element.innerHTML;
\t\t\t\t\t}
\t\t\t\t}

\t\t\t\tif (document.all)
\t\t\t\t{
\t\t\t\t\tdocument.all.ext.innerText = str;
\t\t\t\t}
\t\t\t\telse if (document.getElementById('ext').textContent)
\t\t\t\t{
\t\t\t\t\tdocument.getElementById('ext').textContent = str;
\t\t\t\t}
\t\t\t\telse if (document.getElementById('ext').firstChild.nodeValue)
\t\t\t\t{
\t\t\t\t\tdocument.getElementById('ext').firstChild.nodeValue = str;
\t\t\t\t}
\t\t\t}

\t\t// ]]>
\t\t</script>

\t\t<form id=\"extgroups\" method=\"post\" action=\"";
                // line 162
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t<fieldset>
\t\t\t<input type=\"hidden\" name=\"action\" value=\"";
                // line 164
                echo ($context["ACTION"] ?? null);
                echo "\" />
\t\t\t<input type=\"hidden\" name=\"g\" value=\"";
                // line 165
                echo ($context["GROUP_ID"] ?? null);
                echo "\" />

\t\t\t<legend>";
                // line 167
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND");
                echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"group_name\">";
                // line 169
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GROUP_NAME");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><input type=\"text\" id=\"group_name\" size=\"20\" maxlength=\"100\" name=\"group_name\" value=\"";
                // line 170
                echo ($context["GROUP_NAME"] ?? null);
                echo "\" /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"category\">";
                // line 173
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SPECIAL_CATEGORY");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SPECIAL_CATEGORY_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd>";
                // line 174
                echo ($context["S_CATEGORY_SELECT"] ?? null);
                echo "</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"allowed\">";
                // line 177
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOWED");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"allowed\" name=\"allow_group\" value=\"1\"";
                // line 178
                if (($context["ALLOW_GROUP"] ?? null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"allow_in_pm\">";
                // line 181
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOW_IN_PM");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"allow_in_pm\" name=\"allow_in_pm\" value=\"1\"";
                // line 182
                if (($context["ALLOW_IN_PM"] ?? null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"upload_icon\">";
                // line 185
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UPLOAD_ICON");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><select name=\"upload_icon\" id=\"upload_icon\" onchange=\"update_image(this.options[selectedIndex].value);\">
\t\t\t\t\t<option value=\"no_image\"";
                // line 187
                if (($context["S_NO_IMAGE"] ?? null)) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_IMAGE");
                echo "</option>";
                echo ($context["S_FILENAME_LIST"] ?? null);
                echo "
\t\t\t</select></dd>
\t\t\t<dd>&nbsp;<img ";
                // line 189
                if (($context["S_NO_IMAGE"] ?? null)) {
                    echo "src=\"";
                    echo ($context["ROOT_PATH"] ?? null);
                    echo "images/spacer.gif\"";
                } else {
                    echo "src=\"";
                    echo ($context["UPLOAD_ICON_SRC"] ?? null);
                    echo "\"";
                }
                echo " id=\"image_upload_icon\" alt=\"\" title=\"\" />&nbsp;</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"extgroup_filesize\">";
                // line 192
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAX_EXTGROUP_FILESIZE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><input type=\"number\" id=\"extgroup_filesize\" min=\"0\" max=\"999999999999999\" step=\"any\" name=\"max_filesize\" value=\"";
                // line 193
                echo ($context["EXTGROUP_FILESIZE"] ?? null);
                echo "\" /> <select name=\"size_select\">";
                echo ($context["S_EXT_GROUP_SIZE_OPTIONS"] ?? null);
                echo "</select></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"assigned_extensions\">";
                // line 196
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ASSIGNED_EXTENSIONS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><div id=\"ext\">";
                // line 197
                echo ($context["ASSIGNED_EXTENSIONS"] ?? null);
                echo "</div> <span>[<a href=\"";
                echo ($context["U_EXTENSIONS"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GO_TO_EXTENSIONS");
                echo "</a> ]</span></dd>
\t\t\t<dd><select name=\"extensions[]\" id=\"assigned_extensions\" class=\"narrow\" onchange=\"show_extensions(this);\" multiple=\"multiple\" size=\"8\">";
                // line 198
                echo ($context["S_EXTENSION_OPTIONS"] ?? null);
                echo "</select></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"allowed_forums\">";
                // line 201
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOWED_FORUMS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOWED_FORUMS_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><label><input type=\"radio\" id=\"allowed_forums\" class=\"radio\" name=\"forum_select\" value=\"0\"";
                // line 202
                if ( !($context["S_FORUM_IDS"] ?? null)) {
                    echo " checked=\"checked\"";
                }
                echo " /> ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOW_ALL_FORUMS");
                echo "</label></dd>
\t\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"forum_select\" value=\"1\"";
                // line 203
                if (($context["S_FORUM_IDS"] ?? null)) {
                    echo " checked=\"checked\"";
                }
                echo " /> ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOW_SELECTED_FORUMS");
                echo "</label></dd>
\t\t\t<dd><select name=\"allowed_forums[]\" multiple=\"multiple\" size=\"8\">";
                // line 204
                echo ($context["S_FORUM_ID_OPTIONS"] ?? null);
                echo "</select></dd>
\t\t</dl>

\t\t<p class=\"submit-buttons\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
                // line 208
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
                echo "\" />&nbsp;
\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
                // line 209
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
                echo "\" />
\t\t</p>
\t\t";
                // line 211
                echo ($context["S_FORM_TOKEN"] ?? null);
                echo "
\t\t</fieldset>

\t\t</form>
\t";
            } else {
                // line 216
                echo "
\t\t<form id=\"extgroups\" method=\"post\" action=\"";
                // line 217
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t<fieldset class=\"tabulated\">
\t\t<legend>";
                // line 219
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
                echo "</legend>

\t\t<table class=\"table1\">
\t\t\t<col class=\"row1\" /><col class=\"row1\" /><col class=\"row2\" />
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 225
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION_GROUP");
                echo "</th>
\t\t\t<th>";
                // line 226
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SPECIAL_CATEGORY");
                echo "</th>
\t\t\t<th>";
                // line 227
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("OPTIONS");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 231
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "groups", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["groups"]) {
                    // line 232
                    echo "\t\t\t";
                    if (($this->getAttribute($context["groups"], "S_ADD_SPACER", array()) &&  !$this->getAttribute($context["groups"], "S_FIRST_ROW", array()))) {
                        // line 233
                        echo "\t\t\t<tr>
\t\t\t\t<td class=\"spacer\" colspan=\"3\">&nbsp;</td>
\t\t\t</tr>
\t\t\t";
                    }
                    // line 237
                    echo "\t\t\t<tr>
\t\t\t\t<td><strong>";
                    // line 238
                    echo $this->getAttribute($context["groups"], "GROUP_NAME", array());
                    echo "</strong>
\t\t\t\t\t";
                    // line 239
                    if (($this->getAttribute($context["groups"], "S_GROUP_ALLOWED", array()) &&  !$this->getAttribute($context["groups"], "S_ALLOWED_IN_PM", array()))) {
                        echo "<br /><span>&raquo; ";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOT_ALLOWED_IN_PM");
                        echo "</span>
\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 240
$context["groups"], "S_ALLOWED_IN_PM", array()) &&  !$this->getAttribute($context["groups"], "S_GROUP_ALLOWED", array()))) {
                        echo "<br /><span>&raquo; ";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLY_ALLOWED_IN_PM");
                        echo "</span>
\t\t\t\t\t";
                    } elseif (( !$this->getAttribute(                    // line 241
$context["groups"], "S_GROUP_ALLOWED", array()) &&  !$this->getAttribute($context["groups"], "S_ALLOWED_IN_PM", array()))) {
                        echo "<br /><span>&raquo; ";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOT_ALLOWED_IN_PM_POST");
                        echo "</span>
\t\t\t\t\t";
                    } else {
                        // line 242
                        echo "<br /><span>&raquo; ";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ALLOWED_IN_PM_POST");
                        echo "</span>";
                    }
                    // line 243
                    echo "\t\t\t\t</td>
\t\t\t\t<td>";
                    // line 244
                    echo $this->getAttribute($context["groups"], "CATEGORY", array());
                    echo "</td>
\t\t\t\t<td align=\"center\" valign=\"middle\" style=\"white-space: nowrap;\">&nbsp;<a href=\"";
                    // line 245
                    echo $this->getAttribute($context["groups"], "U_EDIT", array());
                    echo "\">";
                    echo ($context["ICON_EDIT"] ?? null);
                    echo "</a>&nbsp;&nbsp;<a href=\"";
                    echo $this->getAttribute($context["groups"], "U_DELETE", array());
                    echo "\" data-ajax=\"row_delete\">";
                    echo ($context["ICON_DELETE"] ?? null);
                    echo "</a>&nbsp;</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groups'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 248
                echo "\t\t</tbody>
\t\t</table>
\t\t<p class=\"quick\">
\t\t\t\t";
                // line 251
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CREATE_GROUP");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <input type=\"text\" name=\"group_name\" maxlength=\"30\" />
\t\t\t\t<input class=\"button2\" name=\"add\" type=\"submit\" value=\"";
                // line 252
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
                echo "\" />
\t\t</p>
\t\t";
                // line 254
                echo ($context["S_FORM_TOKEN"] ?? null);
                echo "
\t\t</fieldset>
\t\t</form>

\t";
            }
            // line 259
            echo "
";
        } elseif (        // line 260
($context["S_EXTENSIONS"] ?? null)) {
            // line 261
            echo "
\t<form id=\"add_ext\" method=\"post\" action=\"";
            // line 262
            echo ($context["U_ACTION"] ?? null);
            echo "\">
\t<fieldset>
\t\t<legend>";
            // line 264
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ADD_EXTENSION");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"add_extension\">";
            // line 266
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION");
            echo "</label></dt>
\t\t<dd><input type=\"text\" id=\"add_extension\" size=\"20\" maxlength=\"100\" name=\"add_extension\" value=\"";
            // line 267
            echo ($context["ADD_EXTENSION"] ?? null);
            echo "\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"extension_group\">";
            // line 270
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION_GROUP");
            echo "</label></dt>
\t\t<dd>";
            // line 271
            echo ($context["GROUP_SELECT_OPTIONS"] ?? null);
            echo "</dd>
\t</dl>

\t<p class=\"quick\">
\t\t<input type=\"submit\" id=\"add_extension_check\" name=\"add_extension_check\" class=\"button2\" value=\"";
            // line 275
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />
\t</p>
\t";
            // line 277
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

\t<form id=\"change_ext\" method=\"post\" action=\"";
            // line 281
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset class=\"tabulated\">
\t<legend>";
            // line 284
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
            echo "</legend>

\t<table class=\"table1\">
\t\t<col class=\"row1\" /><col class=\"row1\" /><col class=\"row2\" />
\t<thead>
\t<tr>
\t\t<th>";
            // line 290
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION");
            echo "</th>
\t\t<th>";
            // line 291
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION_GROUP");
            echo "</th>
\t\t<th>";
            // line 292
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
            // line 296
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "extensions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["extensions"]) {
                // line 297
                echo "\t\t";
                if ($this->getAttribute($context["extensions"], "S_SPACER", array())) {
                    // line 298
                    echo "\t\t<tr>
\t\t\t<td class=\"spacer\" colspan=\"3\">&nbsp;</td>
\t\t</tr>
\t\t";
                }
                // line 302
                echo "\t\t<tr>
\t\t\t<td><strong>";
                // line 303
                echo $this->getAttribute($context["extensions"], "EXTENSION", array());
                echo "</strong></td>
\t\t\t<td>";
                // line 304
                echo $this->getAttribute($context["extensions"], "GROUP_OPTIONS", array());
                echo "</td>
\t\t\t<td><input type=\"checkbox\" class=\"radio\" name=\"extension_id_list[]\" value=\"";
                // line 305
                echo $this->getAttribute($context["extensions"], "EXTENSION_ID", array());
                echo "\" /><input type=\"hidden\" name=\"extension_change_list[]\" value=\"";
                echo $this->getAttribute($context["extensions"], "EXTENSION_ID", array());
                echo "\" /></td>
\t\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extensions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 308
            echo "\t</tbody>
\t</table>

\t<p class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
            // line 312
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 313
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
            echo "\" />
\t</p>
\t";
            // line 315
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 319
($context["S_ORPHAN"] ?? null)) {
            // line 320
            echo "
\t<form id=\"orphan\" method=\"post\" action=\"";
            // line 321
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset class=\"tabulated\">
\t<legend>";
            // line 324
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
            echo "</legend>

\t<div class=\"pagination top-pagination\">
\t";
            // line 327
            if ((twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array())) || ($context["TOTAL_FILES"] ?? null))) {
                // line 328
                echo "\t\t";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NUMBER_FILES");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_FILES"] ?? null);
                echo " &bull; ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_SIZE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_SIZE"] ?? null);
                echo "
\t\t";
                // line 329
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                    // line 330
                    echo "\t\t\t&bull; ";
                    $location = "pagination.html";
                    $namespace = false;
                    if (strpos($location, '@') === 0) {
                        $namespace = substr($location, 1, strpos($location, '/') - 1);
                        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                        $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                    }
                    $this->loadTemplate("pagination.html", "acp_attachments.html", 330)->display($context);
                    if ($namespace) {
                        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                    }
                    // line 331
                    echo "\t\t";
                } else {
                    // line 332
                    echo "\t\t\t&bull; ";
                    echo ($context["PAGE_NUMBER"] ?? null);
                    echo "
\t\t";
                }
                // line 334
                echo "\t";
            }
            // line 335
            echo "\t</div>

\t";
            // line 337
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "orphan", array()))) {
                // line 338
                echo "\t\t<table class=\"table1 zebra-table fixed-width-table\">
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 341
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FILENAME");
                echo "</th>
\t\t\t<th style=\"width: 15%;\">";
                // line 342
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FILEDATE");
                echo "</th>
\t\t\t<th style=\"width: 15%;\">";
                // line 343
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FILESIZE");
                echo "</th>
\t\t\t<th style=\"width: 15%;\">";
                // line 344
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ATTACH_POST_ID");
                echo "</th>
\t\t\t<th style=\"width: 15%;\">";
                // line 345
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ATTACH_TO_POST");
                echo "</th>
\t\t\t<th style=\"width: 15%;\">";
                // line 346
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 350
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "orphan", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["orphan"]) {
                    // line 351
                    echo "\t\t\t<tr>
\t\t\t\t<td><a href=\"";
                    // line 352
                    echo $this->getAttribute($context["orphan"], "U_FILE", array());
                    echo "\">";
                    echo $this->getAttribute($context["orphan"], "REAL_FILENAME", array());
                    echo "</a></td>
\t\t\t\t<td>";
                    // line 353
                    echo $this->getAttribute($context["orphan"], "FILETIME", array());
                    echo "</td>
\t\t\t\t<td>";
                    // line 354
                    echo $this->getAttribute($context["orphan"], "FILESIZE", array());
                    echo "</td>
\t\t\t\t<td><strong>";
                    // line 355
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ATTACH_ID");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " </strong><input type=\"number\" min=\"0\" max=\"9999999999\" name=\"post_id[";
                    echo $this->getAttribute($context["orphan"], "ATTACH_ID", array());
                    echo "]\" value=\"";
                    echo $this->getAttribute($context["orphan"], "POST_ID", array());
                    echo "\" style=\"width: 75%;\" /></td>
\t\t\t\t<td><input type=\"checkbox\" class=\"radio\" name=\"add[";
                    // line 356
                    echo $this->getAttribute($context["orphan"], "ATTACH_ID", array());
                    echo "]\" /></td>
\t\t\t\t<td><input type=\"checkbox\" class=\"radio\" name=\"delete[";
                    // line 357
                    echo $this->getAttribute($context["orphan"], "ATTACH_ID", array());
                    echo "]\" /></td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['orphan'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 360
                echo "\t\t<tr class=\"row4\">
\t\t\t<td colspan=\"4\">&nbsp;</td>
\t\t\t<td class=\"small\"><a href=\"#\" onclick=\"marklist('orphan', 'add', true); return false;\">";
                // line 362
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
                echo "</a> :: <a href=\"#\" onclick=\"marklist('orphan', 'add', false); return false;\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
                echo "</a></td>
\t\t\t<td class=\"small\"><a href=\"#\" onclick=\"marklist('orphan', 'delete', true); return false;\">";
                // line 363
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
                echo "</a> :: <a href=\"#\" onclick=\"marklist('orphan', 'delete', false); return false;\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
                echo "</a></td>
\t\t</tr>
\t\t</tbody>
\t\t</table>
\t";
            } else {
                // line 368
                echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
                // line 369
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_ATTACHMENTS");
                echo "</p>
\t\t</div>
\t";
            }
            // line 372
            echo "
\t";
            // line 373
            if (($context["TOTAL_FILES"] ?? null)) {
                // line 374
                echo "\t<div class=\"pagination\">
\t\t";
                // line 375
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NUMBER_FILES");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_FILES"] ?? null);
                echo " &bull; ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_SIZE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_SIZE"] ?? null);
                echo "
\t\t";
                // line 376
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                    // line 377
                    echo "\t\t\t&bull; ";
                    $location = "pagination.html";
                    $namespace = false;
                    if (strpos($location, '@') === 0) {
                        $namespace = substr($location, 1, strpos($location, '/') - 1);
                        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                        $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                    }
                    $this->loadTemplate("pagination.html", "acp_attachments.html", 377)->display($context);
                    if ($namespace) {
                        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                    }
                    // line 378
                    echo "\t\t";
                } else {
                    // line 379
                    echo "\t\t\t&bull; ";
                    echo ($context["PAGE_NUMBER"] ?? null);
                    echo "
\t\t";
                }
                // line 381
                echo "\t</div>
\t";
            }
            // line 383
            echo "
\t";
            // line 384
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "orphan", array()))) {
                // line 385
                echo "\t\t<p class=\"submit-buttons\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
                // line 386
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
                echo "\" />&nbsp;
\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
                // line 387
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
                echo "\" />
\t\t</p>
\t";
            }
            // line 390
            echo "
\t";
            // line 391
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 395
($context["S_MANAGE"] ?? null)) {
            // line 396
            echo "
\t<form id=\"attachments\" method=\"post\" action=\"";
            // line 397
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset class=\"tabulated\">
\t<legend>";
            // line 400
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
            echo "</legend>

\t<div class=\"pagination top-pagination\">
\t";
            // line 403
            if ((twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array())) || ($context["TOTAL_FILES"] ?? null))) {
                // line 404
                echo "\t\t";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NUMBER_FILES");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_FILES"] ?? null);
                echo " &bull; ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_SIZE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_SIZE"] ?? null);
                echo "
\t\t";
                // line 405
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                    // line 406
                    echo "\t\t\t&bull; ";
                    $location = "pagination.html";
                    $namespace = false;
                    if (strpos($location, '@') === 0) {
                        $namespace = substr($location, 1, strpos($location, '/') - 1);
                        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                        $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                    }
                    $this->loadTemplate("pagination.html", "acp_attachments.html", 406)->display($context);
                    if ($namespace) {
                        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                    }
                    // line 407
                    echo "\t\t";
                } else {
                    // line 408
                    echo "\t\t\t&bull; ";
                    echo ($context["PAGE_NUMBER"] ?? null);
                    echo "
\t\t";
                }
                // line 410
                echo "\t";
            }
            // line 411
            echo "\t</div>

";
            // line 413
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "attachments", array()))) {
                // line 414
                echo "\t<table class=\"table1 zebra-table fixed-width-table\">
\t<thead>
\t<tr>
\t\t<th>";
                // line 417
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FILENAME");
                echo "</th>
\t\t<th style=\"width: 15%;\">";
                // line 418
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTED");
                echo "</th>
\t\t<th style=\"width: 15%;\" class=\"centered-text\">";
                // line 419
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FILESIZE");
                echo "</th>
\t\t<th style=\"width: 10%;\" class=\"centered-text\">";
                // line 420
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
                echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
                // line 424
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "attachments", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attachments"]) {
                    // line 425
                    echo "\t\t<tr>
\t\t\t<td>
\t\t\t\t";
                    // line 427
                    if ($this->getAttribute($context["attachments"], "S_IN_MESSAGE", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EXTENSION_GROUP");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <strong>";
                        if ($this->getAttribute($context["attachments"], "EXT_GROUP_NAME", array())) {
                            echo $this->getAttribute($context["attachments"], "EXT_GROUP_NAME", array());
                        } else {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_EXT_GROUP");
                        }
                        echo "</strong><br />";
                        echo $this->getAttribute($context["attachments"], "L_DOWNLOAD_COUNT", array());
                        echo "<br />";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IN");
                        echo " ";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRIVATE_MESSAGE");
                        echo "
\t\t\t\t";
                    } else {
                        // line 428
                        echo "<a href=\"";
                        echo $this->getAttribute($context["attachments"], "U_FILE", array());
                        echo "\" style=\"font-weight: bold;\">";
                        echo $this->getAttribute($context["attachments"], "REAL_FILENAME", array());
                        echo "</a><br />";
                        if ($this->getAttribute($context["attachments"], "COMMENT", array())) {
                            echo $this->getAttribute($context["attachments"], "COMMENT", array());
                            echo "<br />";
                        }
                        echo $this->getAttribute($context["attachments"], "L_DOWNLOAD_COUNT", array());
                        echo "<br />";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo " <a href=\"";
                        echo $this->getAttribute($context["attachments"], "U_VIEW_TOPIC", array());
                        echo "\">";
                        echo $this->getAttribute($context["attachments"], "TOPIC_TITLE", array());
                        echo "</a>";
                    }
                    // line 429
                    echo "\t\t\t</td>
\t\t\t<td>";
                    // line 430
                    echo $this->getAttribute($context["attachments"], "FILETIME", array());
                    echo "<br />";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                    echo " ";
                    echo $this->getAttribute($context["attachments"], "ATTACHMENT_POSTER", array());
                    echo "</td>
\t\t\t<td class=\"centered-text\">";
                    // line 431
                    echo $this->getAttribute($context["attachments"], "FILESIZE", array());
                    echo "</td>
\t\t\t<td class=\"centered-text\"><input type=\"checkbox\" class=\"radio\" name=\"delete[";
                    // line 432
                    echo $this->getAttribute($context["attachments"], "ATTACH_ID", array());
                    echo "]\" /></td>
\t\t</tr>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachments'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 435
                echo "\t</tbody>
\t</table>
";
            } else {
                // line 438
                echo "\t<div class=\"errorbox\">
\t\t<p>";
                // line 439
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_ATTACHMENTS");
                echo "</p>
\t</div>
";
            }
            // line 442
            echo "
\t";
            // line 443
            if (($context["TOTAL_FILES"] ?? null)) {
                // line 444
                echo "\t<div class=\"pagination\">
\t\t";
                // line 445
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NUMBER_FILES");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_FILES"] ?? null);
                echo " &bull; ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_SIZE");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                echo ($context["TOTAL_SIZE"] ?? null);
                echo "
\t\t";
                // line 446
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                    // line 447
                    echo "\t\t\t&bull; ";
                    $location = "pagination.html";
                    $namespace = false;
                    if (strpos($location, '@') === 0) {
                        $namespace = substr($location, 1, strpos($location, '/') - 1);
                        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                        $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                    }
                    $this->loadTemplate("pagination.html", "acp_attachments.html", 447)->display($context);
                    if ($namespace) {
                        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                    }
                    // line 448
                    echo "\t\t";
                } else {
                    // line 449
                    echo "\t\t\t&bull; ";
                    echo ($context["PAGE_NUMBER"] ?? null);
                    echo "
\t\t";
                }
                // line 451
                echo "\t</div>
\t";
            }
            // line 453
            echo "
\t<fieldset class=\"display-options\">
\t\t";
            // line 455
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DISPLAY_LOG");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " &nbsp;";
            echo ($context["S_LIMIT_DAYS"] ?? null);
            echo "&nbsp;";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SORT_BY");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " ";
            echo ($context["S_SORT_KEY"] ?? null);
            echo " ";
            echo ($context["S_SORT_DIR"] ?? null);
            echo "
\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 456
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GO");
            echo "\" name=\"sort\" />
\t</fieldset>

\t<hr />

";
            // line 461
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "attachments", array()))) {
                // line 462
                echo "\t<fieldset class=\"quick\">
\t\t<input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
                // line 463
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_MARKED");
                echo "\" /><br />
\t\t<p class=\"small\">
\t\t\t<a href=\"#\" onclick=\"marklist('attachments', 'delete', true); return false;\">";
                // line 465
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
                echo "</a> &bull;
\t\t\t<a href=\"#\" onclick=\"marklist('attachments', 'delete', false); return false;\">";
                // line 466
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
                echo "</a>
\t\t</p>
\t</fieldset>
";
            }
            // line 470
            echo "\t";
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

\t";
            // line 474
            if (($context["S_ACTION_OPTIONS"] ?? null)) {
                // line 475
                echo "\t<fieldset>
\t\t<legend>";
                // line 476
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESYNC_STATS");
                echo "</legend>
\t\t<form id=\"action_stats_form\" method=\"post\" action=\"";
                // line 477
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t\t<dl>
\t\t\t\t<dt><label for=\"action_stats\">";
                // line 479
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESYNC_FILES_STATS");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESYNC_FILES_STATS_EXPLAIN");
                echo "</span></dt>
\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"stats\" /><input class=\"button2\" type=\"submit\" id=\"action_stats\" name=\"action_stats\" value=\"";
                // line 480
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RUN");
                echo "\" /></dd>
\t\t\t</dl>
\t\t</form>
\t</fieldset>
\t";
            }
        }
        // line 486
        echo "
";
        // line 487
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_attachments.html", 487)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_attachments.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1383 => 487,  1380 => 486,  1371 => 480,  1365 => 479,  1360 => 477,  1356 => 476,  1353 => 475,  1351 => 474,  1343 => 470,  1336 => 466,  1332 => 465,  1327 => 463,  1324 => 462,  1322 => 461,  1314 => 456,  1300 => 455,  1296 => 453,  1292 => 451,  1286 => 449,  1283 => 448,  1270 => 447,  1268 => 446,  1256 => 445,  1253 => 444,  1251 => 443,  1248 => 442,  1242 => 439,  1239 => 438,  1234 => 435,  1225 => 432,  1221 => 431,  1213 => 430,  1210 => 429,  1190 => 428,  1171 => 427,  1167 => 425,  1163 => 424,  1156 => 420,  1152 => 419,  1148 => 418,  1144 => 417,  1139 => 414,  1137 => 413,  1133 => 411,  1130 => 410,  1124 => 408,  1121 => 407,  1108 => 406,  1106 => 405,  1093 => 404,  1091 => 403,  1085 => 400,  1079 => 397,  1076 => 396,  1074 => 395,  1067 => 391,  1064 => 390,  1058 => 387,  1054 => 386,  1051 => 385,  1049 => 384,  1046 => 383,  1042 => 381,  1036 => 379,  1033 => 378,  1020 => 377,  1018 => 376,  1006 => 375,  1003 => 374,  1001 => 373,  998 => 372,  992 => 369,  989 => 368,  979 => 363,  973 => 362,  969 => 360,  960 => 357,  956 => 356,  947 => 355,  943 => 354,  939 => 353,  933 => 352,  930 => 351,  926 => 350,  919 => 346,  915 => 345,  911 => 344,  907 => 343,  903 => 342,  899 => 341,  894 => 338,  892 => 337,  888 => 335,  885 => 334,  879 => 332,  876 => 331,  863 => 330,  861 => 329,  848 => 328,  846 => 327,  840 => 324,  834 => 321,  831 => 320,  829 => 319,  822 => 315,  817 => 313,  813 => 312,  807 => 308,  796 => 305,  792 => 304,  788 => 303,  785 => 302,  779 => 298,  776 => 297,  772 => 296,  765 => 292,  761 => 291,  757 => 290,  748 => 284,  742 => 281,  735 => 277,  730 => 275,  723 => 271,  719 => 270,  713 => 267,  709 => 266,  704 => 264,  699 => 262,  696 => 261,  694 => 260,  691 => 259,  683 => 254,  678 => 252,  673 => 251,  668 => 248,  653 => 245,  649 => 244,  646 => 243,  641 => 242,  634 => 241,  628 => 240,  622 => 239,  618 => 238,  615 => 237,  609 => 233,  606 => 232,  602 => 231,  595 => 227,  591 => 226,  587 => 225,  578 => 219,  573 => 217,  570 => 216,  562 => 211,  557 => 209,  553 => 208,  546 => 204,  538 => 203,  530 => 202,  523 => 201,  517 => 198,  509 => 197,  504 => 196,  496 => 193,  491 => 192,  477 => 189,  466 => 187,  460 => 185,  452 => 182,  447 => 181,  439 => 178,  434 => 177,  428 => 174,  421 => 173,  415 => 170,  410 => 169,  405 => 167,  400 => 165,  396 => 164,  391 => 162,  348 => 123,  341 => 119,  333 => 113,  331 => 112,  328 => 111,  326 => 110,  318 => 106,  312 => 104,  304 => 99,  297 => 95,  292 => 94,  286 => 92,  284 => 91,  280 => 90,  272 => 85,  265 => 81,  261 => 80,  254 => 79,  246 => 75,  241 => 73,  237 => 72,  233 => 70,  227 => 67,  224 => 66,  222 => 65,  216 => 62,  212 => 61,  208 => 60,  203 => 57,  197 => 56,  190 => 52,  177 => 51,  173 => 49,  168 => 47,  165 => 46,  161 => 44,  158 => 43,  155 => 42,  151 => 41,  147 => 40,  144 => 39,  142 => 38,  139 => 37,  135 => 35,  128 => 33,  114 => 32,  109 => 31,  105 => 30,  99 => 28,  97 => 27,  94 => 26,  88 => 23,  84 => 22,  81 => 21,  79 => 20,  76 => 19,  70 => 16,  66 => 15,  63 => 14,  61 => 13,  56 => 11,  51 => 9,  48 => 8,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_attachments.html", "");
    }
}
