<?php

require_once("server_fundamentals/Settings.php");
require_once("server_fundamentals/CookieController.php");
require_once("server_fundamentals/DatabaseConnection.php");
require_once("server_fundamentals/FunctionsController.php");
//------------
sec_session_start();
if(isset($_SESSION[SESSION_CONTROLLER_NAME]) && is_numeric($_SESSION[SESSION_CONTROLLER_NAME])){
	header("Location: home");
	die();
	
}
//------------
session_destroy();
//------------
if(isset($_GET['id'])){
	if(!ctype_alnum($_GET['id'])){
		header('Location: login');
	}
}else{
	header('Location: login');
	die();
}
//------------
$checkUserAcc = mysqlSelect("select * from sm_email_ver where ver_hash = '".$_GET['id']."' and ver_used = 0 and ver_dnt >= ".(time()-(24*60*60)));
if(!is_array($checkUserAcc)){
	header('Location: login');
	die();
}
//------------
$checkDup = mysqlSelect("select * from sm_logins where lum_email = '".$checkUserAcc[0]['ver_lum_email']."' and ((lum_valid = 1) or (lum_valid = 0))");
if(is_array($checkDup)){
	die("An Account with the Same Email already exists, contact the Admin or re-register with a different email.");
}
//------------
if($checkUserAcc[0]['ver_lum_type'] == 3){
	//------------
		$insertLumData = mysqlInsertData("INSERT INTO `sm_logins`(`lum_img_src`,`lum_fname`, `lum_lname`, `lum_email`, `lum_hash`, `lum_type`, `lum_age`, `lum_gender`, `lum_interests`, `lum_dnt`,`lum_valid`, `lum_email_ver`) VALUES 
			(
			'assets/img/avatar/avatar-3.png',
			'".$checkUserAcc[0]['ver_lum_fname']."',
			'".$checkUserAcc[0]['ver_lum_lname']."',
			'".$checkUserAcc[0]['ver_lum_email']."',
			'".$checkUserAcc[0]['ver_lum_hash']."',
			'".$checkUserAcc[0]['ver_lum_type']."',
			'".$checkUserAcc[0]['ver_lum_age']."',
			'".$checkUserAcc[0]['ver_lum_gender']."',
			'".$checkUserAcc[0]['ver_lum_interests']."',
			'".$checkUserAcc[0]['ver_lum_dnt']."',
			'".$checkUserAcc[0]['ver_lum_valid']."',
			1
			 )",true);
		if(!is_numeric($insertLumData)) die("F1");

		$makeBooth = mysqlInsertData("
		INSERT INTO `virtual_booths`(`vb_vst_id`, `vb_name`, `vb_vbt_id`, `vb_lum_id`, `vb_tags`, `vb_tagline`) VALUES (
		".$checkUserAcc[0]['ver_vb_vst_id'].",
		'".$checkUserAcc[0]['ver_vb_name']."',
		'".$checkUserAcc[0]['ver_vb_vbt_id']."',
			'".$insertLumData."', 
			'".$checkUserAcc[0]['ver_vb_tags']."',
			'".$checkUserAcc[0]['ver_vb_tagline']."'
			 )",true);
		if(!is_numeric($makeBooth)){
			die("F34");
		}

	//------------
	
}else{
	//------------
		$insertLumData = mysqlInsertData("INSERT INTO `sm_logins`(`lum_img_src`,`lum_fname`, `lum_lname`, `lum_email`, `lum_hash`, `lum_type`, `lum_age`, `lum_gender`, `lum_interests`, `lum_dnt`,`lum_valid`, `lum_email_ver`) VALUES 
			(
			'assets/img/avatar/avatar-3.png',
			'".$checkUserAcc[0]['ver_lum_fname']."',
			'".$checkUserAcc[0]['ver_lum_lname']."',
			'".$checkUserAcc[0]['ver_lum_email']."',
			'".$checkUserAcc[0]['ver_lum_hash']."',
			'".$checkUserAcc[0]['ver_lum_type']."',
			'".$checkUserAcc[0]['ver_lum_age']."',
			'".$checkUserAcc[0]['ver_lum_gender']."',
			'".$checkUserAcc[0]['ver_lum_interests']."',
			'".$checkUserAcc[0]['ver_lum_dnt']."',
			'".$checkUserAcc[0]['ver_lum_valid']."',
			1
			 )",true);
			 
			if(!is_numeric($insertLumData)) die("F1");
	//------------
}
//------------


$updateData2 = mysqlUpdateData("update sm_email_ver set ver_used =1  where ver_lum_email =  '".$checkUserAcc[0]['ver_lum_email']."'",true);
if(!is_numeric($updateData2)){
	die('F2');
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Verify Account - Virtual Freshers Fairs by <?php echo BRANDING_COMPANY_NAME ?> for <?php echo UNI_NAME ?></title>
  
  <!-- Favicon -->
  <link rel="icon" 
      type="image/png" 
      href="assets/img/frestive/frestive_short.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>


<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/FRESTIVE.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header"><h4>Verification</h4></div>
                
                <div class="card-body">
                    <div id="SuccessAttempt" class="mb-4" style="background-color:rgba(145,255,208,0.30); color:rgba(103,103,103,1.00); padding:10px; border-radius:8px;">
                    Email has been verified.<br>
                    <?php 
if($checkUserAcc[0]['ver_lum_type'] == 3){
//********					
					
		if($checkUserAcc[0]['ver_lum_valid'] == "1"){
						echo 'Your Account has Been approved, Awaiting Booth Approval. We will be in touch on email regarding a decision from the SU.<br> You may login and edit your booth.';
						$insertDataEmail = mysqlInsertData("
					INSERT INTO `m_email`(`e_to_name`, `e_to_email`, `e_subject`, `e_body_t_id`, `e_body_json`, `e_alt_body`, `e_dnt_posted`) VALUES (
					'".$checkUserAcc[0]['ver_lum_fname']." ".$checkUserAcc[0]['ver_lum_lname']."',
					'".$checkUserAcc[0]['ver_lum_email']."',
					'Frestive Booth Account Approved ',
					6,
					'Hi, Your account has been approved, Email Verified, Booth will get approved soon',
					'Welcome, Account has been approved, Email Verified, Booth will get approved soon',
					'".time()."');", true);
					
					if(!is_numeric($insertDataEmail)){
						die("Email not sent");
					}						
		}else{
				$insertDataEmail = mysqlInsertData("
			INSERT INTO `m_email`(`e_to_name`, `e_to_email`, `e_subject`, `e_body_t_id`, `e_body_json`, `e_alt_body`, `e_dnt_posted`) VALUES (
			'".$checkUserAcc[0]['ver_lum_fname']." ".$checkUserAcc[0]['ver_lum_lname']."',
			'".$checkUserAcc[0]['ver_lum_email']."',
			'Frestive Booth Pending Approval ',
			7,
			'Hi, Your account is awaiting Approval from SU, Email Verified, Booth awaiting approval ',
			'Hi, Your account is awaiting Approval from SU, Email Verified, Booth awaiting approval ',
			'".time()."');", true);
			
			if(!is_numeric($insertDataEmail)){
				die("Email not sent");
			}						
						echo 'Your account and booth will now be sent to the Student Union for Approval. We will be in touch on email regarding a decision from the SU.';
					}
					
//********					
}else{
//****************

		if($checkUserAcc[0]['ver_lum_valid'] == "1"){
											echo 'Your Account has Been approved, Login now to Continue.';
						$insertDataEmail = mysqlInsertData("
					INSERT INTO `m_email`(`e_to_name`, `e_to_email`, `e_subject`, `e_body_t_id`, `e_body_json`, `e_alt_body`, `e_dnt_posted`) VALUES (
					'".$checkUserAcc[0]['ver_lum_fname']." ".$checkUserAcc[0]['ver_lum_lname']."',
					'".$checkUserAcc[0]['ver_lum_email']."',
					'Frestive Account Approved ',
					2,
					'Hi, Your account has been approved',
					'Welcome, Account has been approved.',
					'".time()."');", true);
					
					if(!is_numeric($insertDataEmail)){
						die("Email not sent");
					}						
		}else{
							$insertDataEmail = mysqlInsertData("
						INSERT INTO `m_email`(`e_to_name`, `e_to_email`, `e_subject`, `e_body_t_id`, `e_body_json`, `e_alt_body`, `e_dnt_posted`) VALUES (
						'".$checkUserAcc[0]['ver_lum_fname']." ".$checkUserAcc[0]['ver_lum_lname']."',
						'".$checkUserAcc[0]['ver_lum_email']."',
						'Frestive Account Pending Approval ',
						4,
						'Acc Pending aproval, email verified',
						'Acc Pending aproval, email verified',
						'".time()."');", true);
						
						if(!is_numeric($insertDataEmail)){
							die("Email not sent");
						}						
						echo 'Your account will now be sent to the Student Union for Approval.';
					}

//****************
}
					?> <br>
                    <a href="login"><button class="btn btn-primary mt-4">Login</button></a>
                    </div>
                </div>
            </div>
            <div class="simple-footer">
              (Copyright &copy; Student Essentials) Powered by Student Essential and Aethn Aega, Made by Stisla.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/js/jquery.min.js" ></script>
  <script src="assets/js/bootstrap.min.js"></script>


</body>
</html>
