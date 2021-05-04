<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS contentPerm
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`group` VARCHAR(50) NULL,
			`dataType` VARCHAR(50) NULL,
			`dataID` INT NULL
		);
	";
?>
