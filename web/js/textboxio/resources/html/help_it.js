/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(a){return function(){return a}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("help_it.js","help for language it");g({version:f,about:a('\ufeff<div role=presentation class="ephox-polish-help-article ephox-polish-help-about">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Informazioni su</div>\n  <p>Textbox.io \xe8 uno strumento WYSIWYG per la creazione di contenuti sempre accattivanti per le app on-line. Nelle comunit\xe0 social, sui blog, nella posta elettronica o quant\u2019altro, Textbox.io aiuta le persone a esprimersi sul web.</p>\n  <p>&nbsp;</p>\n  <p>Textbox.io @@FULL_VERSION@@</p>\n  <p>Build client @@CLIENT_VERSION@@</p>\n  <p class="ephox-polish-help-integration">Integrazione per @@INTEGRATION_TYPE@@, versione @@INTEGRATION_VERSION@@</p>\n  <p>&nbsp;</p>\n  <p>Copyright 2016 Ephox Corporation. Tutti i diritti riservati.</p>\n  <p><a href="javascript:void(0)" class="ephox-license-link">Licenze di terze parti</a></p>\n</div>'),accessibility:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Navigazione tramite tastiera</div>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Attivazione della navigazione tramite tastiera</div>\n  <p>Per abilitare la navigazione tramite tastiera nella barra degli strumenti, premere F10 per Windows o ALT + F10 per Mac OSX. La prima voce della barra degli strumenti sar\xe0 evidenziata da un riquadro blu indicante che \xe8 stata selezionata. </p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Navigazione tra i gruppi</div>\n  <p>I pulsanti della barra degli strumenti sono suddivisi in gruppi in base al tipo di azione. Quando la navigazione tramite tastiera \xe8 attiva, premere il tasto TAB trasferisce la selezione al gruppo successivo, mentre premere MAIUSC + TAB trasferisce la selezione al gruppo precedente. Premere TAB sull\'ultimo gruppo fa s\xec che la selezione torni al primo gruppo di pulsanti.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Navigazione tra i comandi o i pulsanti</div>\n  <p>Per spostarsi tra i comandi, utilizzare i tasti di direzione. Premere TAB far\xe0 s\xec che si passi al gruppo successivo, dove i tasti di direzione consentiranno di nuovo di selezionare i vari comandi.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Esecuzioni dei comandi</div>\n  <p>Per eseguire un comando, spostarsi sul pulsante desiderato e premere SPAZIO oppure INVIO.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Apertura, navigazione e chiusura dei menu</div>\n  <p>Quando un pulsante della barra degli strumenti contiene un menu, premere SPAZIO o INVIO consente di aprire il menu. All\'apertura del menu viene selezionato automaticamente il primo comando. Utilizzare i tasti di direzione per spostarsi all\'interno del menu. Per passare in su o gi\xf9 all\'interno del menu, premere la freccia corrispondente. Questo vale anche per i sotto-menu.</p>\n\n  <p>I comandi di menu dotati di sotto-menu sono contraddistinti da una freccia di espansione. Utilizzare il tasto di direzione corrispondente alla direzione della freccia di espansione per aprire il sotto-menu, e il tasto corrispondente alla direzione opposta per chiuderlo.</p>\n\n  <p>Per chiudere un menu attivo, premere il tasto ESC. Quando il menu viene chiuso, la selezione precedente viene ripristinata.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Modifica o rimozione di collegamenti ipertestuali</div>\n\n  <p>Per modificare o rimuovere un collegamento, spostarsi sul menu Inserisci e selezionare Inserisci collegamento. Comparir\xe0 la finestra di dialogo Modifica collegamento. </p>\n\n  <p>Modificare il collegamento inserendo un nuovo URL nel campo di immissione Aggiorna collegamento e premere INVIO. Rimuovere il link dal documento scegliendo il pulsante Rimuovi. Per uscire dalla finestra di dialogo senza effettuare alcuna modifica, premere ESC.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Modifica delle dimensioni del carattere e del bordo della tabella</div>\n\n  <p>Per modificare la dimensione del carattere, spostarsi sul menu Carattere e selezionare Dimensione carattere. Comparir\xe0 la finestra di dialogo Dimensione, che diventer\xe0 l\'elemento attivo della finestra.</p>\n\n  <p>Per modificare la dimensione del bordo, spostarsi sul comando della barra degli strumenti Dimensione bordo tabella e selezionare Dimensione bordo tabella. Comparir\xe0 la finestra di dialogo Dimensione, che diventer\xe0 l\'elemento attivo della finestra. Nota: Il comando Dimensione bordo tabella \xe8 disponibile solo quando il cursore si trova all\'interno di una tabella.</p>\n\n  <p>Nella finestra di dialogo, premere il tasto TAB per passare al comando successivo. Premere MAIUSC + TAB per passare al comando precedente.</p>\n\n  <p>Modificare la dimensione inserendo il nuovo valore nel campo di immissione della dimensione. Ad esempio, 14 px o 1 em. Per applicare le modifiche, premere INVIO. Questo fa s\xec che la finestra venga chiusa e che il documento ridiventi l\'elemento attivo.</p>\n\n  <p>Modificare la dimensione senza uscire dalla finestra di dialogo attivando i pulsanti che aumentano o riducono la dimensione. Modificare la dimensione per mezzo di questi pulsanti ha un effetto immediato sull\'elemento senza incidere sul valore corrente dell\'unit\xe0. Per uscire della finestra di dialogo Dimensione, premere ESC.</p>\n\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Ritaglio di un\'immagine</div>\n\n  <p>Per accedere alla funzione ritaglio, selezionare un\u2019immagine per mostrare le relative operazioni sulla barra degli strumenti. Queste operazioni sono disponibili anche nel menu contestuale. Una volta attivato il ritaglio, viene posizionata una sagoma sull\u2019immagine e viene selezionato l\u2019angolo in alto a sinistra.</p>\n\n  <p>Spostarsi usando la tabulazione. \xc8 possibile selezionare ciascuno dei quattro angoli come pure l\u2019intero riquadro della maschera. Ciascun angolo pu\xf2 essere posizionato individualmente. In alternativa \xe8 possibile spostare tutti gli angoli allo stesso tempo stando il riquadro della maschera.</p>\n\n  <p>Per spostare la selezione sull\u2019immagine si utilizzano i tasti di direzione. Ciascuna pressione su un tasto di direzione sposta la selezione di 10 pixel. Per spostamenti pi\xf9 piccoli, tenere premuto il tasto MAIUSC mentre si preme il tasto di direzione e la selezione si sposter\xe0 di un solo pixel.</p>\n\n  <p>Per ritagliare l\u2019immagine, premere INVIO.</p>\n\n  <p>Per annullare il ritaglio senza modificare l\u2019immagine, premere ESC.</p>\n\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n      <caption>Navigazione tramite tastiera</caption>\n      <thead>\n        <tr>\n          <th scope="col">Azione</th>\n          <th scope="col">Windows</th>\n          <th scope="col">Mac OS</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Attiva barra degli strumenti</td>\n        <td>F10</td>\n        <td>ALT + F10</td>\n      </tr>\n      <tr>\n        <td>Seleziona pulsante gruppo prec/succ</td>\n        <td>\u2190 o \u2192</td>\n        <td>\u2190 o \u2192</td>\n      </tr>\n      <tr>\n        <td>Vai al gruppo successivo</td>\n        <td>TAB</td>\n        <td>TAB</td>\n      </tr>\n      <tr>\n        <td>Vai al gruppo precedente</td>\n        <td>MAIUSC + TAB</td>\n        <td>MAIUSC + TAB</td>\n      </tr>\n      <tr>\n        <td>Esegui comando</td>\n        <td>SPAZIO o INVIO</td>\n        <td>SPAZIO o INVIO</td>\n      </tr>\n      <tr>\n        <td>Apri menu principale</td>\n        <td>SPAZIO o INVIO</td>\n        <td>SPAZIO o INVIO</td>\n      </tr>\n      <tr>\n        <td>Apri/espandi sotto-menu</td>\n        <td>SPAZIO o INVIO oppure \u2192</td>\n        <td>SPAZIO o INVIO oppure \u2192</td>\n      </tr>\n      <tr>\n        <td>Seleziona voce di menu prec/succ</td>\n        <td>\u2193 o \u2191</td>\n        <td>\u2193 o \u2191</td>\n      </tr>\n      <tr>\n        <td>Chiudi menu</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n      <tr>\n        <td>Chiudi/riduci sotto-menu</td>\n        <td>ESC oppure \u2190</td>\n        <td>ESC oppure \u2190</td>\n      </tr>\n      <tr>\n        <td>Sposta selezione ritaglio immagine</td>\n        <td>\u2190 o \u2192 o \u2193 o \u2191</td>\n        <td>\u2190 o \u2192 o \u2193 o \u2191</td>\n      </tr>\n      <tr>\n        <td>Sposta selezione ritaglio immagine con precisione</td>\n        <td>Tenere premuto MAIUSC</td>\n        <td>Tenere premuto MAIUSC</td>\n      </tr>\n      <tr>\n        <td>Applica ritaglio</td>\n        <td>INVIO</td>\n        <td>INVIO</td>\n      </tr>\n      <tr>\n        <td>Annulla ritaglio</td>\n        <td>ESC</td>\n        <td>ESC</td>\n      </tr>\n    </tbody>\n  </table>\n</div>\n'),a11ycheck:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Verifica dell\u2019accessibilit\xe0</div>\n  <p>Lo strumento di verifica dell\u2019accessibilit\xe0 (se abilitato) pu\xf2 identificare i seguenti problemi di accessibilit\xe0 nei documenti HTML.</p>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-a11ycheck-table">\n      <caption>Definizioni dei problemi</caption>\n      <thead>\n        <tr>\n          <th scope="col">Problema</th>\n          <th scope="col">WCAG</th>\n          <th scope="col">Descrizione</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td>Deve esistere una descrizione testuale alternativa per le immagini</td>\n        <td>1.1.1</td>\n        <td>Occorre impostare un testo alternativo per le immagini che ne descriva il soggetto per gli utenti con problemi di vista. </td>\n      </tr>\n      <tr>\n        <td>Il testo alternativo non pu\xf2 essere uguale al nome del file dell\u2019immagine</td>\n        <td>1.1.1</td>\n        <td>Evitare l\u2019uso del nome del file dell\u2019immagine nel testo alternativo. Scegliere un testo alternativo che descriva il soggetto dell\u2019immagine.</td>\n      </tr>\n      <tr>\n        <td>Le tabelle devono disporre di descrizioni</td>\n        <td>1.3.1</td>\n        <td>Occorre impostare una breve descrizione per le tabelle che ne indichi il contenuto.</td>\n      </tr>\n      <tr>\n        <td>Le tabelle complesse devono disporre di un riepilogo</td>\n        <td>1.3.1</td>\n        <td>Le tabelle con strutture complesse (celle che si estendono su pi\xf9 righe o colonne) devono disporre di un riepilogo che ne descriva la struttura. </td>\n      </tr>\n      <tr>\n        <td>Descrizione e riepilogo della tabella non possono avere lo stesso valore</td>\n        <td>1.3.1</td>\n        <td>La descrizione illustra il contenuto di una tabella, mentre il riepilogo descrive la struttura delle tabelle complesse. </td>\n      </tr>\n      <tr>\n        <td>Le tabelle devono disporre di almeno una cella di intestazione</td>\n        <td>1.3.1</td>\n        <td>Le tabelle devono includere intestazioni di riga o colonna che ne descrivano il rispettivo contenuto.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Per maggiori informazioni su questo argomento vedere webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Le intestazioni di tabella devono essere applicate a una riga o una colonna</td>\n        <td>1.3.1</td>\n        <td>Le intestazioni di tabella devono essere associate alla riga o alla colonna che descrivono.<br/><a href="http://webaim.org/techniques/tables/data#th" target="_blank">Per maggiori informazioni su questo argomento vedere webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Questo paragrafo si direbbe un titolo. Se \xe8 un titolo, selezionare il suo livello.</td>\n        <td>1.3.1</td>\n        <td>Usare i titoli per suddividere i documenti in sezioni. Evitare l\u2019uso di paragrafi formattati al posto dei titoli.<br/><a href="http://webaim.org/techniques/semanticstructure/#correctly" target="_blank">Per maggiori informazioni su questo argomento vedere webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>I titoli devono essere applicati in ordine sequenziale. Ad esempio: Al titolo 1 deve seguire il titolo 2 e non il titolo 3.</td>\n        <td>1.3.1</td>\n        <td>I titoli successivi devono comparire in ordine gerarchico, sia che sia ascendente oppure discendente.<br/><a href="http://webaim.org/techniques/semanticstructure/#contentstructure" target="_blank">Per maggiori informazioni su questo argomento vedere webaim.org.</a> </td>\n      </tr>\n      <tr>\n        <td>Usare il markup di elenco per gli elenchi</td>\n        <td>1.3.1</td>\n        <td>Assicurarsi che gli elenchi di elementi utilizzino la struttura HTML per rappresentare gli elenchi (<code>&lt;ul&gt;</code> o <code>&lt;ol&gt;</code> e <code>&lt;li&gt;</code>).</td>\n      </tr>\n      <tr>\n        <td>Il testo deve avere un livello di contrasto di 4,5:1</td>\n        <td>1.4.3</td>\n        <td>Il testo e il suo sfondo devono avere un contrasto tale da consentire la visione da parte di utenti ipovedenti.</td>\n      </tr>\n      <tr>\n        <td>I collegamenti contigui vanno uniti tra loro.</td>\n        <td>2.4.4</td>\n        <td>I collegamenti ipertestuali contigui associati alla stessa risorsa vanno uniti in un unico collegamento.</td>\n      </tr>\n    </tbody>\n  </table>\n  <div role="heading" aria-level="2" class="ephox-polish-help-h2">Maggiori informazioni</div>\n  <p>\n    <a href="http://webaim.org/intro/" target="_blank">Introduzione all\u2019accessibilit\xe0 web (webaim.org)</a> <br/>\n    <a href="http://www.w3.org/WAI/intro/wcag" target="_blank">Introduzione a WCAG 2.0 (w3.org)</a> <br/>\n    <a href="http://www.section508.gov/" target="_blank">Articolo 508 della legge statunitense sulla riabilitazione (section508.gov)</a>\n  </p>\n</div>'),markdown:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div class="ephox-polish-help-h1" role="heading" aria-level="1">Formattazione Markdown</div>\n  <p>Il markdown \xe8 una sintassi per la creazione di formattazione e strutture HTML senza bisogno di usare le scorciatoie da tastiera o i menu d\u2019accesso. Per utilizzare la formattazione markdown, inserire la sintassi desiderata e premere il tasto INVIO o SPAZIO.</p>\n  <table cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-markdown" aria-readonly="true">\n      <caption>Sintassi di formattazione da tastiera</caption>\n      <thead>\n        <tr>\n          <th scope="col">Sintassi</th>\n          <th scope="col">Risultato HTML</th>\n        </tr>\n      </thead>\n      <tbody>\n      <tr>\n        <td><pre># Titolo di livello 1</pre></td>\n        <td><pre>&lt;h1&gt; Titolo di livello 1&lt;/h1&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>## Titolo di livello 2</pre></td>\n        <td><pre>&lt;h2&gt;Titolo di livello 2&lt;/h2&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>### Titolo di livello 3</pre></td>\n        <td><pre>&lt;h3&gt;Titolo di livello 3&lt;/h3&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>####  Titolo di livello 4</pre></td>\n        <td><pre>&lt;h4&gt;Titolo di livello 4&lt;/h4&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>##### Titolo di livello 5</pre></td>\n        <td><pre>&lt;h5&gt;Titolo di livello 5&lt;/h5&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>###### Titolo di livello 6</pre></td>\n        <td><pre>&lt;h6&gt;Titolo di livello 6&lt;/h6&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>* Elenco non ordinato</pre></td>\n        <td><pre>&lt;ul&gt;&lt;li&gt;Elenco non ordinato&lt;/li&gt;&lt;/ul&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>1. Elenco ordinato</pre></td>\n        <td><pre>&lt;ol&gt;&lt;li&gt;Elenco ordinato&lt;/li&gt;&lt;/ol&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>*Corsivo*</pre></td>\n        <td><pre>&lt;em&gt;Corsivo&lt;/em&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>**Grassetto**</pre></td>\n        <td><pre>&lt;strong&gt;Grassetto&lt;/strong&gt;</pre></td>\n      </tr>\n      <tr>\n        <td><pre>---</pre></td>\n        <td><pre>&lt;hr/&gt;</pre></td>\n      </tr>\n    </tbody>\n  </table>\n</div>'),shortcuts:a('\ufeff<div role=presentation class="ephox-polish-help-article">\n  <div role="heading" aria-level="1" class="ephox-polish-help-h1">Scorciatoie da tastiera</div>\n  <table aria-readonly="true" cellpadding="0" cellspacing="0" class="ephox-polish-tabular ephox-polish-help-table ephox-polish-help-table-shortcuts">\n    <caption>Comandi di modifica</caption>\n    <thead>\n      <tr>\n        <th scope="col">Azione</th>\n        <th scope="col">Windows</th>\n        <th scope="col">Mac OS</th>\n      </tr>\n    </thead>\n    <tbody>\n      <tr>\n        <td>Annulla</td>\n        <td>CTRL + Z</td>\n        <td>\u2318Z</td>\n      </tr>\n      <tr>\n        <td>Ripristina</td>\n        <td>CTRL + Y</td>\n        <td>\u2318\u21e7Z</td>\n      </tr>\n      <tr>\n        <td>Grassetto</td>\n        <td>CTRL + B</td>\n        <td>\u2318B</td>\n      </tr>\n      <tr>\n        <td>Corsivo</td>\n        <td>CTRL + I</td>\n        <td>\u2318I</td>\n      </tr>\n      <tr>\n        <td>Sottolineato</td>\n        <td>CTRL + U</td>\n        <td>\u2318U</td>\n      </tr>\n      <tr>\n        <td>Rientro</td>\n        <td>CTRL + M</td>\n        <td>\u2318M</td>\n      </tr>\n      <tr>\n        <td>Riduci rientro</td>\n        <td>CTRL + MAIUSC + M</td>\n        <td>\u2318\u21e7M</td>\n      </tr>\n      <tr>\n        <td>Aggiungi collegamento</td>\n        <td>CTRL + K</td>\n        <td>\u2318K</td>\n      </tr>\n      <tr>\n        <td>Trova</td>\n        <td>CTRL + F</td>\n        <td>\u2318F</td>\n      </tr>\n      <tr>\n        <td>Attiva/disattiva modalit\xe0 schermo intero</td>\n        <td>CTRL + MAIUSC + F</td>\n        <td>\u2318\u21e7F</td>\n      </tr>\n      <tr>\n        <td>Finestra di dialogo Aiuto (apri)</td>\n        <td>CTRL + MAIUSC + H</td>\n        <td>\u2303\u2325H</td>\n      </tr>\n      <tr>\n        <td>Menu contestuale (apri)</td>\n        <td>MAIUSC + F10</td>\n        <td>\u21e7F10\u200e\u200f</td>\n      </tr>\n      <tr>\n        <td>Autocompleta codice</td>\n        <td>CTRL + SPAZIO</td>\n        <td>\u2303SPAZIO</td>\n      </tr>\n      <tr>\n        <td>Visualizzazione codice accessibile</td>\n        <td>CTRL + MAIUSC + U</td>\n        <td>\u2318\u2325U</td>\n      </tr>\n    </tbody>\n  </table>\n  <div class="ephox-polish-help-note" role="note">*Nota: Alcune funzioni potrebbero essere state disabilitate dall\'amministratore.</div>\n</div>\n')})}();