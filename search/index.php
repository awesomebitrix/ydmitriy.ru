<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?><?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"search", 
	array(
		"USE_SUGGEST" => "N",
		"PATH_TO_USER_PROFILE" => "",
		"AJAX_MODE" => "Y",
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "Y",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(
			0 => "iblock_portfolio",
			1 => "iblock_Blog",
		),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "10",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "beauty",
		"arrFILTER" => array(
			0 => "main",
			1 => "iblock_portfolio",
			2 => "iblock_Blog",
		),
		"arrFILTER_iblock_portfolio" => array(
			0 => "2",
		),
		"arrFILTER_iblock_Blog" => array(
			0 => "all",
		),
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SHOW_RATING" => "N",
		"RATING_TYPE" => "",
		"AJAX_OPTION_ADDITIONAL" => "",
		"arrFILTER_main" => array(
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>