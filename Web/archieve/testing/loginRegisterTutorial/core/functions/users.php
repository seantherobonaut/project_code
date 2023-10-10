<?php
	function logged_in()
	{
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	function user_exists($username)	
	{
		global $db;
		$username = sanatize($username);

		$query = mysqli_query($db, "SELECT * FROM users WHERE username='{$username}'");
		return (mysqli_num_rows($query) > 0) ? true : false;
	}

	function user_active($username)	
	{
		global $db;
		$username = sanatize($username);

		$query = mysqli_query($db, "SELECT * FROM users WHERE username='{$username}' AND active=1");
		return (mysqli_num_rows($query) > 0) ? true : false;
	}

	function user_id_from_username($username)
	{
		global $db;
		$username = sanatize($username);

		$result = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE username='{$username}'"));
		return $result['user_id'];
	}

	function login($username, $password)
	{
		global $db;
		$user_id = user_id_from_username($username);

		$username = sanatize($username);
		$password = md5($password);
		$result = mysqli_fetch_row(mysqli_query($db, "SELECT COUNT('user_id') FROM users WHERE username='{$username}' AND password='{$password}'"));

		return ($result[0] == 1) ? $user_id : false;
	}
?>