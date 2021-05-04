<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS `content_base`
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`parent_id` INT NOT NULL,
			`type` VARCHAR(50) NULL DEFAULT NULL,
			`condition` VARCHAR(50) NOT NULL
		);
	";
?>
