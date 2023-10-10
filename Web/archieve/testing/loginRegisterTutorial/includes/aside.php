<aside>
	<?php
		if(logged_in() === true)
		{
			echo "Logged in." . "<br>";
			echo "<a href='logout.php'>Logout</a>";
		}
		else
		{
			include 'includes/widgets/login.php';
		}

	?>
</aside>