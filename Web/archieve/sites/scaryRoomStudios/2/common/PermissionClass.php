<?php
	//TODO make a verify method that ensures userData has the correct fields
	class Permission
	{
		private $dataType = null;
		private $userData = null;
		private $checkPerm = null;
		public function __construct()
		{
			$this->checkPerm = new DataObject("SELECT * FROM `contentPerm` WHERE `dataType`=? AND `group`=? AND `dataID`=?;");
		}
		public function setDataType($type)
		{
			$this->dataType = $type;
		}
		public function setUserData($data)
		{
			$this->userData = $data;
		}
		public function checkID($id)
		{
			$this->checkPerm->runQuery(array($this->dataType, $this->userData['rank'], $id));
			if($this->checkPerm->rowCount() > 0)
				return true;
			else
				return false;
		}
	}
?>