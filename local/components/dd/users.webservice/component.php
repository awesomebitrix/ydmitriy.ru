<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("webservice") || !CModule::IncludeModule("iblock"))
    return;

// наш новый класс наследуется от базового IWebService
class CUserExchange extends IWebService
{
    //  Функция проверяет корректность полей, возращает массив некоректных полей в случае провела
    public function checkFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID)
    {
        $errorsExist = false;
        $errorString = "";

        //  Проверка данных
        if (strlen($UF_LAST_NAME) < 1)
        {
            $errorsExist = true;
            $errorString[] = "LAST_NAME";
        }
        if (strlen($UF_NAME) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_NAME";
        }
        if (strlen($LAST_NAME) < 1)
        {
            $errorsExist = true;
            $errorString[] = "LAST_NAME";
        }
        if (strlen($NAME) < 1)
        {
            $errorsExist = true;
            $errorString[] = "NAME";
        }
        if (strlen($LOGIN) < 8)
        {
            $errorsExist = true;
            $errorString[] = "LOGIN";
        }
        if (strlen($EMAIL) < 1)
        {
            $errorsExist = true;
            $errorString[] = "EMAIL";
        }
        if (strlen($WORK_POSITION) < 1)
        {
            $errorsExist = true;
            $errorString[] = "WORK_POSITION";
        }
        if (strlen($UF_WORK_POSITION) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_WORK_POSITION";
        }
        if (strlen($UF_CENTRE_RU) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_CENTRE_RU";
        }
        if (strlen($UF_CENTRE_US) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_CENTRE_US";
        }
        if (strlen($WORK_PHONE) < 1)
        {

        }
        if (strlen($UF_MOBILE) < 1)
        {

        }
        if (strlen($PERSONAL_CITY) < 1)
        {
            $errorsExist = true;
            $errorString[] = "PERSONAL_CITY";
        }
        if (strlen($UF_DEPARTMENT) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_DEPARTMENT";
        }
        if (strlen($ACTIVE) < 1)
        {
            $errorsExist = true;
            $errorString[] = "ACTIVE";
        }
        if (strlen($UF_GUID) < 1)
        {
            $errorsExist = true;
            $errorString[] = "UF_GUID";
        }

        if ($errorsExist == false)
        {
            return array(
                "RETURN"    =>  array(),
                "ERROR"     =>  false
            );
        } else {
            return array(
                "RETURN"    =>  $errorString,
                "ERROR"     =>  true
            );
        }
    }

    //  Функция формирует корректный массив $arFields для добавления/изменения пользователя
    public function getFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID)
    {
        //  Cервер авторизации
        $ADCode = "LDAP#1";

        //  Махинации с группами
        $GROUP_ID = explode(",", $GROUP_ID);

        //  Если в списке прав присутствует группа 0, заменяем на 11 и переписываем город
        $idDelIndex = array_search("0", $GROUP_ID);

        if ($idDelIndex !== FALSE)
        {
            $PERSONAL_CITY = "ALL";
            $GROUP_ID[$idDelIndex] = "11";
        }

        //  Присвоение групп по городам
        $msk_gr = 39;
        $vvk_gr = 40;
        $ebg_gr = 41;
        $chy_gr = 42;
        $all_gr = 43;
        switch ($PERSONAL_CITY) {
            case "MSK": $GROUP_ID[] = $msk_gr; $UF_DEPARTMENT = explode(',', "333"); break;
            case "VVK": $GROUP_ID[] = $vvk_gr; $UF_DEPARTMENT = explode(',', "334");break;
            case "EBG": $GROUP_ID[] = $ebg_gr; $UF_DEPARTMENT = explode(',', "332");break;
            case "CNY": $GROUP_ID[] = $chy_gr; $UF_DEPARTMENT = explode(',', "331");break;
            case "ALL": $GROUP_ID[] = $all_gr; $UF_DEPARTMENT = array("333", "334", "332", "331");break;
        }

        $arFields = array(
            "UF_LAST_NAME"  =>  $UF_LAST_NAME,
            "UF_NAME"       =>  $UF_NAME,
            "LAST_NAME"     =>  $LAST_NAME,
            "NAME"          =>  $NAME,
            "LOGIN"         =>  $LOGIN,
            "EMAIL"         =>  $EMAIL,
            "WORK_POSITION" =>  $WORK_POSITION,
            "UF_WORK_POSITION"  =>  $UF_WORK_POSITION,
            "UF_CENTRE_RU"  =>  $UF_CENTRE_RU,
            "UF_CENTRE_US"  =>  $UF_CENTRE_US,
            "WORK_PHONE"    =>  $WORK_PHONE,
            "PERSONAL_MOBILE"   =>  $UF_MOBILE,
            "PERSONAL_CITY" =>  $PERSONAL_CITY,
            "UF_DEPARTMENT" =>  explode(",", $UF_DEPARTMENT),
            "ACTIVE"        =>  $ACTIVE,
            "GROUP_ID"      =>  $GROUP_ID,
            "UF_GUID"       =>  $UF_GUID,
            "PASSWORD"      =>  $LOGIN,
            "CONFIRM_PASSWORD"  =>  $LOGIN,
            "EXTERNAL_AUTH_ID"  =>  $ADCode
        );
        return $arFields;
    }

    function CheckStatus()
    {
        return array(
            "RETURN"    =>  "Веб-сервис доступен",
            "ERROR"     =>  "false"
        );
    }

    //  Метод производит сравнения данных пользователя на портале и в DFS
    function CheckUser($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID)
    {
        //  Получение данных пользователя
        $arParams["SELECT"] = array(
            "UF_GUID",
            "ID"
        );
        $dbUser = CUser::GetList(
            ($by="id"),
            ($order="asc"),
            array(
                "UF_GUID"   =>  $UF_GUID
            ),
            $arParams
        );
        if ($arUser = $dbUser->Fetch())
        {
            $userData = $arUser;
        } else {
            return array(
                "RETURN"    =>  "Пользователь с guid " . $UF_GUID . " не найден",
                "ERROR"     =>  "true"
            );
        }

        //  Сравнение текущих и полученных данных
        $errorsExist = false;   //  Флаг наличия ошибок
        $errorString = "Не совпадают поля: ";    //  Сущности ошибок

        if ($userData["UF_LAST_NAME"] != $UF_LAST_NAME)
        {
            $errorsExist = true;
            $errorString .= "LAST_NAME, ";
        }
        if ($userData["UF_NAME"] != $UF_NAME)
        {
            $errorsExist = true;
            $errorString .= "UF_NAME, ";
        }
        if ($userData["LAST_NAME"] != $LAST_NAME)
        {
            $errorsExist = true;
            $errorString .= "LAST_NAME, ";
        }
        if ($userData["NAME"] != $NAME)
        {
            $errorsExist = true;
            $errorString .= "NAME, ";
        }
        if ($userData["LOGIN"] != $LOGIN)
        {
            $errorsExist = true;
            $errorString .= "LOGIN, ";
        }
        if ($userData["EMAIL"] != $EMAIL)
        {
            $errorsExist = true;
            $errorString .= "EMAIL, ";
        }
        if ($userData["WORK_POSITION"] != $WORK_POSITION)
        {
            $errorsExist = true;
            $errorString .= "WORK_POSITION, ";
        }
        if ($userData["UF_WORK_POSITION"] != $UF_WORK_POSITION)
        {
            $errorsExist = true;
            $errorString .= "UF_WORK_POSITION, ";
        }
        if ($userData["UF_CENTRE_RU"] != $UF_CENTRE_RU)
        {
            $errorsExist = true;
            $errorString .= "UF_CENTRE_RU, ";
        }
        if ($userData["UF_CENTRE_US"] != $UF_CENTRE_US)
        {
            $errorsExist = true;
            $errorString .= "UF_CENTRE_US, ";
        }
        if ($userData["WORK_PHONE"] != $WORK_PHONE)
        {
            $errorsExist = true;
            $errorString .= "WORK_PHONE, ";
        }
        if ($userData["UF_MOBILE"] != $UF_MOBILE)
        {
            $errorsExist = true;
            $errorString .= "UF_MOBILE, ";
        }
        if ($userData["PERSONAL_CITY"] != $PERSONAL_CITY)
        {
            $errorsExist = true;
            $errorString .= "PERSONAL_CITY, ";
        }
        if ($userData["UF_DEPARTMENT"] != $UF_DEPARTMENT)
        {
            $errorsExist = true;
            $errorString .= "UF_DEPARTMENT, ";
        }
        if ($userData["ACTIVE"] != $ACTIVE)
        {
            $errorsExist = true;
            $errorString .= "ACTIVE, ";
        }

        //  Просто убираем запятую и пробел в конце
        $errorString = substr($errorString, 0, -2);

        //  Возвращает список несовпадающих полей
        return  array(
            "RETURN"    =>  ($errorsExist == false) ? "Проверка не выявила ошибок" : $errorString,
            "ERROR"     =>  $errorsExist
        );
    }

    //  Метод добавляет пользователя
    function AddUser($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID)
    {
        //  Вызов функции проверки вводимых данных
        $errors = CUserExchange::checkFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID);
        //  Если ошибки есть, пользователь добавлен не будет
        if ($errors["ERROR"] == true)
        {
            return array(
                "RETURN"    =>  "Некорректно введены или не переданы поля: " . implode(", ", $errors["RETURN"]),
                "ERROR"     =>  "true"
            );
        }

        //  Проверка существования пользователя с указанным GUID
        $arParams["SELECT"] = array(
            "UF_GUID",
            "ID"
        );
        $dbUser = CUser::GetList(
            ($by = "id"),
            ($order = "asc"),
            array(
                "UF_GUID"   =>  $UF_GUID
            ),
            $arParams
        );
        if ($arUser = $dbUser->Fetch())
        {
            return array(
                "RETURN"    =>  "Пользователь с GUID: " . $UF_GUID . " уже существует",
                "ERROR"     =>  "true"
            );
        }

        //  Добавление пользователя
        $newUser = new CUser();

        //  Формируем массив пользовательских полей
        $arFields = CUserExchange::getFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID);

        $ID = $newUser->Add($arFields);
        if (intval($ID) > 0)
        {
            return  array(
                "RETURN"    =>  "Добавление пользователя GUID: " . $UF_GUID . " выполнено успешно",
                "ERROR"     =>  "false"
            );
        } else {
            return  array(
                "RETURN"    =>  "Ошибка при добавлении пользователя GUID: " . $UF_GUID . " " . $newUser->LAST_ERROR,
                "ERROR"     =>  "false"
            );
        }
    }

    //  Метод изменяет пользователя
    function EditUser($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID)
    {
        //  Проверка корректности введенных данных
        $errors = CUserExchange::checkFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID);
        //  Если ошибки есть, пользователь добавлен не будет
        if ($errors["ERROR"] == true)
        {
            return array(
                "RETURN"    =>  "Некорректно введены или не переданы поля: " . implode(", ", $errors["RETURN"]),
                "ERROR"     =>  "true"
            );
        }

        //  Проверка существаования пользователя с указанным GUID
        $arParams["SELECT"] = array(
            "UF_GUID",
            "ID"
        );
        $dbUser = CUser::GetList(
            ($by = "id"),
            ($order = "asc"),
            array(
                "UF_GUID"   =>  $UF_GUID
            ),
            $arParams
        );
        if ($arUser = $dbUser->GetNext())
        {
            $userID = $arUser["ID"];
        } else {
            //  Пользователь не найден, изменять нечего, возвращаем ошибку
            return  array(
                "RETURN"    =>  "Пользователь " . $UF_GUID . " не найден, изменение не произведено",
                "ERROR"     =>  "true"
            );
        }

        $arFields = CUserExchange::getFields($UF_LAST_NAME, $UF_NAME, $LAST_NAME, $NAME, $LOGIN, $EMAIL, $WORK_POSITION, $UF_WORK_POSITION, $UF_CENTRE_RU, $UF_CENTRE_US, $WORK_PHONE, $UF_MOBILE, $PERSONAL_CITY, $UF_DEPARTMENT, $ACTIVE, $GROUP_ID, $UF_GUID);

        $editUser = new CUser();

        if ($editUser->Update($userID, $arFields) == true)
        {
            return  array(
                "RETURN"    =>  "Пользователь " . $UF_GUID . " успешно изменен",
                "ERROR"     =>  "false"
            );
        } else {
            return  array(
                "RETURN"    =>  "Ошибка изменения порльзователя GUID:" . $UF_GUID . " " . $editUser->LAST_ERROR,
                "ERROR"     =>  "true"
            );
        }
    }

    //  Метод удаляет пользователя
    function DeleteUser($UF_GUID)
    {
        if (count($UF_GUID) < 16)
        {
            return array(
                "RETURN"    =>  "Ошибка, обязательное поле GUID не заполнено или заполнено некорректно",
                "ERROR"    =>  "true"
            );
        }

        //  Получение ID пользователя с текущим UF_GUID
        $arParams["SELECT"] = array(
            "UF_GUID",
            "ID"
        );
        $dbUser = CUser::GetList(
            ($by = "id"),
            ($order = "asc"),
            array(
                "UF_GUID"   =>  $UF_GUID
            ),
            $arParams
        );
        if ($arUser = $dbUser->Fetch())
        {
            $userID = $arUser["ID"];
        }

        if (is_numeric($userID))
        {
            if (CUser::Delete($userID))
            {
                return array(
                    "RETURN"    =>  "Удаление пользователя " . $UF_GUID . " выполнено успешно",
                    "ERROR"    =>  "false"
                );
            }
        }

        return array(
            "RETURN"    =>  "Ошибка при удаление пользователя " . $UF_GUID,
            "ERROR"    =>  "true"
        );
    }

    // Метод GetWebServiceDesc возвращает описание сервиса и его методов
    function GetWebServiceDesc()
    {
        $wsdesc = new CWebServiceDesc();
        $wsdesc->wsname = "dd.users.webservice";
        $wsdesc->wsclassname = "CUserExchange";
        $wsdesc->wsdlauto = true;
        $wsdesc->wsendpoint = CWebService::GetDefaultEndpoint();
        $wsdesc->wstargetns = CWebService::GetDefaultTargetNS();

        $wsdesc->classTypes = array();
        $wsdesc->structTypes = Array(
            "UserData"  =>  array(
                "UF_LAST_NAME"      =>  array("varType" =>  "string"),                      //  Фамилия на русском языке
                "UF_NAME"           =>  array("varType" =>  "string"),                      //  Имя на русском
                "LAST_NAME"         =>  array("varType" =>  "string"),                      //  Фамилия на английском
                "NAME"              =>  array("varType" =>  "string"),                      //  Имя на английском
                "LOGIN"             =>  array("varType" =>  "string"),                      //  CDSID
                "EMAIL"             =>  array("varType" =>  "string"),                      //  Почта
                "WORK_POSITION"     =>  array("varType" =>  "string"),                      //  Должность на русском
                "UF_WORK_POSITION"  =>  array("varType" =>  "string"),                      //  Должность на английском
                "UF_CENTRE_RU"      =>  array("varType" =>  "string"),                      //  Отдел на русском
                "UF_CENTRE_US"      =>  array("varType" =>  "string"),                      //  Отдел на английском
                "WORK_PHONE"        =>  array("varType" =>  "string", "strict" => "no"),    //  Рабочий телефон
                "UF_MOBILE"         =>  array("varType" =>  "string", "strict" => "no"),    //  Номер мобильного телефона
                "PERSONAL_CITY"     =>  array("varType" =>  "string"),                      //  Город местоположения (EBG, CNY, VVK, MSK, ALL)
                "UF_DEPARTMENT"     =>  array("varType" =>  "integer"),                     //  Департамент (140)
                "ACTIVE"            =>  array("varType" =>  "string"),                      //  Активность (Y/N)
                "GROUP_ID"          =>  array("varType" =>  "string"),                      //  Список групп
                "UF_GUID"           =>  array("varType" =>  "string"),                      //  Код пользователя
            )
        );

        $wsdesc->classes = array(
            "CUserExchange" => array(
                "CheckStatus" => array(
                    "type"      =>  "public",
                    "input"     =>  array(
                    ),
                    "output"    =>  array(
                        "RETURN"    =>  array("varType" => "string"),
                        "ERROR"     =>  array("varType" => "string", "strict" => "no")
                    ),
                ),
                "DeleteUser"    =>  array(
                    "type"  =>  "public",
                    "input" =>  array(
                        "UF_GUID"   =>  array("varType" => "string")
                    ),
                    "output"    =>  array(
                        "RETURN"    =>  array("varType" => "string"),
                        "ERROR"     =>  array("varType" => "string", "strict" => "no")
                    )
                ),
                "AddUser"   =>  array(
                    "type"  =>  "public",
                    "input" =>  array(
                        "DATA"  =>  array("varType" =>  "UserData")
                    ),
                    "output"    =>  array(
                        "RETURN"    =>  array("varType" => "string"),
                        "ERROR"     =>  array("varType" => "string", "strict" => "no")
                    )
                ),
                "EditUser"   =>  array(
                    "type"  =>  "public",
                    "input" =>  array(
                        "DATA"  =>  array("varType" =>  "UserData")
                    ),
                    "output"    =>  array(
                        "RETURN"    =>  array("varType" => "string"),
                        "ERROR"     =>  array("varType" => "string", "strict" => "no")
                    )
                ),
                "CheckUser"   =>  array(
                    "type"  =>  "public",
                    "input" =>  array(
                        "DATA"  =>  array("varType" =>  "UserData")
                    ),
                    "output"    =>  array(
                        "RETURN"    =>  array("varType" => "string"),
                        "ERROR"     =>  array("varType" => "string", "strict" => "no")
                    )
                )
            )
        );

        return $wsdesc;
    }
}

$arParams["WEBSERVICE_NAME"] = "dd.users.webservice";
$arParams["WEBSERVICE_CLASS"] = "CUserExchange";
$arParams["WEBSERVICE_MODULE"] = "";

// передаем в компонент описание веб-сервиса
$APPLICATION->IncludeComponent(
    "bitrix:webservice.server",
    "",
    $arParams
);

die();
?>