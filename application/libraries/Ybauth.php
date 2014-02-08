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
			// header("Location:/");
			log_message('debug','***not login');
			return false;
		}

		//fix 没有设置cookie的警告
		if (!isset($_COOKIE['uname'])) {
			log_message('debug','***not set cookie');
			return false;
		}


		$username = $_COOKIE['uname'];//获取cookie中存在的用户名
		$need_check_data = md5($username.'@'.$_SERVER['REMOTE_ADDR']);
		$ready_data = self::userdata('LID');
		if ($need_check_data != $ready_data) {
			// header("Location:/");
			log_message('debug','***IP:'.$_SERVER['REMOTE_ADDR'].' ip and username not match');
			return false;
		}


		//check的时候刷新登录过期时间
		self::set_LID($_COOKIE['uname']);

		return true;
		// echo "1";
		log_message('debug','---Who:'.$username.' login check pass');
		

	}

	//登录
	public function auth_check($username,$passwd){
		// $check_u_p = $this->ybuser_model->get_user_num(1);
		//修改成执行rsa脚本，即可支持rsa登录
		$check_u_p = shell_exec("/usr/local/php/bin/php /usr/local/web/YBpublish/index.php script/yb_login pass_login ".$username." ".$passwd);
		// $check_u_p = 1;
		// var_dump($check_u_p);
		if ($check_u_p == "1") {
			self::set_LID($username);
			log_message('debug','---ID:'.$username.' login successful');
			return true;
		} else {
			return false;
		}
		
	}


	//登录后设置LID
	public function set_LID($username)
	{
		// $uid = md5($username.$_SERVER['REMOTE_ADDR']);
		$lid = md5($username.'@'.$_SERVER['REMOTE_ADDR']);
		self::set_userdata('LID',$lid);
		self::set_userdata('uname',$username);
		setcookie('uname',$username,time()+60*60,"/");
		log_message('debug','---set the login_sign');

		
	}

	//登出
	public function login_out()
	{
		self::unset_userdata('LID');
		self::unset_userdata('uname');
		if (isset($_COOKIE['uname'])) {
			setcookie("uname",time()-3600);			
		}
		log_message('debug','---logout successful');

	}


}


?>