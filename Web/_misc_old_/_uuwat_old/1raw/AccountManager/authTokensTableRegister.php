<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS authTokens
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_id` INT NOT NULL,
			`token` VARCHAR(100) NULL,
			`action` VARCHAR(50) NULL,
			`data` TEXT NULL
		);
	";
?>
