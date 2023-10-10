<?php
	if(isset($_SESSION["user_data"]))
	{
		if($_SESSION["user_data"]["rank"] == "admin")
		{
			include "../FileSearchClass.php";
			include "BCLCoreClass.php";
			$bcl = new BCLCore;
			$bcl->buildList();
			echo "Success!<br>";
			include $_SERVER["DOCUMENT_ROOT"]."/classList.php";
			echo "<pre>";
				print_r($globalClassList);
			echo "</pre>";
		}
		else
			echo "You do not have permission to perform this action.";
	}
	else
		echo "You must be logged in to do that.";
?>