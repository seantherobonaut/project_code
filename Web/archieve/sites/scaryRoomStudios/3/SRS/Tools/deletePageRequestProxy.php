<?php
	//TODO check if page does not exist!
	//TODO last location redirect
	//TODO with operationStatus print out all items that were deleted, not just the page

/*
	rather than having id and type that chances confusing them just have
	$_POST['pagelink_id'] and $_POST['content_id']

	have a function that you pass a row from content_base to
	whether you get the row from a link, or from a direct id, pass that row to the recursion function

	have a function from recursion, and another function to seperate them? no functions inside other functions, just the function call
*/

	$delLogger = new SysLogger;

	if(!empty($_SESSION['user_data']))
	{
		if($_SESSION['user_data']['rank'] == 'admin')
		{
			if(!empty($_POST['id']) && !empty($_POST['type']))
			{
				require Config::$dbConn['user'];
				$linkData = new DataObject("SELECT * FROM `hyperlinks` WHERE id=?;");
				$linkData->runQuery(array($_POST['id']));
				if($linkData->rowCount() > 0)
				{
					$result = $linkData->fetchData();
					$feedback = $result;

					//first delete entry from menu links
					$deleteLink = new DataObject("DELETE FROM `hyperlinks` WHERE id=?;");
					$deleteLink->runQuery(array($result['id']));
					$delLogger->log('Deleted hyperlink:"'.$result['name'].'" with url:'.$result['url'].' of id:'.$result['id']);
					
					//array of items marked for deletion
					$baseMarked = array();
					$templateMarked = array();
					$postMarked = array();

					//begin recursively searching for items to be deleted only if the page is NOT external
					if($result['type'] != 'external')
					{	
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
			
						//TODO make this logic less brittle
						if($_POST['type'] == 'page')
						{
							$test1 = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=0 AND `condition`=?;");
							$test1->runQuery(array('page:'.str_replace("/","",$result['url'])));
						}
						//THIS needs to be just id, not parent_id
						if($_POST['type'] == 'content')
						{
							$test1 = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=? AND `condition`='';"); //For this ti work you need to set default to = '' instead of not null right?
							$test1->runQuery(array($_POST['id']));					
						}

						//TODO check if there are too many matches, log and fix them
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

							$_SESSION['operationStatus'] = 'You deleted the internal page \"'.$feedback['name'].'\" with an id of '.$feedback['id'];
						}
						else
							$_SESSION['operationStatus'] = "This content item does not exist!";
					}
					else
						$_SESSION['operationStatus'] = "You deleted external page \"".$feedback['name']."\" at id:".$feedback['id']; 
				}
				else
					$_SESSION['operationStatus'] = "This page does not exist!";
			}
			else
				$_SESSION['operationStatus'] = "You must provide id and type!";
		}
		else
			$_SESSION['operationStatus'] = "You must be admin to do that!";
	}
	else
		$_SESSION['operationStatus'] = "You must be logged in to do that!";

	//TODO last location
	header('Location: /');
	exit();
?>
