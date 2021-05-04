<?php
	$sql = 
	"
		CREATE TABLE IF NOT EXISTS users
		(
			user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(50) NULL,
			password VARCHAR(60) NULL,
			rank VARCHAR(50) NULL,
			active TINYINT NOT NULL DEFAULT '0'
		);
	";
?>