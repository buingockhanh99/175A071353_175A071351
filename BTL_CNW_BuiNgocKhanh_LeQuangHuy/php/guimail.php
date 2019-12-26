
<?php
header('Content-Type: text/html; charset=UTF-8');  
date_default_timezone_set('Asia/Bangkok');

require '../PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer;


$mail->isSMTP();


$mail->SMTPDebug =0;


$mail->Debugoutput = 'html';


$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;


$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


$mail->Username = "xacthucemail123@gmail.com";


$mail->Password = "Khanh18101999";


$mail->setFrom('xacthucemail123@gmail.com', 'BTL_CNW');


$mail->addReplyTo('xacthucemail123@gmail.com', 'Feedback');


$mail->addAddress($email, '');


$mail->Subject = 'account information';


$mail->msgHTML($body);


if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "";

}


?>