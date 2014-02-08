<?php 
class Publish_Index extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybpublish/pbdirpower_model');
    	$this->load->model('ybpublish/pbadmin_model');
  	}

	function index()
	{
		$data['system_title'] = "publish";
		$user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		$data['flow_array'] = $this->pbadmin_model->get_flow($user_group[0]['group']);
		// var_dump($flow_array);exit;
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_index',$data);
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	public function mkflow()
	{
		$user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		// var_dump($user_group[0]['group']);exit;
		$data['my_dirs'] = $this->pbdirpower_model->get_dir($user_group[0]['group']);
		$data['my_name'] = $user_group[0]['username'];
		// var_dump($data['my_dirs']);exit;
		$data['all_groups'] = $this->ybgroup_model->get_group();
		$data['system_title'] = "publish_make_flow";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_mkflow',$data);
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	public function insert_mkflow()
	{
		$result = $this->pbadmin_model->insert_publish_flow();
		if ($result == "1") {
			$result_array = array('r'=>true,'a'=>'ok');
		} else {
			$result_array = array('r'=>false,'a'=>'Insert Repeat');

		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));

		
	}

	
}

 ?>
