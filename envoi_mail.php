<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require('PHPMailer/class.phpmailer.php');

$mail=new PHPMailer();

                                     // Set mailer to use SMTP
//$mail->Host = 'smtp.yahoo.fr';  
//echo $info ;           // Specify main and backup server
//$mail->IsSMTP(); 
$mail->Port =20;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail_eph-tenes@';                // SMTP username
$mail->Password = '7N!_9EwRg9';                  // SMTP password
$mail->SMTPSecure = 'ssl';                    // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);     
                     // Set email format to HTML

  ++$id;
	  $id=$id+32516;
	  $passage_ligne='';
			$destinataire = $_POST['email'];
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook).[a-z]{2,4}$#", $destinataire))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//set body
$mail->Body="<p>Bonjour  ahmed zerarka</p> ";
	//	$entete ='From: '.$_POST["email"].''."".$passage_ligne.""; $entete .='Reply-To:'.$_POST["email"].''."".$passage_ligne.""; 
//$mail->AltBody=$mail->body;
$mail->setFrom("mohamedaribi021989@gmail.com",'zerarka ahmed');
$mail->addAddress("ephzighoudyouceftenes@yahoo.fr");	






if ($mail->send()){
				echo "<script>alert('الرجاء الذهاب إلى بريدك الاليكتروني من أجل تأكيد تسجيلك hhhhh');</script>";
     				echo "<div class='alert alert-success' >الرجاء<strong> الذهاب إلى بريدك الاليكتروني من أجل تأكيد تسجيلك hhhh</strong></div>";
					
}
				//**********************









$to="zerarkahmedtpgr@gmail.com";
$reply_to="Nginx web server <nginx@new-heweb01.localdomain>";
$from="Nginx web server <nginx@new-heweb01.localdomain>";
$sujet = "Email  DE CONFIRMATION";
				$message = "Bonjour zeraraksdksd";
    
	$header = "From:\"eph zighoud\" <".$from."> \r\r\n";
$header .= "Reply-To:\"eph zighoud\" ".$to." \r\r\n";
$header.= "MIME-Version: 1.0 \r\r\n";
$header.="Content-Type: multipart/alternative; \r\r\n boundary=\"$boundary\" \r\r\n";
	
		$envoye = mail($to, $sujet, $message, $entete);
	if ($envoye){
		echo "envoie";
	}
	else{
	echo "non envoyer";	
	}
		?>
</body>
</html>