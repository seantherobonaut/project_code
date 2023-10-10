<?php
	//TODO make a way to check password stregth, check out how you verify passwords at this time
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		<style type="text/css">
			form
			{
				width:370px;
			}
			form div > div:nth-child(1)
			{
				float:left;				
			}
			form div > div:nth-child(2)
			{
				float:right;				
			}
		</style>
	</head>
	<body>
		<?php
			if(!empty($_GET['email']) && !empty($_GET['token']))
			{
				//check if that email exists in database
				//check if token is valid
				require Config::$dbConn['user'];
				$check = new DataObject("SELECT * FROM `users` WHERE `email`=?;");
				$check->runQuery(array($_GET['email']));
				if($check->rowCount() > 0)
				{				
					$data = explode("_", $check->fetchData()['token']);

					$token = $data[0];
					$timestamp = $data[1];

					if($_GET['token'] == $token) //TODO an not 0
					{
						//Feed token into static timestamp function that compares time, if it comes back as greater than 10 minutes in seconds, then the token is too old.
						
						

						echo 'Token correct!';
						//require 'changePassword.php';
					}
					else
						echo 'That token isn\'t correct.';
				}
				else
					echo 'That email doesn\'t exist';
			}
			else
				require 'resetEmail.php';
		?>
	</body>
</html>