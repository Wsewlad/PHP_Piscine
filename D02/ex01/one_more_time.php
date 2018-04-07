#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		if (preg_match_all("/[\' ']/", $argv[1]) != 4)
			exit("Wrong Format\n");
		if (!preg_match("/^[A-Z]?[a-z]{0,9} [0-9]{2} [A-Z]?[a-z]+ [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]))
			exit("Wrong Format\n");

		$fr_mon = array('/ janvier /i', '/ février /i', '/ mars /i', '/ avril /i', '/ mai /i', '/ juin /i', '/ juillet /i', '/ aout /i', '/ septembre /i', '/ octobre /i', '/ novembre /i', '/ décembre /i', '/^lundi /i', '/^mardi /i', '/^mercredi /i', '/^jeudi /i', '/^vendredi /i', '/^samedi /i', '/^dimanche /i');

		$eng_mon = array(' january ', ' february ', ' march ', ' april ', ' may ', ' june ', ' july ', ' august ', ' september ', ' october ',' november ', ' december ', 'monday ', 'tuesday ', 'wednesday ', 'thursday ', 'friday ', 'saturday ', 'sunday ');

		$argv[1] = preg_replace($fr_mon, $eng_mon, $argv[1]);

		date_default_timezone_set('Europe/Paris');
		$time = strtotime($argv[1]);
		echo $time ? "$time\n" : "Wrong Format\n";
	}
?>