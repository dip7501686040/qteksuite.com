<?php

##################################
###       ERROR REPORTING      ###
##################################

$debug = false;

if($debug == false) {
    error_reporting(0);
    ini_set('display_errors', '0');
}
if($debug == true) {
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', '1');
}

##################################
###        NAMESPACES          ###
##################################




##################################
###       GENERAL VARS         ###
##################################

//$scriptpath = __DIR__;

##################################
###         APP LOADER         ###
##################################

// require($scriptpath . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'loader.php');
 require('includes/loader.php');

##################################
###        MODAL LOADER        ###
##################################

if(isset($_GET['modal'])) {
    require('template/modals/'.$_GET['modal'] . '.html');
}
##################################
###        PAGE LOADER         ###
##################################

// load the page if no modal or quick action was requested
if(!isset($_GET['modal']) && !isset($_GET['qa'])) {
    // exclude header and footer for login and forgot password page
    if($route == "signin" || $route == "forgot" || $route == "submitticket") {
        require('template/'. $route . '.html');
    }
    elseif($route == "pdf" || $route == "system/import/assetsSample" || $route == "system/import/licensesSample") {
        // do nothing if pdf
    }
    // load header + page + footer
    else {
        
        require('template/header.html');
        require('template/pages/' .$route . '.html');
        require('template/footer.html');
    }

}



?>
