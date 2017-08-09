<?php

require_once __DIR__.'/core/functions.php';

config('source','config.ini');
require_once __DIR__."/classes/template.class.php";
require_once __DIR__."/classes/database.class.php";
require_once __DIR__."/classes/user.class.php";
require_once __DIR__."/classes/nethunt.class.php";

date_default_timezone_set('Asia/Kolkata');

session_start();

//set timezone
$GLOBALS['site.root']=config('site.root');

$TEMPLATE = new Template(); 
global $TEMPLATE;
//$GLOBALS['template']=$TEMPLATE;

$DB = new Database();
global $DB;
//$GLOBALS['dbname']=$DB;

$USER = new User($DB);
global $USER;
//$GLOBALS['user']=$USER;

$NETHUNT = new NETHUNT($DB,$USER); 
global $NETHUNT;