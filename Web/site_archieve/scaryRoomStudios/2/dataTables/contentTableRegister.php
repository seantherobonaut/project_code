<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS content
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`page` VARCHAR(50) NOT NULL,
			`content_id` INT NOT NULL,
			`content_type` VARCHAR(50) NOT NULL
		);
	";
?>
