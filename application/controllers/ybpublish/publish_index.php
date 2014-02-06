<?php 
class Publish_Index extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybpublish/pbdirpower_model');
  	}

	function index()
	{
		$data['system_title'] = "publish";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_index');
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	public function mkflow()
	{
		$user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		// var_dump($user_group[0]['group']);exit;
		$data['my_dirs'] = $this->pbdirpower_model->get_dir($user_group[0]['group']);
		// var_dump($data['my_dirs']);exit;

		$data['system_title'] = "publish_make_flow";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_mkflow',$data);
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	
}

 ?>
