<?php 
class Admin_Index extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybpower_model');
  	}

	function index()
	{
		// if (!$this->ybauth->login_in_law()) {
		// 	header("Location:/");
		// 	// echo '1';
		// }
		// $data['nav_who'] = $nav_who;
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


	

}

 ?>
