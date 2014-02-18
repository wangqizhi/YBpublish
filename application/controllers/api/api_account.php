<?php 
/*
*帐号相关接口
*
*/
class Api_Account extends CI_Controller {
	public function __construct()
  	{
  		parent::__construct();
    	$this->load->model('ybadmin/ybuser_model');
    	//再次验证登录状态
    	$in_key = !empty($this->session->userdata('uname')) ? "1" : "0" ;
    	if ($in_key == "0") {
    		die('please login');
    	}

  	}

  	//修改密码api
  	public function change_pwd()
  	{
  		echo "test1";

  	}

}
?>