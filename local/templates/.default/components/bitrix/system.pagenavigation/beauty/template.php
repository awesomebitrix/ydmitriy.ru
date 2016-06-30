<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
//$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$this->createFrame()->begin("Загрузка навигации");
?>
<?if($arResult["NavPageCount"] > 1):?>
    <div id="pages">
        <?if ($arResult["NavPageNomer"]-1 >= $arResult["nStartPage"]):?>
            <?
                $minus = $arResult["NavPageNomer"]-1;
                $url_new = $arResult["sUrlPathParams"] . "PAGEN_1=" . $minus;
            ?>
            <a class="older pages_item" href="<?=$url_new?>">Новее</a>
        <?else:?>
            <span class="newer pages_item">Новее</span>
        <?endif?>

        <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
            <?
                $plus = $arResult["NavPageNomer"]+1;
                $url_old = $arResult["sUrlPathParams"] . "PAGEN_1=" . $plus
            ?>
            <a class="older pages_item" href="<?=$url_old?>">Старше</a>
        <?else:?>
            <span class="newer pages_item">Старше</span>
        <?endif?>
    </div>
<?endif?>