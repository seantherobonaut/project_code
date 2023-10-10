<!DOCTYPE html>
<html>
    <head>
        <title>Error 404</title>
        <style type="text/css">
        	#errorText
        	{
        		border:2px dashed gray;
        		padding:15px;
        		background-color: lightgray;
        		width:300px;
        	}
        </style>
    </head>
    <body>
        <!-- This is partitioned so other files requiring 404 do not get the doctype/html tag baggage and just the raw message -->
        <?php require '404html.php';?>
    </body>
</html>
