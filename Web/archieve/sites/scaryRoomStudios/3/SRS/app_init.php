<?php
/*
	old copy backup?
		<?php
		if(!empty($_SESSION['user_data']))
			if($_SESSION['user_data']['rank'] == 'admin')
				echo '<div><button class="deleteButton" onclick="deleteForm('.$parentID.');">X</button><br style="clear:right"></div>';
	?>



					<form method="post" action="/?requestproxy=deleteTemplate" class="formDelete dataForm">
					Remove items:<br>
					&nbsp; - content_base:<span style="font-size: inherit;color:inherit;" class="dataID"></span>?
					<br>
					<input type="hidden" name="template_id" value="">
					<div style="text-align: right">
						<input class="formButton" type="submit" value="Yes">
						<button class="formButton" type="button" onclick="closeForm();">No</button>						
					</div>
				</form>

*/

	// //This function loads scripts (css/js) from a database table depending on the template id loaded!!!!
	// function gatherHeaders($condition)
	// {
	// 	//The logic is encapsulated inside a function to reduce ambiguity 
	// 	$scriptSearch = new DataObject('SELECT * FROM `scripts` WHERE `condition`=?;');
	// 	$scriptSearch->runQuery(array('page:'.$condition));
	// 	$results = $scriptSearch->fetchAllData();
	// 	foreach ($results as $key) 
	// 	{
	// 		if($key['type'] == 'css')
	// 			Headers::newcss($key['path']);
	// 		if($key['type'] == 'js')
	// 			Headers::newjs($key['path']);
	// 	}
	// }
	// gatherHeaders($_GET['page']);		
	
	//design one to set the title based on the get['page']	
	

/*	//This is the admin bar that only shows if you are logged in.
	if(!empty($_SESSION['user_data']))
		require 'Tools/toolbar.php';

	//This searches through the content_base table for templates and posts that match certain conditions
	$contentData = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=0 AND `condition`=?");
	$contentData->runQuery(array('page:'.$_GET['page']));
	if($contentData->rowCount() > 0)
	{
		//prepare sql statement to search for just content_templates with matching ids
		$templateData = new DataObject("SELECT * FROM content_templates WHERE content_id=?");

		$contentResults = $contentData->fetchAllData();
		foreach($contentResults as $key => $value)
		{
			//if the content_base is of type 'template' search the content_templates table for matches
			if($value['type'] == 'template')
			{
				//pass data of reslut to query
				$templateData->runQuery(array($value['id']));
				if($templateData->rowCount()>0)
				{
					//if a tempalte is found, create a new instance of that template type, initialize it with the content_base id, and render it here
					$resultTemplate = $templateData->fetchData();
					$baseTemplate = new $resultTemplate['template_name'];

					$baseTemplate->init($resultTemplate['content_id']);		
					$baseTemplate->exec();
				}
				else
					echo '<hr>'.htmlOut('No matching template found for content_base id:'.$value['id'].'!').'<hr>';
			}
			else
				echo '<hr>'.htmlOut('Root content must always be of type template!').'<hr>';
		}
	}
	else
		echo '<div style="text-align:center;font-size:16px;padding:10px;font-family:sans-serif">This location has no data. Return <a style="color:blue;font-size:inherit" href="/home">Home</a>?</div>';
*/

	//TODO make different error 404s for NoPage, NoTemplate, NoFile?

	//Start of app
	require 'uuwat/Base/htmlPrinter.php';
	require Config::$dbConn['user'];
	
	//This is where headers, title, meta data are set before loading the DOM
	Headers::$title = 'SRS';
	Headers::$author = 'Sean Leapley';
	Headers::newjs('uuwat/Base/jquery3.2.1.min.js');
	Headers::newcss('uuwat/Base/core.css');
	Headers::newjs('uuwat/Base/core.js');

	//use request to get base_content ids...what if checking for a condition WAS a module... with a parentID of 0

	//This output buffer takes all html output and stores it in a variable without displaying it.
	ob_start();

	

	//Gather all headers and output and inject into DOM.php
	$headersOutput = Headers::getHeaders();
	
	$output = ob_get_clean();
	require 'core/DOM.php';
?>
