<?php
/*
	Image Manipulator by Sourcehat
*/

// Configuration
define('IMAGEMANIPULATOR_CACHE',	'cache'); # Relative to this file path without trailing or prepending slash; don't forget to set the right permissions to this directory
define('IMAGEMANIPULATOR_BACKUP',	'images/backup.jpg'); # The image to display when on the fly image isn't found; relative to this file path without prepending slash
define('IMAGEMANIPULATOR_PATH',		'images'); # The folder to look for images in when displaying images on the fly; without prepending or trailing slash

// Class
class ImageManipulator
{
	public $image;
	
	private $src, $src_width, $src_height, $manipulation;
	
	// Construct
	public function __construct($src, $backup=false)
	{
		$this->name = $src;
		$this->manipulation = array();
		
		if(($image = $this->getimage($src)) || ($backup && $image = $this->getimage(IMAGEMANIPULATOR_BACKUP, false)))
		{
			$this->src = $image[0];
			
			$this->src_width = $image[1];
			$this->src_height = $image[2];
		} else
		{
			$this->src = false;
		}
	}
	
	// Get image
	private function getimage($src, $append=true)
	{
		if(defined('IMAGEMANIPULATOR_ONTHEFLY') && $append) $src = IMAGEMANIPULATOR_PATH.DIRECTORY_SEPARATOR.$src;
		
		if(!file_exists($src)) return false;
		
		$info = getimagesize($src);
		
		$function = 'imagecreatefrom'.substr($info['mime'], strpos($info['mime'], '/') + 1);
		
		if(function_exists($function))
		{
			return array($function($src), $info[0], $info[1]);
		} else
		{
			return false;
		}
	}
	
	// Is valid?
	public function is_valid()
	{
		return $this->src !== false;
	}
	
	// Manipulation
	public function resize($width, $height)
	{
		$this->manipulation['resize'] = array((int) $width, (int) $height);
	}
	
	public function grayscale($value=null)
	{
		$this->manipulation['grayscale'] = true;
	}
	
	public function watermark($src, $x, $y)
	{
		$this->manipulation['watermark'] = array($src, $x, $y);
	}
	
	public function crop($x, $y, $width, $height)
	{
		$this->manipulation['crop'] = array((int) $x, (int) $y, (int) $width, (int) $height);
	}
	
	public function quality($value)
	{
		$this->manipulation['quality'] = (int) $value;
	}
	
	// Work
	private function work()
	{
		if(!$this->is_valid()) return false;
		
		$this->image = $this->src;
		
		// Crop
		if(isset($this->manipulation['crop']))
		{
			$tmp = $this->image;
			
			list($x, $y, $this->src_width, $this->src_height) = $this->manipulation['crop'];
			
			$this->image = imagecreatetruecolor($this->src_width, $this->src_height);
			
			imagealphablending($this->image, false);
			imagesavealpha($this->image, true);
			
			imagecopyresampled($this->image, $tmp, 0, 0, $x, $y, $this->src_width, $this->src_height, $this->src_width, $this->src_height);
		}
		
		// Resize
		if(isset($this->manipulation['resize']))
		{
			$tmp = $this->image;
			
			list($width, $height) = $this->manipulation['resize'];
			
			$src_x = $src_y = 0;
			
			if(!$width)
			{
				$width = $this->src_width*$height/$this->src_height;
			} elseif(!$height)
			{
				$height = $this->src_height*$width/$this->src_width;
			}
			
			if($this->src_height*$width/$this->src_width >= $height)
			{
				$cut_width = $this->src_width;
				$cut_height = round($height*$this->src_width/$width);
				$cut_length = $this->src_height - $cut_height;
				
				$strip_axis = 'y';
				$strip_length = $this->src_width;
				$strip_vertical = false;
				
				$position = array
				(
					-1	=>	0,
					+1	=>	$this->src_height
				);
			} else
			{
				$cut_width = round($width*$this->src_height/$height);
				$cut_height = $this->src_height;
				$cut_length = $this->src_width - $cut_width;
				
				$strip_axis = 'x';
				$strip_length = $this->src_height;
				$strip_vertical = true;
				
				$position = array
				(
					-1	=>	0,
					+1	=>	$this->src_width
				);
			}
			
			$strip = -1;
			$entropy = 0;
			
			for($i=0; $i<$cut_length; $i++)
			{
				$values = array();
				
				$average = array(0, 0, 0);
				
				for($n=0; $n<$strip_length; $n++)
				{
					$rgb = $strip_vertical?imagecolorat($tmp, $position[$strip], $n):imagecolorat($tmp, $n, $position[$strip]);
					
					$r = ($rgb >> 16) & 0xFF;
					$g = ($rgb >> 8) & 0xFF;
					$b = $rgb & 0xFF;
					
					$y = 0.299*$r + 0.587*$g + 0.114*$b;
					$u = 0.492099323*($b-$y);
					$v = 0.877318117*($r-$y);
					
					$average[0] = ($average[0]*$n + $y)/($n+1);
					$average[1] = ($average[1]*$n + $u)/($n+1);
					$average[2] = ($average[2]*$n + $v)/($n+1);
					
					$values[] = array($y, $u, $v);
				}
				
				$current = 0;
				
				foreach($values as $value)
				{
					$current += pow($value[0] - $average[0], 2) + pow($value[1] - $average[1], 2) + pow($value[2] - $average[2], 2);
				}
				
				if($current >= $entropy)
				{
					$strip *= -1;
					
					$entropy = $current;
				}
				
				$position[$strip] -= $strip;
			}
			
			${'src_'.$strip_axis} = $position[-1];
			
			$this->image = imagecreatetruecolor($width, $height);
			
			imagealphablending($this->image, false);
			imagesavealpha($this->image, true);
			
			imagecopyresampled($this->image, $tmp, 0, 0, $src_x, $src_y, $width, $height, $cut_width, $cut_height);
		} else
		{
			imagealphablending($this->image, false);
			imagesavealpha($this->image, true);
			
			$width = $this->src_width;
			$height = $this->src_height;
		}
		
		if(isset($this->manipulation['grayscale']))
		{
			for($y=0; $y<$height; $y++)
			{
				for($x=0; $x<$width; $x++)
				{
					$rgb = imagecolorat($this->image, $x, $y);
					
					$r = ($rgb >> 16) & 0xFF;
					$g = ($rgb >> 8) & 0xFF;
					$b = $rgb & 0xFF;
					
					$grayscale = round(($r + $g + $b)/3);
					
					imagesetpixel($this->image, $x, $y, imagecolorallocate($this->image, $grayscale, $grayscale, $grayscale));
				}
			}
		}
		
		if(isset($this->manipulation['watermark']))
		{
			if($image = $this->getimage($this->manipulation['watermark'][0]))
			{
				list($wm, $wm_width, $wm_height) = $image;
				
				if($this->manipulation['watermark'][1] === 'center')
				{
					$x = round(($width - $wm_width)/2);
				} elseif($this->manipulation['watermark'][1] < 0)
				{
					$x = $width - $wm_width + $this->manipulation['watermark'][1];
				} else
				{
					$x = $this->manipulation['watermark'][1];
				}
				
				if($this->manipulation['watermark'][2] === 'center')
				{
					$y = round(($height - $wm_height)/2);
				} elseif($this->manipulation['watermark'][2] < 0)
				{
					$y = $height - $wm_height + $this->manipulation['watermark'][2];
				} else
				{
					$y = $this->manipulation['watermark'][2];
				}
				
				imagealphablending($this->image, true);
				imagecopyresampled($this->image, $wm, $x, $y, 0, 0, $wm_width, $wm_height, $wm_width, $wm_height);
			}
		}
		
		return true;
	}
	
	// Output
	public function output($cache=true)
	{	
		header('Content-Type: image/png');
		
		if($cache)
		{
			$manipulation = '';
			
			foreach($this->manipulation as $key=>$value)
			{
				if($key == 'grayscale')
				{
					$manipulation .= 'g.';
				} elseif($key == 'quality')
				{
					$manipulation .= 'q'.$value.'.';
				} else
				{
					$manipulation .= implode('.', $value).'.';
				}
			}
			
			$path = dirname(__FILE__).'/'.IMAGEMANIPULATOR_CACHE.'/'.md5($_SERVER['SCRIPT_FILENAME'].$manipulation.$this->name);
			
			if(file_exists($path))
			{
				readfile($path);
				
				exit();
			}
		}
		
		if($this->work())
		{
			$quality = isset($this->manipulation['quality'])?(10 - ceil($this->manipulation['quality']/10)):false;
			
			if($cache)
			{
				if($quality !== false)
				{
					imagepng($this->image, $path, $quality);
					imagepng($this->image, null, $quality);
				} else
				{
					imagepng($this->image, $path);
					imagepng($this->image);
				}
			} else
			{
				if($quality !== false)
				{
					imagepng($this->image, null, $quality);
				} else
				{
					imagepng($this->image);
				}
			}
		}
	}
	
	// Save
	public function save($path)
	{
		$extension = substr($path, -4);
		
		switch($extension)
		{
			case '.jpg': $extension = 'jpeg'; break;
			case '.png': $extension = 'png'; break;
			case '.gif': $extension = 'gif'; break;
		}
		
		$function = 'image'.$extension;
		
		if(function_exists($function) && $this->work())
		{
			$quality = isset($this->manipulation['quality'])?$this->manipulation['quality']:false;
			
			if($extension == 'png' && $quality !== false)
			{
				$quality = 10 - ceil($quality/10);
			}
			
			if($quality !== false)
			{
				$function($this->image, $path, $quality);
			} else
			{
				$function($this->image, $path);
			}
			
			return true;
		}
			
		return false;
	}
}

// On the fly
if(isset($_GET['onthefly']))
{
	define('IMAGEMANIPULATOR_ONTHEFLY', true);
	
	$resource = new ImageManipulator($_GET['onthefly'], true);
	
	foreach($_GET as $key=>$value)
	{
		if(method_exists($resource, $key))
		{
			call_user_func_array(array($resource, $key), explode(',', $value));
		}
	}
	
	$resource->output();
}