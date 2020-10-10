<?php
function checkUserCaptcha($userToken)
{
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array('secret' => '6LdT19UZAAAAAHldGtRqX8X-MvXEV8MSdGMpzB7D',
    'response' => $userToken);

// use key 'http' even if you send the request to https://...
  $options = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) {/* Handle error */
    return null;
  } else {
    return json_decode($result, true);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['g-recaptcha-response'])) {
    $userToken = $_POST['g-recaptcha-response'];
    $captchaResponse = checkUserCaptcha($userToken);
    if ($captchaResponse['success'] && $captchaResponse['score'] > 0.5) {
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
    } else {
      print("Something went wrong, try again later");
    }
  } else {
    print("Something went wrong,try again later");
  }
}
