<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS paragraphs
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`text` TEXT NULL,
			`group` VARCHAR(50) NULL DEFAULT NULL
		);
	";
?>
