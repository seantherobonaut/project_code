<!DOCTYPE html>
<html>
	<head>
		<title>Test Email</title>
	</head>
	<body>
		<p>Please write a Test Email here.</p>
		<span style="display: inline-block;">
			<form action="/?requestproxy=testEmail" method="post">
				Message: <input type="text" name="message">
				<input type="submit" name="Send">
			</form>
			<?php
				if(!empty($_SESSION['emailStatus']))
				{
					if($_SESSION['emailStatus'] == 1)
						echo '<script type="text/javascript">alert("Message sent successfully.");</script>';
					
					if($_SESSION['emailStatus'] == 0)
						echo '<script type="text/javascript">alert("Message NOT sent.");</script>';
				}

				unset($_SESSION['emailStatus']);
			?>	
		</span>
		
	</body>
</html>