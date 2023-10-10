<?php
	include 'core/init.php';

	if(empty($_POST === false))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];

		if(empty($username) === true || empty($password) === true)
		{
			$_SESSION['loginError'] = "You need to enter a username and password.";
			header("Location: /");
		}
		else
		{
			if(user_exists($username) === false)
			{
				$_SESSION['loginError'] = "We can't find that username. Have you registered?";
				header("Location: /");
			}
			else
			{
				if(user_active($username) === false)
				{
					$_SESSION['loginError'] = "You haven't activated your account.";
					header("Location: /");
				}
				else
				{
					$login = login($username, $password);
					if($login === false)
					{
						$_SESSION['loginError'] = "That username/password combination is incorrect.";
						header("Location: /");
					}
					else
					{
						$_SESSION['user_id'] = $login;
						header("Location: /");
					}
				}
			}
		}
	}

?>