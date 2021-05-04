<?php
	//TODO make this subscribe to interface
	class ParagraphIO
	{
		private $selectObj = null;	
		private $updateObj = null;
		private $insertObj = null;
		private $deleteObj = null;

		public function __construct()
		{
			$this->selectObj = new DataObject("SELECT * FROM paragraphs WHERE id=?;");
			$this->updateObj = new DataObject("UPDATE paragraphs SET `text`=? WHERE id=?;");
			$this->insertObj = new DataObject("INSERT INTO paragraphs (`text`) VALUES(?);");
			$this->deleteObj = new DataObject("DELETE FROM paragraphs WHERE id=?;");
		}
		 
		//returns array as a row from sql
		//TODO output id of row into html
		public function selectItem($id)
		{
			$this->selectObj->runQuery(array($id));
			return $this->selectObj->fetchData();
		}

		public function updateItem($id, $field)
		{
			$this->updateObj->runQuery(array($field, $id));
		}

		public function insertItem($text)
		{
			$this->insertObj->runQuery(array($text));
		}

		public function deleteItem($id)
		{
			$this->deleteObj->runQuery(array($id));
		}
	}
?>
