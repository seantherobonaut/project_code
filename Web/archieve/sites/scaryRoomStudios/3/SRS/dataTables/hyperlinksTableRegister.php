<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS `hyperlinks`
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` VARCHAR(50) NULL DEFAULT NULL,
			`url` VARCHAR(100) NULL DEFAULT NULL,
			`type` VARCHAR(25) NULL DEFAULT NULL,
			`group` VARCHAR(50) NULL DEFAULT NULL
		);
	";
?>