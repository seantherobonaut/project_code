<?php
	if(isset($_GET["page"]))
		$activePage = $_GET["page"];
	else
		$activePage = "Home";
	
	//error_reporting(0);
	session_start();
	include "database/connect.php";

	//include "login/server.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include "head.php";?>

		<script src="js/adaptive.js"></script>
		<script type="text/javascript">currentPage = "<?php echo $activePage;?>";</script>
		<title><?php echo $activePage;?></title>

		<link rel="stylesheet" type="text/css" href="css/layout.css" />
		<link rel="stylesheet" type="text/css" href="css/navbar.css" />
	</head>
	<body>
		<?php
			//include "login/inject.php";
			include "nav.php";
			include "main.php";
			include "footer.php";
		?>
		<script type="text/javascript" src="js/core.js"></script>
			
		<?php
			if(isset($_GET["diag"]))
				if($_GET["diag"] == 1)
					include "diag.php";
		?>
	</body>
</html>