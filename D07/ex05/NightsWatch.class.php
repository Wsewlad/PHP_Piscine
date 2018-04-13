<?php

	class NightsWatch
	{
		private static $fighters = Array();

		public function recruit($fighter)
		{
			if (class_implements($fighter)['IFighter'])
			{
				array_push(self::$fighters, $fighter);
			}
		}

		public function fight()
		{
			foreach(self::$fighters as $fighter)
			{
				$fighter->fight();
			}
		}
	}

?>