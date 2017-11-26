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
    if (isset($_FILES['file1'])&& $_FILES['file1']['error'] == UPLOAD_ERR_OK){
        $mail->AddAttachment($_FILES['file1']['tmp_name'], $_FILES['file1']['name']);
    }
    if (isset($_FILES['file2'])&& $_FILES['file2']['error'] == UPLOAD_ERR_OK){
        $mail->AddAttachment($_FILES['file2']['tmp_name'], $_FILES['file2']['name']);
    }
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo header("content-type:text/html");
        echo "Meddelande skickat! </br>";
        echo "Från: $from </br>";
        echo "Till: $to </br>";
        echo "Cc: $cc </br>";
        echo "Bcc: $bcc </br>";
        echo "Ärende: $subject </br>";
        echo "Meddelande: $message </br>";
        echo "<strong>Fil 1</br> namn: </strong>".$_FILES['file1']['name']." </br> <strong>storlek: </strong>".$_FILES['file1']['size']. " bytes<br>";
        echo "<strong>Fil 2</br> namn: </strong>".$_FILES['file2']['name']." </br><strong>storlek: </strong>".$_FILES['file2']['size']." bytes<br>";
    }
    }
	else {
		echo "FEL LÖSENORD!";
	}

 ?>