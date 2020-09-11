<?php

##################################
###       LOAD FUNCTIONS       ###
##################################

//require($scriptpath . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.php');
require('includes/functions.php');

##################################
###      LOAD CONFIG FILE      ###
##################################

if(file_exists("config.php")) {
    require('config.php');
    if(isset($DBconfig)) $config = $DBconfig;
    }
else { // redirect to install if config.php file does not exist
    header("Location:install/index.php");
    exit;
}


##################################
###      REGISTER CLASSES      ###
##################################

spl_autoload_register('vendorClassAutoload');
spl_autoload_register('appClassAutoload');

// composer autoload
require 'vendor/autoload.php';

##################################
###          APP INIT          ###
##################################
### INITIALIZE DATABSE CLASS ###
require 'old_data_befor_19feb\vendor\classes\class.medoo.php';
$database = new medoo($config);

### START THE SESSION ###
session_start();

### DATE & TIME ###
date_default_timezone_set(getConfigValue("timezone"));
$datetime = date("Y-m-d H:i:s");
$date = date("Y-m-d");

### GET PAGE ROUTE (DEFAULTS TO DASHBOARD IF NOT SET) ###
if (empty($_GET['route'])) $route = "dashboard"; else $route = $_GET['route'];

### GET PAGE SECTION (IF ISSET) ###
if (isset($_GET['section'])) $section = $_GET['section']; else $section = "";

### LOAD STATUS MESSAGE FOR DISPLAY AND CLEAR IT ###
if (!empty($_SESSION['statuscode'])) {
    $statuscode = $_SESSION['statuscode'];
    $status = array(); $statusmessage = $database->get("statuscodes", "*", ["code" => $statuscode]);
    clearStatus();
    }

### CHECK IF USER IS SIGNED IN, EXCEPT ON SIGNIN, RECOVER PASSWORD OR SUBMIT TICKET PAGE ###
if ($route != "signin" && $route != "forgot" && $route != "submitticket") isSignedIn();

### INITIALIZE LOGGED IN USER (LIU) ARRAY & PERMISSIONS ###
if ($route != "signin" && $route != "forgot") {
    $liu = $database->get("people", "*", ["sessionid" => session_id() ]);
    $perms = unserialize(getSingleValue("roles","perms",$liu['roleid']));
    //print_r($perms);die();
    $isAdmin = false; 
    if($liu['type'] == "admin") $isAdmin = true;
}



##################################
###        LOAD LANGUAGE       ###
##################################

// get default app language
$lang = getConfigValue("default_lang");
// overwrite default lang if liu has one defined
if(isset($liu)) {
    if($liu['lang'] != "") $lang = $liu['lang'];
    }

// define language file path
$langfile = "lang/".$lang . ".mo";

// define overriden language file path
$orlangfile = "lang/override/". $lang . ".mo";

// load overriden language file (if exists)
if(file_exists($orlangfile)) {
    $streamer = new FileReader($orlangfile);
    $t = new gettext_reader($streamer);
}
// if overridden lang file does not exist, try to load normal language file (if exists)
else {
    if(file_exists($langfile)) {
        $streamer = new FileReader($langfile);
        $t = new gettext_reader($streamer);
    }
}


##################################
###   LOAD APP CONTROLLERS     ###
##################################

// general controller (always loads)
require('includes/controllers/general.php');

// modals controller (loads only if a modal is requested)
if(isset($_GET['modal'])) require('includes/controllers/modals.php');

// quick actions controller (loads only if a quick action is requested)
if(isset($_GET['qa'])) require('includes/controllers/quickactions.php');

// actions controller (loads only if an action is requested)
if(isset($_POST['action'])) require('includes/controllers/actions.php');

// data controller
require('includes/controllers/data.php');

//print_r($_SESSION);die();

?>
