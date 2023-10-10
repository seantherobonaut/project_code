<?php
	session_start();

	if(!empty($_POST['comment']))
	{
	    require 'DataObjectClass.php';
	    require 'connect.php';

		$newComment = $_POST['comment'];
		
		$insertComment = new DataObject("INSERT INTO `comments` (`text`) VALUES(?);");
		$insertComment->runQuery(array($newComment));
	}

	header('Location: /');
	exit();
?>