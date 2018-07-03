<?php
if(isset( $_POST['name']))
  $name = $_POST['name'];
if(isset( $_POST['email']))
  $email = $_POST['email'];
if(isset( $_POST['message']))
  $message = $_POST['message'];
if(isset( $_POST['subject']))
  $subject = $_POST['subject'];
if (strlen(trim($name)) == 0){
  echo "Lūdzu ievadiet Vārdu, Uzvārdu";
  die();
}
if (strlen(trim($email)) == 0){
  echo "Ievadiet E-pasta uz kuru sūtīt atbildi";
  die();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Nederīgs E-pasts";
    die();
  }
}
if (strlen(trim($subject)) == 0){
  echo "Lauciņš nevar būt tukšs";
  die();
}
if (strlen(trim($message)) == 0){
  echo "Lauciņš nevar būt tukšs";
  die();
}
$content="From: $name \n Email: $email \n Message: $message";
$recipient = "ro22@inbox.lv";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Jautājums nosūtīts!";
?>