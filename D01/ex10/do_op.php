#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$argv[1] = trim($argv[1]);
		$argv[2] = trim($argv[2]);
		$argv[3] = trim($argv[3]);
		if ($argv[2] == "+")
			echo $argv[1] + $argv[3];
		else if ($argv[2] == "-")
			echo $argv[1] - $argv[3];
		else if ($argv[2] == "*")
			echo $argv[1] * $argv[3];
		else if ($argv[2] == "/")
		{
			if ($argv[3] == 0)
				echo "Devide by zero";
			else
				echo $argv[1] / $argv[3];
		}
		else if ($argv[2] == "%")
		{
			if ($argv[3] == 0)
				echo "Modulo by zero";
			else
				echo $argv[1] % $argv[3];
		}
		else
			echo "Incorrect Parameters";
		echo "\n";
	}
	else
		echo "Incorrect Parameters\n";
?>