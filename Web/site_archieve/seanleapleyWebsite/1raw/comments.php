<?php
	//Grab what page the comments should be located on (work on this later)
	$list = $path_data[1];

	$result = array($list, 'Hey it is Sean!', 'Sean? Who the heck is that?', 'The guy who wrote this script... duh!');

	echo json_encode($result);
?>
