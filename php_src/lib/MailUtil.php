<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "vendor/autoload.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sendMail($to,  $subject, $message)

{

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "edwinnerservices@gmail.com";
	$mail->Password = "edwinner1234";
	$mail->FromName = "Admin@EdWinner";
	$mail->addAddress($to);
	$mail->Subject = $subject;
	$mail->msgHTML($message);
	$mail->IsHTML(true);  
	$mail->From= "edwinnerservices@gmail.com";
	if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;
		echo '<p id="para">'.$error.'</p>';
	}
	else {
		echo '<p id="para">Message sent!</p>';
	}

}

