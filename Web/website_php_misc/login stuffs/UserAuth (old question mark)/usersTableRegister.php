<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS users
		(
			`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` VARCHAR(50) NULL,
			`password` VARCHAR(60) NULL,
			`rank` VARCHAR(50) NULL,
			`active` VARCHAR(5) NOT NULL DEFAULT 'no',
			`email` VARCHAR(50) NULL,
			`token` VARCHAR(50) NULL
		);
	";
?>
