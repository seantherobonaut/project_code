<?php
	/*Awesome plugin loader goes here*/
	function loadPlugins($module)
	{
		switch($module)
		{
			case "preDOM":
				break;
			case "head":
				break;
			case "startDOM":
				//Dynamic Background
					include 'plugins/dynBackground/server.php';		
				break;
			case "DOM":
				break;
			case "endDOM":
				break;
		}
	}
?>
