<?php
/*
item format, create a new object and pass the rows data to it, then call the common method, render

paragraph-format
   (takes in array)
   output method getContent() along with id along with button for editing that is just hidden...serverside will protect against unwanted dataIO
	javascript will toggle the apperance of edit button...hidden json array of conditions that must be met

images
headings
paragraphs
audio
video
post with captions
 
*/
	class ContentIO
	{
		private $dataTypes = null;
		private $contentObj = null;
		private $contentArray = array();
		public function __construct()
		{
			$this->contentObj = new DataObject("SELECT * FROM `content` WHERE `page`=?");
		}

		//accept an array with named indexes for objects
		public function setContentTypes($typesArray)
		{
			$this->dataTypes = $typesArray;
		}

		//use the get request of 'page' for sql query
		public function setContent($pageName)
		{
			$this->contentObj->runQuery(array($pageName));
			$this->contentArray = $this->contentObj->fetchAllData();
		}

		//echo output html from objects
		public function renderContent()
		{
			//TODO pass table.id to a function that links to a table with "table.id" columns and searches for permissions
			//...then echo out a link that calls a javascript form popup
			foreach($this->contentArray as $key => $value)
			{
				echo $this->dataTypes[$value['content_type']]->getContent($value['content_id']);
			}
		}
	}
?>