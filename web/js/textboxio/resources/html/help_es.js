/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(a){return function(){return a}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("help_es.js","help for language es");g({version:f,about:a('\ufeff<div role=presentation class="ephox-polish-help-article ephox-polish-help-about">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Acerca de</div>\n  <p>Textbox.io es una herramienta WYSIWYG que sirve para crear contenidos en aplicaciones online con un dise\xf1o espectacular. Independientemente de para qu\xe9 se vaya a utilizar (redes sociales, blogs, correos electr\xf3nicos, etc.), con Textbox.io podr\xe1 expresarse en Internet.</p>\n  <p>&nbsp;</p>\n  <p>Textbox.io @@FULL_VERSION@@</p>\n  <p>Compilaci\xf3n del cliente @@CLIENT_VERSION@@</p>\n  <p class="ephox-polish-help-integration">Integraci\xf3n de @@INTEGRATION_TYPE@@, versi\xf3n @@INTEGRATION_VERSION@@</p>\n  <p>&nbsp;</p>\n  <p>Derechos de autor 2015 Ephox Corporation. Todos los derechos reservados.</p>\n  <p><a href="javascript:void(0)" class="ephox-license-link">Licencias de terceros</a></p>\n</div>'),accessibility:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Navegaci\xf3n con el teclado</div>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Activar la navegaci\xf3n con el teclado</div>\n  <p>Para permitir la navegaci\xf3n con el teclado en la barra de herramientas, pulse F10 en Windows, o ALT + F10 en Mac OSX. El primer elemento de la barra de herramientas aparecer\xe1 destacado con un contorno azul para indicar que est\xe1 seleccionado. </p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Desplazarse entre grupos</div>\n  <p>Los botones de la barra de herramientas est\xe1n separados por grupos de acciones similares. Cuando la navegaci\xf3n con el teclado est\xe1 activa, al pulsar el tabulador mover\xe1 la selecci\xf3n al siguiente grupo, mientras que si pulsa la tecla de las may\xfasculas y el tabulador, la selecci\xf3n volver\xe1 al grupo anterior. Si pulsa el tabulador cuando est\xe1 en el \xfaltimo grupo, volver\xe1 al primer grupo de botones.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Desplazarse entre elementos o botones</div>\n  <p>Para desplazarse entre elementos, utilice las teclas de flechas. Se desplazar\xe1 de elemento en elemento dentro de cada grupo; para saltar al siguiente grupo, pulse el tabulador y despl\xe1cese por el grupo pulsando las teclas de flechas.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Ejecutar comandos</div>\n  <p>Para ejecutar un comando, despl\xe1cese por la selecci\xf3n hasta el bot\xf3n deseado, y pulse la barra espaciadora o la tecla intro.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Abrir, navegar y cerrar men\xfas</div>\n  <p>Cuando dentro de un bot\xf3n de la barra de herramientas hay un men\xfa, pulse la barra espaciadora o la tecla intro para abrirlo. Al abrir el men\xfa, aparecer\xe1 seleccionado el primer elemento; despl\xe1cese por el men\xfa con las teclas de flechas. Para subir o bajar por el men\xfa, pulse la flecha hacia arriba o hacia abajo, respectivamente. Los submen\xfas funcionan igual.</p>\n\n  <p>En los elementos del men\xfa que tienen submen\xfas aparece un s\xedmbolo de un \xe1ngulo. Si pulsa la tecla de flecha que se corresponde con la direcci\xf3n del \xe1ngulo, se abrir\xe1 el submen\xfa, y la flecha que tiene la direcci\xf3n contraria lo cerrar\xe1.</p>\n\n  <p>Para cerrar cualquier men\xfa que tenga activo, pulse la tecla de escape. Al cerrar un men\xfa, la selecci\xf3n volver\xe1 a su estado anterior.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Edici\xf3n o eliminaci\xf3n de hiperv\xednculos</div>\n\n  <p>Para editar o eliminar un enlace, despl\xe1cese al men\xfa Insertar y seleccione Insertar enlace.  En el editor aparecer\xe1 el di\xe1logo para editar enlaces. </p>\n\n  <p>Edite el enlace introduciendo la nueva URL en la casilla para modificar el enlace y pulse la tecla intro. Para eliminar el enlace del documento, pulse el bot\xf3n de eliminar. Para salir del di\xe1logo sin hacer ning\xfan cambio, pulse la tecla de escape.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Cambiar el tama\xf1o de la fuente y del borde de la tabla</div>\n\n  <p>Para cambiar el tama\xf1o de la fuente, despl\xe1cese al men\xfa Fuente y seleccione el tama\xf1o de fuente. En el editor aparece el di\xe1logo del tama\xf1o dentro del men\xfa, y se abrir\xe1 en estado activo.</p>\n\n  <p>Cambie el tama\xf1o de los bordes desplaz\xe1ndose al elemento de la barra de herramientas para cambiar el tama\xf1o del borde de las tablas y seleccionando el tama\xf1o deseado. En el editor aparece el di\xe1logo del tama\xf1o dentro del men\xfa, y se abrir\xe1 en estado activo. Nota: El elemento de la barra de herramientas para cambiar el tama\xf1o del borde de las tablas solo est\xe1 disponible cuando el cursor est\xe1 dentro de una tabla.</p>\n\n  <p>Dentro del di\xe1logo del tama\xf1o, pulse el tabulador para pasar la selecci\xf3n al siguiente control. Pulse may\xfasculas+tabulador para pasar la selecci\xf3n al control anterior.</p>\n\n  <p>Modifique el tama\xf1o escribiendo un valor nuevo en la casilla correspondiente al tama\xf1o. Por ejemplo, 14 p\xedxeles o 1 em. Para aplicar los cambios, pulse la tecla intro. Tenga en cuenta que al pulsar la tecla intro, se cierra el di\xe1logo y se vuelve al documento.</p>\n\n  <p>Puede cambiar el tama\xf1o sin salir del di\xe1logo activando los botones para aumentar o disminuir el tama\xf1o. Al cambiar el tama\xf1o con los botones para aumentar o disminuir el tama\xf1o, se cambiar\xe1 el tama\xf1o del elemento seleccionado mientras se conserva el valor unitario que tenga. Para salir del di\xe1logo del tama\xf1o, pulse la tecla de escape.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Recortar una imagen</div>\n\n  <p>Para acceder a la funci\xf3n de recorte, seleccione una imagen para ver las distintas operaciones que se pueden aplicar a la imagen en la barra de herramientas. Dichas operaciones tambi\xe9n est\xe1n disponibles en el men\xfa contextual. Al activar la funci\xf3n de recorte, se colocar\xe1 una m\xe1scara de recorte sobre la imagen, y aparecer\xe1 seleccionada la esquina superior izquierda.</p>\n\n  <p>Puede desplazarse con el tabulador. Se pueden seleccionar tanto cualquiera de las 4 esquinas como todo el recuadro de la m\xe1scara de recorte. Cada una de las esquinas se puede colocar por separado, y tambi\xe9n se pueden mover las cuatro esquinas a la vez moviendo todo el recuadro de la m\xe1scara de recorte.</p>\n\n  <p>Para mover la selecci\xf3n sobre la imagen, s\xedrvase de las teclas de flechas. Con cada pulsaci\xf3n de la tecla, la selecci\xf3n se mover\xe1 10 p\xedxeles. Para que se desplace menos, apriete la tecla de las may\xfasculas mientras pulsa la tecla de la flecha y se mover\xe1 un solo p\xedxel.</p>\n\n  <p>Para aplicar el recorte a la imagen, pulse la tecla intro.</p>\n\n  <p>Para cancelar la acci\xf3n de recorte sin afectar a la imagen, pulse la tecla de escape.</p>\n\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n      <caption>Navegaci\xf3n con el teclado</caption>\n      <thead>\n        <tr>\n          <th scope="col">Acci\xf3n</th>\n          <th scope="col">Windows</th>\n          <th scope="col">Mac OS</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Activar barra de herramientas</td>\n        <td>F10</td>\n        <td>ALT + F10</td>\n      </tr>\n      <tr>\n        <td>Seleccionar sig/ant bot\xf3n de grupo</td>\n        <td>\u2190 o \u2192</td>\n        <td>\u2190 o \u2192</td>\n      </tr>\n      <tr>\n        <td>Pasar al siguiente grupo</td>\n        <td>TAB</td>\n        <td>TAB</td>\n      </tr>\n      <tr>\n        <td>Pasar al anterior grupo</td>\n        <td>MAY\xdaS + TAB</td>\n        <td>MAY\xdaS + TAB</td>\n      </tr>\n      <tr>\n        <td>Ejecutar comando</td>\n        <td>BARRA ESPACIADORA o INTRO</td>\n        <td>BARRA ESPACIADORA o INTRO</td>\n      </tr>\n      <tr>\n        <td>Abrir men\xfa principal</td>\n        <td>BARRA ESPACIADORA o INTRO</td>\n        <td>BARRA ESPACIADORA o INTRO</td>\n      </tr>\n      <tr>\n        <td>Abrir/expandir submen\xfa</td>\n        <td>BARRA ESPACIADORA o INTRO o \u2192</td>\n        <td>BARRA ESPACIADORA o INTRO o \u2192</td>\n      </tr>\n      <tr>\n        <td>Seleccionar elemento del men\xfa sig/ant</td>\n        <td>\u2193 o \u2191</td>\n        <td>\u2193 o \u2191</td>\n      </tr>\n      <tr>\n        <td>Cerrar men\xfa</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n      <tr>\n        <td>Cerrar/Contraer submen\xfa</td>\n        <td>ESC o \u2190</td>\n        <td>ESC o \u2190</td>\n      </tr>\n      <tr>\n        <td>Mover selecci\xf3n de recorte de imagen</td>\n        <td>\u2190 o \u2192 o \u2193 o \u2191</td>\n        <td>\u2190 o \u2192 o \u2193 o \u2191</td>\n      </tr>\n      <tr>\n        <td>Mover selecci\xf3n de recorte de imagen con precisi\xf3n</td>\n        <td>Mantener pulsado MAY\xdaS mientras se mueve</td>\n        <td>Mantener pulsado MAY\xdaS mientras se mueve</td>\n      </tr>\n      <tr>\n        <td>Aplicar recorte</td>\n        <td>INTRO</td>\n        <td>INTRO</td>\n      </tr>\n      <tr>\n        <td>Cancelar recorte</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n    </tbody>\n  </table>\n</div>\n'),a11ycheck:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Comprobaci\xf3n de accesibilidad</div>\n  <p>La herramienta para comprobar la accesibilidad (si est\xe1 activada) puede identificar los siguientes problemas de accesibilidad en documentos HTML.</p>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-a11ycheck-table">\n      <caption>Definici\xf3n del problema</caption>\n      <thead>\n        <tr>\n          <th scope="col">Problema</th>\n          <th scope="col">WCAG</th>\n          <th scope="col">Descripci\xf3n</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Las im\xe1genes deben tener una descripci\xf3n con texto alternativo.</td>\n        <td>1.1.1</td>\n        <td>Las im\xe1genes deben tener un valor de texto alternativo establecido para describir el tema de la imagen a los usuarios con discapacidad visual. </td>\n      </tr>\n      <tr>\n        <td>El texto alternativo no debe ser el mismo que el del nombre del archivo de imagen.</td>\n        <td>1.1.1</td>\n        <td>No use el nombre del archivo de imagen como valor de texto alternativo. Escoja un valor de texto alternativo que describa el tema de la imagen.</td>\n      </tr>\n      <tr>\n        <td>Las tablas deben tener subt\xedtulos.</td>\n        <td>1.3.1</td>\n        <td>Las tablas deben tener un texto conciso y descriptivo que informe del contenido de la tabla.</td>\n      </tr>\n      <tr>\n        <td>Las tablas complejas deben tener res\xfamenes.</td>\n        <td>1.3.1</td>\n        <td>Las tablas que tengan estructuras complejas (con celdas que se extiendan en varias filas o columnas) deben llevar un resumen que describa la estructura de la tabla. </td>\n      </tr>\n      <tr>\n        <td>El subt\xedtulo y el resumen de la tabla no pueden tener el mismo valor.</td>\n        <td>1.3.1</td>\n        <td>El subt\xedtulo de la tabla debe describir los contenidos de la tabla, mientras que el resumen de la tabla debe describir la estructura de las tablas complejas. </td>\n      </tr>\n      <tr>\n        <td>Las tablas deben tener por lo menos una celda de encabezado.</td>\n        <td>1.3.1</td>\n        <td>Las tablas deben tener encabezados para filas o columnas que describan adecuadamente el contenido de la fila o columna en cuesti\xf3n.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Para ver m\xe1s informaci\xf3n sobre este tema, consulte la p\xe1gina web webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Los encabezados de la tabla se deben aplicar a una fila o a una columna.</td>\n        <td>1.3.1</td>\n        <td>Los encabezados de las tablas deben estar relacionados con la fila o columna que describen.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Para ver m\xe1s informaci\xf3n sobre este tema, consulte la p\xe1gina web webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Este p\xe1rrafo parece un encabezado. Si se trata de un encabezado, seleccione un nivel de encabezado.</td>\n        <td>1.3.1</td>\n        <td>S\xedrvase de los encabezados para separar los documentos en secciones. Evite usar p\xe1rrafos con formato en lugar de encabezados.<br/><a href="http://webaim.org/techniques/semanticstructure/#correctly" target="_blank">Para ver m\xe1s informaci\xf3n sobre este tema, consulte la p\xe1gina web webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Los encabezados deben aplicarse en orden secuencial. Por ejemplo: el Encabezado 1 debe ir seguido del Encabezado 2, no del Encabezado 3.</td>\n        <td>1.3.1</td>\n        <td>Los encabezados de los documentos subsiguientes deben ordenarse jer\xe1rquicamente y aparecer en orden ascendente o similar.<br/><a href="http://webaim.org/techniques/semanticstructure/#contentstructure" target="_blank"> Para ver m\xe1s informaci\xf3n sobre este tema, consulte la p\xe1gina web webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Utilice marcas en las listas.</td>\n        <td>1.3.1</td>\n        <td>Aseg\xfarese de que las listas de elementos se sirven de estructuras de lista de HTML para representar las listas (<code>&lt;ul&gt;</code> o <code>&lt;ol&gt;</code> y <code>&lt;li&gt;</code>).</td>\n      </tr>\n      <tr>\n        <td>El texto debe tener una relaci\xf3n de contraste del color de 4,5:1.</td>\n        <td>1.4.3</td>\n        <td>Tanto el texto como el fondo deben tener una relaci\xf3n de contraste de color tal que puedan leer el texto personas con una discapacidad visual moderada.</td>\n      </tr>\n      <tr>\n        <td>Los enlaces adyacentes deben combinarse.</td>\n        <td>2.4.4</td>\n        <td>Los hiperv\xednculos adyacentes que se\xf1alen al mismo recurso deben combinarse en un \xfanico hiperv\xednculo.</td>\n      </tr>\n    </tbody>\n  </table>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">M\xe1s informaci\xf3n:</div>\n  <p>\n    <a href="http://webaim.org/intro/" target="_blank">Introducci\xf3n a la accesibilidad web en webaim.org</a> <br/>\n    <a href="http://www.w3.org/WAI/intro/wcag" target="_blank">Introducci\xf3n a WCAG 2.0 en w3.org</a> <br/>\n    <a href="http://www.section508.gov/" target="_blank">Art\xedculo 508 de la Ley de Rehabilitaci\xf3n de EE.UU. en section508.gov</a>\n  </p>\n</div>'),markdown:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Formato Markdown</div>\n  <p>Markdown es una sintaxis para crear estructuras y formatos en HTML sin tener que utilizar atajos del teclado ni men\xfas de acceso. Para utilizar el formato Markdown, introduzca la sintaxis deseada y a continuaci\xf3n pulse la tecla intro o la barra espaciadora.</p>\n  <table cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-markdown" aria-readonly="true">\n      <caption>Sintaxis de formato con teclado</caption>\n      <thead>\n        <tr>\n          <th scope="col">Sintaxis</th>\n          <th scope="col">Resultado en HTML</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td><pre># El encabezado m\xe1s grande</pre></td>\n        <td><pre>&lt;h1&gt; El encabezado m\xe1s grande&lt;/h1&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>## Encabezado m\xe1s grande</pre></td>\n        <td><pre>&lt;h2&gt;Encabezado m\xe1s grande&lt;/h2&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>### Encabezado grande</pre></td>\n        <td><pre>&lt;h3&gt;Encabezado grande&lt;/h3&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>####  Encabezado</pre></td>\n        <td><pre>&lt;h4&gt;Encabezado&lt;/h4&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>##### Encabezado peque\xf1o</pre></td>\n        <td><pre>&lt;h5&gt;Encabezado peque\xf1o&lt;/h5&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>###### El encabezado m\xe1s peque\xf1o</pre></td>\n        <td><pre>&lt;h6&gt;El encabezado m\xe1s peque\xf1o&lt;/h6&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>* Lista sin ordenar</pre></td>\n        <td><pre>&lt;ul&gt;&lt;li&gt;Lista sin ordenar&lt;/li&gt;&lt;/ul&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>1. Lista ordenada</pre></td>\n        <td><pre>&lt;ol&gt;&lt;li&gt;Lista ordenada&lt;/li&gt;&lt;/ol&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>*Cursiva*</pre></td>\n        <td><pre>&lt;em&gt;Cursiva&lt;/em&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>**Negrita**</pre></td>\n        <td><pre>&lt;strong&gt;Negrita&lt;/strong&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>---</pre></td>\n        <td><pre>&lt;hr/&gt;</pre></td>\n      </tr>\n    </tbody>\n  </table>\n</div>'),shortcuts:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Atajos del teclado</div>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n    <caption>Comandos del editor</caption>\n    <thead>\n      <tr>\n        <th scope="col">Acci\xf3n</th>\n        <th scope="col">Windows</th>\n        <th scope="col">Mac OS</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>Deshacer</td>\n        <td>CTRL + Z</td>\n        <td>\u2318Z</td>\n      </tr>\n      <tr>\n        <td>Rehacer</td>\n        <td>CTRL + Y</td>\n        <td>\u2318\u21e7Z</td>\n      </tr>\n      <tr>\n        <td>Negrita</td>\n        <td>CTRL + B</td>\n        <td>\u2318B</td>\n      </tr>\n      <tr>\n        <td>Cursiva</td>\n        <td>CTRL + I</td>\n        <td>\u2318I</td>\n      </tr>\n      <tr>\n        <td>Subrayado</td>\n        <td>CTRL + U</td>\n        <td>\u2318U</td>\n      </tr>\n      <tr>\n        <td>Sangr\xeda</td>\n        <td>CTRL + M</td>\n        <td>\u2318M</td>\n      </tr>\n      <tr>\n        <td>Reducir sangr\xeda</td>\n        <td>CTRL + MAY\xdaS + M</td>\n        <td>\u2318\u21e7M</td>\n      </tr>\n      <tr>\n        <td>A\xf1adir enlace</td>\n        <td>CTRL + K</td>\n        <td>\u2318K</td>\n      </tr>\n      <tr>\n        <td>Buscar</td>\n        <td>CTRL + F</td>\n        <td>\u2318F</td>\n      </tr>\n      <tr>\n        <td>Modo pantalla completa (alternar)</td>\n        <td>CTRL + MAY\xdaS + F</td>\n        <td>\u2318\u21e7F</td>\n      </tr>\n      <tr>\n        <td>Di\xe1logo de ayuda (abrir)</td>\n        <td>CTRL + MAY\xdaS + H</td>\n        <td>\u2303\u2325H</td>\n      </tr>\n      <tr>\n        <td>Men\xfa contextual (abrir)</td>\n        <td>MAY\xdaS + F10</td>\n        <td>\u21e7F10\u200e\u200f</td>\n      </tr>\n      <tr>\n        <td>Autocompletar c\xf3digos</td>\n        <td>CTRL + barra espaciadora</td>\n        <td>\u2303Barra espaciadora</td>\n      </tr>\n      <tr>\n        <td>Vista de c\xf3digo accesible</td>\n        <td>CTRL + MAY\xdaS + U</td>\n        <td>\u2318\u2325U</td>\n      </tr>\n    </tbody>\n  </table>\n  <div class="ephox-polish-help-note" role="note">*Nota: El administrador puede desactivar algunas funciones.</div>\n</div>\n')})}();