<?php
	/*
		WORK IN PROGRESS!!!

		first check the core files
			use array and do if(!exist) -> push to array of missing
		check content files, if the manifest is missing, say so
			first check for dblogin, main/client and main/server...then check file manifest
			(different error message for these instead of core files..."content files same with die() message")	
	*/

	//index.php, fileIntegrity.php are excluded obviously...
/*	$manifest = array
	(
		"uuwat/database/connect.php",
		"uuwat/base.css",
		"uuwat/base.js",
		"uuwat/base.php"
	);

	$missingFiles = false;
	$missingList = array();
	
	foreach($manifest as $cell)
	{
		if(!file_exists($cell))
		{
			$missingFiles = true;
			array_push($missingList, $cell);
		}
	}

	if($missingFiles)
	{
		$outputText = "Missing Files.";
		foreach ($missingList as $cell) 
			$outputText = $outputText."\n\t\"".$cell."\"";
		
		logError("files", $outputText);
	}*/

?>
