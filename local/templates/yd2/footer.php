        </div>
    </div>

<?
//  Подключение даполнительных js
    use Bitrix\Main\Page\Asset;

    $instance = Asset::getInstance();

    $instance->addJs('/bower_components/jquery/dist/jquery.min.js');
    $instance->addJs('/js/min/all.min.js');
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/include/counter.php"
    )
);?>

<!-- Scripts -->
<?
    if (!$USER->IsAdmin()) {
        $APPLICATION->ShowHeadStrings();
    }
?>
<?$APPLICATION->ShowHeadScripts();?>
<!-- !Scripts -->
</body>
</html>