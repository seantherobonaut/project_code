<?php
	//TODO last location redirect
	if(!empty($_SESSION['user_data']))
	{
		if($_SESSION['user_data']['rank'] == 'admin')
		{
			if(!empty($_POST['name']) && !empty($_POST['link_type']) && !empty($_POST['url']) && !empty($_POST['rootTemplate']))
			{
				/*
					insert new entry into titles
					add new entries into titles
				*/
				require Config::$dbConn['user'];

				//Check if the page already exists
				$checkDupe = new DataObject("SELECT * FROM `content_base` WHERE `condition`=?;");
				$checkDupe->runQuery(array('page:'.str_replace("/","",$_POST['url'])));
				if($checkDupe->rowCount() > 0)
					$_SESSION['operationStatus'] = 'Page '.$_POST['url'].' already exists!';
				else
				{
					//Create new Menu item for the page
					$menuOps = new DataObject("INSERT INTO `hyperlinks` (`name`,`url`,`type`,`group`) VALUES(?,?,?,'navlinks');");
					$menuOps->runQuery(array($_POST['name'],$_POST['url'],$_POST['link_type']));

					//Create a new base template
					$createBase = new DataObject("INSERT INTO `content_base` (`parent_id`,`type`,`condition`) VALUES(0,'template',?);");
					$createBase->runQuery(array('page:'.str_replace("/","",$_POST['url'])));

					//Grab the id of the new base template
					$baseID = $createBase->lastID();

					//create a new matching entry in the templates table
					$createTemplate = new DataObject("INSERT INTO `content_templates` (`content_id`,`template_name`) VALUES(?,'mainTemplate');");
					$createTemplate->runQuery(array($baseID));
					
					$_SESSION['operationStatus'] = 'Page: \"'.$_POST['name'].'\" created!';
				}
			}
			else
				$_SESSION['operationStatus'] = 'You must fill in ALL fields...';			
		}
		else
			$_SESSION['operationStatus'] = 'You must be admin to do that!';		
	}
	else
		$_SESSION['operationStatus'] = 'You must be logged in as an admin to do this!';

	header('Location: /');

	exit();
?>

