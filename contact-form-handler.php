<?php
require 'vendor/autoload.php';
require_once 'lib/swift_required.php';

Dotenv::load(__DIR__);

$sendgrid_username = $_ENV['app31567110@heroku.com'];
$sendgrid_password = $_ENV['dgktrlzw'];
$to                = $_ENV['TO'];

$transport  = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer     = Swift_Mailer::newInstance($transport);


$name = $_POST['name']; 
$mail = $_POST['email']; 
$subject = $_POST['subject']; 
$content = $_POST['content'];

$message    = new Swift_Message();
$message->setFrom(array($name => $mail));
$message->setTo(array('jingrong@nus.edu.sg' => 'Jing Rong'));
$message->setSubject($subject);
$message->setBody($content);

// Send the message
$result = $mailer->send($message);

