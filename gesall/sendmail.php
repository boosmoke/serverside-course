<?php
session_start();


require './mailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'enepost@gmail.com';
$mail->Password = 'ettlosenord';
$mail->SMTPSecure = 'ssl';
	    $from = $_POST['from'];
        $to = "kontakt@kameleo.se";
        $subject = $_POST['subject'];
        $message = $_POST['message']."\n\n\n ---Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!---";
        $headers =	"From: " . $from . "\r\n".
					"Reply-To: " . $from . " \r\n".
                    'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $message, $headers);
        header("Refresh:0; url=tack.php");
        $_SESSION['mail'] = array($from);
        die();
 ?>