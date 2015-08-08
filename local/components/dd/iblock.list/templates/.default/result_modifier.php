<?

$sec = array();
foreach ($arResult["ITEMS"] as $item)
{
    $sec[$item["IBLOCK_SECTION_ID"]] = $item["IBLOCK_SECTION_ID"];
}

$dbSection = CIBlockSection::GetList(
    array(
        "SORT"  =>  "ASC",
        "NAME"  =>  "ASC"
    ),
    array(
        "IBLOCK_ID" =>  $arParams["IBLOCK_ID"], //  Посмотреть
        "ACTIVE"    =>  "Y",
        "ID"        =>  $sec,
    ),
    false,
    array(
        "ID",
        "NAME"
    )
);

while ($arSection = $dbSection->GetNext())
{
    $arResult["SECTIONS"][$arSection["ID"]] = $arSection;
}

?>
