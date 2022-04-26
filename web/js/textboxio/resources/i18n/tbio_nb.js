/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(){return{a11y:{widget:{title:"Tilgjengelighetssjekker",running:"Sjekker ...",issue:{counter:"Problem {0} av {1}",help:"Referanse WCAG 2.0 - \xe5pnes i et nytt vindu",none:"Ingen problemer med tilgjengelighet funnet"},previous:"Forrige problem",next:"Neste problem",repair:"Reparer problem",available:"Reparasjon tilgjengelig",ignore:"Ignorer"},image:{alttext:{empty:"Bilder m\xe5 ha en alternativ tekstbeskrivelse",filenameduplicate:"Den alternative teksten kan ikke v\xe6re lik bildets filnavn",set:"Angi alternativ tekst:",validation:{empty:"Alternativ tekst kan ikke v\xe6re tom.",filenameduplicate:"Alternativ tekst kan ikke v\xe6re lik filnavnet"}}},table:{caption:{empty:"Tabeller m\xe5 ha bildetekst",summaryduplicate:"Tabellens bildetekst og sammendrag kan ikke ha samme verdi",set:"Angi bildetekst:",validation:{empty:"Bildetekst kan ikke v\xe6re tom.",summaryduplicate:"Tabellens bildetekst kan ikke v\xe6re lik tabellens sammendrag."}},summary:{empty:"Komplekse tabeller b\xf8r ha sammendrag",set:"Angi tabellsammendrag.",validation:{empty:"Sammendrag kan ikke v\xe6re tom",captionduplicate:"Tabellens sammendrag kan ikke v\xe6re lik tabellens bildetekst"}},rowscells:{none:"Tabellelementer m\xe5 inneholde TR- og TD-tagger"},headers:{none:"Tabeller m\xe5 ha minst \xe9n overskriftscelle",set:"Velg tabelloverskrift:",validation:{none:"Velg enten rad- eller kolonneoverskrift"}},headerscope:{none:"Det m\xe5 angis tabelloverskrifter i en rad eller kolonne",set:"Velg overskriftsomfang:",scope:{row:"Rad",col:"Kolonne",rowgroup:"Radgruppe",colgroup:"Kolonnegruppe"}}},heading:{nonsequential:"Overskrifter m\xe5 brukes i sekvensiell rekkef\xf8lge. For eksempel: overskrift 1 skal etterf\xf8lges av overskrift 2, ikke overskrift 3.",paragraphmisuse:"Denne paragrafen ser ut som en overskrift. Hvis det er en overskrift, m\xe5 du velge et overskriftsniv\xe5.",set:"Velg et overskriftsniv\xe5:"},link:{adjacent:"Tilst\xf8tende koblinger med samme nettadresse skal flettes sammen til \xe9n kobling."},list:{paragraphmisuse:"Den valgte teksten ser ut som en liste. Lister skal formateres med bruk av en liste-tagg."},contrast:{smalltext:"Tekst m\xe5 ha et kontrastforhold p\xe5 minst 4,5:1",largetext:"St\xf8rre tekst m\xe5 ha et kontrastforhold p\xe5 minst 3:1"},severity:{error:"Feil",warning:"Advarsel",info:"Informativ"}},aria:{autocorrect:{announce:"Autokorrektur {0}"},label:{toolbar:"Verkt\xf8ylinje i redigeringsprogram for rik tekst",editor:"Textbox.io redigeringsprogram for rik tekst - {0}",fullscreen:"Textbox.io fullskjerms redigeringsprogram for rik tekst - {0}",content:"Redigerbart innhold",more:"Klikk for \xe5 vise eller skjule"},help:{mac:"Trykk \u2303\u2325H for hjelp",ctrl:"Trykk CTRL SHIFT H for hjelp"},color:{picker:"Fargevelger",menu:"Fargevelgermeny"},font:{color:"Tekstfarger",highlight:"Uthevingsfarger",palette:"Fargepalett"},context:{menu:{generic:"Sammenhengsmeny"}},stepper:{input:{invalid:"St\xf8rrelsesverdi er ugyldig"}},table:{headerdescription:"Trykk p\xe5 mellomromstasten for \xe5 aktivere innstillingen. Trykk p\xe5 tab-tasten for \xe5 g\xe5 tilbake til tabellvelger.",cell:{border:{size:"Kantlinjest\xf8rrelse"}}},input:{invalid:"Ugyldig innspill"},widget:{navigation:"Bruk pil-tastene til \xe5 navigere."},image:{crop:{size:"Beskj\xe6ringsst\xf8rrelse er {0} piksler ganger {1} piksler"}}},color:{white:"Hvit",black:"Svart",gray:"Gr\xe5",metal:"Metall",smoke:"R\xf8yk",red:"R\xf8d",darkred:"M\xf8rker\xf8d",darkorange:"M\xf8rk oransje",orange:"Oransje",yellow:"Gul",green:"Gr\xf8nn",darkgreen:"M\xf8rkegr\xf8nn",mediumseagreen:"Middels sj\xf8gr\xf8nn",lightgreen:"Lysegr\xf8nn",lime:"Limegr\xf8nn",mediumblue:"Mellombl\xe5",navy:"Marinebl\xe5",blue:"Bl\xe5",lightblue:"Lysebl\xe5",violet:"Fiolett"},directionality:{rtldir:"Retning fra h\xf8yre til venstre",ltrdir:"Retning fra venstre til h\xf8yre"},parlance:{menu:"Spr\xe5kmeny",set:"Angi spr\xe5k",ar:"Arabisk",ca:"Katalansk",zh_cn:"Kinesisk (forenklet)",zh_tw:"Kinesisk (tradisjonell)",hr:"Kroatisk",cs:"Tsjekkisk",da:"Dansk",nl:"Nederlandsk",en:"Engelsk",en_au:"Engelsk (Australia)",en_ca:"Engelsk (Canada)",en_gb:"Engelsk (Storbritannia)",en_us:"Engelsk (USA)",fa:"Farsi",fi:"Finsk",fr:"Fransk",fr_ca:"Fransk (Canada)",de:"Tysk",el:"Gresk",he:"Hebraisk",hu:"Ungarsk",it:"Italiensk",ja:"Japansk",kk:"Kasakhisk",ko:"Koreansk",no:"Norsk",pl:"Polsk",pt_br:"Portugisisk (Brasil)",pt_pt:"Portugisisk (Portugal)",ro:"Rumensk",ru:"Russisk",sk:"Slovakisk",sl:"Slovensk",es:"Spansk",es_419:"Spansk (Latin-Amerika)",es_es:"Spansk (Spania)",sv:"Svensk",tt:"Tartar",th:"Thai",tr:"Tyrkisk",uk:"Ukrainsk"},taptoedit:"Trykk for \xe5 redigere",plaincode:{dialog:{title:"Kodevisning",editor:"Redigeringsprogram for HTML-kilde"}},help:{dialog:{accessibility:"Navigering med tastaturet",a11ycheck:"Tilgjengelighetssjekking",about:"Om Textbox.io",markdown:"Markdown-formatering",shortcuts:"Tastatursnarveier"}},spelling:{context:{more:"Mer",morelabel:"Delmeny for flere stavealternativer"},none:"Ingen",menu:"Stavespr\xe5k"},specialchar:{open:"Spesialtegn",dialog:"Sett inn spesialtegn",latin:"Latinsk",insert:"Sett inn",punctuation:"Tegnsetting",currency:"Valutaer","extended-latin-a":"Utvidet Latin A","extended-latin-b":"Utvidet Latin A",arrows:"Piler",mathematical:"Matematisk",miscellaneous:"Diverse",selects:"Valgte tegn",grid:"Spesialtegn"},insert:{"menu-button":"Sett inn-meny",menu:"Sett inn",link:"Kobling",image:"Bilde",table:"Tabell",horizontalrule:"Horisontal linje",media:"Media"},media:{embed:"Embed-kode for media",insert:"Sett inn",placeholder:"Lim inn embed-koden her."},wordcount:{open:"Ordantall",dialog:"Ordantall",counts:"Opptelling",selection:"Utvalg",document:"Dokument",characters:"Tegn",charactersnospaces:"Tegn (uten mellomrom)",words:"Ord"},list:{unordered:{menu:"Alternativer for usortert liste",default:"Standard usortert",circle:"Sirkel usortert",square:"Firkant usortert",disc:"Disk usortert"},ordered:{menu:"Alternativer for sortert liste",default:"Standard sortert",decimal:"Desimal sortert","upper-alpha":"\xd8vre Alpha sortert","lower-alpha":"Nedre Alpha sortert","upper-roman":"\xd8vre Roman sortert","lower-roman":"Nedre Roman sortert","lower-greek":"Nedre gresk sortert"}},tag:{inline:{class:"span ({0})"},img:"Bilde"},block:{normal:"Normal",p:"Avsnitt",h1:"Overskrift 1",h2:"Overskrift 2",h3:"Overskrift 3",h4:"Overskrift 4",h5:"Overskrift 5",h6:"Overskrift 6",div:"Div",pre:"Pre",li:"Listeelement",td:"Celle",th:"Overskriftscelle",styles:"Stiler-meny",dropdown:"Blokker",describe:"N\xe5v\xe6rende stil{0}",menu:"Stiler",label:{inline:"Linjestiler",table:"Tabellstiler",line:"Linjestiler",media:"Mediastiler",list:"Listestiler",link:"Koblingsstiler"}},font:{"menu-button":"Fontmeny",menu:"Skrift",face:"Skrifttype",size:"Skriftst\xf8rrelse",coloroption:"Farge",describe:"N\xe5v\xe6rende skrifttype {0}",color:"Tekst",highlight:"Uthevelse",stepper:{input:"Angi fontst\xf8rrelse",increase:"\xd8k fontst\xf8rrelse",decrease:"Reduser fontst\xf8rrelse"}},cog:{"menu-button":"Innstillingsmeny",menu:"Innstillinger",spellcheck:"Stavekontroll",capitalisation:"Store/sm\xe5 bokstaver",autocorrect:"Autokorriger",linkpreviews:"Koble til forh\xe5ndsvisning",help:"Hjelp"},alignment:{toolbar:"Justeringsmeny",menu:"Justering",left:"Venstrejuster",center:"Midtstill",right:"H\xf8yrejuster",justify:"Juster rettstilt",describe:"N\xe5v\xe6rende innretting {0}"},category:{language:"Spr\xe5kgruppe",undo:"Angre og gj\xf8re om gruppe",insert:"Sett inn gruppe",style:"Stilgruppe",emphasis:"Formateringsgruppe",align:"Justeringsgruppe",listindent:"Liste og innrykksgruppe",format:"Fontgruppe",tools:"Verkt\xf8ygruppe",table:"Tabellgruppe",image:"Bilderedigeringsgruppe"},action:{undo:"Angre",redo:"Gj\xf8r om",bold:"Fet",italic:"Kursiv",underline:"Understreking",strikethrough:"Gjennomstreking",subscript:"Senket skrift",superscript:"Hevet skrift",removeformat:"Fjern formatering",bullist:"Usortert liste",numlist:"Sortert liste",indent:"Innrykk mer",outdent:"Innrykk mindre",blockquote:"Blockquote",fullscreen:"Fullskjerm",search:"Dialog for finn og erstatt",a11ycheck:"Sjekk tilgjengelighet",toggle:{fullscreen:"G\xe5 ut av fullskjerm"}},table:{menu:"Sett inn tabell","column-header":"Overskriftskolonne","row-header":"Overskriftsrad",float:"Flytende justering",cell:{color:{border:"Kantlinjefarge",background:"Bakgrunnsfarge"},border:{width:"Kantlinjevidde",stepper:{input:"Angi kantlinjevidde",increase:"\xd8k kantlinjevidde",decrease:"Reduser kantlinjevidde"}}},context:{row:{title:"Undermeny rad",menu:"Rad",insertabove:"Sett inn over",insertbelow:"Sett inn under"},column:{title:"Undermeny kolonne",menu:"Kolonne",insertleft:"Sett inn til venstre",insertright:"Sett inn til h\xf8yre"},cell:{merge:"Flett celler",unmerge:"Oppl\xf8s sammenfletting av celler"},table:{title:"Undermeny tabell",menu:"Tabell",properties:"Egenskaper",delete:"Slett"},common:{delete:"Slett",normal:"Sett som normal",header:"Sett som overskrift"},palette:{show:"Alternativer for tabellredigering p\xe5 verkt\xf8ylinjen",hide:"Alternativer for tabellredigering ikke lenger tilgjengelig"}},picker:{header:"Overskriftsinnstilling",label:"Tabellvelger",describepicker:"Bruk pil-taster til \xe5 stille inn tabellst\xf8rrelse.  Trykk p\xe5 tab-tasten for \xe5 g\xe5 til innstillinger for overskrifter. Trykk p\xe5 mellomroms- eller enter-tasten for \xe5 sette inn tabell.",rows:"{0} h\xf8y",cols:"{0} bred"},border:"Ramme",summary:"Sammendrag",dialog:"Egenskaper for tabell",caption:"Tabelltekst",width:"Bredde",height:"H\xf8yde"},align:{none:"Ingen justering",center:"Midtstill",left:"Venstrejuster",right:"H\xf8yrejuster"},button:{ok:"OK",cancel:"Avbryt",close:"Avbryt-dialog"},banner:{close:"Lukk banner"},border:{on:"P\xe5",off:"Av",labels:{on:"Ramme p\xe5",off:"Ramme av"}},loading:{wait:"Vent litt"},toolbar:{more:"Mer",backbutton:"Forrige","switch-code":"Bytt til kodevisning","switch-pencil":"Bytt til designvisning"},link:{context:{edit:"Rediger kobling",follow:"\xc5pne kobling",ignore:"Ignorer brutt kobling",remove:"Fjern kobling"},dialog:{aria:{update:"Oppdater kobling",insert:"Sett inn kobling",properties:"Koblingsegenskaper",quick:"Hurtigalternativer"},autocomplete:{open:"Liste for autofullf\xf8ring av kobling er tilgjengelig. Fortsett \xe5 taste eller bruk opp/ned-pilene til \xe5 velge forslag.",close:"Liste for autofullf\xf8ring av kobling lukket",accept:"Valgt koblingsforslag {0}"},edit:"Rediger",remove:"Fjern",preview:"Forh\xe5ndsvis",update:"Oppdater",insert:"Sett inn",tooltip:"Kobling"},properties:{dialog:{title:"Koblingsegenskaper"},text:{label:"Tekst som skal vises",placeholder:"Tast eller lim inn visningstekst"},url:{label:"URL-kobling",placeholder:"Taste eller lim inn URL"},title:{label:"Tittel",placeholder:"Tast eller lim inn koblingstittel"},button:{remove:"Fjern"},target:{label:"M\xe5l",none:"Ingen",blank:"Nytt vindu",top:"Helside",self:"Samme ramme",parent:"Overordnet ramme"}},anchor:{top:"Topp av dokumentet",bottom:"Bunn av dokumentet"}},fileupload:{title:"Sett inn bilder",tablocal:"Lokale filer",tabweburl:"Nettadresse",dropimages:"Slipp bilder her",chooseimage:"Velg bilde \xe5 laste opp",web:{url:"Nettbildeadresse:"},weburlhelp:"Skriv inn URL-en for \xe5 se forh\xe5ndsvisning. Store bilder kan ta litt tid \xe5 vise.",invalid1:"Vi finner ikke noe bilde p\xe5 nettadressen du bruker.",invalid2:"Sjekk nettadressen or skrivefeil.",invalid3:"P\xe5se at bildet du bruker er offentlig og ikke passordbeskyttet eller i et privat nettverk."},image:{context:{properties:"Bildeegenskaper",palette:{show:"Alternativer for tabellredigering p\xe5 verkt\xf8ylinjen",hide:"Alternativer for tabellredigering ikke lenger tilgjengelig"}},dialog:{title:"Bildeegenskaper",fields:{align:"Flytende justering",url:"Nettadresse",urllocal:"Bilde enda ikke lagret",alt:"Alternativ tekst",width:"Bredde",height:"H\xf8yde",constrain:{label:"Begrens proporsjoner",on:"L\xe5ste proporsjoner",off:"Ul\xe5ste proporsjoner"}}},menu:"Sett inn bilde","menu-button":"Sett inn bildemeny","from-url":"Nettadresse","from-camera":"Kamerarull",toolbar:{rotateleft:"Roter venstre",rotateright:"Roter h\xf8yre",fliphorizontal:"Vend vannrett",flipvertical:"Vend loddrett",properties:"Bildeegenskaper"},crop:{announce:"Angi beskj\xe6ringsgrensesnitt. Trykk Enter for \xe5 bruke, Esc for \xe5 avbryte.",cancel:"Avbryte beskj\xe6ring",begin:"Beskj\xe6r bilde.",apply:"Bruk beskj\xe6ring",handle:{nw:"\xd8verste venstre beskj\xe6ringshendel",ne:"\xd8verste h\xf8yre beskj\xe6ringshendel",se:"Nederste h\xf8yre beskj\xe6ringshendel",sw:"Nederste venstre beskj\xe6ringshendel",shade:"Beskj\xe6ringsramme"}}},units:{"amount-of-total":"{0} av {1}"},search:{menu:"Finn og erstatt",field:{replace:"Erstatt-felt",search:"S\xf8kefelt"},search:"S\xf8k",previous:"Forrige",next:"Neste",replace:"Erstatt","replace-all":"Erstatt alle",matchcase:"Skill mellom store/sm\xe5 bokstaver"},mentions:{initiated:"Opprettet omtale. fortsett \xe5 taste for type fremover",lookahead:{open:"Skriv videre liste-boks",cancelled:"Avbrutt omtale",searching:"S\xf8ker etter resultater",selected:"Satt in omtale av {0}",noresults:"Ingen resultater"}},cement:{dialog:{paste:{title:"Lim formateringsvalg",instructions:"Velges for \xe5 beholde formateringsvalgene i det limte innholdet.",merge:"Behold formatering",clean:"Fjern formatering"},flash:{title:"Lokal bildeimport","trigger-paste":"Utl\xf8s liming igjen fra tastaturet for \xe5 lime inn innhold med bilder.",missing:'Det kreves Adobe Flash for \xe5 importere bilder fra Microsoft Office. Installer <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash Player</a>.',"press-escape":'Trykk <span class="ephox-polish-help-kbd">ESC</span> for \xe5 ignorere lokale bilder og fortsette redigering.'}}},cloud:{error:{apikey:"Din API-n\xf8kkel er ugyldig.",domain:"Domenet ({0}) st\xf8ttes ikke av din API-n\xf8kkel.",plan:"Du har overskredet antall redakt\xf8rnedlastinger tilgjengelig p\xe5 planen din. G\xe5 inn p\xe5 nettsiden for \xe5 oppgradere."},dashboard:"G\xe5 til Admin kontrollpanel"},errors:{paste:{notready:"Importeringsfunksjonen for ord er ikke lastet. Vent og pr\xf8v p\xe5 nytt.",generic:"En feil oppstod da du limte inn innholdet."},toolbar:{missing:{custom:{string:'Tilpassede kommandoer m\xe5 ha egenskapen "{0}" og den m\xe5 v\xe6re en streng'}},invalid:"Konfigurasjonen for verkt\xf8ylinjen er ugyldig ({0}). Se konsoll for detaljer."},spelling:{missing:{service:"Stavekontroll ble ikke funnet: ({0})."}},images:{edit:{needsproxy:"Det kreves en proxy for \xe5 redigere bilder fra dette domenet: ({0})",proxyerror:"Kan ikke kommunisere med proxy for \xe5 redigere dette bildet. Se konsoll for detaljer.",generic:"Det oppsto en feil ved redigering av bildet. Se konsoll for detaljer."},disallowed:{local:"Liming av lokal bilder er deaktivert. Lokale bilder er fjernet fra limt innhold.",dragdrop:"Dra og slipp er deaktivert."},upload:{unknown:"Bildet ble ikke opplastet",invalid:"Ikke alle filer ble behandlet - noen var ikke gyldige bilder",failed:"Bildet ble ikke opplastet: ({0}).",cors:"Kan ikke kontakte opplastingstjeneste. Mulig CORS (Cross-Origin Resource Sharing)-feil({0})"},missing:{service:"Bildetjenesten ble ikke funnet: ({0}).",flash:"Din nettlesers sikkerhetsinnstillinger kan hindre bildene fra \xe5 bli importert."},import:{failed:"Noen bilder ble ikke importert.",unsupported:"Bildetype uten st\xf8tte.",invalid:"Bildet er ugyldig."}},webview:{image:"Direktekopierte biler kan ikke limes inn."},safari:{image:"Safari st\xf8tter ikke direkte liming av bilder.",url:"Mer informasjon om bildeliming for Safari",rtf:"Mer informasjon om liming for Safari"},flash:{crashed:"Bildene ble ikke importerte siden det ser ut til at Adobe Flash har brutt sammen. Dette kan v\xe6re for\xe5rsaket av liming av store dokumenter."},http:{400:"D\xe5rlig foresp\xf8rsel: {0}",401:"Uautorisert: {0}",403:"Forbudt: {0}",404:"Ikke funnet: {0}",407:"Proxy-godkjenning kreves: {0}",409:"Filkonflikt: {0}",413:"Nyttelast for stor: {0}",415:"Mediatype som ikke st\xf8ttes: {0}",500:"Feil p\xe5 intern server: {0}",501:"Ikke implementert: {0}"}}}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("tbio_nb.js","strings for language nb");g({version:f,strings:a})}();