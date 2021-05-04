<?php
	function sanatize($data)
	{
		return mysql_real_escape_string($data);
	}
?>