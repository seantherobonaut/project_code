<?php
	class mainTemplate implements BaseContentInterface
	{
		private $id;

		public function __construct()
		{
			//Basic template styles/scripts
			Headers::newcss(Config::$path['appLocal'].'css/layout.css');
			Headers::newcss(Config::$path['appLocal'].'css/navbar.css');
			Headers::newjs(Config::$path['appLocal'].'js/adaptive.js');
			
			//Dynamic background styles/scripts
			Headers::newcss(Config::$path['appLocal'].'modules/dynBackground/styles.css');
			Headers::newjs(Config::$path['appLocal'].'modules/dynBackground/client.js');
		}
		
		public function init($id)
		{
			$this->id = $id;
		}

		public function exec()
		{
			$content = array();

			//grab all content that is a child of this template
			$contentData = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=?");
			$contentData->runQuery(array($this->id));
			if($contentData->rowCount() > 0)
			{
				//grab all rows of found content
				$resultsContent = $contentData->fetchAllData();

				//prepare sql to fetch actual templates/posts
				$templateData = new DataObject("SELECT * FROM content_templates WHERE content_id=?");
				$postData = new DataObject("SELECT * FROM content_posts WHERE content_id=?");

				//iterate through results pushing them to a content array one at a time
				foreach($resultsContent as $value)
				{
					if($value['type'] == 'template')
					{
						$templateData->runQuery(array($value['id'])); //seach for matching template in the content_template table
						if($templateData->rowCount()>0)
						{
							$resultTemplate = $templateData->fetchData(); //get data from template result
							$baseTemplate = new $resultTemplate['template_name'];
							$baseTemplate->init($resultTemplate['content_id']);
												
							array_push($content, $baseTemplate);
						}
					}
					if($value['type'] == 'post')
					{
						$postData->runQuery(array($value['id'])); //seach for matching post in the content_post table
						if($postData->rowCount()>0)
						{
							$resultPost = $postData->fetchData(); //get data from post result
							$basePost = new $resultPost['post_type'];
							$basePost->init($resultPost['data_id']);
												
							array_push($content, $basePost);
						}
					}					
				}
			}
			else
				array_push($content, new Error404Template);

			$menuLinks = $this->getMenu();
			$parentID = $this->id;
			require 'html.php';
		}

		public function getMenu()
		{
			$linkData = new DataObject("SELECT * FROM `hyperlinks` WHERE `group`='navlinks';");
			$linkData->runQuery();
			return $linkData->fetchAllData();
		}
	}
?>