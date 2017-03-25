        </div>
    </div>
    <?$APPLICATION->AddHeadScript("/bower_components/jquery/dist/jquery.min.js")?>
    <?$APPLICATION->AddHeadScript("/js/min/all.min.js")?>
    <?$APPLICATION->AddHeadScript("/js/target.js")?>
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