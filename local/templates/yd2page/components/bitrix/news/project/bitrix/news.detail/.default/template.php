<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//dump($arResult);
?>
    <h1><?=$arResult["NAME"]?></h1>
    <p class="post_date_2">
        <?=formatBDate($arResult["DATE_CREATE"])?>
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
                data-original="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        <?endif?>
        <h3>Описание:</h3>
        <?=$arResult["DETAIL_TEXT"]?>
    </div>

    <div class="git">

        <h3>Присоединиться:</h3>

        <?if (!empty($arResult['PROPERTIES']['PROJECT_PACKAGIST']['VALUE'])):?>
            <p>
                <a href="<?=$arResult['PROPERTIES']['PROJECT_PACKAGIST']['VALUE']?>" target="_blank">Packagist</a>
            </p>
        <?endif?>
        <?if (!empty($arResult['PROPERTIES']['PROJECT_GITHUB']['VALUE'])):?>
            <p>
                <a href="<?=$arResult['PROPERTIES']['PROJECT_GITHUB']['VALUE']?>" target="_blank">GitHub</a>
            </p>
        <?endif?>
        <?if (!empty($arResult['PROPERTIES']['PROJECT_BITBUCKET']['VALUE'])):?>
            <p>
                <a href="<?=$arResult['PROPERTIES']['PROJECT_BITBUCKET']['VALUE']?>" target="_blank">GitHub</a>
            </p>
        <?endif?>

    </div>