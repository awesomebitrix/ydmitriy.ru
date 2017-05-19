/**
 * Created by yazykov on 18.05.17.
 */

var welcome = function()
{
    console.log('************************************');
    console.log('*                                  *');
    console.log('*                                  *');
    console.log('*             Welcome!             *');
    console.log('*                                  *');
    console.log('*    type \'help();\' for more       *');
    console.log('*                                  *');
    console.log('*                                  *');
    console.log('************************************');

}

var help = function()
{
    console.log();
    console.log('************************************');
    console.log('*                                  *');
    console.log('* help() - Справка                 *');
    console.log('* blog() - переод к блогу          *');
    console.log('* portfolio() - переод к портфолио *');
    console.log('* projects() - переод к проектам   *');
    console.log('* about() - переод к блогу         *');
    console.log('* contacts() - переход к контакам  *');
    console.log('*                                  *');
    console.log('************************************');
    return true;
}

var blog = function()
{
    location.href = '/blog/';
}

var portfolio = function()
{
    location.href = '/portfolio/';
}

var projects = function()
{
    location.href = '/projects/';
}

var about = function()
{
    location.href = '/resume/';
}

var contacts = function()
{
    location.href = '/contacts/';
}

var getVacancies = function()
{
    window.open('http://gkk.ru/sites/contacts/jobs.php');

    console.log();
    console.log('**********************************');
    console.log('               ^^^                ');
    console.log('       Was opened in new tab      ');
    console.log('               ^^^                ');
    console.log('**********************************');

    return true;
}


document.addEventListener('DOMContentLoaded', function(){
    welcome();
});

var logo = function(){
    console.log('                                                                             ');
    console.log('  ______     _________  ____________________________________________ ____    ');
    console.log(' |      \\   /   |     \\/     |           |             |           |/    | ');
    console.log(' |        \\/    |            |     |     |             |     |     /     |  ');
    console.log(' |    |   /_    |            |     |     |      _______|     |    /_     |   ');
    console.log(' |    |    |    |            |           |             |     |     |     |   ');
    console.log(' |    |    |    |     \\/     |           |             |           |     |  ');
    console.log(' |    |    |    |     |      |     |     |_______      |_______    |     |   ');
    console.log(' |    |    |    |     |      |     |     |             |           |     |   ');
    console.log(' |        /|    |     |      |     |     |             |           |     |   ');
    console.log(' |______/ /_____\\_____|______|_____|_____|_____________|__________/______\\ ');
    console.log('                                                                             ');
}