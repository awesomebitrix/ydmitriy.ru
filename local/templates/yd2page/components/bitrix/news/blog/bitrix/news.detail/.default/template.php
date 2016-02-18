<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//$this->setFrameMode(true);
//dump($arResult);
?>
    <h1 class="post_title"><?=$arResult["NAME"]?></h1>
    <p class="post_date_2">
        <?=formatBDate($arResult["DATE_CREATE"])?>
        <font style="float: right">
            <?$frame = $this->createFrame()->begin();?>
                <i class="fa fa-eye"></i> <?=$arResult["PROPERTIES"]["BLOG_VIEW"]["VALUE"]?>
            <?$frame->beginStub();?>
            <i class="fa fa-eye"></i> ???
            <?$frame->end();?>
        </font>
    </p>
    <div id="text">
        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
            <?
                //  Вызываем механизм отложенных функций для помещения изображения в шапку сайта
                $image = (isset($arResult["PREVIEW_PICTURE"]["SRC"])) ? 'http://ydmitriy.ru' . $arResult["PREVIEW_PICTURE"]["SRC"] : 'http://ydmitriy.ru/img/webdev.png';
                $APPLICATION->AddViewContent('head_image', $image);

            ?>
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
    <?=$arResult["PROPERTIES"]["BLOG_TAGS"]["VALUE"]?>
</div>