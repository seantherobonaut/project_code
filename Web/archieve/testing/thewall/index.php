<?php
	//error_reporting(0);
	require 'connect.php';
	require 'postInput.php';
	
	$results = mysqli_query($db, "SELECT * FROM list"); //Read records
	$num=mysqli_num_rows(mysqli_query($db, "SELECT * FROM list")); //Count number of rows
?>
<html>
	<head>
		<style type="text/css">
			.recordFormInputField
			{
				width:70px;
			}

			.recordForm
			{
				display: none;
			}

			.editLink
			{
				color:green;
			}

			.deleteFormButton
			{
				border:0px;
				background-color:white;
				font-family:"times new roman";
				font-size: 100%;
				text-decoration: underline;
				color:red;
			}

			.deleteForm
			{
				display: inline;
			}

			.wrapper
			{
				border:2px dotted lightgray;
				width:350px;
				padding:15px;
			}
		</style>
	</head>
	<body>
	<div class="wrapper">
		Interesting note, your ip address is: <b><u><?php echo $_SERVER['REMOTE_ADDR'];?></u></b><br />
		Please enter some funny stuff!!!<br /><br />
		<?php
		    for($i = 0;$i<$num;$i++) 
		    {
		    	$rows = mysqli_fetch_assoc($results);
				echo '
					<span class="recordItem" id="recordItem', $rows['uuid'], '">"', $rows['name'], '"</span>
					<a class="editLink" id="editLink', $rows['uuid'], '" href="#" onclick="callForm', $rows['uuid'], '()">Edit</a>
					<form class="recordForm" id="recordForm', $rows['uuid'], '" action="" method="post">
						<input class="recordFormInputField" name="myinput" autocomplete="off" type="text" value="', $rows['name'], '">
						<input type="hidden" name="recordNum" value="', $rows['uuid'], '">
						<input class="recordFormInputButton" type="submit" value="Done" />
					</form>
					<form class="deleteForm" id="deleteForm', $rows['uuid'], '" action="" method="post">
						<input type="hidden" name="delete" value="', $rows['uuid'], '" />
						<input class="deleteFormButton" type="submit" value="Delete" />
					</form>
					<script type="text/javascript">
						function callForm', $rows['uuid'], '()
						{
							document.getElementById("recordItem', $rows['uuid'], '").style.display="none";
							document.getElementById("editLink', $rows['uuid'], '").style.display="none";
							document.getElementById("deleteForm', $rows['uuid'], '").style.display="none";
							document.getElementById("recordForm', $rows['uuid'], '").style.display="inline";
						}
					</script>
					<br />
				';
		    }

		    echo '
		    	<br />
		    	<form action="" method="post">
		    		Enter something&nbsp;<input type="text" style="width:70px" name="name" autocomplete="off" />
		    		<input type="submit" value="Submit" />
		    	</form>
		    	';
		?>
	</div>
	</body>
</html>