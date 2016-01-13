var menuVis = 0,        //  Видимость меню
    firstClick = 0,     //  Кто первым закрыл меню
    searchVis = 0,      //  Видимость панели поиска
    canCloseSearch = 1; //  Можно ли закрыть поиск

function shomMenu()
{
    $("div#menu").animate({right: '0em'}, 500);
    $("div#workarea").animate({right: '18em',opacity: '0.4'}, 500);
    $(".button").animate({right: '20rem'}, 500);
    $(".search_button").animate({left: '-16rem'}, 500);
    menuVis = 1;
}

function hideMenu()
{
    $("div#menu").animate({right: '-18em'}, 500);
    $("div#workarea").animate({right: '0rem',opacity: '1'}, 500);
    $(".button").animate({right: '2rem'}, 500);
    $(".search_button").animate({left: '2rem'}, 500);

    menuVis = 0;
}

function showSearch()
{
    $("#search_panel").slideDown(500);
    $("#search_panel input[type=text]").focus();
    searchVis = 1;
}

function hideSearch()
{
    $("#search_panel").slideUp(500);
    $("#search_panel input[type=text]").focus();
    searchVis = 0;
}

$(document).ready(function(){
    // Меню
    $("span.button").click(function(){
        if (menuVis == 0)
        {
            if (searchVis == 1)
                hideSearch();
            shomMenu();
            firstClick = 1;
        } else {
            hideMenu();
        }
    });
    $("div#workarea").click(function(){
        if (menuVis == 1)
        {
            if (firstClick == 0)
            {
                hideMenu();
            } else {
                firstClick = 0;
            }
        }
    });
    //  Поиск
    $(".search_button").click(function(){
        if (searchVis == 0)
        {
            if (canCloseSearch == 0)
                $('html, body').animate({scrollTop:0}, 'slow');
            showSearch();
        } else {
            if (canCloseSearch == 1)
            {
                hideSearch();
            } else {
                $('html, body').animate({scrollTop:0}, 'slow');
                $("#search_panel input[type=text]").focus();
            }
        }
        canCloseSearch = 1;
    });
    //  Проверка, можно ли закрыть скролинг
    $(window).scroll(function(){

        if (window.scrollY > $("#header").height() + $("#search_panel").height())
            canCloseSearch = 0;
    });
});