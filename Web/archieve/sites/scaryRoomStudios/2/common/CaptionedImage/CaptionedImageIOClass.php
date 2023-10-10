<?php
	class CaptionedImageIO
	{
		private $selectObj = null;	
		private $updateObj = null;
		private $insertObj = null;
		private $deleteObj = null;

		public function __construct()
		{
			$this->selectObj = new DataObject("SELECT * FROM CaptionedImage WHERE id=?;");
			$this->updateObj = new DataObject("UPDATE CaptionedImage SET `url`=?,`desc`=? WHERE id=?;");
			$this->insertObj = new DataObject("INSERT INTO CaptionedImage (`url`,`desc`) VALUES(?,?);");
			$this->deleteObj = new DataObject("DELETE FROM CaptionedImage WHERE id=?;");
		}
		 
		//returns array as a row from sql
		//TODO output id of row into html
		public function selectItem($id)
		{
			$this->selectObj->runQuery(array($id));
			return $this->selectObj->fetchData();
		}

		public function updateItem($id, $url, $desc)
		{
			$this->updateObj->runQuery(array($url, $desc, $id));
		}

		public function insertItem($url, $desc)
		{
			$this->insertObj->runQuery(array($url,$desc));
		}

		public function deleteItem($id)
		{
			$this->deleteObj->runQuery(array($id));
		}
	}
?>
