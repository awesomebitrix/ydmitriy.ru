<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//dump($arResult);
?>
<h1><?=$arResult["NAME"]?></h1>

<div id="text">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <img
            class="detail_picture"
            border="0"
            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
            width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
            height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
            title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
    <?endif?>
    <?=$arResult["DETAIL_TEXT"]?>
</div>

<?if (count($arResult['PREVIOUS_PORTFOLIO']) > 0):?>
    <div class="previous_portfolio">
        <h3>
            Предыдущая версия:
        </h3>
        <div class="previous-preview">
            <a href="<?= $arResult['PREVIOUS_PORTFOLIO']['DETAIL_PAGE_URL'] ?>">
                <?=$arResult['PREVIOUS_PORTFOLIO']['PREVIEW_PICTURE']?>
            </a>
        </div>
    </div>
<?endif?>