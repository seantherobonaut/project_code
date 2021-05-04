<!-- Write out the proxy -->
<h3>Forgot password</h3>

<form action="/?requestproxy=resetEmail" method="post">
	Email <input type="text" name="email" placeholder="Email...">
	<!-- Make sure we redirect back to the right page if there is an error -->
	<input type="submit" value="send">
</form>
<?php
	

	if(!empty($_SESSION['valid_email']))
	{
		if($_SESSION['valid_email'] == 'valid')
			echo 'Please check your email for a special activation link.';		
		else if($_SESSION['valid_email'] == 'empty')
			echo 'You must not leave the field blank.';
		else
			echo 'Your email is not in our database.';

		unset($_SESSION['valid_email']);
	}
?>