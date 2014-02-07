<?php 
/**
* 
*/
class AuthAcl
{
	public $CI;
	function __construct(){
		$this->CI =& get_instance();//实例化CI，可以用来调用其他资源
		$this->CI->load->database();
	}
	
	public function show_power()
	{
		# 关闭acl
		// return true;
		// exit; 
		// 
		$check_url = substr($_SERVER['PHP_SELF'], 11);//去除index.php，获取当前url
		//放行首页
		// var_dump($check_url);exit;
		// var_dump($_SERVER['PHP_SELF']);exit;
		
		if ($_SERVER['PHP_SELF']=="/index.php/force_index") {
			log_message('debug','---in force index.php');
			return true;
		}

		//免权限url，后期需要修改写成配置文件
		if ($check_url=="checkLogin/check" 
			or $check_url=="checkLogin/yblogout"
			or $_SERVER['PHP_SELF']=="/index.php") {
			log_message('debug','---in page check pass');
			return true;
		}

		$username = $this->CI->session->userdata('uname');//获取当前用户名

		if (empty($username)) {
			# code...
			log_message('debug','***User:'.$username.' Auth ACL failed (not set session)');
			header("Location:/force_index");
			return false;

		}

		//获取用户信息，如果用户名查询不到，试着用昵称查询
		$user_info = $this->CI->db->get_where('yb_user',array('username'=>$username))->result_array();
		if (empty($user_info)) {
			$user_info = $this->CI->db->get_where('yb_user',array('nick'=>$username))->result_array();
		}

		//获取用户组
		if(!empty($user_info)){
			$user_group = $user_info[0]['group'];
		}else{
			$user_group = 0;
		}
		//超级管理员无权限限制
		if ($user_group == "Root") {
			log_message('debug','---User:'.$username.' Auth ACL pass(root user)');
			setcookie('uname',$username,time()+60*60,"/");
			
			return true;
		}

		//无此用户
		if ($user_group === 0) {
			log_message('debug','***User:'.$username.' Auth ACL failed (not exists user)');
			header("Location:/force_index");
				// echo "in";
			return false;
		}

		//获取权限组
		$query = $this->CI->db->get_where('yb_group',array('groupname'=>$user_group))->result_array();
		if(empty($query)){
			log_message('debug','***User:'.$username.' Auth ACL failed (not exists group)');
			header("Location:/force_index");
			return false;
		}

		if (empty($query[0]['power'])) {
			header("Location:/force_index");
			log_message('debug','***User:'.$username.' Auth ACL failed (not exists power)');
			return false;
			
		}
		// var_dump($query['power']);exit;
		$user_power = $query[0]['power'];
		$user_power_array=explode("-",$user_power);
		// var_dump($user_power_array);
		// echo $check_url;
		$power_on = false;
		foreach ($user_power_array as $key) {
			$query = $this->CI->db->get_where('yb_power',array('powername'=>$key))->result_array();
			// var_dump($query);
			foreach ($query as $each_url) {
				// echo $each_url['powerurl'];
				if (self::power_check($each_url['powerurl'])) {
					$power_on = true;
				} 
			}	
		}
		if($power_on){
			setcookie('uname',$username,time()+60*60,"/");
			log_message('debug','---User:'.$username.' Auth ACL pass (power is ok)');
		}else {
			log_message('debug','***User:'.$username.' Auth ACL failed (power is bad)');
			echo "power is bad <a href='/force_index'>return</a>";exit;
		}
		// exit;
	}

	//支持:any语法的匹配
	public function power_check($query_url='')
	{
		$check_url = substr($_SERVER['PHP_SELF'], 11);//去除index.php，获取当前url
		if($check_url==""){//如果没有参数，则不匹配
			return false;
		}
		if (strstr($query_url, "(:any)")) {//匹配:any语法
			$query_url = substr($query_url,0,strlen($query_url)-6);//严格区分带‘/’或者不带‘/’，例如：匹配x/(:any),不匹配x
			if ($query_url == substr($check_url , 0 , strlen($query_url))) {
				return true;
			} else {
				return false;
			}
			
		} else {
			if ($query_url == $check_url) {
				return true;
			} else {
				return false;
			}
		}
		

	}
}

 ?>