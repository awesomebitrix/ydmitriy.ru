<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"USE_SHARE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_USE_SHARE"),
		"TYPE" => "CHECKBOX",
		"MULTIPLE" => "N",
		"VALUE" => "Y",
		"DEFAULT" =>"N",
		"REFRESH"=> "Y",
	),
);

if ($arCurrentValues["USE_SHARE"] == "Y")
{
	$arTemplateParameters["SHARE_HIDE"] = array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_HIDE"),
		"TYPE" => "CHECKBOX",
		"VALUE" => "Y",
		"DEFAULT" => "N",
	);

	$arTemplateParameters["SHARE_TEMPLATE"] = array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_TEMPLATE"),
		"DEFAULT" => "",
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"COLS" => 25,
		"REFRESH"=> "Y",
	);
	
	if (strlen(trim($arCurrentValues["SHARE_TEMPLATE"])) <= 0)
		$shareComponentTemlate = false;
	else
		$shareComponentTemlate = trim($arCurrentValues["SHARE_TEMPLATE"]);

	include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/bitrix/main.share/util.php");

	$arHandlers = __bx_share_get_handlers($shareComponentTemlate);

	$arTemplateParameters["SHARE_HANDLERS"] = array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SYSTEM"),
		"TYPE" => "LIST",
		"MULTIPLE" => "Y",
		"VALUES" => $arHandlers["HANDLERS"],
		"DEFAULT" => $arHandlers["HANDLERS_DEFAULT"],
	);

	$arTemplateParameters["SHARE_SHORTEN_URL_LOGIN"] = array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_LOGIN"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	);
	
	$arTemplateParameters["SHARE_SHORTEN_URL_KEY"] = array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_KEY"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	);
}

CModule::IncludeModule('iblock');

$properties['NAME'] = 'Наименование';
$dbProperties = CIBlockProperty::GetList(
    array(
        'SORT'  =>  'ASC',
        'NAME'  =>  'ASC',
    ),
    array(
        'IBLOCK_ID' =>  $arCurrentValues['IBLOCK_ID'],
        'ACTIVE'    =>  'Y',

    )
);
while ($arProperties = $dbProperties->Fetch()) {
    $properties['PROPERTY_'.$arProperties['CODE']] = $arProperties['NAME'];
}

$arTemplateParameters["RECOMENDATION_PARAMS"] = array(
    "NAME" => GetMessage("RECOMENDATION_PARAMS"),
    "TYPE" => "STRING",
    "DEFAULT" => "",
    "MULTIPLE" => "Y",
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["RECOMENDATION_FIELDS"] = array(
    "NAME" => GetMessage("RECOMENDATION_FIELDS"),
    "TYPE" => "LIST",
    "VALUES" => $properties,
    "MULTIPLE" => "Y",
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["RECOMENDATION_COUNT"] = array(
    "NAME" => GetMessage("RECOMENDATION_COUNT"),
    "TYPE" => "STRING",
    "DEFAULT" => "",
);

$arTemplateParameters["RECOMENDATION_CURRENT_ID"] = array(
    "NAME" => GetMessage("RECOMENDATION_CURRENT_ID"),
    "TYPE" => "STRING",
    "DEFAULT" => "",
);

?>