<?php

		/*
		New:
			All structure templates will only contain pointers. The getTemplate() method will pass in the current
				template name, pointer id, and maybe teir

_________________________________________________________________________________________________________________
			each call only loads one exact template...or it loads exactly one template with a condition
			start using ajax

			get all tables with the prefix "templates_" and print them out
				maybe get all tables "like" or just get all tables and match regex array
			user will select what template_table to modify and can only choose one from the list
				use input, make sure first part of string is template_ then check if it exists, select it or output "not found"

			the selected table is printed out and user can modify values to table or add new row
				select * and print out formatted list with content ids for each for ajax stuff

			user may also add a new table with values
				this new table is written to a file in templates/[tables]...or a preset Config::path()
				then checkTables is run...nah, just run the sql and then store it to a file...if sql fails do not write to file
		
		*/
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Template Manager</title>
	</head>
	<body>

	</body>
</html>
