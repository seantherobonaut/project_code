<?php
	class TemplateRead extends TemplateCore
	{
		private $template = null;
		private $title = null;
		private $result = null;

		public function __construct($dbObject, $pageRequest)
		{
			$this->dbObj = $dbObject;
			$this->checkTable($dbObject);
			$this->getInfo($pageRequest);
		}

		private function getInfo($page)
		{
			$query = mysqli_query($this->dbObj, "SELECT * FROM pages WHERE page='{$page}'");
			$templateResult = "404";
			$titleResult = "Error - 404";

			if(mysqli_num_rows($query))
			{
				$this->result = mysqli_fetch_assoc($query);

				$templateResult = $this->result["template"];
				$titleResult = $this->result["title"];
			}

			$this->template = $templateResult;
			$this->title = $titleResult;
		}

		public function getClient()
		{
			return "content/templates/".$this->template."/client.php";
		}

		public function getServer()
		{
			return "content/templates/".$this->template."/server.php";
		}

		public function getTitle()
		{
			return $this->title;
		}
	}
?>
