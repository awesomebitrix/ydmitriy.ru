<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<ul>
    <?foreach ($arResult["ITEMS"] as $item):?>
        <li><?=$item["NAME"]?></li>
    <?endforeach?>
</ul>