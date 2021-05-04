<?php
	$sql =
	"
		CREATE TABLE IF NOT EXISTS pages
		(
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` VARCHAR(50) NULL,
			`get_page` VARCHAR(25) NULL,
			`template_name` VARCHAR(100) NULL
		);
	";
?>
