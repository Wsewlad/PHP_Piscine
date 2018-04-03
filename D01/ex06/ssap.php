#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$res = array();
		$i = 0;
		foreach ($argv as $arg) {
			if ($i)
				$res = array_merge($res, array_filter(explode(" ", $arg)));
			$i++;
		}
		sort($res);
		foreach ($res as $word) {
			echo "$word\n";
		}
	}
?>