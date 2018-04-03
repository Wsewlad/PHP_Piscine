#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$input = array_filter(explode(" ", $argv[1]));
		$i = 0;
		foreach ($input as $word) {
			if ($i > 0)
				echo " ";
		 	echo $word;
		 	$i++;
		 }
		echo "\n";
	}
?>