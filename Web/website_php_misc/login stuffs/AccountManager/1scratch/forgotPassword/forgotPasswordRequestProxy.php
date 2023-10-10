<?php
	/*
		once they click on the link, it will take them to a page to reset their password
		on that page make, it will take the get request for email and token

			


		check to make sure they filled in all fields

		compare given password with stored password (make sure this matches or tell them it doesn't)

		make sure new password and confirm password is equal
			start using trim() on user input to make sure there is no whitespace on either side

		once the request is processed, erease the token

		make sure someone doesn't have a url where the token is empty and it might work still
	*/
	

	//get login credentials
	$userLoginInput = null;
	$userDataInput = null;
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		//set userLogin (assoc array of username, password)
		$userLoginInput = array('username'=>$_POST['username'], 'password'=>$_POST['password']);

		//set userData (assoc array of user_id, username, password, rank, active)
		if(empty($_POST['root_login']))
			require 'loginUser.php';
		else
			require 'loginRoot.php';
		$userDataInput = $loginData;
	}

	//check login credentials (compare data entered from user to data found on database or file)
	$auth = new UserLogin($userLoginInput, $userDataInput);
	$user_data = $auth->getUserData();
	$message = $auth->getMessage();

	if(!empty($user_data))
	{
		unset($_SESSION['login_error']);
		$_SESSION['user_data'] = $user_data;
		if(!empty($_POST['redirect']))
			$newLocation = $_POST['redirect'];
		else
			$newLocation = "/";
	}
	else
	{
		unset($_SESSION['user_data']);
		$_SESSION['login_error'] = $message;
		$newLocation = $_SESSION['last_location'][0];
	}

	header('Location: '.$newLocation);

	exit();
?>
