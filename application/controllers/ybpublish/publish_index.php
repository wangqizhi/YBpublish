<?php 
class Publish_Index extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybadmin/ybmodule_model');
    	$this->load->model('ybpublish/pbdirpower_model');
    	$this->load->model('ybpublish/pbadmin_model');
  	}

	function index()
	{
      // $this->output->enable_profiler(TRUE);
		
		$data['system_title'] = "publish";
		$user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		$data['flow_array'] = $this->pbadmin_model->get_flow($user_group[0]['group']);
		$data['publish_level1_modules'] = $this->ybmodule_model->get_module_where("publish-1");
		$data['user_group'] = $user_group;
		// var_dump($data['flow_array']);exit;
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_index',$data);
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	//make flow
	public function mkflow()
	{
		$data['publish_level1_modules'] = $this->ybmodule_model->get_module_where("publish-1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		
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

	//api_make_flow
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


	//about template
	public function mktep()
	{
		$data['publish_level1_modules'] = $this->ybmodule_model->get_module_where("publish-1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		
		$user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		// var_dump($user_group[0]['group']);exit;
		$data['my_dirs'] = $this->pbdirpower_model->get_dir($user_group[0]['group']);
		$data['my_name'] = $user_group[0]['username'];
		// var_dump($data['my_dirs']);exit;
		$data['all_groups'] = $this->ybgroup_model->get_group();
		$data['system_title'] = "publish_make_flow";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_mktemplate',$data);
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}

	public function analyse()
	{
		// echo "test";
		// $data['all_groups'] = $this->ybgroup_model->get_group();
		$data['publish_level1_modules'] = $this->ybmodule_model->get_module_where("publish-1");
		$data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
		$data['system_title'] = "publish_Analyse";
		$this->load->view('templates/header_semantic',$data);
		$this->load->view('templates/header2');
		$this->load->view('ybpublish/ybpublish_analyse');
		$this->load->view('ybpublish/ybpublish_nav');
		$this->load->view('templates/footer');
	}



	//文件匹配
	public function check_files()
	{
		$result_array = array();
		$check_files = trim($this->input->post('check_files'),'/');
		$target_dir = trim($this->input->post('target_dir'),'/');
		if ($check_files=="" || $target_dir =="") {
			$result_array = array('r'=>false,'a'=>'Empty input');
		}
		if (!is_dir(WORKDIR.$check_files)) {
			$result_array = array('r'=>false,'a'=>'Check Dir :'.$check_files.' Not Exists');

		}elseif (!is_dir(WORKDIR.$target_dir)) {
			$result_array = array('r'=>false,'a'=>'Target Dir :'.$target_dir.' Not Exists');

		}else{
			$need_check_files = ls_dir(WORKDIR.$check_files);

			$not_exsist_files = array();
			foreach ($need_check_files as $check_file) {
				if (!is_file(str_replace($check_files, $target_dir, $check_file))) {
					$not_exsist_files[] = $check_file;
				}
			}

			if (sizeof($not_exsist_files) !== 0) {
				$not_exsist_string = implode("<br>", $not_exsist_files);

				$result_array = array('r'=>false,'a'=>'File List(not exsist): <br>'.$not_exsist_string);
				return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
			}
			

			//不匹配
			$not_match_files = array();
			foreach ($need_check_files as $check_file) {
				$need_check_file = str_replace($check_files, $target_dir, $check_file);
				if (md5_file($check_file) != md5_file($need_check_file)) {
					$not_match_files[] = $check_file;
				}
			}
			// $result_array = array('r'=>false,'a'=>'show_debug: '.md5_file($check_file).'  !== '.md5_file($need_check_file));
			// $result_array = array('r'=>false,'a'=>'show_debug: '.sizeof($not_match_files));
			// return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
			if (sizeof($not_match_files) === 0) {
				$result_array = array('r'=>true,'a'=>'Very ! Match!');
				
			} else {
				$not_match_string = implode("<br>", $not_match_files);
				$result_array = array('r'=>false,'a'=>'File List(not match): <br>'.$not_match_string);
	
			}
		}
		

		return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));

	}


	
}

 ?>
