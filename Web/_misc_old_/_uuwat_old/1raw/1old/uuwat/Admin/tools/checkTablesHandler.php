<?php
	//this must be run under index.php
	require Config::$dbConn['sys']; //test for DB connection before going ahead with process.
	require 'uuwat/Base/htmlPrinter.php';
	if(!empty($_SESSION['user_data']))
	{
		if($_SESSION['user_data']['rank'] == 'admin')
		{
			echo 'Tables:<br>';

			$tables = new TableRegisterSearch;
			$tableCheck = new DataObject($tables->getSQL());
			$tableCheck->runQuery();

			$tableList = new DBinfo(); 
			echo arrayOut($tableList->listTables($tableList->getDBname())); //maybe implode the array with breaklines
		}
		else
			echo 'You do not have permission to perform this action.';
	}
	else
		echo 'You must be logged in to do that.';
?>
