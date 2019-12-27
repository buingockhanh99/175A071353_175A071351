
<?php
header('Content-Type: text/html; charset=UTF-8');  
date_default_timezone_set('Asia/Bangkok');

require_once '../PHPMailer/PHPMailerAutoload.php';


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


$mail->addAddress($email,'');


$mail->Subject = 'account information';


$mail->msgHTML('Vui lòng truy cập <a href="https://khanhbn72.000webhostapp.com/dangnhap.php">tại đây</a> để đăng nhập <br> 
                            Đăng nhập với <label style="color:red">username:</label> '.$username. '    <label style="color:red">password:</label>   '.$password1. '');


if (!$mail->send()) {
    echo "" ;
} else {
    echo "";

}


?>