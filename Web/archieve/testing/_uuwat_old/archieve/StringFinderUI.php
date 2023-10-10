<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"]."/config.php";
	require_once Config::path("uuwat")."base/htmlPrinter.php";
	require_once Config::path("uuwat")."StringFinderClass.php";
	require_once Config::path("uuwat")."SysFileSearchClass.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Find String</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION["user_data"]))
			{
				if($_SESSION["user_data"]["rank"] == "admin")
				{
					//use get to conrtol search for now

					if(!empty($_GET["search"]))
					{
						$search = new SysFileSearch;
						$results = $search->findStringMatch($_GET["search"], ".php");
						echo "<pre>";
						foreach($results as $data)
							echo $data["file"]."\n\tline:".$data["line"]." - position:".$data["pos"]."\n";
						echo "</pre>";

					}
					else
						echo "You must enter a search term! Try /?search=something";
				}
				else
					echo "You do not have permission to perform this action.";
			}
			else
				echo "You must be logged in to do that.";
		?>
	</body>
</html>
