<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Ybauth extends CI_Session {
	public $CI;
	public function __construct($pram=array())
	{
		parent::__construct($pram);
		$this->CI =&get_instance();//实例化CI，可以用来调用其他资源
		$this->CI->load->database();

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
		// self::set_LID($_COOKIE['uname']);

		return true;
		// echo "1";
		log_message('debug','---Who:'.$username.' login check pass');
		

	}

	//登录
	public function auth_check($username,$passwd){
		// $check_u_p = $this->ybuser_model->get_user_num(1);
		//修改成执行rsa脚本，即可支持rsa登录
		$username = urlencode($username);
        	$passwd = urlencode($passwd);
		$check_u_p = shell_exec("/usr/local/php/bin/php /usr/local/web/index.php script/yb_login pass_login ".$username." ".$passwd);
		// $check_u_p = 1;
		// var_dump($check_u_p);
		if ($check_u_p == "1") {
			$is_username = $this->CI->db->get_where('yb_user',array('username'=>$username))->num_rows;
			if ($is_username==0) {
				$userinfo = $this->CI->db->get_where('yb_user',array('nick'=>$username))->result_array();
			} else {
				$userinfo = $this->CI->db->get_where('yb_user',array('username'=>$username))->result_array();
			}
			$usernick = $userinfo[0]['nick'];
			$username = $userinfo[0]['username'];
			// var_dump($username.$usernick);
			self::set_LID($username,$usernick);
			log_message('debug','---ID:'.$username.' login successful');
			return true;
		} else {
			return false;
		}
		
	}


	//登录后设置LID
	public function set_LID($username,$usernick)
	{

		// $uid = md5($username.$_SERVER['REMOTE_ADDR']);
		$lid = md5($usernick.'@'.$_SERVER['REMOTE_ADDR']);
		self::set_userdata('LID',$lid);
		self::set_userdata('uname',$usernick);
		self::set_userdata('uid',$username);
		setcookie('uname',$usernick,time()+60*60,"/");
		// setcookie('uid',$username,time()+60*60,"/");
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
