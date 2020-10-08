<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include ('index_main.html');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname=$_POST["firstname"];
  $lname=$_POST['lastname'];
  $phone=$_POST['phonenumber'];
  $category=$_POST['category'];
  $type = $_POST['type'];
  $details = '';
  if(isset($_POST['details']))
    $details=$_POST['details'];
  $msg = "Nume: ".$fname."\nPrenume: ".$lname."\nTelefon: ".$phone."\nCategorie: ".$category."Tip: ".$type."\n Detalii: ".$details;
  $msg = wordwrap($msg,70);

  $subiect= '[Inscriere] Elevul '.$fname.' '.$lname.' doreste sa se inscrie';

  $mail = new PHPMailer;
  $mail->IsSMTP();  // telling the class to use SMTP
  $mail->SMTPDebug = 0;
  $mail->Mailer = "smtp";
  $mail->Host = "ssl://smtp.gmail.com";
  $mail->Port = 465;
  $mail->SMTPAuth = true;// turn on SMTP authentication
  $myMail= "yourEmail";
  $mail->Username = $myMail; // SMTP username
  $mail->Password = "yourAppPassword"; // SMTP password
  $mail->Priority = 1;

  $mail->AddAddress($myMail);
  $mail->SetFrom($myMail);

  $mail->Subject  = $subiect;
  $mail->Body     = $msg;
  $mail->WordWrap = 70;

  if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    //echo 'Message has been sent.';
  }
}
