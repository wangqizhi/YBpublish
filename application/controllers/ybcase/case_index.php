<?php 
class Case_Index extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ybadmin/ybmodule_model');
    $this->load->model('ybadmin/ybuser_model');
    $this->load->model('ybcase/case_flow_model');
    $this->load->model('ybcase/case_template_model');
    $this->load->model('ybcase/case_model');
  	log_message('debug','---Case Controller Construct Successful');

  }

  public function nav_index()
  {
    $data['case_level_1'] = $this->ybmodule_model->get_module_where('case-1');
    $this->load->view('ybcase/ybcase_nav',$data);
  }

  public function index()
  {
    // $this->output->enable_profiler(TRUE);

  	$data = $this->data;
	  $this->load->view('templates/header_semantic',$data);
  	$this->load->view('ybcase/ybcase_res');
	  $this->load->view('templates/header2');
    $this->nav_index();
  	$this->load->view('ybcase/ybcase_index');
	  $this->load->view('templates/footer');
  }

  public function case_start()
  {
    $data = $this->data;
    $userinfo = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
    $what = array('power'=>$userinfo[0]['group']);
    // var_dump($what);exit;
    $data['flows'] = $this->case_flow_model->get_flow_by_what($what);
    $this->load->view('templates/header_semantic',$data);
    $this->load->view('ybcase/ybcase_res');
    $this->load->view('templates/header2');
    $this->nav_index();
    $this->load->view('ybcase/ybcase_start',$data);
    $this->load->view('templates/footer');
  }

  public function id_search()
  {
    $data = $this->data;
    $args = $this->input->get('id');
    if ($args=='') {
      show_404();
    }else{
      $what = array('id'=>$args);
      $data['flow_info'] = $this->case_flow_model->get_flow_by_what($what);
      $data['template_info'] = $this->case_template_model->get_case_template_byid($data['flow_info'][0]['template_id']);
      // var_dump($data['template_info']);
      $this->load->view('templates/header_semantic',$data);
      $this->load->view('ybcase/ybcase_res');
      $this->load->view('templates/header2');
      $this->nav_index();
      $this->load->view('ybcase/ybcase_start_detail',$data);
      $this->load->view('templates/footer');

    }
  }

  public function insert_flow()
  {
    $flow_name  = $this->input->post('flow_name');
    $userinfo = $this->ybuser_model->get_user_group($this->session->userdata('uname'));

    // var_dump($flow_name);exit;
    $what = array('flow_name'=>$flow_name,'power'=>$userinfo[0]['group']);
    $flows = $this->case_flow_model->get_flow_by_what($what);
    if (sizeof($flows)==0) {
      $out = json_encode(array('r'=>false,'a'=>'wrong power'));
      return $this->output->set_content_type('application/json')->set_output($out);
      
    }
    $template_info = $this->case_template_model->get_case_template_byid($flows[0]['template_id']);
    
    $email_who  = trim($this->input->post('email_who'));
    $all_temp_size  = $this->input->post('all_temp_size');
    $all_temp_val  = $this->input->post('all_temp_val');
    $all_temp_val_array = explode('-&*&-', $all_temp_val);
    $temp_content_array = explode('-', $template_info[0]['sbj_content']);
    if (sizeof($all_temp_val_array)-1 != sizeof($temp_content_array)) {
      $out = json_encode(array('r'=>false,'a'=>'wrong args'));
      return $this->output->set_content_type('application/json')->set_output($out);
    }
    
    $result = $this->case_model->insert_case($flows[0]['id'],$all_temp_val,$email_who);
    if ($result[0] == 1) {
      $out = json_encode(array('r'=>true,'a'=>'ok'));
      $this->email->from(MAILADDR, MAILNAME);
      $this->email->to('wqz@yiban.cn'); 
      $this->email->cc('wqz@yiban.cn'); 
      $this->email->bcc('wqz@yiban.cn'); 
      $this->email->subject('Email Test1111');
      $this->email->message('Testing the email class.1111'); 
      $this->email->send();
    } else {
      $out = json_encode(array('r'=>false,'a'=>$result[1]));
    }
    return $this->output->set_content_type('application/json')->set_output($out);
    
  }

}
?>