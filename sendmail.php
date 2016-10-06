<?php

/*!
 * Personalized config PHPMailer Script. Script is using a PHPMailer Repository
 * @PHPMailer https://github.com/PHPMailer/PHPMailer
 * @license of Config Script: MIT license
 * @license of PHPMailer: LGPL 2.1 license
 *
 * Copyright (C) 2016 c0degeek.pl - <Mateusz Kiliński>
 */

/**
 * @table of contents
 * --------------------------------
 *  01. UserForm Variables
 *  02. SendMail Variables
 *  02.01. Mail Body Content
 *  04. SendMail Functions
 * --------------------------------
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require                 'PHPMailerAutoload.php';
    require_once            ('class.phpmailer.php');
    require_once            ('class.smtp.php');

    $mail                   = new PHPMailer;

	// 01 ------------------------------------------------------------------------ UserForm Variables

    $name_                  = $_POST["name"];
    $email_                 = $_POST["email"];
    $phone_                 = $_POST["phone"];
    $message_               = $_POST["message"];

	// --------------------------------------------------------------------------- end of 01

	// 02 ------------------------------------------------------------------------ SendMail Variables

    $smtp['server']         = 'smtp.server.com';
    $smtp['username']       = 'username';
    $smtp['password']       = 'password123';

    $sendmail['from']       = 'No-Reply';
    $sendmail['to']         = 'receiver_email_address';
    $sendmail['reply_to']   = $email_;
    $sendmail['CC']         = '';
    $sendmail['BCC']        = '';

    $message['success']     = 'Message was sent. We will contact you soon.';
    $message['error']       = 'There is an error while sending message. Error details: ';
    $message['no_access']   = 'You don\'t have persmissions to view this page!';

	// 02.01 --------------------------------------------------------------------- Mail Body Content

    $webpage_used           = 'yourweb.com';
    $sendmail['subject']    = 'New message from ' . $webpage_used . ' webpage from ' . $name_;
    $sendmail['body']       = 'You have a message from ' . $webpage_used . ' webpage from ' . $name_;
    $sendmail['body']      .= '<br/><strong>Message: </strong><br/>' . $message_;
    $sendmail['body']  	   .= '<br/><br/>Contact: ' . $name_ . ', phone: ' . $phone_;

	// --------------------------------------------------------------------------- end of 02.01

	// --------------------------------------------------------------------------- end of 02

	// 04 ------------------------------------------------------------------------ SendMail Functions

    $mail->isSMTP();                                                // Set mailer to use SMTP
    $mail->Host             = $smtp['server'];                      // Specify main and backup SMTP servers
    $mail->SMTPAuth         = true;                                 // Enable SMTP authentication
    $mail->Username         = $smtp['username'];                    // SMTP username
    $mail->Password         = $smtp['password'];                    // SMTP password
    $mail->SMTPSecure       = '';                                   // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPAutoTLS      = false;
    $mail->Port             = 587;                                  // TCP port to connect to

    $mail->setFrom($smtp['username'], $sendmail['from']);
    $mail->addAddress($sendmail['to']);                             // Add a recipient
    if ($sendmail['reply_to'] != '')        $mail->addReplyTo($sendmail['reply_to']);
    if ($sendmail['CC'] != '')              $mail->addCC($sendmail['CC']);
    if ($sendmail['BCC'] != '')             $mail->addBCC($sendmail['BCC']);

    $mail->isHTML(true);                                            // Set email format to HTML
    $mail->setLanguage('pl', 'languages/');                         // Error Language
    $mail->CharSet          = 'utf-8';

	$mail->Subject          = $sendmail['subject'];
	$mail->Body             = $sendmail['body'];

	if(!$mail->send()) {
		http_response_code(500);
	  echo $message['error'];
	  echo $mail->ErrorInfo;
	} else {
		http_response_code(200);
	  echo $message['success'];
	}

	// --------------------------------------------------------------------------- end of 03

} else {
	echo $message['no_access'];
}

?>
