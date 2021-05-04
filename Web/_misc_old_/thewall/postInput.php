<?php
	if(isset($_POST['myinput'], $_POST['recordNum']))
	{
		$changes = trim($_POST['myinput']);
		$changenum = trim($_POST['recordNum']);
		mysqli_query($db, "UPDATE list SET name = '{$changes}' WHERE uuid = {$changenum}");
		header('Location: index.php');
	}

	//Delete entries
	if(isset($_POST['delete']))
	{
		$delete = trim($_POST['delete']);
		mysqli_query($db, "DELETE FROM list WHERE uuid={$delete}");
		header('Location: index.php');
	}

	//Inserting Entries
	if(isset($_POST['name']))
	{
		$inName = trim($_POST['name']);
		if(!empty($inName))
		{
			mysqli_query($db, "INSERT INTO list (name) VALUES ('{$inName}')");
			header('Location: index.php');
		}
	}
?>