<?php

	class UnholyFactory
	{
		private static $types = Array();

		public function absorb($fighter)
		{
			if (get_parent_class($fighter) == 'Fighter')
			{
				foreach (self::$types as $tp)
				{
					if ($tp->getType() == $fighter->getType())
					{
						print("(Factory already absorbed a fighter of type ".$fighter->getType().")".PHP_EOL);
						return;
					}
				}
				array_push(self::$types, $fighter);
				print("(Factory absorbed a fighter of type ".$fighter->getType().")".PHP_EOL);
			}
			else
			{
				print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
			}
		}

		public function fabricate($type)
		{
			foreach (self::$types as $tp)
			{
				if ($tp->getType() == $type)
				{
					print("(Factory fabricates a fighter of type ".$type.")".PHP_EOL);
					return clone $tp;
				}
			}
			print("(Factory hasn't absorbed any fighter of type ".$type.")".PHP_EOL);
		}
	}

?>