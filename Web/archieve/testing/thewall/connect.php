<?php
	$host = '';
	$user = '';
	$pass = '';
	$dbname = '';

	$db = mysqli_connect($host, $user, $pass, $dbname);

	if(!$db)
		echo 'Failed.', '<br />', mysqli_connect_error(), '.<br />';
	else
		//echo 'Success!', '<br />';
?>