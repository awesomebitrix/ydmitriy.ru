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

$(document).ready(function(){
    // Меню
    $("span.button").click(function(){
        if (menuVis == 0)
        {
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
    //  Проверка, можно ли закрыть скролинг
    $(window).scroll(function(){

        if (window.scrollY > $("#header").height() + $("#search_panel").height())
            canCloseSearch = 0;
    });
});