#!/usr/bin/php
<?php

	function cmp($a, $b)
	{
		$a2 = substr($a, 1);
		$b2 = substr($b, 1);

		if ($a == $b)
        	return 0;
        if ($a[0] == $b[0])
        {
        	if (ctype_alpha($a2) && !ctype_alpha($b2))
				return (-1);
			if (!ctype_alpha($a2) && ctype_alpha($b2))
				return (1);
        }
    	return ($a < $b) ? -1 : 1;
	}

	function my_priority($a, $b)
	{
		
		if (ctype_alpha($a[0]) && is_numeric($b[0]))
			return (-1);
		if (is_numeric($a[0]) && ctype_alpha($b[0]))
			return (1);
		if (ctype_alpha($a[0]) && ctype_alpha($b[0]))
			return cmp(strtolower($a), strtolower($b));
		if (is_numeric($a[0]) && is_numeric($b[0]))
			return cmp($a[0], $b[0]);
		if ((is_numeric($b[0]) || ctype_alpha($b[0])) && !ctype_alpha($a[0]))
			return (1);
		if ((is_numeric($a[0]) || ctype_alpha($a[0])) && !ctype_alpha($b[0]))
			return (-1);
		if (!is_numeric($a[0]) && !ctype_alpha($a[0]) && !is_numeric($b[0]) && !ctype_alpha($b[0]))
			return cmp($a, $b);
	}

	if ($argc > 1)
	{
		$res = array();
		$i = 0;
		foreach ($argv as $arg) {
			if ($i)
				$res = array_merge($res, array_filter(explode(" ", $arg)));
			$i++;
		}
		usort($res, my_priority);
		foreach ($res as $word) {
			echo "$word\n";
		}
	}
?>