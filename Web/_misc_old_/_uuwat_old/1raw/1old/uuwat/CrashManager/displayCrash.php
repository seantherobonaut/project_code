<style type="text/css">
	#crashOutput
	{
		width:100%;
		height:100%;
		background-color: lightgray;
		position: absolute;
		top:0px;
		right:0px;
		bottom:0px;
		left:0px;
		z-index: 1000;
		color:black;
	}

	#crashOutput div
	{
		width:500px;
		height:150px;
		padding:10px;
		padding-top:0px;
		margin:70px auto;
		border:1px double black;
		background-color: white;
	}
</style>
<div id="crashOutput">
<div>
<?php
echo '<pre>';
echo '<p style="border-bottom:1px solid black;width:85%;display:block;">Sorry, something went wrong. Please try again later.</p>';

//If you aren't admin, only see 'Sorry, something...'
require_once 'uuwat/Base/htmlPrinter.php';
if(!empty($_SESSION['user_data']['rank']))
{
	if($_SESSION['user_data']['rank'] == 'admin')
	{
		$format = new FormatArray;
		$format->setArray($outputData);
		echo $format->getHTML();
	}
	else
		echo '(must be logged in as admin to see details)';
}
else
	echo '(must be logged in to see details)';

echo '</pre>';
//TODO "what would you like to do? click for last location, for admin page, for homepage..."
?>
</div>
</div>
