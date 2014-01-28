<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Ybauth extends CI_Session {
	public function __construct($pram=array())
	{
		parent::__construct($pram);
	}

	//检查登录
	public function login_in_law(){
		// $_SERVER['REMOTE_ADDR'] = 0;
		$lid = self::userdata('LID');
		// var_dump($uid);exit;

		// var_dump($lid);
		if(!isset($lid)){
			header("Location:/");
			log_message('debug','---not login');
			return false;
		}
		$username = $_COOKIE['uname'];//获取cookie中存在的用户名
		$need_check_data = md5($username.'@'.$_SERVER['REMOTE_ADDR']);
		$ready_data = self::userdata('LID');
		if ($need_check_data != $ready_data) {
			header("Location:/");
			log_message('debug','---IP:'.$_SERVER['REMOTE_ADDR'].' ip and username not match');
			return false;
		}

		log_message('debug','***Who:'.$username.' login check pass');
		

	}

	//登录
	public function auth_check($username,$passwd){
		if ($username=='wqz') {
			self::set_LID($username);
			log_message('debug','***ID:'.$username.' login successful');
			return true;
		} else {
			return false;
		}
		
	}


	//登录后设置UID
	public function set_LID($username)
	{
		// $uid = md5($username.$_SERVER['REMOTE_ADDR']);
		$lid = md5($username.'@'.$_SERVER['REMOTE_ADDR']);
		self::set_userdata('LID',$lid);
		setcookie('uname',$username,time()+60*60,"/");
		log_message('debug','***set the login_sign');

		
	}

	//登出
	public function login_out()
	{
		self::unset_userdata('LID');
		log_message('debug','***logout successful');

	}


}


?>