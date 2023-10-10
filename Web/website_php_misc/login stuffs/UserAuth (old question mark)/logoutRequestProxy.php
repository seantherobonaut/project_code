<?php
	//TODO maybe make a check if session has started?
	//session_start(); 
	unset($_SESSION['user_data']);
	unset($_SESSION['login_error']);
	if(!empty($_GET['redirect']))
		header('Location: '.$_GET['redirect']);
	else
		header('Location: /');
		
	exit();
?>
