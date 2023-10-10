<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS users
		(
			`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`email` VARCHAR(50) NULL,
			`username` VARCHAR(50) NULL,
			`active` VARCHAR(5) NOT NULL DEFAULT 'no', /* Try to make this boolean where php uses === to make sure 0 != false */
			`password` VARCHAR(60) NULL,
			`2FA` INT NOT NULL DEFAULT 0 
		);
	";
?>
