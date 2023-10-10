<?php
    //redirect localhost to localhost/home ONLY if file is index.php
    if(empty($_GET["page"]) && basename($_SERVER["SCRIPT_FILENAME"]) == "index.php")
    {
        header("Location: /home");
        exit();
    }
?>
