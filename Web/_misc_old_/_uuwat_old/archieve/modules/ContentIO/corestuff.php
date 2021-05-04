<?php
//!!!! no need to pass in "hyperlinks" for database anymore...but set it in the top hierarchy constructor..null for baseIO $table
	/*
				has permission method
				class navlinks extends coreClass
						hasPermission
							switch(methodname)
								case "modifyItem":
									if session["user_data"]["rank"] = "admin" 
											returnVal = true
								case "":

							return returnVal

				coreClass
						hasPermission
								return true



				$something = new NavLinks()
				$something->modifyItem($something->hasPermission("modifyItem"), itemId, field, newdata)
			



		__________New____________

		!!!!!!!!!!!!!!!!!!no need for that advanced extending and overwriting, keep it simple
		each method has a variable called hasPermission that will return true or false
				$links->setData(Perms("somethingswitch"), data)  the perms function will return true or false depending on
						what is in it. Perms can be anything really, an object that returns true or false, a variable, anything





		core class
				delete, add, modify

		outer
				getting data
				displaying data
						group vs item
							setData
							getData
	*/

	class ContentIOCore
	{	
		protected $dbConn=null;
		protected $dataQuery=null;
		protected $table=null;

		protected function init($dbase, $tbl)
		{
			$this->dbConn = $dbase;
			$this->table = $tbl;
		}

		public function getData()
		{
			return mysqli_fetch_assoc($this->dataQuery);
		}

		public function modItem($id, $field, $newData)
		{
			$sql = "UPDATE ".$this->table." SET ".$field."='{$newData}' WHERE id='{$id}'";
			mysqli_query($this->dbConn, $sql);
		}

		public function delItem($id)
		{
			$sql = "DELETE FROM ".$this->table." WHERE id='{$id}'";
			mysqli_query($this->dbConn, $sql);
		}
	}

	class HyperLinks extends ContentIOCore
	{
		public function __construct($database, $tableName)
		{
			$this->init($database, $tableName);

			if(!mysqli_query($database, "SELECT * FROM hyperlinks")) //Create table if it doesn't exist
			{
				$sql = 
				"CREATE TABLE hyperlinks
				(
					id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					group_id VARCHAR(50) NULL,
					name VARCHAR(50) NULL,
					type VARCHAR(50) NULL,
					url VARCHAR(100) NULL
				)";
				mysqli_query($database, $sql);
			}
		}

		public function setData($groupName)
		{
			$this->dataQuery = mysqli_query($this->dbConn, "SELECT * FROM hyperlinks WHERE group_id='{$groupName}'");
		}
		
		public function addItem($group_id, $name, $type, $url)
		{
			$sql = "INSERT INTO hyperLinks (group_id, name, type, url) VALUES ('{$group_id}','{$name}','{$type}','{$url}')";
			mysqli_query($this->dbConn, $sql);
		}
	}
?>
