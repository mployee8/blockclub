<?php

	$answer = '';
	$myemail = '136stblock200@gmail.com';
	

	if($_POST['yes'])

	{
		$answer = 'yes';
	}


	if($_POST['no'])

	{
		$answer = 'no';
	}






	
	$textarea = $_POST['textarea'];



	$to = $myemail; 
	$subject = "Block Party Vote";
	$body = "You have received a new message. ".
	" Here are the details:\n Vote: $answer \n Comment: $textarea"; 
	
	$headers = "From: $myemail\n"; 
	
	
	mail($to,$subject,$body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankyou.html');






?>