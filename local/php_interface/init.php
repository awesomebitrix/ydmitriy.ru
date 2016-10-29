<?
//  Вывод отформатированноего массива
function dump($array, $type=TRUE)
{
    global $USER;
    if (($USER->IsAdmin()) || ($type == TRUE))
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
//  Конвертация формата дат
function convertDate($string)
{
    if (isset($string))
    {
        $day = substr($string, 8,2);
        $month = substr($string, 5,2);
        $year = substr($string, 0,4);
        switch ($month){
            case "01": $month = "Янв"; break;
            case "02": $month = "Фев"; break;
            case "03": $month = "Мар"; break;
            case "04": $month = "Апр"; break;
            case "05": $month = "Май"; break;
            case "06": $month = "Июн"; break;
            case "07": $month = "Июл"; break;
            case "08": $month = "Авг"; break;
            case "09": $month = "Сен"; break;
            case "10": $month = "Окт"; break;
            case "11": $month = "Ноя"; break;
            case "12": $month = "Дек"; break;
        }
        return $day . " " . $month . " " . $year;
    }
}

//  Урезание строки по словам
function sub_word($string, $count)
{
    $result = implode(array_slice(explode('<br>',wordwrap($string,$count,'<br>',false)),0,1));
    if($result!=$string)
        $result .= "...";
    return $result;
}

//  Простой экран
function formatString($string)
{
    return htmlspecialchars(stripslashes(trim($string)));
}

function formatBDate($string)
{
    $d = substr($string, 0,2);
    $m = substr($string, 3,2);
    $y = substr($string, 6,4);
    if ((int)$d < 10)
        $d = substr($d, 1,1);
    switch ($m) {
        case "01": $m = " Января, "; break;
        case "02": $m = " Февраля, "; break;
        case "03": $m = " Марта, "; break;
        case "04": $m = " Апреля, "; break;
        case "05": $m = " Мая, "; break;
        case "06": $m = " Июня, "; break;
        case "07": $m = " Июля, "; break;
        case "08": $m = " Августа,"; break;
        case "09": $m = " Сентября, "; break;
        case "10": $m = " Октября, "; break;
        case "11": $m = " Ноября, "; break;
        case "12": $m = " Декабря, "; break;
    }
    return $d.$m.$y;
}

