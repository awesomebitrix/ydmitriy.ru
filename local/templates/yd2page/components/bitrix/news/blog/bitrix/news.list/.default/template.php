<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//dump($arResult);
?>

    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
    <div class="topic">
        <h1 class="post_title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h1>
        <p class="post_date_2"><?=formatBDate($arItem["DATE_CREATE"])?></p>
        <?=CFile::ShowImage($arItem["PREVIEW_PICTURE"], 0, 0, "style='margin: 0.5rem 1rem 1rem 0; float: left;'")?>
        <div class="preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
        <div style="clear: both"></div>
    </div>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>