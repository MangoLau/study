<?php
namespace Application\Autoload;

class Loader
{

	protected static $dirs;
	protected static $registered;

	const UNABLE_TO_LOAD = 'unable to load';

	public function __construct($dirs = [])
	{
		self::init($dirs);
	}

	protected static function loadFile($file)
	{
		if (file_exists($file)) {
			require_once $file;
			return true;
		}
		return false;
	}

	public static function autoload($class)
	{
		$success = false;
		$fn = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
		foreach (self::$dirs as $start) {
			$file = $start . DIRECTORY_SEPARATOR . $fn;
			if (self::loadFile($file)) {
				$success = true;
				break;
			}
		}
		if (!$success) {
			if (!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
				throw new \Exception(self::UNABLE_TO_LOAD . ' ' . $class);
			}
		}
		return $success;
	}

	public static function addDirs($dirs)
	{
		if (is_array($dirs)) {
			self::$dirs = array_merge(self::$dirs, $dirs);
		} else {
			self::$dirs[] = $dirs;
		}
	}

	public static function init($dirs = [])
	{
		if ($dirs) {
			self::addDirs($dirs);
		}
		if (self::$registered == 0) {
			spl_autoload_register(__CLASS__. '::autoload');
			self::$registered++;
		}
	}
}