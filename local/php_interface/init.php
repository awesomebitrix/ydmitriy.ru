<?
//  Реализуем SafeMode для отключения всех сторонних файлов в случае необходиости
if ($_GET['SAFE_MODE'] == 'Y') {
    $_SESSION['SAFE_MODE'] = 'Y';
} elseif ($_GET['SAFE_MODE'] == 'N') {
    unset($_SESSION['SAFE_MODE']);
}

if ($_SESSION['SAFE_MODE'] !== 'Y') {

    //  Класс вспомагательных функций
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/classes/Helpers.php'))
        require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/classes/Helpers.php';

}




