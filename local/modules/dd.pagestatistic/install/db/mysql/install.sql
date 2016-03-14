/* Таблица */
CREATE TABLE IF NOT EXISTS 'dd_pagestatistic_pages' (
  `ID_PAGE` int(11) NOT NULL AUTO_INCREMENT, --  Ключ
  `PAGE_URL` varchar(200)                    --  UTL страницы
) AUTO_INCREMENT = 1;

/* Статистика по переходам */
CREATE TABLE IF NOT EXISTS 'dd_pagestatistic_statistic' (
  `ID_STAT` int(11) NOT NULL AUTO_INCREMENT,  --  Ключ
  `STAT_PAGE_ID` int(11) NOT NULL,            --  ID страницы
  `STAT_PEOPLE_ID` int(11) NOT NULL,          --  ID человека
  `STAT_DATE` varchar(10),                    --  Дата перехода
  `STAT_TIME` varchar(8),                     --  Время перехода
  `STAT_LONGEST` varchar(8)                   --  Время пребывания на странице
) AUTO_INCREMENT = 1;

/* Человек */
CREATE TABLE IF NOT EXISTS 'dd_pagestatistic_people' (
  `ID_PEOPLE` int(11) NOT NULL AUTO_INCREMENT,  --  Ключ
  `PEOPLE_GUID` int(20),                        --  Уникальный идентификатор
  `PEOPLE_AGE` int(3),                          --  Возраст
  `PEOPLE_GENDER` varchar(1),                   --  Пол
  `PEOPLE_BROWSER` varchar(100),                --  Браузер
  `PEOPLE_DEVICE` varchar(100)                  --  Устройство`
) AUTO_INCREMENT = 1;