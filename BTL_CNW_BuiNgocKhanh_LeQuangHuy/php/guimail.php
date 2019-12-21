
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


$mail->addReplyTo('xacthucemail123@gmail.com', 'BTL_CNW');


$mail->addAddress($email, 'Xác thực tài khoản');


$mail->Subject = 'account information';


$mail->msgHTML('username: '.$username. '    password'.$password1. '');


if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "";

}



function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

?>