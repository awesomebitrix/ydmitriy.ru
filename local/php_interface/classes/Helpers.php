<?php


/**
 * Вспомагательные функции
 * Class Helpers
 */
class Helpers {

    /**
     * @param $array Данные для отображения
     * @param bool $type Показывать всем
     */
    public static function dump($array, $type = true)
    {
        global $USER;
        if (($USER->IsAdmin()) || ($type == true))
        {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }
    }

    /**
     * Простое экранирование вводимых параметров
     * @param $string Небезопасная строка
     * @return string Чуть более безопасная строка
     */
    public static function safeString($string)
    {
        return htmlspecialchars(stripslashes(trim($string)));
    }

    /**
     * Форматирует дату в чуть более приятный вид
     *
     * @param $dateString Строка даты
     * @internal param $string
     * @return string Дата в виде строки с нужным форматированием
     */
    public static function formatBDate($dateString)
    {
        $date = new DateTime($dateString);

        $monthNumber = $date->format('m');
        switch ($monthNumber) {
            case "01": $monthString = " Января, "; break;
            case "02": $monthString = " Февраля, "; break;
            case "03": $monthString = " Марта, "; break;
            case "04": $monthString = " Апреля, "; break;
            case "05": $monthString = " Мая, "; break;
            case "06": $monthString = " Июня, "; break;
            case "07": $monthString = " Июля, "; break;
            case "08": $monthString = " Августа,"; break;
            case "09": $monthString = " Сентября, "; break;
            case "10": $monthString = " Октября, "; break;
            case "11": $monthString = " Ноября, "; break;
            case "12": $monthString = " Декабря, "; break;
        }

        return $date->format('j') . $monthString . $date->format('Y');
    }
} 