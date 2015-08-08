<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule("iblock"))
{
    ShowMessage("Модуль iblock не установлен");
    return false;
}

$dbElement = CIBlockElement::GetList(
    array(
        "NAME"  =>  "ASC",
        "SORT"  =>  "ASC"
    ),
    array(
        "IBLOCK_ID" =>  $arParams["IBLOCK_ID"],
        "ACTIVE"    =>  "Y",
    ),
    false,
    false,
    array(
        "ID",
        "NAME",
        "IBLOCK_SECTION_ID"
    )
);
while ($arElement = $dbElement->GetNext())
{
    $arResult["ITEMS"][] = $arElement;
}

$this->IncludeComponentTemplate();
?>