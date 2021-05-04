<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS captionedImage
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`url` VARCHAR(100) NOT NULL,
			`desc` VARCHAR(200) NOT NULL,
			`group` VARCHAR(50) NULL DEFAULT NULL
		);
	";
?>
