<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$sender_name = $_POST['nama'];
$sender_email = $_POST['email'];
$sender_website = $_POST['website'];
$sender_message = $_POST['pesan'];

// Email Penerima
$to = 'tiosaputrorayfan@gmail.com';
// Email Pengirim
$username = 'mysthic02@gmail.com';
$password = 'Mysthic02@gmail';
$alias = 'DAC Solution';

$mail = new PHPMailer(true);

try {
    $mail->Debug = 0;
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $username;
    $mail->Password   = $password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom($username, $alias);
    $mail->addAddress($to);

    $mailContent = "
        Hi $alias, <br/><br/><br/>

        $sender_message <br/><br/><br/>

        Terima kasih, <br/>
        $sender_name <br/>
        $sender_website <br/>
    ";

    $mail->isHTML(true);
    $mail->Subject = $alias;
    $mail->Body    = $mailContent;

    $mail->send();
    // echo 'Pesan Berhasil Terkirim';
    header('Location: index.php#kontak-section');
} catch (Exception $e) {
    // echo "Pesan Gagal Terkirim. Mailer Error: {$mail->ErrorInfo}";
    header('Location: index.php#kontak-section');
}
