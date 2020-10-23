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



if(is_array(mysqlSelect("select * from sm_logins where lum_email = '".$_POST[$checkerNames[2]]."' and ((lum_valid = 1) or (lum_valid = 0))"))){
	$err .= ('<br>An Account with the same email already exists.');
}
if(!empty($err)){
	die($err);
}


$userHash = genHash($_POST[$checkerNames[2]],$_POST[$checkerNames[3]]);

	// Separate string by @ characters (there should be only one)
    $parts = explode('@', $_POST[$checkerNames[2]]);

    // Remove and return the last part, which should be the domain
    $domain = array_pop($parts);

	//EMAIL VERIFICATION LINK

	$toSendHash = uniqid().md5(sha1("2ijoqfwee09u8h2bifweijvoiug2nqea-****/..,").time().microtime()).rand(1,5000);

$inssql = "
insert into `sm_email_ver` ( `ver_hash`, `ver_dnt`,
 `ver_lum_fname`, `ver_lum_lname`, `ver_lum_email`, `ver_lum_hash`, `ver_lum_type`, `ver_lum_age`, `ver_lum_gender`, `ver_lum_interests`, `ver_lum_dnt`,`ver_lum_valid`)
 VALUES 
	(
	'".$toSendHash."',
	'".time()."',
	'".$_POST[$checkerNames[0]]."',
	'".$_POST[$checkerNames[1]]."',
	'".$_POST[$checkerNames[2]]."',
	'".$userHash."', 
	'2',
	'".$_POST[$checkerNames[6]]."',
	'".$_POST[$checkerNames[7]]."',
	'".$_POST[$checkerNames[8]]."',
	'".time()."',
	'".($domain == UNI_EMAIL_DOMAIN ? 1 : 0)."'
	 )";
$insertData = mysqlInsertData($inssql,true);
if(!is_numeric($insertData)){
	die($insertData);
}

	

	//EMAIL VERIFICATION LINK
	
	//email
$url = SESSION_BASE_URL."verify?id=".$toSendHash;
	$insertDataEmail = mysqlInsertData("
INSERT INTO `m_email`(`e_to_name`, `e_to_email`, `e_subject`, `e_body_t_id`, `e_body_json`, `e_alt_body`, `e_dnt_posted`) VALUES (
'".$_POST[$checkerNames[0]]." ".$_POST[$checkerNames[1]]."',
'".$_POST[$checkerNames[2]]."',
'Email Verification by Frestive for ".UNI_NAME_SHORT."',
3,
'Next Steps to follow: Verify Your email to send for approval. ".$url."',
'".$url."',
'".time()."');", true);

if(!is_numeric($insertDataEmail)){
	die("Email not sent");
}


	
	//email




#if all okay
die("ok");


?>