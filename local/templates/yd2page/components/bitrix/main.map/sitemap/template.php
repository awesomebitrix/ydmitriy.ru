<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;

//dump($arResult);
?>

<ul class="sitemap">
    <?foreach ($arResult['arMap'] as $item):?>
        <li><a href="<?=$item['FULL_PATH']?>"><?=$item['NAME']?></a></li>

        <?if ($item['FULL_PATH'] == '/blog/'):?>
            <ul>
                <?foreach ($arResult['BLOG'] as $itemBlog):?>
                    <li><a href="<?=$itemBlog['DETAIL_PAGE_URL']?>"><?=$itemBlog['NAME']?></a></li>
                <?endforeach?>
            </ul>
        <?endif?>

        <?if ($item['FULL_PATH'] == '/portfolio/'):?>
            <ul>
                <?foreach ($arResult['WORKS'] as $itemWork):?>
                    <li><a href="<?=$itemWork['DETAIL_PAGE_URL']?>"><?=$itemWork['NAME']?></a></li>
                <?endforeach?>
            </ul>
        <?endif?>

    <?endforeach?>
</ul>