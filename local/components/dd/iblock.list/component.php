<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule("iblock")) {
    ShowMessage("Модуль iblock не установлен");
    return false;
}

$cacheTime = (intval($arParams['CACHE_TIME'])) ? $arParams['CACHE_TIME'] : 0;

//  Проверка существования кэша
if ($this->StartResultCache($cacheTime))
{
    //  Получение списка элементов
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
        array(
            'nPageSize' => $arParams['ITEM_COUNT'],
        ),
        false
    );

    $arResult['NAV_STRING'] = $dbElement->GetPageNavString();

    while ($arElement = $dbElement->GetNext())
    {
        //  Получение путей для кнопок эрмитажа
        $arButtons = CIBlock::GetPanelButtons(
            $arParams["IBLOCK_ID"],
            $arElement["ID"],
            0,
            array("SECTION_BUTTONS"=>false, "SESSID"=>false)
        );
        $arElement["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arElement["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

        //  Запись элементов в $arResult
        $arResult['ITEMS'][] = $arElement;
    }

    //  Установка ключей кэширования
    $this->setResultCacheKeys(array(
        'ITEMS',
        'NAV_STRING',
    ));

    //  Если элементы отсутствуют, сбрасываем кэш
    if (count($arResult['ITEMS']) == 0)
        $this->AbortResultCache();

    $this->IncludeComponentTemplate();
}

?>