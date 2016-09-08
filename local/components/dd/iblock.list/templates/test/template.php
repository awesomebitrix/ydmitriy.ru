<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//dump($arResult);
?>


<?foreach ($arResult["ITEMS"] as $arItem):?>
    <div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <h2><?=$arItem['NAME']?></h2>
    </div>
<?endforeach?>

<?=$arResult['NAV_STRING']?>
