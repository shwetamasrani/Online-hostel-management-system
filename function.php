<?php



function send_mail($to, $token)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'diveindiary@gmail.com';
	$mail->Password = 'poojashwetavidhi';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	
	$mail->From = 'diveindiary@gmail.com';
	$mail->FromName = 'Charusat Hostel';
	$mail->addAddress($to);
	$mail->addReplyTo('diveindiary@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	 
	$mail->Subject = 'Password Recovery Instruction';
	 
	$mail->Body    = "<br><br>You have requested for your password recovery.<a href='localhost/Hostel/reset.php?email=$to & token=$token'><b><u>Click Here</u></b></a>for password recovery or Copy paste this link in your Browser <b><i>localhost/Hostel/reset.php?email=$to & token=$token</b></i>";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	
	if(!$mail->send()) {
		return 'fail';
	} else {
		echo "<script>alert('Mail sent');</script>";
		//header("Location:homepage.php");
		return 'success';
	}
}

?>