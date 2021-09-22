/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(){return{a11y:{widget:{title:"Verificador de Acessibilidade",running:"A verificar...",issue:{counter:"Problema {0} de {1}",help:"Refer\xeancia WCAG 2.0 - abre numa nova janela",none:"N\xe3o foi detetado nenhum problema de acessibilidade"},previous:"Problema anterior",next:"Problema seguinte",repair:"Reparar problema",available:"Repara\xe7\xe3o dispon\xedvel",ignore:"Ignorar"},image:{alttext:{empty:"As imagens devem ter uma descri\xe7\xe3o de texto alternativa",filenameduplicate:"O texto alternativo n\xe3o pode ser igual ao do nome de ficheiro da imagem",set:"Forne\xe7a o texto alternativo:",validation:{empty:"O texto alternativo n\xe3o pode ficar em branco",filenameduplicate:"O texto alternativo n\xe3o pode ser igual ao nome do ficheiro"}}},table:{caption:{empty:"As tabelas devem ter legendas",summaryduplicate:"A legenda e o resumo da tabela n\xe3o podem ter o mesmo valor",set:"Forne\xe7a a legenda:",validation:{empty:"A legenda n\xe3o pode ficar em branco",summaryduplicate:"A legenda da tabela n\xe3o pode ser igual ao resumo da tabela"}},summary:{empty:"As tabelas complexas devem ter resumos",set:"Forne\xe7a um resumo para a tabela:",validation:{empty:"O resumo n\xe3o pode ficar em branco",captionduplicate:"O resumo da tabela n\xe3o pode ser igual \xe0 legenda da tabela"}},rowscells:{none:"Os elementos da tabela devem conter etiquetas TR e TD"},headers:{none:"As tabelas devem ter pelo menos uma c\xe9lula de cabe\xe7alho",set:"Escolha o cabe\xe7alho da tabela:",validation:{none:"Selecione um cabe\xe7alho de linha ou de coluna"}},headerscope:{none:"Os cabe\xe7alhos da tabela t\xeam de ser aplicados numa linha ou numa coluna",set:"Selecione o \xe2mbito do cabe\xe7alho:",scope:{row:"Linha",col:"Coluna",rowgroup:"Grupo de linhas",colgroup:"Grupo de colunas"}}},heading:{nonsequential:"Os cabe\xe7alhos devem ser aplicados por ordem sequencial. Por exemplo: Cabe\xe7alho 1 deve ser seguido de Cabe\xe7alho 2, n\xe3o de Cabe\xe7alho 3.",paragraphmisuse:"Este par\xe1grafo parece um cabe\xe7alho. Se for um cabe\xe7alho, selecione um n\xedvel de cabe\xe7alho.",set:"Selecione um n\xedvel de cabe\xe7alho:"},link:{adjacent:"As liga\xe7\xf5es adjacentes com o mesmo URL devem ser unidas numa s\xf3 liga\xe7\xe3o"},list:{paragraphmisuse:"O texto selecionado parece ser uma lista. As listas devem ser formatadas usando uma etiqueta de lista."},contrast:{smalltext:"O texto deve ter uma rela\xe7\xe3o de contraste m\xednima de 4.5:1",largetext:"O texto grande deve ter uma rela\xe7\xe3o de contraste m\xednima de 3:1"},severity:{error:"Erro",warning:"Aviso",info:"Informa\xe7\xe3o"}},aria:{autocorrect:{announce:"Corre\xe7\xe3o autom\xe1tica {0}"},label:{toolbar:"Barra de ferramentas do Editor de texto formatado",editor:"Editor de texto formatado do Textbox.io - {0}",fullscreen:"Editor de texto formatado em ecr\xe3 inteiro do Textbox.io - {0}",content:"Conte\xfado edit\xe1vel",more:"Clique para expandir ou fechar"},help:{mac:"Prima \u2303\u2325H para obter ajuda",ctrl:"Prima CTRL SHIFT H para obter ajuda"},color:{picker:"Seletor de cores",menu:"Menu do Seletor de cores"},font:{color:"Cores de texto",highlight:"Cores de realce",palette:"Paleta de cores"},context:{menu:{generic:"Menu de contexto"}},stepper:{input:{invalid:"Valor de tamanho inv\xe1lido"}},table:{headerdescription:"Prima a barra de espa\xe7os para ativar a defini\xe7\xe3o. Prima a tecla de tabula\xe7\xe3o para voltar ao seletor de tabelas.",cell:{border:{size:"Tamanho do limite"}}},input:{invalid:"Entrada inv\xe1lida"},widget:{navigation:"Use as teclas de seta para navegar."},image:{crop:{size:"O recorte tem um tamanho de {0} pix\xe9is por {1} pix\xe9is"}}},color:{white:"Branco",black:"Preto",gray:"Cinzento",metal:"Metal",smoke:"Fumo",red:"Vermelho",darkred:"Vermelho escuro",darkorange:"Laranja escuro",orange:"Laranja",yellow:"Amarelo",green:"Verde",darkgreen:"Verde escuro",mediumseagreen:"Verde marinho interm\xe9dio",lightgreen:"Verde claro",lime:"Verde lima",mediumblue:"Azul interm\xe9dio",navy:"Azul atl\xe2ntico",blue:"Azul",lightblue:"Azul claro",violet:"Roxo"},directionality:{rtldir:"Sentido da direita para a esquerda",ltrdir:"Sentido da esquerda para a direita"},parlance:{menu:"Menu de idioma",set:"Definir idioma",ar:"\xc1rabe",ca:"Catal\xe3o",zh_cn:"Chin\xeas (Simplificado)",zh_tw:"Chin\xeas (Tradicional)",hr:"Croata",cs:"Checo",da:"Dinamarqu\xeas",nl:"Neerland\xeas",en:"Ingl\xeas",en_au:"Ingl\xeas (Austr\xe1lia)",en_ca:"Ingl\xeas (Canad\xe1)",en_gb:"Ingl\xeas (Reino Unido)",en_us:"Ingl\xeas (Estados Unidos)",fa:"Persa",fi:"Finland\xeas",fr:"Franc\xeas",fr_ca:"Franc\xeas (Canad\xe1)",de:"Alem\xe3o",el:"Grego",he:"Hebraico",hu:"H\xfangaro",it:"Italiano",ja:"Japon\xeas",kk:"Cazaque",ko:"Coreano",no:"Noruegu\xeas",pl:"Polaco",pt_br:"Portugu\xeas (Brasil)",pt_pt:"Portugu\xeas (Portugal)",ro:"Romeno",ru:"Russo",sk:"Eslovaco",sl:"Esloveno",es:"Espanhol",es_419:"Espanhol (Am\xe9rica Latina)",es_es:"Espanhol (Espanha)",sv:"Sueco",tt:"T\xe1rtaro",th:"Tailand\xeas",tr:"Turco",uk:"Ucraniano"},taptoedit:"Toque para editar",plaincode:{dialog:{title:"Vista de C\xf3digo",editor:"Editor de C\xf3digo HTML"}},help:{dialog:{accessibility:"Navega\xe7\xe3o com teclado",a11ycheck:"Verifica\xe7\xe3o de Acessibilidade",about:"Acerca de Textbox.io",markdown:"Formata\xe7\xe3o com Markdown",shortcuts:"Atalhos de teclado"}},spelling:{context:{more:"Mais",morelabel:"Submenu Mais op\xe7\xf5es de ortografia"},none:"Nenhum",menu:"Idioma de verifica\xe7\xe3o ortogr\xe1fica"},specialchar:{open:"Car\xe1cter especial",dialog:"Inserir car\xe1cter especial",latin:"Latino",insert:"Inserir",punctuation:"Pontua\xe7\xe3o",currency:"Moedas","extended-latin-a":"Latino expandido A","extended-latin-b":"Latino expandido B",arrows:"Setas",mathematical:"Matem\xe1tico",miscellaneous:"Diversos",selects:"Caracteres selecionados",grid:"Caracteres especiais"},insert:{"menu-button":"Menu Inserir",menu:"Inserir",link:"Hiperliga\xe7\xe3o",image:"Imagem",table:"Tabela",horizontalrule:"R\xe9gua horizontal",media:"Multim\xe9dia"},media:{embed:"C\xf3digo de incorpora\xe7\xe3o de multim\xe9dia",insert:"Inserir",placeholder:"Colar c\xf3digo de incorpora\xe7\xe3o aqui."},wordcount:{open:"Contar palavras",dialog:"Contar palavras",counts:"Contagem",selection:"Sele\xe7\xe3o",document:"Documento",characters:"Caracteres",charactersnospaces:"Caracteres (sem espa\xe7os)",words:"Palavras"},list:{unordered:{menu:"Op\xe7\xf5es de lista n\xe3o ordenada",default:"Padr\xe3o n\xe3o ordenado",circle:"C\xedrculo n\xe3o ordenado",square:"Quadrado n\xe3o ordenado",disc:"Disco n\xe3o ordenado"},ordered:{menu:"Op\xe7\xf5es de lista ordenada",default:"Padr\xe3o ordenado",decimal:"Decimal ordenado","upper-alpha":"Letra mai\xfascula ordenada","lower-alpha":"Letra min\xfascula ordenada","upper-roman":"Romano mai\xfasculo ordenado","lower-roman":"Romano min\xfasculo ordenado","lower-greek":"Grego min\xfasculo ordenado"}},tag:{inline:{class:"span ({0})"},img:"imagem"},block:{normal:"Normal",p:"Par\xe1grafo",h1:"Cabe\xe7alho 1",h2:"Cabe\xe7alho 2",h3:"Cabe\xe7alho 3",h4:"Cabe\xe7alho 4",h5:"Cabe\xe7alho 5",h6:"Cabe\xe7alho 6",div:"Div",pre:"Pre",li:"Item de lista",td:"C\xe9lula",th:"C\xe9lula do cabe\xe7alho",styles:"Menu Estilos",dropdown:"Blocos",describe:"Estilo atual {0}",menu:"Estilos",label:{inline:"Estilos Inline",table:"Estilos de tabela",line:"Estilos de linha",media:"Estilos de multim\xe9dia",list:"Estilos de lista",link:"Estilos de hiperliga\xe7\xe3o"}},font:{"menu-button":"Menu de tipos de letra",menu:"Tipo de letra",face:"Tipos de letra",size:"Tamanho do tipo de letra",coloroption:"Cor",describe:"Tipo de letra atual {0}",color:"Texto",highlight:"Realce",stepper:{input:"Definir tamanho do tipo de letra",increase:"Aumentar tamanho do tipo de letra",decrease:"Diminuir tamanho do tipo de letra"}},cog:{"menu-button":"Menu Defini\xe7\xf5es",menu:"Defini\xe7\xf5es",spellcheck:"Verifica\xe7\xe3o ortogr\xe1fica",capitalisation:"Aplica\xe7\xe3o de mai\xfasculas",autocorrect:"Corre\xe7\xe3o autom\xe1tica",linkpreviews:"Pr\xe9-visualiza\xe7\xf5es de hiperliga\xe7\xf5es",help:"Ajuda"},alignment:{toolbar:"Menu Alinhamento",menu:"Alinhamento",left:"Alinhar \xe0 esquerda",center:"Alinhar ao centro",right:"Alinhar \xe0 direita",justify:"Justificar",describe:"Alinhamento atual {0}"},category:{language:"Grupo de idiomas",undo:"Grupo Anular e Refazer",insert:"Grupo Inserir",style:"Grupo Estilos",emphasis:"Grupo Formata\xe7\xe3o",align:"Grupo Alinhamento",listindent:"Grupo Lista e avan\xe7o",format:"Grupo Tipo de letra",tools:"Grupo Ferramentas",table:"Grupo Tabela",image:"Grupo Edi\xe7\xe3o de imagem"},action:{undo:"Anular",redo:"Refazer",bold:"Negrito",italic:"It\xe1lico",underline:"Sublinhado",strikethrough:"Rasurado",subscript:"Inferior \xe0 linha",superscript:"Superior \xe0 linha",removeformat:"Remover formata\xe7\xe3o",bullist:"Lista n\xe3o ordenada",numlist:"Lista ordenada",indent:"Avan\xe7ar mais",outdent:"Avan\xe7ar menos",blockquote:"Blockquote",fullscreen:"Ecr\xe3 inteiro",search:"Caixa de di\xe1logo Localizar e Substituir",a11ycheck:"Verificar acessibilidade",toggle:{fullscreen:"Sair do modo de ecr\xe3 inteiro"}},table:{menu:"Inserir tabela","column-header":"Coluna de cabe\xe7alho","row-header":"Linha de cabe\xe7alho",float:"Alinhamento flutuante",cell:{color:{border:"Cor do limite",background:"Cor do fundo"},border:{width:"Largura do limite",stepper:{input:"Definir largura do limite",increase:"Aumentar largura do limite",decrease:"Diminuir largura do limite"}}},context:{row:{title:"Submenu Linha",menu:"Linha",insertabove:"Inserir acima",insertbelow:"Inserir abaixo"},column:{title:"Submenu Coluna",menu:"Coluna",insertleft:"Inserir \xe0 esquerda",insertright:"Inserir \xe0 direita"},cell:{merge:"Unir c\xe9lulas",unmerge:"Anular a uni\xe3o de c\xe9lulas"},table:{title:"Submenu Tabela",menu:"Tabela",properties:"Propriedades",delete:"Eliminar"},common:{delete:"Eliminar",normal:"Definir como normal",header:"Definir como cabe\xe7alho"},palette:{show:"Op\xe7\xf5es de edi\xe7\xe3o de tabela dispon\xedveis na barra de ferramentas",hide:"Op\xe7\xf5es de edi\xe7\xe3o de tabela que j\xe1 n\xe3o est\xe3o dispon\xedveis"}},picker:{header:"Cabe\xe7alho definido",label:"Seletor de tabela",describepicker:"Use as teclas de seta para definir o tamanho da tabela.  Prima a tecla de tabula\xe7\xe3o para ir para as defini\xe7\xf5es de cabe\xe7alho de tabela. Prima a barra de espa\xe7os ou a tecla Enter para inserir a tabela.",rows:"{0} de altura",cols:"{0} de largura"},border:"Limite",summary:"Resumo",dialog:"Propriedades da tabela",caption:"Legenda da tabela",width:"Largura",height:"Altura"},align:{none:"Sem alinhamento",center:"Alinhar ao centro",left:"Alinhar \xe0 esquerda",right:"Alinhar \xe0 direita"},button:{ok:"OK",cancel:"Cancelar",close:"Caixa de di\xe1logo Cancelar"},banner:{close:"Fechar Barra de notifica\xe7\xf5es"},border:{on:"Ativado",off:"Desativado",labels:{on:"Limite ativado",off:"Limite desativado"}},loading:{wait:"Aguarde"},toolbar:{more:"Mais",backbutton:"Anterior","switch-code":"Mudar para vista de c\xf3digo","switch-pencil":"Mudar para vista de estrutura"},link:{context:{edit:"Editar hiperliga\xe7\xe3o",follow:"Abrir hiperliga\xe7\xe3o",ignore:"Ignorar liga\xe7\xe3o quebrada",remove:"Remover hiperliga\xe7\xe3o"},dialog:{aria:{update:"Atualizar hiperliga\xe7\xe3o",insert:"Inserir hiperliga\xe7\xe3o",properties:"Propriedades da hiperliga\xe7\xe3o",quick:"Op\xe7\xf5es r\xe1pidas"},autocomplete:{open:"Lista de preenchimento autom\xe1tico de liga\xe7\xe3o dispon\xedvel. Continuar a escrever ou usar as setas para cima e para baixo para selecionar as sugest\xf5es.",close:"Lista de preenchimento autom\xe1tico de liga\xe7\xe3o fechada",accept:"Selecionada a sugest\xe3o de liga\xe7\xe3o {0}"},edit:"Editar",remove:"Eliminar",preview:"Pr\xe9-visualizar",update:"Atualizar",insert:"Inserir",tooltip:"Hiperliga\xe7\xe3o"},properties:{dialog:{title:"Propriedades da hiperliga\xe7\xe3o"},text:{label:"Texto a mostrar",placeholder:"Escreva ou cole o texto a apresentar"},url:{label:"URL da Liga\xe7\xe3o",placeholder:"Escreva ou cole o URL"},title:{label:"T\xedtulo",placeholder:"Escreva ou cole o t\xedtulo da liga\xe7\xe3o"},button:{remove:"Eliminar"},target:{label:"Destino",none:"Nenhum",blank:"Nova janela",top:"P\xe1gina inteira",self:"A mesma frame",parent:"Frame principal"}},anchor:{top:"In\xedcio do documento",bottom:"Parte inferior do documento"}},fileupload:{title:"Inserir imagens",tablocal:"Ficheiros locais",tabweburl:"URL da Web",dropimages:"Largue imagens aqui",chooseimage:"Escolha a imagem para carregar",web:{url:"URL da imagem da Web:"},weburlhelp:"Insira o seu URL para ver uma pr\xe9-visualiza\xe7\xe3o da imagem. Imagens grandes podem demorar algum tempo a aparecer.",invalid1:"N\xe3o \xe9 poss\xedvel encontrar uma imagem no URL que est\xe1 a utilizar.",invalid2:"Verifique se h\xe1 erros de digita\xe7\xe3o no URL.",invalid3:"Verifique se a imagem a que est\xe1 a aceder \xe9 p\xfablica e n\xe3o est\xe1 protegida por palavra-passe nem est\xe1 numa rede privada."},image:{context:{properties:"Propriedades da imagem",palette:{show:"Op\xe7\xf5es de edi\xe7\xe3o de imagem dispon\xedveis na barra de ferramentas",hide:"Op\xe7\xf5es de edi\xe7\xe3o de imagem que j\xe1 n\xe3o est\xe3o dispon\xedveis"}},dialog:{title:"Propriedades da imagem",fields:{align:"Alinhamento flutuante",url:"URL",urllocal:"A imagem ainda n\xe3o foi guardada",alt:"Texto Alternativo",width:"Largura",height:"Altura",constrain:{label:"Restringir propor\xe7\xf5es",on:"Propor\xe7\xf5es bloqueadas",off:"Propor\xe7\xf5es desbloqueadas"}}},menu:"Inserir imagem","menu-button":"Menu Inserir imagem","from-url":"URL da Web","from-camera":"Imagens da c\xe2mara",toolbar:{rotateleft:"Rodar para a esquerda",rotateright:"Rodar para a direita",fliphorizontal:"Inverter na horizontal",flipvertical:"Inverter na vertical",properties:"Propriedades da imagem"},crop:{announce:"Entrar na interface de recorte. Prima Enter para aplicar, Esc para cancelar.",cancel:"Cancelar a opera\xe7\xe3o de recorte",begin:"Recortar imagem",apply:"Aplicar recorte",handle:{nw:"Al\xe7a de recorte superior esquerda",ne:"Al\xe7a de recorte superior direita",se:"Al\xe7a de recorte inferior direita",sw:"Al\xe7a de recorte inferior esquerda",shade:"\xc1rea de recorte"}}},units:{"amount-of-total":"{0} de {1}"},search:{menu:"Localizar e Substituir",field:{replace:"Campo Substituir",search:"Campo Pesquisar"},search:"Pesquisar",previous:"Anterior",next:"Seguinte",replace:"Substituir","replace-all":"Substituir tudo",matchcase:"Mai\xfasculas/min\xfasculas"},mentions:{initiated:"Men\xe7\xe3o criada, continue a escrever para digita\xe7\xe3o preditiva",lookahead:{open:"Caixa de listagem de digita\xe7\xe3o preditiva",cancelled:"Men\xe7\xe3o cancelada",searching:"A procurar resultados",selected:"Inserida men\xe7\xe3o de {0}",noresults:"Nenhum resultado"}},cement:{dialog:{paste:{title:"Op\xe7\xf5es de formata\xe7\xe3o de colagem",instructions:"Optar por manter ou remover a formata\xe7\xe3o do conte\xfado colado.",merge:"Manter formata\xe7\xe3o",clean:"Remover formata\xe7\xe3o"},flash:{title:"Importa\xe7\xe3o de imagem local","trigger-paste":"Acione novamente a colagem a partir do teclado para colar conte\xfado com imagens.",missing:'\xc9 necess\xe1rio o Adobe Flash para importar imagens do Microsoft Office. Instale o <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash Player</a>.',"press-escape":'Prima <span class="ephox-polish-help-kbd">ESC</span> para ignorar as imagens locais e continuar a edi\xe7\xe3o.'}}},cloud:{error:{apikey:"A sua chave de API \xe9 inv\xe1lida.",domain:"A sua chave de API n\xe3o suporta o seu dom\xednio ({0}).",plan:"Ultrapassou o n\xfamero de downloads de editores dispon\xedvel no seu plano. Visite o website para fazer uma atualiza\xe7\xe3o."},dashboard:"V\xe1 para o Painel do Administrador"},errors:{paste:{notready:"A funcionalidade de importa\xe7\xe3o do Word n\xe3o foi carregada. Aguarde e tente novamente.",generic:"Ocorreu um erro ao colar conte\xfado."},toolbar:{missing:{custom:{string:'Comandos personalizados devem ter a propriedade "{0}" e esta deve ser uma cadeia de caracteres'}},invalid:"A configura\xe7\xe3o da barra de ferramentas \xe9 inv\xe1lida ({0}). Ver a consola para obter mais detalhes."},spelling:{missing:{service:"O servi\xe7o de ortografia n\xe3o foi encontrado: ({0})."}},images:{edit:{needsproxy:"\xc9 necess\xe1rio um proxy para editar imagens deste dom\xednio: ({0})",proxyerror:"Imposs\xedvel comunicar com o proxy para editar esta imagem. Ver a consola para obter mais detalhes.",generic:"Ocorreu um erro durante a opera\xe7\xe3o de edi\xe7\xe3o da imagem. Ver a consola para obter mais detalhes."},disallowed:{local:"A colagem da imagem local foi desativada. As imagens locais foram removidas do conte\xfado colado.",dragdrop:"A fun\xe7\xe3o de arrastar e largar foi desativada."},upload:{unknown:"Falha ao carregar a imagem",invalid:"Nem todos os ficheiros foram processados - alguns n\xe3o eram imagens v\xe1lidas",failed:"Falha ao carregar a imagem: ({0}).",cors:"Imposs\xedvel contactar o servi\xe7o de carregamento de imagens. Poss\xedvel erro no CORS: ({0})"},missing:{service:"O servi\xe7o de imagens n\xe3o foi encontrado: ({0}).",flash:"As defini\xe7\xf5es de seguran\xe7a do navegador podem estar a impedir a importa\xe7\xe3o das imagens."},import:{failed:"N\xe3o foi poss\xedvel importar algumas imagens.",unsupported:"Tipo de imagem n\xe3o suportado.",invalid:"A imagem \xe9 inv\xe1lida."}},webview:{image:"Imagens copiadas diretamente n\xe3o podem ser coladas."},safari:{image:"O Safari n\xe3o oferece suporte para a colagem direta de imagens.",url:"Mais informa\xe7\xf5es sobre colagem de imagens para o Safari",rtf:"Mais informa\xe7\xf5es sobre colagem para o Safari"},flash:{crashed:"As imagens n\xe3o foram importadas porque o Adobe Flash parece ter encerrado inesperadamente. Isto pode dever-se \xe0 colagem de documentos grandes."},http:{400:"Erro de solicita\xe7\xe3o: {0}",401:"N\xe3o autorizado: {0}",403:"Proibido: {0}",404:"N\xe3o encontrado: {0}",407:"Autentica\xe7\xe3o de proxy necess\xe1ria: {0}",409:"Conflito de ficheiros: {0}",413:"Payload muito grande: {0}",415:"Tipo de multim\xe9dia n\xe3o suportado: {0}",500:"Erro interno do servidor: {0}",501:"N\xe3o implementado: {0}"}}}},b=function(a,b){var c=a.src.indexOf("?");return a.src.indexOf(b)+b.length===c},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,b){if(a){var d="data-main",e=a.getAttribute(d);if(e){a.removeAttribute(d);var f=c(e);if("function"==typeof f)return f;console.warn("attribute on "+b+" does not reference a global method")}else console.warn("no data-main attribute found on "+b+" script tag")}},e=function(a,c){var e=d(document.currentScript,c);if(e)return e;for(var f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(b(f[g],a)){var h=d(f[g],c);if(h)return h}throw"cannot locate "+c+" script tag"},f="2.1.0",g=e("tbio_pt_pt.js","strings for language pt_pt");g({version:f,strings:a})}();