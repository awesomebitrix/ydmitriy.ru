<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
    <?if (isset($arResult["MESSAGE"])):?>
        <div class="feedback">
            <?=$arResult["MESSAGE"]?>
        </div>
    <?endif?>
    <form method="POST" enctype="multipart/form-data" >
        <h2>Связаться со мной</h2>
        <table>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <input type="email" autocomplete="email" name="email" required="required" placeholder="Email"/>
                </td>
            </tr>
            <tr>
                <td>
                    Кратко:
                </td>
                <td>
                    <textarea type="text" name="text" cols="50" rows="10" required="required" placeholder="Расскажите"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Если есть что добавить:
                </td>
                <td>
                    <?=CFile::InputFile("file", 20, false, "/upload/feedback/")?>
                </td>
            </tr>
            <tr>
                <td>
                    Для моего спокойствия:
                </td>
                <td>
                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA"]?>"/>
                    <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA"]?>" alt="CAPTCHA" class="captcha"/>
                    <input type="text" name="captcha_word" maxlength="50" required="required"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Написать">
                </td>
            </tr>
        </table>
    </form>
