<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//$this->setFrameMode(true);
//Helpers::dump($arResult);
?>
<h1><?=$arResult["NAME"]?></h1>
<div class="post_date_2">
    <span>
        <?=Helpers::formatBDate($arResult["DATE_CREATE"])?>
    </span>
    <span class="views">
        <?$frame = $this->createFrame()->begin();?>
        &#128584; <?=$arResult["PROPERTIES"]["BLOG_VIEW"]["VALUE"]?>
        <?$frame->beginStub();?>
        &#128584;??&infin;
        <?$frame->end();?>
    </span>
</div>
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
<div class="tag">
    <?
    $tags = explode(', ', $arResult["PROPERTIES"]["BLOG_TAGS"]["VALUE"]);

    $GLOBALS['BLOG_TAGS'] = $tags;  //  Типичный Битрикс, никак по-другому не передать параметры
    $GLOBALS['BLOG_ID'] = $arResult['ID'];  //  Типичный Битрикс2, передаем ID текущего элеента

    foreach ($tags as $tag):?>
        <noindex>
            <a href='/search/?q=<?=$tag?>' rel="nofollow"><?=$tag?></a>
        </noindex>
    <?endforeach?>
</div>