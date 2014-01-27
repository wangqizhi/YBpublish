<?php 
/**
* 
*/
class UseDemo extends CI_Controller
{
	
	
	function index()
	{
		$this->output->enable_profiler(TRUE);

		echo "this is test page";
	}

	function testSS()
	{
		$this->output->enable_profiler(TRUE);
		// var_dump($this->session->set_userdata(array('UID'=>'13764018020')));
		var_dump($this->session->userdata('UID'));
		// echo BASEPATH;
		get_power();
		$this->log->write_log($level = 'all', 'test-log');


		// $this->load->library('session');

	}
}


 ?>