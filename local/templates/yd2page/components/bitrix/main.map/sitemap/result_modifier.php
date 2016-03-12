<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
    if (!CModule::IncludeModule('iblock')) {
        ShowMessage('Модуль IBLOCK не установлен');
        return false;
    }

    //  Получаем элементы блога
    $dbBlog = CIBlockElement::GetList(
        array(
            'SORT'  =>  'DESC',
            'ID'    =>  'DESC'
        ),
        array(
            'IBLOCK_ID' =>  $arParams['BLOG_IBLOCK'],
            'ACTIVE'    =>  'Y',
        ),
        false,
        false,
        array(
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
        )
    );
    while ($arBlog = $dbBlog->GetNext()) {
        $arResult['BLOG'][] = $arBlog;
    }

    //  Получаем элементы портфолио
    $dbWorks = CIBlockElement::GetList(
        array(
            'SORT'  =>  'DESC',
            'ID'    =>  'DESC',
        ),
        array(
            'IBLOCK_ID' =>  $arParams['WORK_IBLOCK'],
            'ACTIVE'    =>  'Y',
        ),
        false,
        false,
        array(
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
        )
    );
    while ($arWorks = $dbWorks->GetNext()) {
        $arResult['WORKS'][] = $arWorks;
    }
?>