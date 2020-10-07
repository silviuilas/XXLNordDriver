<?php
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

  mail("silviuilas@gmail.com","[Inscriere] Elevul ".$fname.' '.$lname.' doreste sa se inscrie',$msg);
  //echo $fname.' '.$lname.$phone.$category.$type.$details;
}
