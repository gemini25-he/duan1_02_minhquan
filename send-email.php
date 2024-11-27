<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

function sendOrderStatusEmail($email_nguoi_nhan, $ten_nguoi_nhan, $tieu_de, $noi_dung_email) {
$mail = new PHPMailer(true);

try {
    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pquan9939@gmail.com';                     //SMTP username
    $mail->Password   = 'lfiy qppk ivzb cgpz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
    $mail->Port       = 587;
    // $mail->SMTPDebug = 2;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('minhquan2505hehe@gmail.com', '2AnhQuanShop');
    $mail->addAddress($email_nguoi_nhan,$ten_nguoi_nhan);     //Add a recipient
                 //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $tieu_de; //Tiêu đề email
    $mail->Body    = $noi_dung_email; // nội dung
    $mail->AltBody =  strip_tags($noi_dung_email); // nội dung
    $mail->CharSet = 'UTF-8';
    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}