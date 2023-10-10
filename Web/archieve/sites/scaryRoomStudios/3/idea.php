<?php
/*
each template

init(sets id)...use __construct for any special initialization
exec runs the command

new methods:
	getContent...returns an array of initialized tempaltes...pass content array by reference for speed
		(they may get large)
*/

	class ContentBase implements BaseContentInterface
	{
		protected $id = -1;
		protected $content = array();
		protected static $ContentBaseQuery = null;
		protected static $ContentTemplateQuery = null;
		protected static $ContentPostQuery = null;

		public function init($id)
		{
			$this->id = $id;

			if(empty(self::$ContentBaseQuery))
				self::$ContentBaseQuery = new DataObject("SELECT * FROM `content_base` WHERE `parent_id`=?;");

			if(empty(self::$ContentTemplateQuery))
				self::$ContentTemplateQuery = new DataObject("SELECT * FROM `content_templates` WHERE `content_id`=?;");

			if(empty(self::$ContentPostQuery))
				self::$ContentPostQuery = new DataObject("SELECT * FROM `content_posts` WHERE `content_id`=?;");
		}

		public function exec()
		{
			//do the thing!
			require 'html.php';
		}

		//This function 
		protected function gatherContent()
		{
			
		}

	}	
?>
