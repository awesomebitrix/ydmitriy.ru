        </div>
    </div>
    <?$APPLICATION->AddHeadScript("/bower_components/jquery/dist/jquery.js")?>
    <?$APPLICATION->AddHeadScript("/js/my.js")?>
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
</body>
</html>