<?php

require_once './vendor/autoload.php';

$sender_name = $_POST['nama'];
$sender_email = $_POST['email'];
$sender_website = $_POST['website'];
$sender_message = $_POST['pesan'];

// Email Penerima
$to = 'tiosaputrorayfan@gmail.com';
// Email Pengirim
$username = 'mysthic02@gmail.com';
$password = 'kjag yrve lyqu alle';
$alias = 'DAC Solution';

try {
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
        ->setUsername($username)
        ->setPassword($password);

    $mailer = new Swift_Mailer($transport);

    $mailContent = "
        Hi $alias,

        $sender_message

        Terima kasih,
        $sender_name
        $sender_website
    ";

    $message = (new Swift_Message('[DAC-ABSENSI] Pesan'))
        ->setFrom([$username => 'DAC Solution'])
        ->setTo([$to])
        ->setBody($mailContent);

    $result = $mailer->send($message);
    header('Location: index.php#contact');
} catch (Exception $e) {
    echo $e->getMessage();
    // header('Location: index.php#contact');
}
