<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS `content_posts`
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`content_id` INT NOT NULL,
			`post_type` VARCHAR(50) NULL DEFAULT NULL,
			`data_id` INT NOT NULL
		);
	";
?>
