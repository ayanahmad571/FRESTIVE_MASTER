<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../server_fundamentals/Settings.php");
require_once("../server_fundamentals/CookieController.php");
require_once("../server_fundamentals/DatabaseConnection.php");
require_once("../server_fundamentals/FunctionsController.php");
require('mailer/src/Exception.php');
require('mailer/src/PHPMailer.php');
require('mailer/src/SMTP.php');



$checkemails = mysqlSelect("select * from m_email where e_sending = 0 and e_valid =1");

if(!is_array($checkemails)){
	die();
}
foreach($checkemails as $mailindiv){
	if($mailindiv['e_body_t_id'] == 1){
		$email = getForgotPasswordTemplate($mailindiv['e_alt_body'],$mailindiv['e_to_email'], UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 2){
		$email = getWelcomeTemplate($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 3){
		$email = getVerifyEmailTemplate($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 4){
		$email = getToApproveEmailTemplate($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 5){
		$email = getUserNotApproveEmailTemplate($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 6){
		//Emal Verified, User Approved, Booth Pending
		$email = getEmailVUserApprVBWait($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 7){
		//Emal Verified, User Not Approved, Booth Pending
		$email = getEmailVUserNotApprVBWait($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 8){
		//Emal Verified, User Approved, Booth Approved
		$email = getBoothApprovedTemplate($mailindiv, UNI_NAME_SHORT);
	}else if($mailindiv['e_body_t_id'] == 9){
		//Emal Verified, User Approved, Booth Not Approved, Hence User Deleted
		$email = getBoothNotApprovedTemplate($mailindiv, UNI_NAME_SHORT);
	}else{
		$email = "503, from Frestive";
	}
	
####################################################################################################################################################################################



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP

#      // Specify main and backup SMTP servers


	/*
	$mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'badboyzzbookingz@gmail.com';                 // SMTP username
    $mail->Password = 'mojiman123';
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('badboyzzbookingz@gmail.com', 'Frestive');
    $mail->addAddress($mailindiv['e_to_email'],$mailindiv['e_to_name']);     // Add a recipient
	$mail->addBCC('ayanahmad.ahay@gmail.com');
	*/

    $mail->Host = 'smtp.flockmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@frestive.online';                 // SMTP username
    $mail->Password = 'k4FAvL6vbeRR3Ym';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('info@frestive.online', 'Frestive');
    $mail->addAddress($mailindiv['e_to_email'],$mailindiv['e_to_name']);     // Add a recipient
	$mail->addBCC('ayanahmad.ahay@gmail.com');

/*    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mailindiv['e_subject'];

    $mail->Body    = $email;
    $mail->AltBody = $mailindiv['e_alt_body'];

    $mail->send();
	$updateSql = "update m_email set e_sending =1 , e_sent_dnt = '".time()."' where e_id = ".$mailindiv['e_id']."";
	echo '1';
} catch (Exception $e) {
	$updateSql = "update m_email set e_sending =1 , e_failed_dnt = '".time()."', e_failed_reason = '".base64_encode($mail->ErrorInfo)."' where e_id = ".$mailindiv['e_id']."";
	echo '0';
}
	  
$updateData = mysqlUpdateData($updateSql,true);
if(!is_numeric($updateData)){
	echo('Error U');
}

	
	########################################################################################################################


}

?>