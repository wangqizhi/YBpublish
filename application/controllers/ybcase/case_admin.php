<?php 
class Case_Admin extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ybadmin/ybmodule_model');
    $this->load->model('ybcase/case_template_model');
  	log_message('debug','---Case Controller Construct Successful');

  }

  public function nav_index()
  {
    $data['case_level_1'] = $this->ybmodule_model->get_module_where('case-1');
    $this->load->view('ybcase/ybcase_nav',$data);
  }

  public function index()
  {
  	$data = $this->data;
    $data['template_name'] = $this->case_template_model->get_all_case_template_name();
	  $this->load->view('templates/header_semantic',$data);
  	$this->load->view('ybcase/ybcase_res');
	  $this->load->view('templates/header2');
    $this->nav_index();
  	$this->load->view('ybcase/ybcase_admin');
	  $this->load->view('templates/footer');
  }

  public function template_action_insert()
  {
    $result = $this->case_template_model->inset_case_template();
    if ($result[0]!=1) {
      $result_array = array('r'=>false,'a'=>$result[1]);
    }else{
      $result_array = array('r'=>true,'a'=>$result[1]);

    }
    return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
  }

  public function template_action_get_name()
  {
    $result = $this->case_template_model->get_all_case_template_name();
    // if ($result[0]!=1) {
    //   $result_array = array('r'=>false,'a'=>$result[1]);
    // }else{
    //   $result_array = array('r'=>true,'a'=>$result[1]);

    // }
    // var_dump($result);exit;
    return $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }



}
?>