<?php

	class Color
	{
		public	$red = 0;
		public	$green = 0;
		public	$blue = 0;
		private	$rgb;
		static $verbose = False;
		
		public function __construct(array $kwargs)
		{
			if (array_key_exists('rgb', $kwargs))
			{
				$this->rgb = pack("L", $kwargs['rgb']);
				$this->rgb = unpack("C*", $this->rgb);
				$this->red = $this->rgb[3];
				$this->green = $this->rgb[2];
				$this->blue = $this->rgb[1];
			}
			else
			{
				if (array_key_exists('red', $kwargs))
					$this->red = $kwargs['red'];
				if (array_key_exists('green', $kwargs))
					$this->green = $kwargs['green'];
				if (array_key_exists('blue', $kwargs))
					$this->blue = $kwargs['blue'];
			}
			if (self::$verbose == True)
			{
				printf("Color( red: %3d, green:   %3d, blue:   %3d ) constructed.\n", $this->red, $this->green, $this->blue);
			}
			return;
		}

		public function __destruct()
		{
			if (self::$verbose == True)
			{
				printf("Color( red: %3d, green:   %3d, blue:   %3d ) destructed.\n", $this->red, $this->green, $this->blue);
			}
			return;
		}

		public function __toString()
		{
			return "Color( red: ".$this->red.", green:   ".$this->green.", blue:   ".$this->blue." )";
		}

		public static function doc()
		{
			return file_get_contents("Color.doc.txt").PHP_EOL;
		}

		public function add($color)
		{
			return new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue));
		}

		public function sub($color)
		{
			return new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue));
		}

		public function mult($color)
		{
			return new Color(array('red' => $this->red * $color->red, 'green' => $this->green * $color->green, 'blue' => $this->blue * $color->blue));
		}

	}

?>