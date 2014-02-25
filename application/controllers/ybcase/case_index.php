<?php 
class Case_Index extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ybadmin/ybmodule_model');
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
    $this->load->view('templates/header_semantic',$data);
    $this->load->view('ybcase/ybcase_res');
    $this->load->view('templates/header2');
    $this->nav_index();
    $this->load->view('ybcase/ybcase_start');
    $this->load->view('templates/footer');
  }
}
?>