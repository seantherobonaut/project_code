<?php
	//mysqli_num_rows needs at least 1 row present or it returns warning
	function checkPluginsTable()
	{
		global $db;
		if(!mysqli_query($db, "SELECT * FROM plugins"))
		{
			$sqlCheck = 
			"CREATE TABLE plugins
			(
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(50) NULL,
				get TEXT NULL,
				session TEXT NULL,
				state VARCHAR(50) NULL
			)";
			mysqli_query($db, $sqlCheck);
			
			$sqlInsert = 
			"INSERT INTO plugins 
				(name, get, session, state) 
				VALUES
				(
					'examplePlugin',
					'getVar1:getVal1,getVar2:getVal2',
					'sessionVar1:sessionVal1,sessionVar2:sessionVal2',
					'whitelist/blacklist'
				)
			";
			mysqli_query($db, $sqlInsert);
			return false;
		}
		else
			return true;
	}
	
	function getPluginList()
	{
			//SELECT name FROM plugins WHERE id!=1 AND state='whitelist'
		global $db;
		if(checkPluginsTable())
		{
			$sqlPlugins = 
			"
				SELECT * FROM plugins WHERE id=6
			";
			$pluginList = mysqli_query($db, $sqlPlugins);
			return $pluginList;
		}
		else
			return null;
	}

	function veryifyRequests($requestString, $type)
	{
		$status = true;

		if($requestString !== null)
		{
			$requests = explode(",", $requestString);
			foreach($requests as $requestItem)
			{
				$requestArray = explode(":", $requestItem);

				if($type == "get")
				{
					if(!isset($_GET[$requestArray[0]]))
						$status = false;
					else
						if($_GET[$requestArray[0]] != $requestArray[1])
							$status = false;	
				}
			
				if($type == "session")
				{
					if(!isset($_SESSION[$requestArray[0]]))
						$status = false;
					else
						if($_SESSION[$requestArray[0]] != $requestArray[1])
							$status = false;	
				}
			}
		}

		return $status;
	}

	function gatherRequests($inputRow)
	{
		$load = "";
		//Either get or session must be NOT empty
		if($inputRow['get'] === null && $inputRow['session'] === null)
			$load = "empty";
		else
		{
			$load = "No";
			$getCheck = veryifyRequests($inputRow['get'], "get");
			$sessionCheck = veryifyRequests($inputRow['session'], "session");

			if($getCheck == true && $sessionCheck == true)
				$load = "Yes";

		}
		return $load;
	}

	//	$pluginArray = array();
	//are strings the only working dataTypes? logged_in=1, or bool true? probably not...
	$result = getPluginList();
	$row = mysqli_fetch_assoc($result); //time to make this into a loop and return plugins that can or cannot load
	$output = gatherRequests($row);
	
	function getOutput()
	{
		global $output;
		return $output;
	}

    include "uuwat/pluginLoader/loadPlugins.php";
?>
