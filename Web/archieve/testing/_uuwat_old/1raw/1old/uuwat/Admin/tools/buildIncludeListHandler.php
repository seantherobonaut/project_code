<?php
	//this must be run under index.php
	require Config::$dbConn['sys'];
	require 'uuwat/Base/htmlPrinter.php';
	if(!empty($_SESSION['user_data']))
	{
		if($_SESSION['user_data']['rank'] == 'admin')
		{
			$listBuilder = new IncludeListBuilder;
			$listBuilder->setListLocation(Config::$path['app'].'includeList.php');
			$listBuilder->setPaths(Config::$searchPaths);
			$listBuilder->buildList();
			unset($listBuilder);
			
			echo 'Classes:<br>';
			require Config::$path['app'].'includeList.php';
			echo arrayOut($globalIncludeList);
		}
		else
			echo 'You do not have permission to perform this action.';
	}
	else
		echo 'You must be logged in to do that.';
?>
