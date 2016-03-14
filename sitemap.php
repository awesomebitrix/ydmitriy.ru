<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "Языков Дмитрий, веб-разработчик, web-developer, статьи, публикации, bitrix, создание сайтов, создать сайт самостоятельно, уроки bitrix");
$APPLICATION->SetPageProperty("title", "Карта сайта");
$APPLICATION->SetPageProperty("keywords", "Языков Дмитрий, веб-разработчик, web-developer, статьи, публикации, bitrix, создание сайтов, создать сайт самостоятельно, уроки bitrix");
$APPLICATION->SetPageProperty("description", "Карта сайта");
$APPLICATION->SetTitle("Карта сайта");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.map", 
	"sitemap", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COL_NUM" => "1",
		"LEVEL" => "2",
		"SET_TITLE" => "Y",
		"SHOW_DESCRIPTION" => "N",
		"COMPONENT_TEMPLATE" => "sitemap",
		"BLOG_IBLOCK" => "3",
		"WORK_IBLOCK" => "2"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>