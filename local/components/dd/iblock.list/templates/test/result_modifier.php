<?

//dump($arResult);

//  Массив ID элеемнтов
$ids = array();

//  Проходжение по всем элементам
foreach ($arResult['ITEMS'] as $item) {
    $ids[] = $item['ID'];
}

$cp = $this->__component;

$arResult['IDS'] = $ids;

?>
