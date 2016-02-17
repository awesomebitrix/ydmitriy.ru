<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!doctype html>
<html lang="ru">
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>">
    <meta property="og:image" content="http://ydmitriy.ru/img/webdev.png"/>
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>"/>
    <meta property="og:url" content="http://ydmitriy.ru<?=$APPLICATION->GetCurPage()?>"/>
    <meta property="og:description" content="<?$APPLICATION->ShowProperty("description")?>"/>
    <meta name="p:domain_verify" content="ab7779b3d7f22e73c904eee707a9ae49"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <!-- !Meta -->

    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon1.ico" type="image/vnd.microsoft.icon"/>
    <?$APPLICATION->SetAdditionalCSS("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");?>

    <?
        //  Фикс множества багов "Uncaught ReferenceError: BXHotKeys is not defined" для админа
        if ($USER->IsAdmin())
            $APPLICATION->ShowHeadStrings();
    ?>

    <?IncludeTemplateLangFile(__FILE__);?>
    </head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="menu">
    <div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/menutitle.php"
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
    <div id="social">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/social.php"
            )
        );?>
    </div>
    <div id="bx-composite-banner"></div>
</div>
<div id="workarea">
    <div id="header">
        <h3 class="name">
            <span class="search_button">
                <i class="fa fa-search"></i>
            </span>
            <a href="/">
                Языков Дмитрий<br>
            </a>
                <span class="profession">
                    Web-developer
                </span>
                <span class="button">
                    <noindex><i class="fa fa-bars"></i></noindex>
                </span>
        </h3>
    </div>
    <noindex>
        <div id="search_panel">
            <div id="search_form">
                <form action="/search">
                    <input type="text" name="q" value="<?=trim(htmlspecialchars($_GET["q"]))?>" placeholder="Хочу почитать про...">
                    <input type="submit" value="Поиск">
                </form>
            </div>
        </div>
    </noindex>
    <div id="content">
<!--	    <div id="text">-->