<?php
global $DBType;
IncludeModuleLangFile(__FILE__);


CModule::AddAutoloadClasses(
    "dd.pagestatistic",
    array(
        "CDeliveryPerson"       =>  "/classes/mysql/person.php",
    )
);

?>