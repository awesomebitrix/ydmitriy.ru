<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule('iblock')) {
    ShowMessage('Модуль IBLOCK не установлен');
    return false;
}

$dbIBlocks = CIBlock::GetList(
    array(
        'id'
    ),
    array(
        'ACTIVE'    =>  'Y',
    ),
    false
);
while ($arIBlocks = $dbIBlocks->Fetch()) {
    $iblocks[$arIBlocks['ID']] = $arIBlocks['NAME'];
}

$arTemplateParameters = array(
    "BLOG_IBLOCK"   =>  array(
        "NAME"      =>  "Инфоблок статей",
        "TYPE"      =>  "LIST",
        'VALUES'    =>  $iblocks,
        'MULTIPLE'  =>  'N',
    ),
    'WORK_IBLOCK'   =>  array(
        'NAME'      =>  'Инфоблок портфолио',
        'TYPE'      =>  'LIST',
        'VALUES'    =>  $iblocks,
        'MULTIPLE'  =>  'N',
    ),
);