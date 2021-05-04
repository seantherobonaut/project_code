<?php
	session_start();

	if(empty($_SESSION["user_data"]["devMode"]))
	{
		$_SESSION["redirect"] = $_SERVER["REQUEST_URI"];
		header("Location: /admin");
		exit();
	}

	//require_once "PMhandler.php";
	//ajax requests and formboxes here
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Package Manager</title>
	</head>
	<body>
		So, this is Vegas eh?
		<pre>
			<?php
				print_r($_SESSION["user_data"]);
			?>
		</pre>
	</body>
</html>