<?php
	class TemplateCore
	{
		protected $dbObj = null;
		protected function checkTable($databaseObject)
		{
			if(!mysqli_query($databaseObject, "SELECT * FROM pages"))
			{
				$sql = 
				"CREATE TABLE pages
				(
					id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					page VARCHAR(50) NULL,
					title VARCHAR(50) NULL,
					template VARCHAR(50) NULL
				);";
				mysqli_query($databaseObject, $sql);
			}			
		}
	}
?>