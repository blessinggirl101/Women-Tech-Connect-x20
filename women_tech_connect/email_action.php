<?php 
error_reporting(0);


// initialize Settings
include('settings.php');

//$mail_server
//$return_email


// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","$mail_server");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set("sendmail_from", "$return_email");


?>





<?php

$subject = strip_tags($_POST['subject']);
$msg = strip_tags($_POST['message']);
$r_email = strip_tags($_POST['r_email']);
 $s_email = strip_tags($_POST['s_email']);
$r_fullname = strip_tags($_POST['r_fullname']);
$s_fullname = strip_tags($_POST['s_fullname']);
$messagex ="Hi, $r_fullname. You have Message from $s_fullname. This is the message: $msg";

$to = $r_email;
$subject = $subject;
$from = $return_email;
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h2 style="color:#800000">$subject</h2>';
$message .= '<p>$messagex</p>';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo "<div style='background:green;color:white;padding:8px;border:none'>Email successfully sent.</div>";
} else{
     echo "<div style='background:red;color:white;padding:8px;border:none'>Email sending Failed. Ensure there is internet connection and Try Again..</div>";
}
?>