<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yb_sh{
	public $CI;
	function __construct(){
		$this->CI =& get_instance();//实例化CI，可以用来调用其他资源
	}

	/*
	*新建以WORKDIR为根目录的文件夹
	*参数：新建文件夹的名字
	*返回值：true or false
	*/
	public function sh_mkdir($dir_name='')
	{
		// echo WORKDIR.$dir_name;exit;
		$dir_name = ltrim($dir_name,'/');
		if (file_exists(WORKDIR.$dir_name)) {
			log_message('debug','***create dir：'.WORKDIR.$dir_name.' dir_exists #failed!');
			return 0;//dir has esists
		}
		//mkdir(WORKDIR.$dir_name,0700,true);
		$shell_result = shell_exec('sudo /bin/mkdir -p '.WORKDIR.$dir_name.' 2>&1');
		if (is_dir(WORKDIR.$dir_name)) {
			log_message('debug','---create dir：'.WORKDIR.$dir_name.' successful');
			return 1;//successful
		} else {
			log_message('debug','***create dir：'.WORKDIR.$dir_name.' mkdir #failed! Because:'.$shell_result);
			return 2;//mkdir failed
		}
		
	}



	/*
	*copy 文件
	*参数 源 目标
	*返回值 true false
	*/
	public static function sh_cp($src,$des)
	{
		$r_src = WORKDIR.trim($src,'/');
		$r_des = WORKDIR.trim($des,'/');
		$result = exec("sudo /bin/cp $r_src $r_des 2>&1",$out,$isok);
		// return $isok;
		if ($isok > 0) {
			log_message('debug','****copy file：'.$r_src.' to'.$r_des.' failed');
			return $out[0];
		}else{
			$before = md5_file($r_src);
			$after = md5_file($r_des);
			if ($before == $after) {
				log_message('debug','---copy file：'.$r_src.' to'.$r_des.' successful');
				return "1";

			} else {
				log_message('debug','***copy file：'.$r_src.' to'.$r_des.' failed ***File is not match');
				return "copy wrong : File is not match";
			}
			
		}
		// return $result;
		// return "/bin/cp $r_src $r_des";
	}

	/*
	*rsync_文件夹发布 --暂不使用
	*参数 源 目标
	*返回值 true false
	*/
	// public function sh_rsync($src,$des)
	// {
	// 	$r_src = WORKDIR.trim($src,'/');
	// 	$r_des = WORKDIR.trim($des,'/');
	// 	echo "sudo /usr/bin/rsync --progress -av $r_src/* $r_des/ 2>&1";exit;
	// 	$result = exec("sudo /usr/bin/rsync --progress -av $r_src/* $r_des/ 2>&1",$out,$isok);
	// 	if ($isok > 0) {
	// 		log_message('debug','****copy file：'.$r_src.' to'.$r_des.' failed');
	// 		var_dump($out);
	// 		// return $out[0];
	// 	}else{
	// 		var_dump($result);
	// 		// return $result;
	// 	}
	// }

}