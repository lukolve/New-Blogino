<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Bratislava" );  // http://www.php.net/manual/en/timezones.php

$obj->warp = 1;

$obj->maintenance = 0;
$obj->maintenance_ip = ""; // privileg optional ip for admin access

$obj->captha_type = 0;

$obj->refresh = 1;

$obj->track = ""; 

// databaza
$obj->host = "127.0.0.1:3307"; // 127.0.0.1
$obj->username = "lukas"; 
$obj->password = "hesloPassword";
$obj->table = "zones";

// administrator
$obj->adminemail = array('luuvki@gmail.com' => 'admin');

// meno zony => viditelny popisok
$obj->zones = array(
'hudba' => 'HUDBA',
'moda' => 'MÓDA',
'foto' => 'FOTO',
'dizajn' => 'DIZAJN',
'jedlo' => 'JEDLO',
'hry' => 'HRY',
'kultura' => 'KULTÚRA',
'life' => 'LIFE'); 

$obj->zones_info = array(
'hudba' => 'všetko o hudbe',
'moda' => 'zaujimavé novinky zo sveta módy',
'foto' => 'najzaujimavejšie foto',
'dizajn' => 'dizajn',
'jedlo' => 'recepty a návody',
'hry' => 'herný svet',
'kultura' => 'kultúrne okienko',
'life' => 'o živote a všeličom'); 

$obj->title = "BLOGINO"; 
$obj->slogan = "rýchle blogovanie..";

$obj->author = "Copyright (c) 2013 - " . date("Y") . " Lukas Veselovsky"; 
?>
