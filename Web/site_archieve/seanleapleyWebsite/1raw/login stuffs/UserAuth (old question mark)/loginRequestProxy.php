<?php
	//This must be run from index.php
	//TODO if the user_data table doesn't exist, return the "login_error" as "missing user_table"...and every other place using DataObject too
	/* TODO
		Later, make a separate loginAjaxRequestProxy that only redirects if the login is authenticated
			...otherwise just echo login error w/o session
	*/
	//TODO eventually make a permission heirarchy so rank 'system' or 'developer' also includes admin/mod/member groups ...for now just 'admin'

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
