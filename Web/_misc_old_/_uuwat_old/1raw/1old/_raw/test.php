<?php
	require 'uuwat/TimeStampClass.php';

	echo 'Press to test. This is only a test. The alarm will sound. The alarm is loud...<br>';


/*	$now = new TimeStamp;

	$stamp1 = "[4-14-2018][20:38:10:58]";
	$stamp2 = $now->getStamp();

	echo '<hr>';
	$val = TimeStamp::compareStamps($stamp1, $stamp2);
	$result = $val / 60;
	$result = $result / 60;
	$result = $result / 24;
	echo round($result,4).' days';*/

	function noDec($num)
	{
		if($num > 0)
			return floor($num);
		else
			return ceil($num);
	}

	//the math here is very wrong
	$total = 176525;
	
	$sec = $total;
	
	$mins = noDec($sec / 60);
	$sec = $sec % 60;

	$hrs = noDec($mins / 60);
	$mins = $min % 60;

	$days = noDec($hrs / 24);
	$hrs = $hrs % 24;

	echo $total.' seconds is:<br>';
	echo $days.' days<br>';
	echo $hrs.' hours<br>';
	echo $mins.' minutes<br>';
	echo $sec.' seconds<br>';




?>