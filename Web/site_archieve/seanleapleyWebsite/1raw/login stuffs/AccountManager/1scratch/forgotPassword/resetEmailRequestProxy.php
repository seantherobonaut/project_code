<?php
	//we need a lastlocation session to redirect here...hidden field
	/*		
		ask for their email, if it is found send them an email with a token randomly generated.
			str_shuffle() it will scramble a string
			substr() to randomly select a part of that string ...use random numbers
			link:  http://www.localhost.com/reset/?email=example@email.com&token=sasiudfhaoiuf4343
		if not, tell them their account does not exist
		be sure to tell them to check their email

	*/

	//Check if to see if they didn't leave the field empty
	if(!empty($_POST['email']))
	{		
		//If their account with that email is found in the database, then send them a password reset email
		$email = $_POST['email'];
		require Config::$dbConn['user'];
		$checkEmail = new DataObject("SELECT * FROM `users` WHERE `email`=?;");
		$checkEmail->runQuery(array($email));
		if($checkEmail->rowCount() > 0)
		{
			//get a selection of 6 random chars from a scrambled string
			$rand = random_int(0,30);
			$str = "0123456789qwertyuiopasdfghjklzxcvbnm";
			$str = str_shuffle($str);
			$token = substr($str, $rand, 6);

			//Create timestamp and format it to become part of the token
			$currTime = new TimeStamp;
			$stamp = $currTime->getStamp();

			//Format final stamp
			$newToken = $token.'_'.$stamp;

			//Update token+timestamp into database
			$updateToken = new DataObject("UPDATE `users` SET `token`=? WHERE `email`=?;");
			$updateToken->runQuery(array($newToken,$email));

			//Setup email details
			$subject = 'UUWAT email validation';
			$to = $email;
			$from = 'UUWAT <no-reply@codetest.host22.com>';

			$headers = "From: $from\r\n";
			$headers .= "Reply-To: $from\r\n";
			$headers .= "Return-Path: $from\r\n";	
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

			$link = "http://codetest.host22.com/forgotPassword?email=$email&token=$token.";
			$message = "This is just a test. Please click the link below to reset your password: $link\r\n";

			mail($to, $subject, $message, $headers);

			$_SESSION['valid_email'] = 'valid';	
		}
		else
			$_SESSION['valid_email'] = 'invalid';	
	}
	else
		$_SESSION['valid_email'] = 'empty';

	header('Location: /forgotPassword');

	exit();
?>