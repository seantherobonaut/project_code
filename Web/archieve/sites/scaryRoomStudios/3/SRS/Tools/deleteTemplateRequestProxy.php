<?php
	//TODO last location redirect

	$delLogger = new SysLogger;

	if(!empty($_POST['template_id']))
	{
		require Config::$dbConn['user'];
			
		//array of items marked for deletion
		$baseMarked = array();
		$templateMarked = array();
		$postMarked = array();

		//Remember, it doesn't matter what the condition is, if they want to delete that page...it means ALL content associated with it
		function recursion_test($dataArray)
		{
			global $baseMarked;
			global $templateMarked;
			global $postMarked;

			$baseSearch = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=?;");
			$baseSearch->runQuery(array($dataArray['id']));
			if($baseSearch->rowCount() > 0)
			{
				while($result = $baseSearch->fetchData())
				{
					array_push($baseMarked, $result);
					if($result['type'] == 'template')
					{
						$templateSearch = new DataObject("SELECT * FROM `content_templates` WHERE `content_id`=?;");
						$templateSearch->runQuery(array($result['id']));
						if($templateSearch->rowCount() > 0)
							array_push($templateMarked, $templateSearch->fetchData());
					}
					if($result['type'] == 'post')
					{
						$postSearch = new DataObject("SELECT * FROM `content_posts` WHERE `content_id`=?;");
						$postSearch->runQuery(array($result['id']));
						if($postSearch->rowCount() > 0)
							array_push($postMarked, $postSearch->fetchData());
					}				
					recursion_test($result);
				}
			}
		}

		$test1 = new DataObject("SELECT * FROM `content_base` WHERE `id`=?");
		$test1->runQuery(array($_POST['template_id']));					
		if($test1->rowCount() > 0)
		{
			$result = $test1->fetchData();
			array_push($baseMarked, $result);

			if($result['type'] == 'template')
			{
				$templateSearch = new DataObject("SELECT * FROM `content_templates` WHERE `content_id`=?;");
				$templateSearch->runQuery(array($result['id']));
				if($templateSearch->rowCount() > 0)
					array_push($templateMarked, $templateSearch->fetchData());
			}
			//TODO delete the post's actual content not just the entry
			if($result['type'] == 'post')
			{
				$postSearch = new DataObject("SELECT * FROM `content_posts` WHERE `content_id`=?;");
				$postSearch->runQuery(array($result['id']));
				if($postSearch->rowCount() > 0)
					array_push($postMarked, $postSearch->fetchData());
			}

			//first run of recursion function
			recursion_test($result);

			//Prepared queries for deletion
			$deleteBase = new DataObject("DELETE FROM `content_base` WHERE id=?;");
			$deleteTemplate = new DataObject("DELETE FROM `content_templates` WHERE id=?;");
			$deletePost = new DataObject("DELETE FROM `content_posts` WHERE id=?;");
			
			//loop through all arrays until all items are deleted
			foreach($baseMarked as $key => $value)
			{
				$deleteBase->runQuery(array($value['id']));
				$delLogger->log('Deleted content_base id:'.$value['id']);
			}
			foreach($templateMarked as $key => $value)
			{
				$deleteTemplate->runQuery(array($value['id']));
				$delLogger->log('Deleted content_template id:'.$value['id']);
			}
			foreach($postMarked as $key => $value)
			{
				$deletePost->runQuery(array($value['id']));
				$delLogger->log('Deleted content_post id:'.$value['id']);
			}

			$_SESSION['operationStatus'] = 'You deleted template id:'.$_POST['template_id'].'.';
		}
		else
			$_SESSION['operationStatus'] = 'This item does not exist.';
	}
	else
		$_SESSION['operationStatus'] = 'You are missing fields in the form.';

	header('Location: /');
	exit();
?>
