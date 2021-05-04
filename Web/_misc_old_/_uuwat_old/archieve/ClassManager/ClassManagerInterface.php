<?php
	session_start();
	$_SESSION["user_data"]["rank"] = "admin";
	//rather than using names like "last_location" or "previous_page" use "redirect" that it set by the last page
	if(empty($_SESSION["user_data"]))
	{
		//header("Location: /admin");
		exit("you aren't logged in");
	}
	else
	{
		if($_SESSION["user_data"]["rank"] != "admin")
		{
			//header("Location: /admin");
			exit("you aren't admin");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	yay
	</body>
</html>
