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
  		$result = $this->ybuser_model->update_user_pwd();
  		if ($result===0) {
  			$result_array=array('r'=>false,'a'=>'User Not Exists');
  		} else {
  			$result_array=array('r'=>true,'a'=>'Update Password Successful');

  		}
      return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
  		

  	}

    //登录状态检测
    public function online_or_not()
    {
      if (empty($this->session->userdata('uname'))) {
        echo 0;//丢失登录状态 
      } else {
        echo 1;
      }
      

    }

}
?>