<?php 

class YbIndex extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybmodule_model');
    	$this->load->model('ybadmin/ybuser_model');
  	}

	function index()
	{
		// var_dump($this->ybauth->login_in_law());
		if ($this->ybauth->login_in_law()) {
			header("Location:ybindex/choose_index");
			// echo '1';
			return false;
		}else{
			$this->load->view('templates/header');
			$this->load->view('ybindex/ybindex_res');
			$this->load->view('templates/header2');
			$this->load->view('ybindex/ybindex_main');
			$this->load->view('templates/footer');


		}

		
	}

	function force_index()
	{
		// $this->output->enable_profiler(TRUE);
			$data['referrer'] = $this->input->get('referrer');
			$this->load->view('templates/header');
			$this->load->view('ybindex/ybindex_res');
			$this->load->view('templates/header2');
			$this->load->view('ybindex/ybindex_main',$data);
			$this->load->view('templates/footer');
	}

	function choose_index()
	{
		if (!$this->ybauth->login_in_law()) {
			header("Location:/");
			// echo '1';
			return false;
		}


		//模块配置信息
		$data['level1_modules'] = $this->ybmodule_model->get_module_where("1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
    	$data['level2_modules'] = $this->ybmodule_model->get_module_where("2");


		$data['login_user'] = $this->session->userdata('uname');
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('templates/footer');

	}

	function ybsystem_aboutus()
	{
		// if (!$this->ybauth->login_in_law()) {
		// 	header("Location:/");
		// 	// echo '1';
		// }
		//模块配置信息
		$data['level1_modules'] = $this->ybmodule_model->get_module_where("1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
    	$data['level2_modules'] = $this->ybmodule_model->get_module_where("2");


		$data['login_user'] = $this->session->userdata('uname');
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('ybindex/ybindex_aboutus');
		$this->load->view('templates/footer');

	}

	
}

 ?>

