<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$help = array(
	array(
		0 => '--',
		1 => 'Вступление'
	),
	array(
		0 => 'Что такое BBCode?',
		1 => 'BBCode — это специальный вариант HTML. Сможете ли вы использовать BBCode в ваших сообщениях или нет, определяется администратором форумов. Кроме того, вы сможете отключить использование BBCode в конкретном сообщении при его размещении. Сам BBCode по стилю похож на HTML, теги заключены в квадратные скобки [ и ], а не в &lt; и &gt;; он даёт больше возможностей управления тем, как выводятся данные. При использовании некоторых шаблонов вы сможете добавлять BBCode в ваши сообщения, пользуясь простым интерфейсом, расположенным над полем для ввода текста. Но даже в этом случае данное руководство может оказаться полезным.'
	),
	array(
		0 => '--',
		1 => 'Форматирование текста'
	),
	array(
		0 => 'Как сделать текст жирным, наклонным или подчёркнутым',
		1 => 'BBCode включает теги для быстрого изменения стиля шрифта, сделать это можно следующими способами: <ul><li>Чтобы сделать текст жирным, заключите его в <strong>[b][/b]</strong>, например:<br /><br /><strong>[b]</strong>Привет<strong>[/b]</strong><br /><br />станет <strong>Привет</strong></li><li>Для подчёркивания используйте <strong>[u][/u]</strong>, например:<br /><br /><strong>[u]</strong>Доброе утро<strong>[/u]</strong><br /><br />станет <span style="text-decoration: underline">Доброе утро</span></li><li>Курсив делается тегами <strong>[i][/i]</strong>, например:<br /><br />Это <strong>[i]</strong>здорово!<strong>[/i]</strong><br /><br />выдаст Это <i>здорово!</i></li></ul>'
	),
	array(
		0 => 'Как изменить цвет или размер текста',
		1 => 'Для изменения цвета или размера шрифта могут быть использованы следующие теги (окончательный вид будет зависеть от системы и браузера пользователя): <ul><li>Цвет текста можно изменить, окружив его <strong>[color=][/color]</strong>. Вы можете указать либо известное имя цвета (red, blue, yellow и т. п.), либо шестнадцатеричное представление, например #FFFFFF, #000000. Таким образом, для создания красного текста вы можете использовать:<br /><br /><strong>[color=red]</strong>Привет!<strong>[/color]</strong><br /><br />или<br /><br /><strong>[color=#FF0000]</strong>Привет!<strong>[/color]</strong><br /><br />оба способа дадут в результате <span style="color:red">Привет!</span></li><li>Изменение размера достигается аналогичным образом при использовании <strong>[size=][/size]</strong>. Этот тег зависит от используемых шаблонов, рекомендуемый формат — число, показывающее размер текста в процентах, от 20% (очень маленький) до 200% (очень большой) от размера по умолчанию. Например:<br /><br /><strong>[size=30]</strong>МАЛЕНЬКИЙ<strong>[/size]</strong><br /><br />скорее всего будет <span style="font-size:30%;">МАЛЕНЬКИЙ</span><br /><br />в то время как:<br /><br /><strong>[size=200]</strong>ОГРОМНЫЙ!<strong>[/size]</strong><br /><br />будет <span style="font-size:200%;">ОГРОМНЫЙ!</span></li></ul>'
	),
	array(
		0 => 'Могу ли я комбинировать теги?',
		1 => 'Да, конечно, можете. Например, для привлечения чьего-то внимания вы сможете написать:<br /><br /><strong>[size=200][color=red][b]</strong>ПОСМОТРИТЕ НА МЕНЯ!<strong>[/b][/color][/size]</strong><br /><br />что выдаст <span style="color:red;font-size:200%;"><strong>ПОСМОТРИТЕ НА МЕНЯ!</strong></span><br /><br />Мы не рекомендуем выводить таким образом длинные тексты! Учтите, что вы, автор сообщения, должны позаботиться о том, чтобы теги были правильно вложены. Вот этот BBCode, например, неправилен:<br /><br /><strong>[b][u]</strong>Это неверно<strong>[/b][/u]</strong>'
	),
	array(
		0 => '--',
		1 => 'Цитирование и вывод форматированных текстов'
	),
	array(
		0 => 'Цитирование при ответах',
		1 => 'Есть два способа процитировать текст, со ссылкой и без.<ul><li>Когда вы используете кнопку «Цитата» для ответа на сообщение, то его текст добавляется в поле ввода окружённым блоком <strong>[quote=&quot;&quot;][/quote]</strong>. Этот метод позволит вам цитировать со ссылкой на автора либо на что-то ещё, что вы туда впишете. Например, для цитирования отрывка текста, написанного Mr. Blobby, вы напишете:<br /><br /><strong>[quote=&quot;Mr. Blobby&quot;]</strong>Текст Mr. Blobby будет здесь<strong>[/quote]</strong><br /><br />В результате перед текстом будут вставлены слова «Mr. Blobby писал(а):». Помните, вы <strong>должны</strong> заключить имя в кавычки &quot;&quot;, они не могут быть опущены.</li><li>Второй метод просто позволяет вам что-то процитировать. Для этого вам надо заключить текст в теги <strong>[quote][/quote]</strong>. При просмотре сообщения будет просто показан текст в блоке цитирования.</li></ul>'
	),
	array(
		0 => 'Вывод кода или форматированного текста',
		1 => 'Если вам надо вывести кусок программы или что-то, что должно быть выведено шрифтом фиксированной ширины (Courier), вы должны заключить текст в теги <strong>[code][/code]</strong>, например:<br /><br /><strong>[code]</strong>echo &quot;This is some code&quot;;<strong>[/code]</strong><br /><br />Всё форматирование, используемое внутри тегов <strong>[code][/code]</strong>, будет сохранено. Подсветка синтаксиса языка PHP может быть включена с помощью <strong>[code=php][/code]</strong> и рекомендуется при отправке сообщений с PHP-кодом для удобства его чтения.'
	),
	array(
		0 => '--',
		1 => 'Создание списков'
	),
	array(
		0 => 'Создание маркированного списка',
		1 => 'BBCode поддерживает два вида списков: маркированные и нумерованные. Они практически идентичны своим эквивалентам из HTML. В маркированном списке все элементы выводятся последовательно, каждый отмечается символом-маркером. Для создания маркированного списка используйте <strong>[list][/list]</strong> и определите каждый элемент при помощи <strong>[*]</strong>. Например, чтобы вывести свои любимые цвета, вы можете использовать:<br /><br /><strong>[list]</strong><br /><strong>[*]</strong>Красный<br /><strong>[*]</strong>Синий<br /><strong>[*]</strong>Жёлтый<br /><strong>[/list]</strong><br /><br />Это выдаст такой список:<ul><li>Красный</li><li>Синий</li><li>Жёлтый</li></ul><br />Вы также можете задать стиль маркера, используя <strong>[list=disc][/list]</strong> для маркера в виде круга, <strong>[list=circle][/list]</strong> для маркера в виде окружности или <strong>[list=square][/list]</strong> для квадратного маркера.'
	),
	array(
		0 => 'Создание нумерованного списка',
		1 => 'Второй тип списка, нумерованный, позволяет выбрать, что именно будет выводиться перед каждым элементом. Для создания нумерованного списка используйте <strong>[list=1][/list]</strong> или <strong>[list=a][/list]</strong> для создания алфавитного списка. Как и в случае маркированного списка, элементы определяются с помощью <strong>[*]</strong>. Например:<br /><br /><strong>[list=1]</strong><br /><strong>[*]</strong>Пойти в магазин<br /><strong>[*]</strong>Купить новый компьютер<br /><strong>[*]</strong>Обругать компьютер, когда случится ошибка<br /><strong>[/list]</strong><br /><br />выдаст следующее:<ol style="list-style-type: decimal;"><li>Пойти в магазин</li><li>Купить новый компьютер</li><li>Обругать компьютер, когда случится ошибка</li></ol>Для алфавитного списка используйте:<br /><br /><strong>[list=a]</strong><br /><strong>[*]</strong>Первый возможный ответ<br /><strong>[*]</strong>Второй возможный ответ<br /><strong>[*]</strong>Третий возможный ответ<br /><strong>[/list]</strong><br /><br />что выдаст<ol style="list-style-type: lower-alpha"><li>Первый возможный ответ</li><li>Второй возможный ответ</li><li>Третий возможный ответ</li></ol><br /><strong>[list=A]</strong><br /><strong>[*]</strong>Первый возможный ответ<br /><strong>[*]</strong>Второй возможный ответ<br /><strong>[*]</strong>Третий возможный ответ<br /><strong>[/list]</strong><br /><br />что выдаст<ol style="list-style-type: upper-alpha"><li>Первый возможный ответ</li><li>Второй возможный ответ</li><li>Третий возможный ответ</li></ol><br /><strong>[list=i]</strong><br /><strong>[*]</strong>Первый возможный ответ<br /><strong>[*]</strong>Второй возможный ответ<br /><strong>[*]</strong>Третий возможный ответ<br /><strong>[/list]</strong><br /><br />что выдаст<ol style="list-style-type: lower-roman"><li>Первый возможный ответ</li><li>Второй возможный ответ</li><li>Третий возможный ответ</li></ol><br /><strong>[list=I]</strong><br /><strong>[*]</strong>Первый возможный ответ<br /><strong>[*]</strong>Второй возможный ответ<br /><strong>[*]</strong>Третий возможный ответ<br /><strong>[/list]</strong><br /><br />что выдаст<ol style="list-style-type: upper-roman"><li>Первый возможный ответ</li><li>Второй возможный ответ</li><li>Третий возможный ответ</li></ol>'
	),
	// This block will switch the FAQ-Questions to the second template column
	array(
		0 => '--',
		1 => '--'
	),
	array(
		0 => '--',
		1 => 'Создание ссылок'
	),
	array(
		0 => 'Ссылки на другой сайт',
		1 => 'BBCode поддерживает несколько способов создания ссылок.<ul><li>Первый из них использует тег <strong>[url=][/url]</strong>, где после знака = должен идти нужный адрес URL. Например, для ссылки на phpBB.com можно использовать:<br /><br /><strong>[url=https://www.phpbb.com/]</strong>Посетите phpBB!<strong>[/url]</strong><br /><br />В результате будет создана следующая ссылка: <a href="https://www.phpbb.com/">Посетите phpBB!</a> Учтите, что ссылка откроется в том же или в новом окне, в зависимости от настроек браузера.</li><li>Если необходимо, чтобы в качестве текста ссылки был показан сам адрес URL, можно просто использовать:<br /><br /><strong>[url]</strong>https://www.phpbb.com/<strong>[/url]</strong><br /><br />В результате будет сгенерирована ссылка: <a href="https://www.phpbb.com/">https://www.phpbb.com/</a></li><li>Кроме того, phpBB поддерживает так называемые <i>Автоматические ссылки</i>, когда любой синтаксически правильный адрес URL преобразовывается в ссылку без необходимости использовать теги или префикс http://. Например, текст www.phpbb.com в сообщении будет автоматически преобразован в ссылку <a href="http://www.phpbb.com/">www.phpbb.com</a>.</li><li>То же самое относится и к адресам email. Можно указать адрес либо в явном виде:<br /><br /><strong>[email]</strong>no.one@domain.adr<strong>[/email]</strong><br /><br />который будет преобразован в <a href="mailto:no.one@domain.adr">no.one@domain.adr</a>, либо просто ввести в сообщении текст no.one@domain.adr, который будет автоматически преобразован в адрес при просмотре.</li></ul>Как и с другими тегами BBCode, в теги ссылок можно заключать любые другие теги, например <strong>[img][/img]</strong> (см. следующий пункт), <strong>[b][/b]</strong> и т. д. По аналогии с тегами форматирования, правильный порядок их открывания и закрывания зависит от пользователя, например:<br /><br /><strong>[url=https://www.phpbb.com/][img]</strong>https://www.phpbb.com/theme/images/logos/blue/160x52.png<strong>[/url][/img]</strong><br /><br /> <span style="text-decoration: underline">неверно</span>, что может привести к последующему удалению вашего сообщения, поэтому надо быть внимательным.'
	),
	array(
		0 => '--',
		1 => 'Показ изображений в сообщениях'
	),
	array(
		0 => 'Добавление изображения в сообщение',
		1 => 'BBCode включает тег для добавления картинки в ваше сообщение. При этом следует помнить две очень важные вещи: во-первых, многих пользователей раздражает большое количество изображений, во-вторых, ваше изображение уже должно быть размещено в интернете (т. е. оно не может быть расположено только на вашем компьютере, если, конечно, вы не запустили на нём веб-сервер!). На данный момент нет возможности хранить изображения локально на phpBB (ожидается, что это ограничение будет снято в следующей версии phpBB). Для вывода изображения вы должны окружить его URL тегами <strong>[img][/img]</strong>. Например:<br /><br /><strong>[img]</strong>https://www.phpbb.com/theme/images/logos/blue/160x52.png<strong>[/img]</strong><br /><br />Как указано в предыдущем пункте, вы можете заключить изображение в теги <strong>[url][/url]</strong>, то есть<br /><br /><strong>[url=https://www.phpbb.com/][img]</strong>https://www.phpbb.com/theme/images/logos/blue/160x52.png<strong>[/img][/url]</strong><br /><br />выдаст:<br /><br /><a href="https://www.phpbb.com/"><img src="https://www.phpbb.com/theme/images/logos/blue/160x52.png" alt="" /></a>'
	),
	array(
		0 => 'Добавление вложений в сообщение',
		1 => 'Теперь вложения могут быть помещены в любой части сообщения при помощи нового тега BBCode <strong>[attachment=][/attachment]</strong>, если вложения разрешены администратором конференции и если вы имеете необходимые права доступа. На странице размещения сообщения находится выпадающий список (соответственно кнопка) для размещения вложений в сообщении.'
	),
	array(
		0 => '--',
		1 => 'Прочее'
	),
	array(
		0 => 'Могу ли я добавить собственные теги?',
		1 => 'Если вы являетесь администратором этой конференции и имеетe достаточные права, то можете добавить новые теги BBCode в администраторском разделе.'
	),
);
