<?php
	require Config::$dbConn['user'];
	
	//post paraID, updatePara
	//TODO test if hidden and disabled 'targetElement was sent to server'
	if(!empty($_POST['updatePara']))
	{
		$paraIO = new ParagraphContent;

		//setter
		$paraIO->updateID($_POST["paraID"], $_POST["updatePara"]);
		//getter
		echo $paraIO->selectID($_POST["paraID"])['text'];
	}
?>
