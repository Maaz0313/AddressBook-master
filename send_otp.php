<?php

use function PHPSTORM_META\type;

require('conn.inc.php');
require('functions.inc.php');


$type=get_safe_value($conn,$_POST['type']);
if($type=='email'){
    $email=get_safe_value($conn,$_POST['email']);
    $otp=rand(1111,9999);
    $_SESSION['EMAIL_OTP']=$otp;
    $html="$otp is your otp";

    include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="maaztajammul63@gmail.com";
	$mail->Password="Maaz7860~";
	$mail->SetFrom("maaztajammul63@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="New OTP";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		//echo "Error occur";
	}
}
?>