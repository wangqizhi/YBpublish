<?php 
class Case_Index extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  	{
    	parent::__construct();
  		log_message('debug','---Case Controller Construct Successful');

  	}

  	public function index()
  	{
  		$data = $this->data;

		$this->load->view('templates/header_semantic',$data);
  		$this->load->view('ybcase/ybcase_res');
		$this->load->view('templates/header2');
  		$this->load->view('ybcase/ybcase_index');
		$this->load->view('templates/footer');
  	}
}
?>