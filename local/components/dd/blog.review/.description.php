<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    'NAME'          =>  'Предпросмотр записи',
    'DESCRIPTION'   =>  'Предпросмотр записи блога',
    'ICON'          =>  '/images/icon.gif',
    'SORT'          =>  10,
    'CACHE_PATH'    =>  'Y',
    'PATH'          =>  array(
        'ID'    =>  'dd',
        'NAME'  =>  'Языков Дмитрий',
        'CHILD' =>  array(
            'ID'    =>  'blog_preview',
            'NAME'  =>  'Блог',
        ),
    ),
    'COMPLEX' => 'N',
);