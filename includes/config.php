<?php
/**
 * Config-fil till uppgift i moment 2 i kursen Webbutveckling för WordPress
 * Av Andreas Nygård, 2024
 */

$sitename = "Moment2-DT209G";
$divider = " | ";

$devmode = false;

if($devmode) {
    //Aktivera felmeddelanden
    error_reporting(-1);
    ini_set("display_errors", 1);
}

//Aktivera stöd för att inkludera klassfiler automatiskt
spl_autoload_register(function($class_name) {
    include "includes/classes/" . $class_name . ".class.php";
});

if($devmode) {
    //Lokala inställningar för databas
    define("DBHOST", "localhost");
    define("DBUSER", "bucketlist");
    define("DBPASS", "password");
    define("DBDATABASE", "bucketlist");
} else {
    //Publicerade inställningar för databas
    define("DBHOST", "studentmysql.miun.se");
    define("DBUSER", "anny2301");
    define("DBPASS", "7pp8XAHBTZ");
    define("DBDATABASE", "anny2301");
}