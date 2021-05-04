<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS `content_templates`
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`content_id` INT NOT NULL,
			`template_name` VARCHAR(50) NULL DEFAULT NULL
		);
	";
?>
