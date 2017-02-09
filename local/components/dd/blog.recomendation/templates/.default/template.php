<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
//Helpers::dump($arResult);
?>

<?foreach ($arResult['ITEMS'] as $item):?>

    <div class="recomendation">

        <a href="<?=$item['DETAIL_PAGE_URL']?>">
            <?=CFile::ShowImage($item['PREVIEW_PICTURE'], 300,200)?>
            <?=$item['NAME']?>
        </a>

    </div>

<?endforeach?>

