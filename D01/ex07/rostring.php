#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$input = array_filter(explode(" ", $argv[1]));
		$i = 0;
		$first = array_shift($input);
		foreach ($input as $word) {
			if ($i > 0)
				echo " ";
		 	echo $word;
		 	$i++;
		 }
		 if ($i)
		 	echo " ";
		 echo "$first\n";
	}
?>