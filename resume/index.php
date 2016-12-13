<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Языков Дмитрий резюме web-программиста");
$APPLICATION->SetPageProperty("keywords", "bitrix, api, php, создание сайтов, программист, набережные челны, портфолио, jquery, git, javascript, ajax, bx, статьи");
$APPLICATION->SetPageProperty("title", "Языков Дмитрий - Резюме");
$APPLICATION->SetTitle("Языков Дмитрий - Обо мне");
?><h1>Обо мне</h1>


<div id="text">
    <img width="409" alt="Языков Дмитрий" src="/upload/medialibrary/365/365dbafa07dd93e2d2479b67242a2f94.jpg" height="614" title="Языков Дмитрий" class="img-left">
    <div>Меня зовут Языков Дмитрий, мне 25 лет и я web-developer.</div>

	<h2>Чем я могу быть полезен:</h2>
	<div>
		У меня чёрный пояс по Bitrix
	</div>
	<div>
		Есть опыт проектирования и разработки сложных сайтов, веб-приложений и корпоративных порталов (на текущем месте
        работы нашими заказчиками были FordSollers, Татнефть и др. Подробнее можно узнать
        <a href="http://ydmitriy.ru/portfolio/">здесь</a>).
	</div>
	<div>
		А также, есть небольшой опыт разработки кроссплатформенных мобильных приложений под Bitrix Mobile
	</div>
	<div>
		Для меня ничего не стоит написать интеграцию с тем же 1С, со стороны веб-приложения
	</div>
    <div>
        В течении 4 лет я пользовался только linux (разные дистрибутивы). Сейчас одумался и вернулся на Windows.
        Но опыт и упорство остались
    </div>
	<div>
		Моё образование связано дизайном, и я слежу за трендами в области
	</div>
	<div>
		У меня также есть опыт выступлений на конференциях с техническими (и не очень) докладами
        (<a href="http://gkk.ru/sites/news/index.php?ELEMENT_ID=4445" target="_blank">раз,</a>
        <a href="http://gkk.ru/sites/news/index.php?ELEMENT_ID=3179" target="_blank">два,</a>
        <a href="http://gkk.ru/sites/news/index.php?ELEMENT_ID=1062" target="_blank">три</a>)
	</div>
	<div>
		Использую: <code>Php, MySQL, Bitrix API, Unix, Git, JavaScript, jQuery, Bower, Grunt, Joomla, WordPress,
        Composer</code>
	</div>
	<div>
		Немного знаю: <code>C#, Asp .Net, Python</code>
	</div>
	<h2>С чем я не могу помочь:</h2>
	<div>
		Я практически ничего не понимаю в 1С и не люблю его всеми фибрами души
	</div>
	<div>
	    И хотя у меня есть дизайнерское образование, рисовать я не умею. Программирование мне ближе, да и
        опыта на порядок больше
	</div>
	<div>
		 Я очень посредственный верстальщик. Я знаю что такое Bootstrap и MDL, но вот хаки и тонкости кроссбраузерной верстки мне не открылись
	</div>
	<h2>Опыт работы:</h2>
	<div>
	    2010 - 2012: Фриланс, разработка сайтов. <br>
		2012 - <?=date('Y')?>: <a href="http://gkk.ru/sites/">ООО "Фирма Лист"</a>, веб-программист.
	</div>
	<h2>Подтверждение навыков:</h2>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"resume",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_NOTES" => "",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("PREVIEW_PICTURE","DETAIL_PICTURE"),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "portfolio",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "20",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("CERTIFICATE"),
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>