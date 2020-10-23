<?php
require_once("Settings.php");
require_once("CookieController.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");
sec_session_start();
session_destroy();

$checkerNames = array("email","password");
# 0 = email
# 1 = password
checkPost($checkerNames);
checkEmail($_POST[$checkerNames[0]]);

$userHash = genHash($_POST[$checkerNames[0]],$_POST[$checkerNames[1]]);
$makeSess = mysqlSelect("select * from sm_logins where lum_email = '".$_POST[$checkerNames[0]]."' and lum_hash =  '".$userHash."' and lum_valid = 1 
limit 1  ");
if(is_array($makeSess)){
	loginMakeSession($makeSess[0]["lum_id"]);
	die("ok");
}else{
	die("-");
}



?>	