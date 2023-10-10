<?php
	class mainTemplate implements TemplateInterface
	{
		private $childTemplate;
		public function __construct()
		{
			Headers::newcss(Config::$path['appLocal'].'core/main.css');
			Headers::newjs(Config::$path['appLocal'].'core/main.js');
		}
		public function init()
		{
			//Seach database for a page matching this get request and return it's data
			$pageData = new DataObject("SELECT * FROM pages WHERE get_page=?;"); 
			$pageData->runQuery(array($_GET["page"]));

			//if page exists
			if($pageData->rowCount())
			{
				$resultSet = $pageData->fetchData();
				
				//set Page title and the template it loads
				Headers::$title = $resultSet['name'];

				//TODO make a check if to see if the class actually exists
				$this->childTemplate = new $resultSet['template_name'];
			}
			else
				$this->childTemplate = new Error404Template; //TODO maybe pass the missing page to the 404 page

			$pageTemplate = &$this->childTemplate;

			require 'html.php';
		}
	}
?>
