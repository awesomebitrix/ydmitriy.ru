<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;   //  Работа с файлами локализации

Loc::loadMessages(__FILE__);
?>
<!doctype html>
<html lang="ru">
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>">
    <meta property="og:site_name" content="Языков Дмитрий Web-developer" />
    <meta property="og:image" content="<?=$APPLICATION->ShowViewContent('head_image');?>"/>
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>"/>
    <meta property="og:url" content="https://ydmitry.ru<?=$APPLICATION->GetCurPage()?>"/>
    <meta property="og:description" content="<?$APPLICATION->ShowProperty("description")?>"/>
    <meta name="p:domain_verify" content="ab7779b3d7f22e73c904eee707a9ae49"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <!-- !Meta -->
    <!-- CSS -->
    <?$APPLICATION->ShowCSS();?>
    <!-- !CSS -->
    <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon"/>

    <?
        //  Фикс множества багов "Uncaught ReferenceError: BXHotKeys is not defined" для админа
        if ($USER->IsAdmin())
            $APPLICATION->ShowHeadStrings();
    ?>
    </head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="menu">
    <div class="menu-inner">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/menutitle.php"
            )
        );?>
    </div>
    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"right_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "36000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "right_menu"
	),
	false
);?>
    <div id="social" class="menu-inner">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/social.php"
            )
        );?>
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/rss.php"
        )
    );?>
</div>
<div id="workarea">
    <div id="header">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/title_pages.php"
            )
        );?>
    </div>
    <div id="content">