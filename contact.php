<?php 
$errors = '';
$myemail = 'solomon@solomontompkins.com';//<-----Put Your email address here.
if(empty($_POST['membername'])  || 
   empty($_POST['buildingnumber']) || 
   empty($_POST['phonenumber']) ||
   empty($_POST['memberemail']))
{
    $errors = "\n Error: all fields are required";
}

$name = $_POST['membername']; 
$buildingnumber = $_POST['buildingnumber'];
$phone = $_POST['phonenumber']; 
$email_address = $_POST['memberemail']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors = "\n Error: Invalid email address";
}

if (empty($errors))
{
	$to = $myemail; 
	$subject = "Contact form submission: $name";
	$body = "You have received a new message.".
	" Here are the details:\n Name: $name \n Email: $email_address \n Building Number \n $buildingnumber \n Phone Number \n $phone"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$subject,$body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankyou.html');
}


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
echo ($name);
echo ($phone);
echo ($buildingnumber);
echo ($email_address);
?>


</body>
</html>