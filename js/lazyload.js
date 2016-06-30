$('img').each(function(){
    console.log($(this).attr('data-original'));
    if ($(this).attr('data-original') == undefined) {

        var src = $(this).attr('src');
        $(this).attr('data-original', src);
        $(this).removeAttr('src');
    }
});

$('img').lazyload({
    effect: 'fadeIn'
});