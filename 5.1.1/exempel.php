<?php
require 'PHPMailerAutoload.php';
if ($_POST['password'] == 1234){
$from = $_POST['from'];
$to = $_POST['to'];
$cc = $_POST['cc'];
$bcc = $_POST['bcc'];
$subject = $_POST['subject'];
$message = $_POST['message']."\n\n\n ---Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!---";
date_default_timezone_set('Europe/Stockholm');
$mail = new PHPMailer;
$mail->isSMTP();
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "kohefin@gmail.com";
$mail->Password = "doomarrow88";
//Set who the message is to be sent from
//$mail->setFrom($from, "Kontaktformulär");
//$mail->From = $from;
$mail->FromName = $from;
//Set an alternative reply-to address
$mail->addReplyTo($from);
//Set who the message is to be sent to
$mail->addAddress($to);
$mail->addCustomHeader("CC:", $cc); 
$mail->addCustomHeader("BCC:", $bcc); 
//Set the subject line
$mail->Subject = $subject;
$mail->Body = $message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo header("content-type:text/html");
    echo "Message sent!";
    echo "Från: $from </br>";
    echo "Till: $to </br>";
    echo "Cc: $cc </br>";
    echo "Bcc: $bcc </br>";
    echo "Ärende: $subject </br>";
    echo "Meddelande: $message </br>";
}
}
	else {
		echo "FEL LÖSENORD!";
	}

 ?>