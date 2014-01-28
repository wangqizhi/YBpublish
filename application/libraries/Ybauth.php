<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Ybauth extends CI_Session {
	public function __construct($pram=array())
	{
		parent::__construct($pram);
	}

	//检查登录
	public function login_in_law($username){
		if(!isset($uid=self::userdata('UID'))){
			header("Location:/");
			return false;
		}
		if($uid != $username){
			header("Location:/");
			return false;
		}
		
		$need_check_ip = $_SERVER['REMOTE_ADDR'];
		$ready_ip = self::userdata('ip_address');
		if ($need_check_ip != $ready_ip) {
			header("Location:/");
			return false;
		}
		

	}


	//登录后设置UID
	public function set_UID($username)
	{
		// $uid = md5($username.$_SERVER['REMOTE_ADDR']);
		self::set_userdata('UID',$username);
		
	}


}


?>