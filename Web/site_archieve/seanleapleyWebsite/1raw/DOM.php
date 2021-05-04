<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			
		<meta name="author" content="Sean Leapley">
		<meta name="description" content="My personal website">		
		<title><?php echo ucfirst($path_data[0]);?></title>
		
		<!-- Jquery and Bootstrap (css/js) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
		
		<link rel="stylesheet" type="text/css" href="core.css">		
	</head>
	<body>
		<?php require 'frontEndCompat.php';?>

		<?php require 'page_template.php';?>
	</body>
</html>
