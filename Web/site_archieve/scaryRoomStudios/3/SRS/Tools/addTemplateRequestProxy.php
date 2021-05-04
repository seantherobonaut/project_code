<?php
	//TODO last location redirect
	
	//You must be logged in as an admin to complete this action
	if(!empty($_SESSION['user_data']))
	{
		if($_SESSION['user_data']['rank'] == 'admin')
		{
			if(!empty($_POST['parent_id']) && !empty($_POST['template_type']))
			{
				require Config::$dbConn['user'];

				//Create a new base template
				$createBase = new DataObject("INSERT INTO `content_base` (`parent_id`,`type`,`condition`) VALUES(?,'template','');");
				$createBase->runQuery(array($_POST['parent_id']));

				//Grab the id of the new base template
				$newID = $createBase->lastID();

				//create a new matching entry in the templates table
				$createTemplate = new DataObject("INSERT INTO `content_templates` (`content_id`,`template_name`) VALUES(?,?);");
				$createTemplate->runQuery(array($newID,$_POST['template_type']));
				
				$_SESSION['operationStatus'] = 'Template "'.$_POST['template_type'].'" with id:'.$newID;
			}
			else
				$_SESSION['operationStatus'] = 'Fields are missing from the data set.';
		}
	}

	header('Location: /');
	exit();
?>

