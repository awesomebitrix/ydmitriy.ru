<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>

<h1>404 Страница не найдена</h1>

<h3>Карта сайта:</h3>
<?$APPLICATION->IncludeComponent(
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
);?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>