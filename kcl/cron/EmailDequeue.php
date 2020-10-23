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
	}else{
		$email = "503, from Frestive";
	}
	
####################################################################################################################################################################################



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@kcl.frestive.online';                 // SMTP username
    $mail->Password = 'nSWG+878ABCdef123.';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('admin@kcl.frestive.online', 'Frestive');
    $mail->addAddress($mailindiv['e_to_email'],$mailindiv['e_to_name']);     // Add a recipient

$mail->addBCC('ayanahmad.ahay@gmail.com');
#$mail->addBCC('info@studentessentials.co');


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