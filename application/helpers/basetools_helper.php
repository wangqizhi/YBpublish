<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');





if ( ! function_exists('ls_dir'))
{
	
	function ls_dir($dir)
	{
		// var_dump(glob($dir."/*"));die;
		global $files;
		foreach (glob($dir."/*") as $file) {
				// var_dump(glob($dir."/*"));
			if (is_dir($file)) {
			// if (1==2) {
				ls_dir($file);
			}else{
				$files[] = $file;
			}
		}
		return $files;

	}
}
?>