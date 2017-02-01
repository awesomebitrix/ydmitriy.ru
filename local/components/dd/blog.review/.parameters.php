<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule('iblock')) {
    ShowMessage('Модуль iblock не установлен');
    return false;
}

$iblocks = array(); //  Массив инфоблоков для свойств

//  Список инфоблоков
$dbIBlock = CIBlock::GetList(
    array(
        'ID'  =>  'ASC',
    ),
    false,
    true
);
while ($arIBlock = $dbIBlock->Fetch()) {
    $iblocks[$arIBlock['ID']] = '[' . $arIBlock['ID'] . '] ' . $arIBlock['NAME'] . '(' . $arIBlock['ELEMENT_CNT'] . ')';
}

//  Список свойств
$dbProperties = CIBlockProperty::GetList(
    array(
        'SORT'  =>  'ASC',
        'NAME'  =>  'ASC',
    ),
    array(
        'IBLOCK_ID' =>  $arCurrentValues['IBLOCK_ID'],
        'ACTIVE'    =>  'Y',
    )
);
while ($arProperties = $dbProperties->Fetch()) {
    $properties['PROPERTY_'.$arProperties['CODE']] = $arProperties['NAME'];
}


//формирование массива параметров
$arComponentParameters = array(
    'GROUPS' => array(
    ),
    'PARAMETERS'    =>  array(
        'IBLOCK_ID'  =>  array(
            'PARENT'    =>  'BASE',
            'NAME'      =>  'Инфоблок записей',
            'TYPE'      =>  'LIST',
            'VALUES'    =>  $iblocks,
            'MULTIPLE'  =>  'N',
            'REFRESH'   =>  'Y',
        ),
        'PARAMS'    =>  array(
            'PARENT'    =>  'BASE',
            'NAME'      =>  'Список свойств',
            'TYPE'      =>  'LIST',
            'VALUES'    =>  $properties,
            'MULTIPLE'  =>  'Y',

        ),
    ),
);