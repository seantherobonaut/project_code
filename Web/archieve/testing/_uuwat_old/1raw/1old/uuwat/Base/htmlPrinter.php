<?php
    function htmlOut($inputString)
    {
        return "<p>".$inputString."</p>";
    }

    function arrayOut($inputString)
    {
        return "<pre style=\"font-size:12px\">".print_r($inputString,1)."</pre>";
    }

    function preFormat($inputString)
    {
    	return "<pre style=\"font-size:12px\">".$inputString."</pre>";
    }
?>
