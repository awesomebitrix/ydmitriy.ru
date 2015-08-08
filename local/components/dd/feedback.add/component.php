<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");

if (!CModule::IncludeModule("iblock"))
    {
        ShowError(GetMessage("IBLOCK_ERROR"));
        return false;
    }

    if (!$arParams["IBLOCK_ID"])
    {
        ShowError(GetMessage("IBLOCK_ID_ERROR"));
        return false;
    }

    //добаление нового элемента
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $text = trim(htmlspecialchars($_POST["text"]));
        $file = $_FILES["file"];
        $email = trim(htmlspecialchars($_POST["email"]));

        if (!strlen($_POST["captcha_word"]) > 0)
        {
            ShowError("Не введена CAPTCHA");
            return false;
        }

        $captcha = new CCaptcha();
        if (!$captcha -> CheckCode($_POST["captcha_word"], $_REQUEST["captcha_sid"]))
        {
            ShowError("Код с картинки введен неверно");
            return false;
        }

        $feedback = new CIBlockElement();

        $arLoadArray = array(
            "IBLOCK_ID"         =>  $arParams["IBLOCK_ID"],
            "ACTIVE"            =>  "Y",
            "MODIFIED_BY"       =>  $USER->GetID(),
            "NAME"              =>  $email,
            "PROPERTY_VALUES"   =>  array(
                $arParams["PAGE_PROPERTY"]  =>  $file
            ),
            "DETAIL_TEXT"       =>  $text,
        );

        if ($feedbackID = $feedback->Add($arLoadArray))
        {
            $arResult["MESSAGE"] = GetMessage("OK");
        } else {
            ShowError(GetMessage("ERROR"));
        }
    }

    $arResult["CAPTCHA"] = htmlspecialchars($APPLICATION->CaptchaGetCode());

    $this->IncludeComponentTemplate();
?>