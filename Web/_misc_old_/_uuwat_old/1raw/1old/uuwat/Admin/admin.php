<?php
	/*TODO (maybe)
		When another page redirects to the admin page.... it should set get param /admin/?redirect=so_n_so 
			Then...when you press submit, this admin login form will send post data of $_GET["redirect"]
				...most tools are located on this page...so don't try this for a while

		Planned tools:
		- Global Find and Replace
		- Print out all comments (//TODO) and (blockComment TODO), with their file locations and lines...option to open files externally?
		- build includes list
		- build requestProxies list
	*/

	/*
		Maybe to fix header problem our error handler can just display a popup that blocks everythign with css saying there is an error
		instead of redirecting to different pages?

		it goes to the handler and then prints out css block with display block for box text
	*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Interface</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			.tools a
			{
				color:blue;
				margin-right:5px;
			}
		</style>
	</head>
	<body>
		<?php
			echo 'php_version: '.phpversion().'<br>';
			if(!empty($_GET['newpass']))
				echo password_hash($_GET['newpass'], PASSWORD_BCRYPT, array('cost' => 10)).'<br>';
		?>
		<a href="/" style="color:blue;text-decoration: none;border:1px solid #999;padding:1px 5px;font-size: 13px;color:black;background-color: #e9e9e9">Home</a><br>
		<a href="/?requestproxy=logout" style="color:blue;text-decoration: none;border:1px solid #999;padding:1px 5px;font-size: 13px;color:black;background-color: #e9e9e9">Logout Home</a><br>
		<a href="/?requestproxy=logout&redirect=/admin" style="color:blue;text-decoration: none;border:1px solid #999;padding:1px 5px;font-size: 13px;color:black;background-color: #e9e9e9">Logout Here</a><br>
		<form action="/?requestproxy=login" method="post" style="border:1px solid gray;display: inline-block;padding:5px;margin-top:7px;margin-bottom:7px;<?php if(!empty($_SESSION['user_data'])) echo 'display:none;';?>">
			<b><u>Admin Login</u>:</b>&nbsp;
			username: <input type="text" name="username">
			password: <input type="password" name="password">
			<input type="hidden" name="root_login" value="true">
			<input type="hidden" name="redirect" value="/admin">
			<input type="submit" value="Login.">
			<br>
			<div style="text-align: right; border-top:1px solid #999; margin-top:6px; padding-top:2px;">
				<a href="/forgotPassword">Forgot Password</a>&nbsp;|&nbsp;<a href="/registerUser">Register</a>
			</div>
			<?php //print out login error
				$message = (!empty($_SESSION['login_error']) ? $_SESSION['login_error'] : null);
				if(!empty($message))
				{
					echo '<div style="text-align:right;border-top:1px solid #999;margin-top:6px;padding-top:2px;padding-left:20px">';
					echo $message;
					echo '</div>';
				}
			?>
		</form>
		<?php
			if(!empty($_SESSION['user_data']))
				echo 'Welcome back '.$_SESSION['user_data']['username'].'!';
		?>
		<br>
		<span class="tools">
			<a href="/admin/?tool=buildIncludeListHandler">BuildIncludeList</a>
			<a href="/admin/?tool=checkTablesHandler">checkTables</a>
		</span>
		<?php
			if(!empty($_GET['tool']))
			{
				echo '<hr>';

				$tool = Config::$path['uuwat'].'Admin/tools/'.$_GET['tool'].'.php';
				if(file_exists($tool))
					require $tool;
				else
					echo 'tool '.$_GET['tool'].' does not exist.';
			}
		?>
	</body>
</html>
