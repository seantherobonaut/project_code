<?php
	include $_SERVER["DOCUMENT_ROOT"]."/"."uuwat/init.php";

	if(isset($_SESSION["user_data"]))
	{
		if($_SESSION["user_data"]["rank"] == "admin")
		{
			$checkTables = new TableManager($_SERVER["DOCUMENT_ROOT"], "/^.+TableSetup\.php$/i");

			echo "Success!<br>";
			
			$tableCheck = new DataObject($dbUser->getQueryObject($checkTables->getSql($checkTables->getSqlArray())));
			$tableCheck->runQuery();
			//later print out the list of tables...maybe from file or get table list from database?

			//print comparison tablesetups vs existing tables
			$listTables = new DataObject($dbUser->getQueryObject("SHOW TABLES FROM srs"));
			$listTables->runQuery();
			echo "<pre>";
			print_r($listTables->fetchAll($listTables->getData()));
			echo "</pre>";
		}
		else
			echo "You do not have permission to perform this action.";
	}
	else
		echo "You must be logged in to do that.";
?>
