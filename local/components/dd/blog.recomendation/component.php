<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

if (!CModule::IncludeModule('iblock')) {
    ShowMessage('Модуль iblock не установлен');
    return false;
}

//  Преобразование параметров
if ($arParams['ELEMENTS_COUNT'] < 1)
    $arParams['ELEMENTS_COUNT'] = 3;

//      Собираем поиск
//  Поля из настроек
$arSubFilter = array(
    'LOGIC' =>  'OR',
);
foreach ($arParams['SEARCH'] as $search) {

    //  Bitrix грешит пустыми полями в списках в параметрах компонента
    if (!empty($search)) {

        $arTempFilter = array(
            'LOGIC' =>  'OR',
        );

        foreach ($arParams['PARAMS'] as $param) {

            //  Bitrix грешит пустыми полями в списках в параметрах компонента
            if (!empty($param)) {

                $arTempFilter['?'.$param] = $search;

            }
        }

        $arSubFilter[] = $arTempFilter;

    }

}
//  Стандартные поля
$arFilter = array(
    'IBLOCK_ID' =>  $arParams['IBLOCK_ID'],
    'ACTIVE'    =>  'Y',
    $arSubFilter,
);

//  Поля выборки
if (count($arParams['FIELDS']) > 0) {
    $arSelect = array_merge($arParams['FIELDS'], $arParams['PARAMS']);
} else {
    $arSelect = array(
        'ID',
        'NAME',
        'DETAIL_PAGE_URL',
        'PREVIEW_IMAGE',
    );
    $arSelect = array_merge($arSelect, $arParams['PARAMS']);
}


$arSelect = array_merge($arSelect, $arParams['PARAMS']);

//  Поиск
$CIBElement = new CIBlockElement;
$dbElements = $CIBElement->GetList(
    array(
        'RAND'  =>  'ASC',
    ),
    $arFilter,
    false,
    array(
        'nTopCount' =>  $arParams['ELEMENTS_COUNT'],
    ),
    $arSelect
);
while ($arElement = $dbElements->GetNext()) {
    $arResult['ITEMS'][] = $arElement;
}

//  Подключение шаблона
$this->IncludeComponentTemplate();