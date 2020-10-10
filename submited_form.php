<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  print($_POST['g-recaptcha-response']);
  if($_POST['g-recaptcha-response']) {
    $fname = $_POST["firstname"];
    $lname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $details = '';
    if (isset($_POST['details']))
      $details = $_POST['details'];
    $msg = "Nume: " . $fname . "\nPrenume: " . $lname . "\nTelefon: " . $phone . "\nCategorie: " . $category . "\nTip: " . $type . "\n Detalii: " . $details;
    $msg = wordwrap($msg, 70);
    $subject = '[Inscriere] Elevul ' . $fname . ' ' . $lname . ' doreste sa se inscrie';
    $from = 'From: scoaladesoferi.botosani.ro';
    if (!mail("xxlnorddriver@gmail.com", $subject, $msg, $from)) {
      var_dump(error_get_last()['message']);
      include('404.html');
    } else {
      include('html/submited_form.html');
    }
  }
  else {
    print("Something went wrong,try again");
  }
}
