</div>
<?$APPLICATION->AddHeadScript("/bower_components/jquery/dist/jquery.min.js")?>
<?$APPLICATION->AddHeadScript("/bower_components/jquery.lazyload/jquery.lazyload.js")?>
<?$APPLICATION->AddHeadScript("https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert")?>
<?$APPLICATION->AddHeadScript("/js/lazyload.js")?>
<?$APPLICATION->AddHeadScript("/js/min/all.min.js")?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/counter.php"
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