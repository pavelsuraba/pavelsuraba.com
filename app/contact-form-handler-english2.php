<?php 
$errors = '';
$myemail = 'for.forgie@gmail.com';//<-----Put Your email address here.
$sendfrom = 'myWebsite@web.com';//<-----Placeholder -> sender email
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Message from: $name";
	$email_body = "Přišla ti zpráva. ".
    " Tady to je:\n Name: $name \n Email: $email_address \n Zpráva: \n $message";
	
	// $headers = "From: $myemail\n";
    $headers = "From: $sendfrom\n";
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you-english2.html');
} 
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>