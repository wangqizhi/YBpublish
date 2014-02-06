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
		// echo DIROOT.$dir_name;exit;
		$dir_name = ltrim($dir_name,'/');
		if (file_exists(WORKDIR.$dir_name)) {
			log_message('debug','***create dir：'.WORKDIR.$dir_name.' dir_exists #failed!');
			return 0;//dir has esists
		}
		//mkdir(WORKDIR.$dir_name,0700,true);
		shell_exec('/bin/mkdir -p '.WORKDIR.$dir_name);
		if (is_dir(WORKDIR.$dir_name)) {
			log_message('debug','---create dir：'.WORKDIR.$dir_name.' successful');
			return 1;//successful
		} else {
			log_message('debug','***create dir：'.WORKDIR.$dir_name.' mkdir #failed!');
			return 2;//mkdir failed
		}
		
	}


	// public function sh_mounta()
	// {
	// 	$sh_out = shell_exec("") 
	// }

}