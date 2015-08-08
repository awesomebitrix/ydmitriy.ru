<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("iblock"))
{
    ShowMessage("Модуль iblock не установлен");
    return false;
}

$dbIBlocks = CIBlock::GetList(
    array(
        "name"  =>  "asc",
    ),
    array(
        "ACTIVE"    =>  "Y",
    ),
    true
);

while ($arIBlocks = $dbIBlocks->GetNext())
{
    $iblocks[$arIBlocks["ID"]] = "[" . $arIBlocks["ID"] . "] " . $arIBlocks["NAME"] . " (" . $arIBlocks["ELEMENT_CNT"] . ")";
}

//формирование массива параметров
$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "IBLOCK_ID"   =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Инфоблок",
            "TYPE"      =>  "LIST",
            "VALUES"    =>  $iblocks,
            "MULTIPLE"  =>  "N",
            "ADDITIONAL_VALUES" =>  "N"
        ),
    ),
);
?>