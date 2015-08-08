<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//  Считаем количество просмотров
global $APPLICATION;
global $USER;

//  Не будем считать посещения администратора
if (!$USER->IsAdmin())
{
    $ID = $arResult["ID"];
    $blog = 0;

    //  Получаем текущие начения
    $dbBlog = CIBlockElement::GetList(
        false,
        array(
            "IBLOCK_ID" =>  $arParams["IBLOCK_ID"],
            "ID"        =>  $ID
        ),
        false,
        false,
        array(
            "ID",
            "NAME",
            "PROPERTY_BLOG_VIEW",
        ));
    if ($arBlog = $dbBlog->GetNext())
        $count = ($arBlog["PROPERTY_BLOG_VIEW_VALUE"] != "") ? $arBlog["PROPERTY_BLOG_VIEW_VALUE"] : 0;

    //  Записываем новые значения
    CIBlockElement::SetPropertyValuesEx($ID, $arParams["IBLOCK_ID"], array("BLOG_VIEW"=>++$count));
}
?>