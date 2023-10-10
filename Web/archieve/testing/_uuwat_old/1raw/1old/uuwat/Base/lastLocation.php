<?php
    //sets last location across pages only if a different page
	//session_start();
    if(!isset($_SESSION["last_location"]))
        $_SESSION["last_location"] = array("","/");
    if($_SERVER["REQUEST_URI"] != $_SESSION["last_location"][1])
    {
        $_SESSION["last_location"][0] = $_SESSION["last_location"][1];
        $_SESSION["last_location"][1] = $_SERVER["REQUEST_URI"];
    }
?>
