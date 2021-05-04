<div class="login">
	<form action="/?requestproxy=login" method="post">	
		<div>

			<input type="text" name="username" placeholder="Username..." value="" autocomplete="off">
			<br>
			<input type="password" name="password" placeholder="Password..." value="" autocomplete="off">
			<br>
			<?php echo (!empty($_SESSION["login_error"]) ? htmlOut($_SESSION["login_error"]) : null);?>
			<br>

			<input type="submit" value="login">	
		</div>
	</form>
</div>
