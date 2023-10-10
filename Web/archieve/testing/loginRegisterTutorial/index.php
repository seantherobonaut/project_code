<!DOCTYPE html>
<html>
	<?php include 'core/init.php';?>
	<?php include 'includes/head.php';?>
	<body>
		<?php include 'includes/header.php';?>
		<div id="container">
			<?php include 'includes/aside.php';?>
			<h1>Home</h1>
			<p>Just another template.</p>
			<?php
				if(isset($_SESSION['user_id']))
				{
					echo "Logged in.";
				}
				else
				{
					echo "Not logged in." . "<br>";
					if(isset($_SESSION['loginError']))
						echo $_SESSION['loginError'];
				}

				if(isset($_GET["test"]))
					echo "<br>" . $_GET["test"];
			?>
		</div>
		<?php include 'includes/footer.php';?>
	</body>
</html>