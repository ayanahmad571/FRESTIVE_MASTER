<?php
require_once("Settings.php");
require_once("CookieController.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");

sec_session_start();
session_destroy();

$checkerNames = array("first_name","last_name","email","password","password_confirm","user_type","age","gender","interests","agree");
# 0 = email
# 1 = password
checkPost($checkerNames);
checkEmail($_POST[$checkerNames[2]]);


$err= "";
if($_POST[$checkerNames[3]] != $_POST[$checkerNames[4]]){
	$err .= "<br>Passwords Do not Match";
}

if(!inRange($_POST[$checkerNames[5]], 1,2,true)){
	$err .= "<br>User Type Invalid";
}

if(!inRange($_POST[$checkerNames[6]], 10,200,true)){
	$err .= "<br>Age Invalid";
}

if(!inRange($_POST[$checkerNames[7]], 1,3,true)){
	$err .= "<br>Gender Invalid";
}

if($_POST[$checkerNames[9]] != 1){
	$err .= "<br>Please Accept Terms and Conditions";
}



if(is_array(mysqlSelect("select * from sm_logins where lum_email = '".$_POST[$checkerNames[2]]."'"))){
	die('An Account with the same email already exists.');
}
if(!empty($err)){
	die($err);
}


/*
$fileURL = uploadImage('r_image');
if($fileURL[0] == 1){
	$fileURLPath = $fileURL[1];
}else{
	die($fileURL[1]);
}
*/
$userHash = genHash($_POST[$checkerNames[2]],$_POST[$checkerNames[3]]);


$insertData = mysqlInsertData("INSERT INTO `sm_logins`(`lum_fname`, `lum_lname`, `lum_email`, `lum_hash`, `lum_type`, `lum_age`, `lum_gender`, `lum_interests`) VALUES 
	(
	'".$_POST[$checkerNames[0]]."',
	'".$_POST[$checkerNames[1]]."',
	'".$_POST[$checkerNames[2]]."',
	'".$userHash."', 
	'".$_POST[$checkerNames[5]]."',
	'".$_POST[$checkerNames[6]]."',
	'".$_POST[$checkerNames[7]]."',
	'".$_POST[$checkerNames[8]]."'
	 
	 )");
if(trim($insertData) == "#"){
	die("ok");
}else{
	if(!is_numeric($insertData)){
		die($insertData);
	}
}



?>