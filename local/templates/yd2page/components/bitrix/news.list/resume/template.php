<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//dump($arResult);
?>
<div>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="sert_block">
            <?//=$arItem["NAME"]?>
            <a href="<?=$arItem["DISPLAY_PROPERTIES"]["CERTIFICATE"]["FILE_VALUE"]["SRC"]?>">
                <img class='certificate' src="<?=$arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["FIELDS"]['DETAIL_PICTURE']['ALT']?>">
            </a>
        </div>
    <?endforeach;?>
</div>