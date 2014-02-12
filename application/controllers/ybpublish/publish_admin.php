<?php 
class Publish_Admin extends CI_Controller {
	public function __construct()
  	{
  		parent::__construct();
    	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybmodule_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybpublish/pbdirpower_model');
    	$this->load->model('ybpublish/pbadmin_model');
  	}

	// function index()
	// {
	// 	$data['system_title'] = "publish";
	// 	$this->load->view('templates/header_semantic',$data);
	// 	$this->load->view('templates/header2');
	// 	$this->load->view('ybpublish/ybpublish_index');
	// 	$this->load->view('ybpublish/ybpublish_nav');
	// 	$this->load->view('templates/footer');
	// }

	function ybpublish_admin()
	{
		// $this->output->enable_profiler(TRUE);
		$data['publish_level1_modules'] = $this->ybmodule_model->get_module_where("publish-1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		
      	$data['groups'] = $this->ybgroup_model->get_group();
      	$data['flow_names'] = $this->pbadmin_model->get_distinct_flow_name();

		$data['system_title'] = "publish_admin";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_admin');
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	public function yb_mkdir()
	{
		$dir_name = $this->input->post('dir_name');

		$out = $this->yb_sh->sh_mkdir($dir_name);
		if ($out === 0) {
			$result =array('r'=>false,'a'=>'Dir Exists');
		} elseif($out ===2) {
			$result =array('r'=>false,'a'=>'Dir Make Failed');

		} else {
			$result =array('r'=>true,'a'=>'OK');

		}
		

		return $this->output->set_content_type('application/json')->set_output(json_encode($result));

	}


	//生成挂载信息
	public function yb_mount_output()
	{
		$dir_name = $this->input->post('dir_name');
		$dir_name = trim($dir_name,'/');
		$mount_dir = $this->input->post('mount_dir');
		$out_put = $mount_dir."\t".WORKDIR.$dir_name."\tnfs\tdefaults\t0\t0";
		echo $out_put;
		
	}

	public function yb_insert_dir()
	{
		$result = $this->pbdirpower_model->insert_publish_group_power();
		// echo $result;
		if ($result == 1) {
			$result_array=array('r'=>true,'a'=>'ok');
		} else {
			$result_array=array('r'=>false,'a'=>'power Exists');

		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
	}



	public function yb_insert_flow_power()
	{
		$flow_name = $this->input->post('flow_name_select');
		$share_who = $this->input->post('group_name_select');
		$flow_info = $this->pbadmin_model->get_flow_by_name($flow_name);
		$flow_rule = $flow_info[0]['flow_rule'];
		$creater = $flow_info[0]['creater'];

		$result = $this->pbadmin_model->insert_publish_flow_args($flow_name,$flow_rule,$share_who,$creater);
		// echo $result;
		if ($result == 1) {
			$result_array=array('r'=>true,'a'=>'ok');
		} elseif($result == 0) {
			$result_array=array('r'=>false,'a'=>'Flow Power Exists');

		} else {
			$result_array=array('r'=>false,'a'=>'Insert Wrong');

		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
	}

}

 ?>
