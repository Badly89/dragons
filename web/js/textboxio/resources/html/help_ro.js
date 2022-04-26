/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(a){return function(){return a}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("help_ro.js","help for language ro");g({version:f,about:a('\ufeff<div role=presentation class="ephox-polish-help-article ephox-polish-help-about">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Despre</div>\n  <p>Textbox.io este un instrument WYSIWYG pentru crearea de con\u0163inut cu aspect extraordinar \xeen aplica\u0163ii online. Fie c\u0103 este vorba de comunit\u0103\u0163i sociale, bloguri, e-mail-uri sau orice \xeentre acestea, Textbox.io v\u0103 permite s\u0103 v\u0103 exprima\u0163i pe web.</p>\n  <p>&nbsp;</p>\n  <p>Textbox.io @@FULL_VERSION@@</p>\n  <p>Configura\u0163ie client @@CLIENT_VERSION@@</p>\n  <p class="ephox-polish-help-integration">Integrare pentru @@INTEGRATION_TYPE@@, versiune @@INTEGRATION_VERSION@@</p>\n  <p>&nbsp;</p>\n  <p>Copyright 2016 Ephox Corporation. Toate drepturile rezervate.</p>\n  <p><a href="javascript:void(0)" class="ephox-license-link">Licen\u0163e ter\u0163e</a></p>\n</div>'),accessibility:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Navigare de la tastatur\u0103</div>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Activarea navig\u0103rii de la tastatur\u0103</div>\n  <p>Pentru a activa navigarea de la tastatur\u0103 \xeen bara de instrumente, ap\u0103sa\u0163i F10 pentru Windows sau ALT + F10 pe Mac OSX. Primul element din bara de instrumente va fi eviden\u0163iat cu un contur albastru indic\xe2nd starea selectat\u0103. </p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Mutarea \xeentre grupuri</div>\n  <p>Butoanele din bara de instrumente sunt separate \xeen func\u0163ie de grupuri de ac\u0163iuni similare. Atunci c\xe2nd navigarea de la tastatur\u0103 este activ\u0103, ap\u0103s\xe2nd tasta tab, ve\u0163i muta selec\u0163ia la urm\u0103torul grup, \xeen timp ce shift + tab va muta selec\u0163ia \xeenapoi la grupul anterior. Ap\u0103s\xe2nd tab pe ultimul grup, ve\u0163i reveni la primul grup de butoane.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Mutarea \xeentre articole sau butoane</div>\n  <p>Pentru a v\u0103 deplasa \xeenainte \u015fi \xeenapoi \xeentre articole, utiliza\u0163i tastele s\u0103geat\u0103. Articolele vor circula \xeen grupurile lor, pentru a s\u0103ri la grupurile urm\u0103toare ap\u0103sa\u0163i tab \u015fi utiliza\u0163i tastele s\u0103geat\u0103 pentru a traversa grupul.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Executarea comenzilor</div>\n  <p>Pentru a executa o comand\u0103, naviga\u0163i selec\u0163ia la butonul direct \u015fi ap\u0103sa\u0163i space sau enter.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Deschiderea, navigarea \u015fi \xeenchiderea meniurilor</div>\n  <p>Atunci c\xe2nd un buton din bara de instrumente con\u0163ine un meniu, ap\u0103s\xe2nd space sau enter se va deschide meniul. Atunci c\xe2nd meniul se deschide primul element va fi selectat, utiliza\u0163i tastele s\u0103geat\u0103 pentru a naviga prin meniu. Pentru a v\u0103 deplasa \xeen sus sau \xeen jos \xeen meniu, ap\u0103sa\u0163i tasta s\u0103geat\u0103 \xeen sus, respectiv \xeen jos, acela\u015fi lucru se aplic\u0103 pentru submeniuri.</p>\n\n  <p>Elementele de meniu care au submeniuri sunt indicate de un simbol zigzag. Folosind tasta s\u0103geat\u0103 care corespunde direc\u0163iei zigzagului, submeniul se va extinde, \xeen timp ce tasta s\u0103geat\u0103 din direc\u0163ia opus\u0103 va \xeenchide submeniul.</p>\n\n  <p>Pentru a \xeenchide orice meniu activ, ap\u0103sa\u0163i tasta escape. Atunci c\xe2nd un meniu este \xeenchis, selec\u0163ia va fi restabilit\u0103 la selec\u0163ia anterioar\u0103.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Editarea sau eliminarea hyperlinkurilor</div>\n\n  <p>Pentru a modifica sau elimina un link, naviga\u0163i la meniul Inserare \u015fi selecta\u0163i Inserare link. Editorul afi\u015feaz\u0103 caseta de dialog editare link. </p>\n\n  <p>Edita\u0163i linkul introduc\xe2nd noua adres\u0103 URL \xeen caseta de intrare actualizare link \u015fi ap\u0103s\xe2nd enter. Elimina\u0163i linkul din document aleg\xe2nd butonul eliminare. Pentru a p\u0103r\u0103si o caset\u0103 de dialog f\u0103r\u0103 a face modific\u0103ri, ap\u0103sa\u0163i esc.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Modificarea dimensiunilor fontului \u015fi dimensiunii marginii tabelului</div>\n\n  <p>Modifica\u0163i dimensiunile fontului navig\xe2nd la meniul font \u015fi select\xe2nd dimensiune font. Editorul afi\u015feaz\u0103 caseta de dialog dimensiune \xeen meniu \u015fi seteaz\u0103 focalizarea pe caseta de dialog.</p>\n\n  <p>Modifica\u0163i dimensiunile marginii navig\xe2nd la elementul din bara de instrumente dimensiune margine \u015fi select\xe2nd dimensiunea marginii tabelului. Editorul afi\u015feaz\u0103 caseta de dialog dimensiune \xeen meniu \u015fi seteaz\u0103 focalizarea pe caseta de dialog. Observa\u0163ie: Elementul din bara de instrumente dimensiune margine tabel este disponibil numai atunci c\xe2nd cursorul se afl\u0103 \xeentr-un tabel.</p>\n\n  <p>\xcen caseta de dialog dimensiune, ap\u0103sa\u0163i tasta tab pentru a deplasa selec\u0163ia la urm\u0103torul control. Ap\u0103sa\u0163i shift+tab pentru a deplasa selec\u0163ia la controlul anterior.</p>\n\n  <p>Modifica\u0163i dimensiunea introduc\xe2nd valoarea nou\u0103 \xeen caseta introducere dimensiune. De exemplu, 14px sau 1em. Pentru a remite modific\u0103rile, ap\u0103sa\u0163i enter. Observa\u0163i c\u0103 ap\u0103s\xe2nd enter, caseta de dialog se \xeenchide, iar focalizarea revine la document.</p>\n\n  <p>Modifica\u0163i dimensiunea f\u0103r\u0103 a p\u0103r\u0103si caseta de dialog activ\xe2nd butoanele cre\u015ftere dimensiune sau reducere dimensiune. Modificarea dimensiunii folosind butoanele de cre\u015ftere sau reducere va modifica imediat dimensiunea elementului selectat men\u0163in\xe2nd \xeen acela\u015fi timp valoarea unit\u0103\u0163ii curente. P\u0103r\u0103si\u0163i caseta de dialog dimensiune ap\u0103s\xe2nd esc.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Decuparea unei imagini</div>\n\n  <p>Pentru a accesa func\u0163ia decupare, selecta\u0163i o imagine pentru a afi\u015fa opera\u0163iunile pentru imagine \xeen bara de instrumente. De asemenea, aceste opera\u0163iuni sunt disponibile \xeen meniul contextual. Dup\u0103 activarea decup\u0103rii, o masc\u0103 decupare se va pozi\u0163iona \xeen partea superioar\u0103 a imaginii, iar col\u0163ul din st\xe2nga sus va fi selectat.</p>\n\n  <p>Naviga\u0163i folosind tasta tab. Pot fi selectate fiecare dintre cele 4 col\u0163uri, precum \u015fi caseta masc\u0103 decupare total\u0103. Fiecare col\u0163 va fi pozi\u0163ionat individual sau toate col\u0163urile pot fi deplasate \xeen acela\u015fi timp deplas\xe2nd caseta masc\u0103 decupare total\u0103.</p>\n\n  <p>Mutarea selec\u0163iei de-a lungul imaginii se realizeaz\u0103 cu tastele s\u0103geat\u0103. Fiecare ap\u0103sare a unei taste s\u0103geat\u0103 va muta cu 10 pixeli, pentru a efectua mut\u0103ri mai mici men\u0163ine\u0163i ap\u0103sat\u0103 tasta shift \xeen timp ce ap\u0103sa\u0163i o tast\u0103 s\u0103geat\u0103 pentru a muta un pixel.</p>\n\n  <p>Pentru a aplica decuparea imaginii, ap\u0103sa\u0163i enter.</p>\n\n  <p>Pentru a anula ac\u0163iunea de decupare f\u0103r\u0103 efecte asupra imaginii, ap\u0103sa\u0163i tasta ESC.</p>\n\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n      <caption>Navigare de la tastatur\u0103</caption>\n      <thead>\n        <tr>\n          <th scope="col">Ac\u0163iune</th>\n          <th scope="col">Windows</th>\n          <th scope="col">Mac OS</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Activare bar\u0103 de instrumente</td>\n        <td>F10</td>\n        <td>ALT + F10</td>\n      </tr>\n      <tr>\n        <td>Selectare buton de grup urm\u0103tor/anterior</td>\n        <td>\u2190 sau \u2192</td>\n        <td>\u2190 sau \u2192</td>\n      </tr>\n      <tr>\n        <td>Mutare la grupul urm\u0103tor</td>\n        <td>TAB</td>\n        <td>TAB</td>\n      </tr>\n      <tr>\n        <td>Mutare la grupul anterior</td>\n        <td>SHIFT + TAB</td>\n        <td>SHIFT + TAB</td>\n      </tr>\n      <tr>\n        <td>Executare comand\u0103</td>\n        <td>SPACE sau ENTER</td>\n        <td>SPACE sau ENTER</td>\n      </tr>\n      <tr>\n        <td>Deschidere meniu principal</td>\n        <td>SPACE sau ENTER</td>\n        <td>SPACE sau ENTER</td>\n      </tr>\n      <tr>\n        <td>Deschidere/Extindere submeniu</td>\n        <td>SPACE sau ENTER sau \u2192</td>\n        <td>SPACE sau ENTER sau \u2192</td>\n      </tr>\n      <tr>\n        <td>Selectare element de meniu urm\u0103tor/anterior</td>\n        <td>\u2193 sau \u2191</td>\n        <td>\u2193 sau \u2191</td>\n      </tr>\n      <tr>\n        <td>\xcenchidere meniu</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n      <tr>\n        <td>\xcenchidere/Restr\xe2ngere submeniu</td>\n        <td>ESC sau \u2190</td>\n        <td>ESC sau \u2190</td>\n      </tr>\n      <tr>\n        <td>Mutare selec\u0163ie decupare imagine</td>\n        <td>\u2190 sau \u2192 sau \u2193 sau \u2191</td>\n        <td>\u2190 sau \u2192 sau \u2193 sau \u2191</td>\n      </tr>\n      <tr>\n        <td>Mutare cu precizie a selec\u0163iei decupare imagine</td>\n        <td>Men\u0163ine\u0163i ap\u0103sat\u0103 tasta SHIFT \xeen timpul mut\u0103rii</td>\n        <td>Men\u0163ine\u0163i ap\u0103sat\u0103 tasta SHIFT \xeen timpul mut\u0103rii</td>\n      </tr>\n      <tr>\n        <td>Aplicare decupare</td>\n        <td>ENTER</td>\n        <td>ENTER</td>\n      </tr>\n      <tr>\n        <td>Anulare decupare</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n    </tbody>\n  </table>\n</div>\n'),a11ycheck:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Verificare accesibilitate</div>\n  <p>Instrumentul de verificare a accesibilit\u0103\u0163ii (dac\u0103 este activat) poate identifica urm\u0103toarele probleme de accesibilitate \xeen documentele HTML.</p>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-a11ycheck-table">\n      <caption>Defini\u0163ii problem\u0103</caption>\n      <thead>\n        <tr>\n          <th scope="col">Problem\u0103</th>\n          <th scope="col">WCAG</th>\n          <th scope="col">Descriere</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Imaginile trebuie s\u0103 aib\u0103 o descriere text alternativ</td>\n        <td>1.1.1</td>\n        <td>Imaginile trebuie s\u0103 aib\u0103 un set de valori text alternativ, care s\u0103 descrie subiectul imaginii pentru utilizatorii cu deficien\u0163e de vedere. </td>\n      </tr>\n      <tr>\n        <td>Textul alternativ nu trebuie s\u0103 fie acela\u015fi cu denumirea de fi\u015fier a imaginii</td>\n        <td>1.1.1</td>\n        <td>Evita\u0163i utilizarea denumirii de fi\u015fier a imaginii \xeen valoarea text alternativ. Alege\u0163i o valoare text alternativ care descrie subiectul imaginii.</td>\n      </tr>\n      <tr>\n        <td>Tabelele trebuie s\u0103 aib\u0103 legende</td>\n        <td>1.3.1</td>\n        <td>Tabelele trebuie s\u0103 aib\u0103 un scurt text descriptiv care arat\u0103 con\u0163inutul tabelului.</td>\n      </tr>\n      <tr>\n        <td>Tabelele complexe trebuie s\u0103 aib\u0103 rezumate</td>\n        <td>1.3.1</td>\n        <td>Tabelele cu structuri complexe (celulele se extind pe mai multe r\xe2nduri sau coloane) trebuie s\u0103 includ\u0103 un rezumat care s\u0103 descrie structura tabelului. </td>\n      </tr>\n      <tr>\n        <td>Legenda \u015fi rezumatul tabelului nu pot avea aceea\u015fi valoare</td>\n        <td>1.3.1</td>\n        <td>Legenda tabelului trebuie s\u0103 descrie con\u0163inutul tabelului, iar rezumatul tabelului trebuie s\u0103 descrie structura tabelelor complexe. </td>\n      </tr>\n      <tr>\n        <td>Tabelele trebuie s\u0103 aib\u0103 cel pu\u0163in o celul\u0103 antet</td>\n        <td>1.3.1</td>\n        <td>Tabelele trebuie s\u0103 includ\u0103 antetele adecvate de r\xe2nd sau coloan\u0103 care descriu con\u0163inutul r\xe2ndului sau coloanei.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Mai multe informa\u0163ii despre acest subiect (webaim.org).</a> </td>\n      </tr>\n      <tr>\n        <td>Antetele de tabel trebuie aplicate unui r\xe2nd sau unei coloane</td>\n        <td>1.3.1</td>\n        <td>Antetele de tabel trebuie asociate cu r\xe2ndul sau coloana pe care o descriu.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Mai multe informa\u0163ii despre acest subiect (webaim.org).</a> </td>\n      </tr>\n      <tr>\n        <td>Acest paragraf arat\u0103 ca un antet. Dac\u0103 este un antet, selecta\u0163i un nivel de antet.</td>\n        <td>1.3.1</td>\n        <td>Utiliza\u0163i antetele pentru a \xeemp\u0103r\u0163i documentele \xeen sec\u0163iuni. Evita\u0163i utilizarea paragrafelor formatate \xeen locul antetelor.<br/><a href="http://webaim.org/techniques/semanticstructure/#correctly" target="_blank">Mai multe informa\u0163ii despre acest subiect (webaim.org).</a> </td>\n      </tr>\n      <tr>\n        <td>Antetele trebuie aplicate \xeen ordine secven\u0163ial\u0103. De exemplu: Antetul 1 trebuie urmat de Antetul 2, nu de Antetul 3.</td>\n        <td>1.3.1</td>\n        <td>Antetele ulterioare ale documentului trebuie s\u0103 se afi\u015feze ierarhic, ap\u0103r\xe2nd \xeen ordine ascendent\u0103 sau echivalent\u0103.<br/><a href="http://webaim.org/techniques/semanticstructure/#contentstructure" target="_blank">Mai multe informa\u0163ii despre acest subiect (webaim.org).</a> </td>\n      </tr>\n      <tr>\n        <td>Utiliza\u0163i marcajul de list\u0103 pentru liste</td>\n        <td>1.3.1</td>\n        <td>Asigura\u0163i-v\u0103 c\u0103 listele de elemente folosesc structura de list\u0103 HTML pentru a reprezenta listele (<code>&lt;ul&gt;</code> sau <code>&lt;ol&gt;</code> \u015fi <code>&lt;li&gt;</code>).</td>\n      </tr>\n      <tr>\n        <td>Textul trebuie s\u0103 aib\u0103 o rat\u0103 de contrast de 4,5:1</td>\n        <td>1.4.3</td>\n        <td>Textul \u015fi fundalul s\u0103u trebuie s\u0103 aib\u0103 un raport de contrast astfel \xeenc\xe2t s\u0103 poat\u0103 fi citit de persoane cu acuitate vizual\u0103 redus\u0103.</td>\n      </tr>\n      <tr>\n        <td>Linkurile adiacente trebuie fuzionate.</td>\n        <td>2.4.4</td>\n        <td>Hyperlinkurile adiacente indic\xe2nd spre aceea\u015fi resurs\u0103 trebuie fuzionate \xeentr-un singur hyperlink.</td>\n      </tr>\n    </tbody>\n  </table>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Mai multe informa\u0163ii</div>\n  <p>\n    <a href="http://webaim.org/intro/" target="_blank">Introducere \xeen accesibilitate web (webaim.org)</a> <br/>\n    <a href="http://www.w3.org/WAI/intro/wcag" target="_blank">Introducere \xeen WCAG 2,0 (w3.org)</a> <br/>\n    <a href="http://www.section508.gov/" target="_blank">Sec\u0163iunea 508 din US Rehabilitation Act (Legea privind inser\u0163ia profesional\u0103 \xeen Statele Unite). (section508.gov)</a>\n  </p>\n</div>'),markdown:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Formatare Markdown</div>\n  <p>Markdown este o sintax\u0103 pentru crearea structurilor HTML \u015fi formatare f\u0103r\u0103 utilizarea comenzilor rapide de la tastatur\u0103 sau accesarea meniurilor. Pentru a utiliza formatarea markdown, introduce\u0163i sintaxa dorit\u0103 urmat\u0103 de ap\u0103sarea tastei enter sau space.</p>\n  <table cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-markdown" aria-readonly="true">\n      <caption>Sintax\u0103 de formatare tastatur\u0103</caption>\n      <thead>\n        <tr>\n          <th scope="col">Sintax\u0103</th>\n          <th scope="col">Rezultat HTML</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td><pre># Cel mai mare antet</pre></td>\n        <td><pre>&lt;h1&gt; Cel mai mare antet&lt;/h1&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>## Antet mai mare</pre></td>\n        <td><pre>&lt;h2&gt;Antet mai mare&lt;/h2&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>### Antet mare</pre></td>\n        <td><pre>&lt;h3&gt;Antet mare&lt;/h3&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>####  Antet</pre></td>\n        <td><pre>&lt;h4&gt;Antet&lt;/h4&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>##### Antet mic</pre></td>\n        <td><pre>&lt;h5&gt;Antet mic&lt;/h5&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>###### Cel mai mic antet</pre></td>\n        <td><pre>&lt;h6&gt;Cel mai mic antet&lt;/h6&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>* List\u0103 neordonat\u0103</pre></td>\n        <td><pre>&lt;ul&gt;&lt;li&gt;List\u0103 neordonat\u0103&lt;/li&gt;&lt;/ul&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>1. List\u0103 ordonat\u0103</pre></td>\n        <td><pre>&lt;ol&gt;&lt;li&gt;List\u0103 ordonat\u0103&lt;/li&gt;&lt;/ol&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>*Cursiv*</pre></td>\n        <td><pre>&lt;em&gt;Cursiv&lt;/em&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>**Aldin**</pre></td>\n        <td><pre>&lt;strong&gt;Aldin&lt;/strong&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>---</pre></td>\n        <td><pre>&lt;hr/&gt;</pre></td>\n      </tr>\n    </tbody>\n  </table>\n</div>'),shortcuts:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Comenzi rapide de la tastatur\u0103</div>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n    <caption>Editor comenzi</caption>\n    <thead>\n      <tr>\n        <th scope="col">Ac\u0163iune</th>\n        <th scope="col">Windows</th>\n        <th scope="col">Mac OS</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>Anulare</td>\n        <td>CTRL + Z</td>\n        <td>\u2318Z</td>\n      </tr>\n      <tr>\n        <td>Refacere</td>\n        <td>CTRL + Y</td>\n        <td>\u2318\u21e7Z</td>\n      </tr>\n      <tr>\n        <td>Aldin</td>\n        <td>CTRL + B</td>\n        <td>\u2318B</td>\n      </tr>\n      <tr>\n        <td>Cursiv</td>\n        <td>CTRL + I</td>\n        <td>\u2318I</td>\n      </tr>\n      <tr>\n        <td>Subliniere</td>\n        <td>CTRL + U</td>\n        <td>\u2318U</td>\n      </tr>\n      <tr>\n        <td>Indentare</td>\n        <td>CTRL + ]</td>\n        <td>\u2318]</td>\n      </tr>\n      <tr>\n        <td>Mic\u015forare indent</td>\n        <td>CTRL + [</td>\n        <td>\u2318[</td>\n      </tr>\n      <tr>\n        <td>Ad\u0103ugare link</td>\n        <td>CTRL + K</td>\n        <td>\u2318K</td>\n      </tr>\n      <tr>\n        <td>G\u0103sire</td>\n        <td>CTRL + F</td>\n        <td>\u2318F</td>\n      </tr>\n      <tr>\n        <td>Mod ecran complet (Comutare)</td>\n        <td>CTRL + SHIFT + F</td>\n        <td>\u2318\u21e7F</td>\n      </tr>\n      <tr>\n        <td>Caset\u0103 de dialog Ajutor (Deschidere)</td>\n        <td>CTRL + SHIFT + H</td>\n        <td>\u2303\u2325H</td>\n      </tr>\n      <tr>\n        <td>Meniu contextual (Deschidere)</td>\n        <td>SHIFT + F10</td>\n        <td>\u21e7F10\u200e\u200f</td>\n      </tr>\n      <tr>\n        <td>Completare automat\u0103 cod</td>\n        <td>CTRL + SPACE</td>\n        <td>\u2303Space</td>\n      </tr>\n      <tr>\n        <td>Vizualizare cod accesibil\u0103</td>\n        <td>CTRL + SHIFT + U</td>\n        <td>\u2318\u2325U</td>\n      </tr>\n    </tbody>\n  </table>\n  <div class="ephox-polish-help-note" role="note">*Not\u0103: Unele func\u0163ii pot fi dezactivate de c\u0103tre administrator.</div>\n</div>\n')})}();