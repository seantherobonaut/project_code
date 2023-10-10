<?php
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

	class HyperLinks
	{	
		protected $dbConn=null;
		protected $dataQuery=null, $dataArray=null;

		public function __construct($database)
		{
			$this->dbConn = $database;

			if(!mysqli_query($this->dbConn, "SELECT * FROM hyperlinks")) //Create table if it doesn't exist
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
				mysqli_query($this->dbConn, $sql);
			}
		}

		public function delItem($permission, $id)
		{
			mysqli_query($this->dbConn, "DELETE FROM hyperlinks WHERE id='{$id}'");
		}

		public function updateItem($permission, $id, $field, $newData)
		{
			$sql = "UPDATE hyperlinks SET ".$field."= '{$newData}' WHERE id='{$id}'";
			mysqli_query($this->dbConn, $sql);
		}

		public function newItem($permission, $group_id, $name, $type, $url)
		{
			//check to make sure all fields are not null
			$sql = "INSERT INTO hyperLinks (group_id, name, type, url) VALUES ('{$group_id}','{$name}','{$type}','{$url}')";
			mysqli_query($this->dbConn, $sql);
		}
	}

	class HyperLinkMulti extends HyperLinks
	{
		public function setData($groupName)
		{
			$this->dataQuery = mysqli_query($this->dbConn, "SELECT * FROM hyperlinks WHERE group_id='{$groupName}'");
		}

		public function getData()
		{
			return mysqli_fetch_assoc($this->dataQuery);
		}
	}

	class HyperLinkSingle extends HyperLinks
	{
		public function setData($groupName)
		{
			$this->dataQuery = mysqli_query($this->dbConn, "SELECT * FROM hyperlinks WHERE group_id='{$groupName}'");
			$this->dataArray = mysqli_fetch_assoc($this->dataQuery);
		}

		public function getData()
		{
			return $this->dataArray;
		}
	}
?>
