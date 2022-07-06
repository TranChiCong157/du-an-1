<?php

include("PHPMailer/src/PHPMailer.php");
include("PHPMailer/src/Exception.php");
include("PHPMailer/src/OAuth.php");
include("PHPMailer/src/POP3.php");
include("PHPMailer/src/SMTP.php");

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;                                
    $mail->isSMTP();                             
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'vannamhdvt@gmail.com';        
    $mail->Password = 'povfhiusxeldbtmj';            

    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                       
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('vannamhdvt@gmail.com', 'LOVEONEX');
    $mail->addAddress($_SESSION['checkMail']['email'], $_SESSION['checkMail']['ten']);

    $mail->isHTML(true);
    $mail->Subject = $_SESSION['checkMail']['chu_de'];
    $mail->Body    = $_SESSION['checkMail']['noi_dung'];
 
    $mail->send();
    $_SESSION['error'] = "<script>alert('Đã gửi mã code vào email mời bạn xác nhận');</script>";
} catch (Exception $e) {
    $_SESSION['error'] = "Email không đúng: ".$_SESSION['checkMail']['email'];
    header('location: ' . BASE_URL . '/sign-up');
    die;
}
if(intval($_GET['id']) == 1) {
    header('Location: ' . BASE_URL . '/check-code-form');
}
if(intval($_GET['id'] == 2)) {
    header('Location: ' . BASE_URL . '/check-code-form');
}
if(intval($_GET['id']) == 3) {
    header('Location: ' . BASE_URL . '/admin/check-code-form');
}
if(intval($_GET['id'] == 4)){
    header("Location: " . BASE_URL . "/admin/order/list");
}

?>