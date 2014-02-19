<?php 
class Admin_Index extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybmodule_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybadmin/ybpower_model');
  	}

	function index()
	{
		// if (!$this->ybauth->login_in_law()) {
		// 	header("Location:/");
		// 	// echo '1';
		// }
		// $data['nav_who'] = $nav_who;
		//模块配置信息
		$data['level1_modules'] = $this->ybmodule_model->get_module_where("1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
    	$data['level2_modules'] = $this->ybmodule_model->get_module_where("2");

    	//admin的模块配置载入
    	$data['level_admin_modules'] = $this->ybmodule_model->get_module_where("admin");

		$data['login_user'] = $this->session->userdata('uname');
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('ybadmin/ybadmin_nav');
		$this->load->view('templates/footer');
	}

	function manage($nav_who=null){
		if (!isset($nav_who)) {
			show_404();
		}

		if (!$this->ybauth->login_in_law()) {
			header("Location:/");
			// echo '1';
		}
//模块配置信息
		$data['level1_modules'] = $this->ybmodule_model->get_module_where("1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
   		$data['level2_modules'] = $this->ybmodule_model->get_module_where("2");


		$data['power_urls'] = $this->ybpower->get_urls();
		$data['login_user'] = $this->session->userdata('uname');//获取登录用户名
      	$data['powers'] = $this->ybpower_model->get_powers();
		$data['groups'] = $this->ybgroup_model->get_group();
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('ybadmin/ybadmin_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('ybadmin/ybadmin_nav_'.$nav_who);
		$this->load->view('templates/footer');

	}

	function ftp_manage(){
		// echo "fpt_manage";
		$data['system_title'] = "FTP_Manage";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybadmin/ybadmin_ftp_manage');
		$this->load->view('templates/footer');
	}


	//帐号设置-密码修改
	function account_setting(){
		// echo "fpt_manage";
		$data['system_title'] = "Account_Setting";
		$data['username'] = $this->session->userdata('uname');
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybadmin/ybadmin_change_passwd');
		$this->load->view('templates/footer');

		
	}




	

}

 ?>
