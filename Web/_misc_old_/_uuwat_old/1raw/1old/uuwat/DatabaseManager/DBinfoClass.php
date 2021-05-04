<?php
	class DBinfo
	{
		public function listTables()
		{
			$conn = new DataObject("SHOW TABLES;");
			$conn->runQuery();

			$tables = $conn->fetchAllData();
			$list = array();
			foreach($tables as $key1 => $value1)
				foreach($value1 as $key2 => $value2)
					array_push($list, $value2);

			return $list;
		}

		public function listColumns($tableName)
		{
			$sql =
			"
				SELECT COLUMN_NAME
				FROM INFORMATION_SCHEMA.COLUMNS
				WHERE TABLE_SCHEMA='".$this->getDBname()."' AND TABLE_NAME = '".$tableName."';
			";
			$conn = new DataObject($sql);
			$conn->runQuery();

			$results = $conn->fetchAllData();

			$list = array();
			foreach($results as $key1 => $value1)
				foreach($value1 as $key2 => $value2)
					array_push($list, $value2);

			return $list;
		}

		public function getDBname()
		{
			$dbname = new DataObject("SELECT DATABASE();");
			$dbname->runQuery();

			return $dbname->fetchData()["DATABASE()"];
		}

		public function table_exists($tableName)
		{
			$checkName = new DataObject("SELECT table_name FROM information_schema.tables WHERE table_schema = '".$this->getDBname()."' AND table_name = '".$tableName."'");
			$checkName->runQuery();
			return ($checkName->rowCount() ? true : false);
		}
	}
?>
