<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div id="text" itemscope itemtype="http://schema.org/Person" style="">
    <div style="display: none">
        <h1 itemprop="name">Языков Дмитрий</h1>
    </div>
    <noindex>
        <h2>Контактная информация</h2>
    </noindex>
    <b>Телефон: </b><span itemprop="telephone">+7 (951) 069-52-39 </span><br>
    <b>Email: </b><span itemprop="email"><a href="mailto:work@ydmitriy.ru">work@ydmitriy.ru</a></span><br>
    <b>Skype: </b><a href='skype:d1mas91'>d1mas91</a><br>
    <b>GitHub: </b><a href="http://github.com/d1mas91">github.com/d1mas91</a><br>
    <b>ВКонтакте: </b><a href="http://vk.com/d1mas91">vk.com/d1mas91</a><br>
</div>
<noindex>
    <div>
        <?$APPLICATION->IncludeComponent(
            "dd:feedback.add",
            ".default",
            array(
                "IBLOCK_TYPE" => "feedback",
                "IBLOCK_ID" => "7",
                "PAGE_PROPERTY" => "FILE"
            ),
            false
        );?>
    </div>
</noindex>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
