<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//  Проверяем наличия нужного условия
if (!empty($arResult['PROPERTIES']['PORTFOLIO_PREVIOUS']['VALUE'])) {
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
            'PREVIEW_PICTURE',
        )
    );
    if ($arPrevPortfolio = $dbPrevPortfolio->GetNext()) {
        //  Записываем найденный элемент в arResult
        $arResult['PREVIOUS_PORTFOLIO'] = $arPrevPortfolio;
        //  Получаем файл изображения
        $arResult['PREVIOUS_PORTFOLIO']['PREVIEW_PICTURE'] = CFile::ShowImage($arPrevPortfolio['PREVIEW_PICTURE'], 250, 500);
    }
}