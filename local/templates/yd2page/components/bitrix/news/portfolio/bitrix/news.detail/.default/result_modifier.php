<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//  Проверяем наличия нужного условия
if ($arResult['PROPERTIES']['PORTFOLIO_PREVIOUS']['VALUE'] != '') {
    //  Получаем фото и ссылку на предыдущую работу
    $dbPrevPortfolio = CIBlockElement::GetList(
        false,
        array(
            'IBLOCK_ID' =>  $arResult['PROPERTIES']['PORTFOLIO_PREVIOUS']['IBLOCK_ID'],
            'ID'        =>  $arResult['PROPERTIES']['PORTFOLIO_PREVIOUS']['VALUE'],
        ),
        false,
        false,
        array(
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
        )
    );
    if ($arPrevPortfolio = $dbPrevPortfolio->GetNext()) {
        //  Записываем найденный элемент в arResult
        $arResult['PREVIOUS_PORTFOLIO'] = $arPrevPortfolio;
    }
}