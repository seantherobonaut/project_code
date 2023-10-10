<?php
	//code...
?>
<style type="text/css">
	.adminBar a
	{
		display: block;
	}

	.modNav a{color:blue;}
	.modSocmed a{color:green;}
	.modPage a{color:red;}
</style>
<div class="s3 adminBar" style="border:1px solid red">
	Welcome back <?php echo $_SESSION["user_data"]["username"];?>!<br>
	<div class="modNav">
		<a href="">Add nav</a>
		<a href="">Delete nav</a>
		<a href="">Modify nav</a>
	</div>
	<br>
	<div class="modSocmed">		
		<a href="">Add soc media icons</a>
		<a href="">Delete soc media icons</a>
		<a href="">Modify soc media icons</a>
	</div>
	<br>
	<div class="modPage">		
		<a href="">Add page</a>
		<a href="">Delete page</a>
		<a href="">Modify page</a>
	</div>
</div>