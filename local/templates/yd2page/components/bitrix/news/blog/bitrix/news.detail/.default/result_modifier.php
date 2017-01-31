<?php

//  Вызываем механизм отложенных функций для помещения изображения в шапку сайта
$image = (isset($arResult["PREVIEW_PICTURE"]["SRC"])) ? 'https://ydmitry.ru' . $arResult["PREVIEW_PICTURE"]["SRC"] : 'https://ydmitry.ru/img/webdev.png';
$arResult['OG_IMAGE'] = $image;
$this->__component->SetResultCacheKeys(array(
    'OG_IMAGE',
));