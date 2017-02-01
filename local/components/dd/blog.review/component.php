<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

if (!CModule::IncludeModule('iblock')) {
    ShowMessage('Модуль iblock не установлен');
    return false;
}

$ID = trim(htmlspecialchars($_GET['ID']));

//  Данные для детальной страницы
$dbElement = CIBlockElement::GetList(
    array(
        'ID'    =>  'DESC',
    ),
    array(
        'IBLOCK_ID' =>  $arParams['IBLOCK_ID'],
        'ACTIVE'    =>  'N',
    ),
    false,
    false,
    array_merge($arFields, $arParams['PARAMS'])
);

if ($arElement = $dbElement->GetNextElement()) {
    $arResult = $arElement->GetFields();
    $arResult['PROPERTIES'] = $arElement->GetProperties();
} else {
    ShowMessage('Черновик не найден');
    return false;
}

//  Подключение шаблона
$this->IncludeComponentTemplate();