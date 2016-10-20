
<?php
ini_set("SMTP","localhost");//Cambien mail.cantv.net Por localhost ... ojo, ojo OJO
ini_set("smtp_port",25);
ini_set("sendmail_from","nk9mhpblu@gmail.com");

$too = "nk9mhpblu@gmail.com" ;
$subject = $_POST['first_name'];
$message = $_POST['comments'];
$user_email = $_POST['email']; // valid POST email address

$headers = "From: $user_email " ;
$headers .= "Reply-To: $too " ;
$headers .= "Return-Path: $too " ;
$headers .= "X-Mailer: PHP/" . phpversion (). " " ;
$headers .= 'MIME-Version: 1.0' . " " ;
$headers .= 'Content-type: text/html; UTF-8' . " " ;

if( mail ( $too , $subject , $message , $headers )) echo 'SENT' ; 

?>