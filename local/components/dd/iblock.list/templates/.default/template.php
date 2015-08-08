<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
dump($arResult)
?>


<?foreach ($arResult["SECTIONS"] as $section):?>
   <h2><?=$section["NAME"]?></h2>
    <ul>
        <?foreach ($arResult["ITEMS"] as $item):?>
            <?if ($section["ID"] == $item["IBLOCK_SECTION_ID"]):?>
                <li><?=$item["NAME"]?></li>
            <?endif?>
        <?endforeach?>
    </ul>
<?endforeach?>

