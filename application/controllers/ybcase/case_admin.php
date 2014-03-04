<?php 
class Case_Admin extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ybadmin/ybmodule_model');
    $this->load->model('ybcase/case_template_model');
    $this->load->model('ybcase/case_flow_model');
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


//插入提交内容模板
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
    return $this->output->set_content_type('application/json')->set_output(json_encode($result));
  }

  public function flow_action_insert()
  {
    // var_dump($this->input->post('template_name'));exit;
    $template_id_result = $this->case_template_model->get_case_template($this->input->post('template_name'));
    if ($template_id_result[0] != 1) {
      $result_array = array('r'=>false,'a'=>$result[1]);
    }else{
      // var_dump($template_id_result);exit;
      $template_id = $template_id_result[1][0]['id'];
      $flow_name = $this->input->post('flow_name');
      $flow = $this->input->post('flow');
      $result = $this->case_flow_model->insert_case_flow("0",$template_id,$flow_name,$flow);
      if ($result[0]!=1) {
        $result_array = array('r'=>false,'a'=>$result[1]);
      }else{
        $result_array = array('r'=>true,'a'=>$result[1]);
      }
      return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));
    }

  }


  public function give_flow_power()
  {
    $power_group = $this->input->post('power_group');
    $result = $this->case_flow_model->flow_give_power($power_group);

    var_dump($result);
  }


}
?>