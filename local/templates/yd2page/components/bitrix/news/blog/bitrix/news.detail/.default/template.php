<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//$this->setFrameMode(true);
//Helpers::dump($arResult);
?>
    <h1><?=$arResult["NAME"]?></h1>
    <p class="post_date_2">
        <?=Helpers::formatBDate($arResult["DATE_CREATE"])?>
        <font style="float: right; font-family:u1f400;">
            <?$frame = $this->createFrame()->begin();?>
            &#128584; <?=$arResult["PROPERTIES"]["BLOG_VIEW"]["VALUE"]?>
            <?$frame->beginStub();?>
            &#128584;??&infin;
            <?$frame->end();?>
        </font>
    </p>
    <div id="text">
        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
            <img
                class="detail_picture"
                border="0"
                data-original="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        <?endif?>
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
<div class="tag">
    <?
    $tags = explode(', ', $arResult["PROPERTIES"]["BLOG_TAGS"]["VALUE"]);

    foreach ($tags as $tag) {
        echo "<a href='/search/?q={$tag}'>{$tag}</a>";
    }
    ?>
</div>