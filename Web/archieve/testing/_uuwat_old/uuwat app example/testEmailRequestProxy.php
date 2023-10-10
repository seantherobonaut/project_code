<?php
	if(!empty($_POST['message']))
	{
		$subject = 'UUWAT Message';
		$from = 'no-not@reply.com';
		$to = 'seantherobonaut@gmail.com';
		$headers = "From: $from"."\r\n";
		$message = $_POST['message'];

		mail($to, $subject, $message, $headers);
		$_SESSION['emailStatus'] = 1;
	}

	header('Location: /');	
	exit();
?>